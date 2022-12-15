<?php

if (!defined('ABSPATH')){
    exit;
}

class WCPA_Front_End extends WCPA_Order_Meta
{
    public $hooked_field_tag = false;
    static $cart_error = array();
    /**
     * The single instance of WordPress_Plugin_Template_Settings.
     * @var    object
     * @access  private
     * @since    1.0.0
     */
    private static $_instance = null;
    public $products = false;
    /**
     * The version number.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_version;
    /**
     * The token.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_token;
    /**
     * The plugin assets URL.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $assets_url;
    /**
     * The main plugin file.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $file;

    function __construct($file = '', $version = '1.0.0')
    {
// Load frontend JS & CSS

        $this->_version = $version;
        $this->_token = WCPA_TOKEN;

        add_action( 'init', array($this, 'register_type_forms'), 10, 1 );

        /**
         * Check if WooCommerce is active
         * */
        if ($this->check_woocommerce_active()) {


            add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'), 10);
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 10);

            $this->file = $file;
            $this->assets_url = esc_url(trailingslashit(plugins_url('/assets/', $this->file)));

            add_action('init', array(
                $this,
                'render_init_function'
            )); // initiate render methods after init it will work in all cases
            add_action('woocommerce_before_add_to_cart_form', array(
                $this,
                'render_init_function'
            ));// initiate render methods after loading $product,
            // $product might be needed to set hooks based on product loaded

            add_filter('woocommerce_add_cart_item_data', array($this, 'add_cart_item_data'), 10, 3);
            add_filter('woocommerce_add_to_cart_validation', array($this, 'add_to_cart_validation'), 10, 3);

            add_filter('post_class', array($this, 'product_class'), 10, 3);

            add_filter('woocommerce_order_item_display_meta_value', array($this, 'display_meta_value'), 10, 3);
	        add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'checkout_order_processed' ), 1, 1 );



            add_action('woocommerce_checkout_subscription_created', array($this, 'checkout_subscription_created'), 10, 1);//compatibility with subscription plugin


            add_filter('woocommerce_get_item_data', array($this, 'get_item_data'), 10, 2);
            add_action('woocommerce_checkout_create_order_line_item', array($this, 'checkout_create_order_line_item'), 10, 3);

            add_filter('woocommerce_product_add_to_cart_url', array($this, 'add_to_cart_url'), 20, 2);
            add_filter('woocommerce_product_supports', array($this, 'product_supports'), 10, 3);
            add_filter('woocommerce_product_add_to_cart_text', array($this, 'add_to_cart_text'), 10, 2);

            add_filter('woocommerce_order_again_cart_item_data', array($this, 'order_again_cart_item_data'), 50, 3);

            add_action('woocommerce_order_item_get_formatted_meta_data', array($this, 'order_item_get_formatted_meta_data'), 10, 2);


            add_action('woocommerce_single_product_summary', array($this, 'check_if_product_has_set_price'), 30);

            add_filter('wc_stripe_hide_payment_request_on_product_page', array($this, 'disable_apple_pay'), 10, 2);

            add_action('in_plugin_update_message-woo-custom-product-addons/start.php',array($this, 'upgrade_version_notice'),10,2);
        }
    }

    public function upgrade_version_notice($plugin_data, $response) {
        if($response && isset($response->new_version) && version_compare('2.9',$response->new_version,'<')){
            echo '<div ><h3 style="color:red">*** Breaking Changes Ahead in new version.
            Please <a href="https://acowebs.com/r/version-free-3-update" target="_blank">Read</a> Before updating ***</h3></div>';
        }
    }

    public function check_woocommerce_active()
    {
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
        }
        if (is_multisite()) {
            $plugins = get_site_option('active_sitewide_plugins');
            if (isset($plugins['woocommerce/woocommerce.php'])){
                return true;
            }
        }
        return false;
    }

    static function get_cart_error($product_id = false)
    {
        if (!$product_id) {
            return self::$cart_error;
        } else {
            return isset(self::$cart_error[$product_id]) ? self::$cart_error[$product_id] : false;
        }
    }
    public function render_init_function()
    {
        if ($this->hooked_field_tag !== false) {
            remove_action($this->hooked_field_tag[0], array(
                $this,
                'before_add_to_cart_button'
            ), $this->hooked_field_tag[1]);
        }
        $this->hooked_field_tag = get_wcpa_display_hook("fields");
        add_action($this->hooked_field_tag[0], array(
            $this,
            'before_add_to_cart_button'
        ), $this->hooked_field_tag[1]);
    }
    static function set_cart_error($product_id, $status)
    {
        self::$cart_error[$product_id] = $status;
    }

    public static function instance($parent)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($parent);
        }
        return self::$_instance;
    }

    /**
     *    Create post type forms
     */
    public function register_type_forms()
    {

        $post_type = WCPA_POST_TYPE;
        $labels = array(
            'name' => 'Product Form',
            'singular_name' => 'Product Form',
            'name_admin_bar' => 'WCPA_Form',
            'add_new' => _x('Add New Form', $post_type, 'woo-custom-product-addons'),
            'add_new_item' => sprintf(__('Add New %s', 'woo-custom-product-addons'), 'Form'),
            'edit_item' => sprintf(__('Edit %s', 'woo-custom-product-addons'), 'Form'),
            'new_item' => sprintf(__('New %s', 'woo-custom-product-addons'), 'Form'),
            'all_items' => sprintf(__('Custom Product Addons', 'woo-custom-product-addons'), 'Form'),
            'view_item' => sprintf(__('View %s', 'woo-custom-product-addons'), 'Form'),
            'search_items' => sprintf(__('Search %s', 'woo-custom-product-addons'), 'Form'),
            'not_found' => sprintf(__('No %s Found', 'woo-custom-product-addons'), 'Form'),
            'not_found_in_trash' => sprintf(__('No %s Found In Trash', 'woo-custom-product-addons'), 'Form'),
            'parent_item_colon' => sprintf(__('Parent %s'), 'Form'),
            'menu_name' => 'Custome Product Options'
        );

        $args = array(
            'labels' => apply_filters($post_type . '_labels', $labels),
            'description' => '',
            'public' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'show_in_menu' => 'edit.php?post_type=product',
            'show_in_nav_menus' => false,
            'query_var' => false,
            'can_export' => true,
            'rewrite' => false,
            'capability_type' => 'post',
            'has_archive' => false,
            'rest_base' => $post_type,
            'hierarchical' => false,
            'show_in_rest' => false,
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'supports' => array('title'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-post',
            'taxonomies' => array()
        );

        register_post_type($post_type, apply_filters($post_type . '_register_args', $args, $post_type));

        if (is_admin()) {
            register_taxonomy_for_object_type( 'product_cat', $post_type );
        }

    }

    public function check_if_product_has_set_price()
    {
        global $product;
        if (!$product->is_purchasable() && ($product->is_type(['simple', 'variable']))) {
            $product_id = $product->get_id();
            // check if admin user
            if (current_user_can('manage_options') && $this->is_wcpa_product($product_id)) {
                echo '<p style="color:red">' . __('WCPA fields will show only if product has set price', 'woo-custom-product-addons') . '</p>';
            }
        }
    }

    public function is_wcpa_product($product_id)
    {

        if (!$this->products) {
            $form = new WCPA_Form();
            $this->products = $form->get_wcpa_products();
        }

        return in_array($product_id, $this->products);
    }

    public function order_again_cart_item_data($cart_item_data, $item, $order)
    {

        $form = new WCPA_Form();
        $data = $form->order_again_item_data($item);
        $cart_item_data[WCPA_CART_ITEM_KEY] = $data;

        remove_filter('woocommerce_add_to_cart_validation', array($this, 'add_to_cart_validation'));

        return $cart_item_data;
    }

    public function product_class($classes = array(), $class = false, $product_id = false)
    {
        if ($product_id && $this->is_wcpa_product($product_id)) {
            $classes[] = 'wcpa_has_options';
        }

        return $classes;
    }

    public function disable_apple_pay($status,$product = false)
    {
        if ($product && $this->is_wcpa_product($product->ID)) {
           $status = true;
        }
        return $status;
    }


    public function order_item_get_formatted_meta_data($formatted_meta, $item)
    {


        if (!wcpa_get_option('show_meta_in_order')) {
            return parent::order_item_get_formatted_meta_data($formatted_meta, $item);
        } else {
            return $formatted_meta;
        }
    }

    public function add_to_cart_text($text, $product)
    {
        $product_id = $product->get_id();
        if ($this->is_wcpa_product($product_id)) {
            $text = wcpa_get_option('add_to_cart_text', 'Select options', true);
        }

        return $text;
    }

    public function product_supports($support, $feature, $product)
    {
        $product_id = $product->get_id();
        if ($feature == 'ajax_add_to_cart' && $this->is_wcpa_product($product_id)) {
            $support = FALSE;
        }
        return $support;
    }

    public function add_to_cart_url($url, $product)
    {
        $product_id = $product->get_id();
        if ($this->is_wcpa_product($product_id) && !$product->is_type('external')) {
            return $product->get_permalink();
        } else {
            return $url;
        }
    }

    public function add_cart_item_data($cart_item_data, $product_id, $variation_id)
    {


        $form = new WCPA_Form();
        $data = $form->submited_data($product_id);


        if (!isset($cart_item_data[WCPA_CART_ITEM_KEY])) { // if already set  by order again option
            $cart_item_data[WCPA_CART_ITEM_KEY] = $data;
        }

        return $cart_item_data;
    }

    public function add_to_cart_validation($passed, $product_id)
    {

        $form = new WCPA_Form();

        return $form->validate_form_data($product_id);
    }

    public function get_item_data($item_data, $cart_item)
    {
        if (!is_array($item_data)) {
            $item_data = array();
        }

        if (((wcpa_get_option('show_meta_in_cart') && !is_checkout()) || (is_checkout() && wcpa_get_option('show_meta_in_checkout'))) && isset($cart_item[WCPA_CART_ITEM_KEY]) && is_array($cart_item[WCPA_CART_ITEM_KEY]) && !empty($cart_item[WCPA_CART_ITEM_KEY])) {
            foreach ($cart_item[WCPA_CART_ITEM_KEY] as $v) {
                if (!in_array($v['type'], array('header', 'paragraph'))) {
                    $item_data[] = array(
                        'name' => $v['name'],
                        'key' => $v['label'],
                        'value' => $this->cart_display($v)
                    );
                }
            }
        }

        return $item_data;
    }

    public function cart_display($v)
    {
        $display = '';


        switch ($v['type']) {
            case 'text':
            case 'number':
            case 'date':
            case 'time':
            case 'datetime-local':
                $display = $v['value'];
                break;
            case 'textarea':
                $display = $this->cart_display_textarea($v['value']);
                break;
            case 'select':
            case 'checkbox-group':
            case 'radio-group':
                $display = $this->cart_display_array($v);
                break;
            case 'color':
                $display = $this->cart_display_color($v['value']);
                break;

            default:
                $display = $v['value'];
        }
        if ($display == '') {
            $display = '&nbsp;';
        }
        return $display;
    }

    public function cart_display_textarea($value)
    {
        return nl2br($value);
    }

    public function cart_display_array($value)
    {
        $display = '';
        if (is_array($value['value'])) {
            foreach ($value['value'] as $v) {
                $display .= '<span>' . $v . '</span>';

                $display .= '<br>';
            }
        } else {
            $display = $value['value'];
        }
        return $display;
    }

    public function cart_display_color($value)
    {
        return '<span style="color:' . $value . ';font-size: 20px;padding: 0;line-height: 0;">&#9632;</span>' . $value;
    }

    public function before_add_to_cart_button()
    {
        global $product;
        $product_id = $product->get_id();
        $form = new WCPA_Form();
        $form->get_forms_by_product($product_id);
        $form->render();
    }

    /**
     * Load frontend CSS.
     * @access  public
     * @since   1.0.0
     * @return void
     */
    public function enqueue_styles()
    {
        if (SCRIPT_DEBUG || WP_DEBUG) {
            wp_register_style($this->_token . '-frontend', esc_url($this->assets_url) . 'css/frontend.css', array(), $this->_version);

        } else {
            wp_register_style($this->_token . '-frontend', esc_url($this->assets_url) . 'css/frontend.min.css', array(), $this->_version);

        }

        wp_enqueue_style($this->_token . '-frontend');
    }

// End enqueue_styles ()

    /**
     * Load frontend Javascript.
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function enqueue_scripts()
    {

    }

// End enqueue_scripts ()
// End instance()
}
