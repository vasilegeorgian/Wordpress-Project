<?php

/**
 * @package WP Encryption
 *
 * @author     Go Web Smarty
 * @copyright  Copyright (C) 2019-2020, Go Web Smarty
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @link       https://gowebsmarty.com
 * @since      Class available since Release 1.0.0
 *
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */
/**
 * Autoloader
 * 
 * @since 5.1.1
 */
require_once plugin_dir_path( __DIR__ ) . 'vendor/autoload.php';
use  WPLEClient\LEFunctions ;
require_once WPLE_DIR . 'classes/le-core.php';
require_once WPLE_DIR . 'classes/le-subdir-challenge.php';
/**
 * WPLE_Admin class
 * 
 * Handles all the aspects of plugin page & cert generation form
 * @since 1.0.0
 */
class WPLE_Admin
{
    private  $FIREWALL ;
    public function __construct()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'wple_admin_styles' ) );
        add_action( 'admin_menu', array( $this, 'wple_admin_menu_page' ) );
        add_action(
            'before_wple_admin_form',
            array( $this, 'wple_debug_log' ),
            20,
            1
        );
        add_action( 'admin_init', array( $this, 'wple_admin_init_hooks' ) );
        add_action( 'plugins_loaded', array( $this, 'wple_load_plugin_textdomain' ) );
        $show_rev = get_option( 'wple_show_review' );
        if ( $show_rev != FALSE && $show_rev == 1 && FALSE === get_option( 'wple_show_review_disabled' ) ) {
            add_action( 'admin_notices', array( $this, 'wple_rateus' ) );
        }
        if ( FALSE !== get_option( 'wple_show_reminder' ) ) {
            add_action( 'admin_notices', [ $this, 'wple_reminder_notice' ] );
        }
        // if (FALSE === get_option('wple_backup_suggested')) { //since 5.7.14
        //   add_action('admin_notices', [$this, 'wple_backup_suggestion']);
        // }
        if ( FALSE !== get_option( 'wple_mixed_issues' ) && FALSE === get_option( 'wple_mixed_issues_disabled' ) ) {
            //since 5.3.12
            add_action( 'admin_notices', [ $this, 'wple_mixed_content_notice' ] );
        }
        if ( isset( $_GET['successnotice'] ) ) {
            add_action( 'admin_notices', array( $this, 'wple_success_notice' ) );
        }
        add_action( 'wple_show_reviewrequest', array( $this, 'wple_set_review_flag' ) );
        add_action( 'wp_ajax_wple_dismiss', array( $this, 'wple_dismiss_notice' ) );
        add_action( 'wp_ajax_wple_admin_dnsverify', [ $this, 'wple_ajx_verify_dns' ] );
        add_action( 'wple_ssl_reminder_notice', [ $this, 'wple_start_show_reminder' ] );
        add_action( 'wp_ajax_wple_admin_httpverify', [ $this, 'wple_ajx_verify_http' ] );
        add_action( 'wp_ajax_wple_validate_ssl', [ $this, 'wple_validate_nocp_ssl' ] );
        add_action( 'wp_ajax_wple_getcert_for_copy', [ $this, 'wple_retrieve_certs_forcopy' ] );
        add_action( 'wp_ajax_wple_include_www', [ $this, 'wple_include_www_check' ] );
        add_action( 'wp_ajax_wple_backup_ignore', [ $this, 'wple_ignore_backup_suggest' ] );
    }
    
    /**
     * Enqueue admin styles
     * 
     * @since 1.0.0
     * @return void
     */
    public function wple_admin_styles()
    {
        wp_enqueue_style(
            WPLE_NAME,
            WPLE_URL . 'admin/css/le-admin.min.css',
            FALSE,
            WPLE_PLUGIN_VERSION,
            'all'
        );
        wp_enqueue_script(
            WPLE_NAME . '-popper',
            WPLE_URL . 'admin/js/popper.min.js',
            array( 'jquery' ),
            WPLE_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            WPLE_NAME . '-tippy',
            WPLE_URL . 'admin/js/tippy-bundle.iife.min.js',
            array( 'jquery' ),
            WPLE_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            WPLE_NAME,
            WPLE_URL . 'admin/js/le-admin.js',
            array( 'jquery', WPLE_NAME . '-tippy', WPLE_NAME . '-popper' ),
            WPLE_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            WPLE_NAME . '-fs',
            'https://checkout.freemius.com/checkout.min.js',
            array( 'jquery' ),
            WPLE_PLUGIN_VERSION,
            false
        );
        wp_localize_script( WPLE_NAME, 'SCAN', array(
            'adminajax' => admin_url( '/admin-ajax.php' ),
            'base'      => site_url( '/', 'https' ),
        ) );
    }
    
    /**
     * Register plugin page
     *
     * @since 1.0.0
     * @return void
     */
    public function wple_admin_menu_page()
    {
        add_menu_page(
            WPLE_NAME,
            WPLE_NAME,
            'manage_options',
            WPLE_SLUG,
            array( $this, 'wple_menu_page' ),
            plugin_dir_url( __DIR__ ) . 'admin/assets/icon.png',
            100
        );
    }
    
    public function wple_load_plugin_textdomain()
    {
        load_plugin_textdomain( 'wp-letsencrypt-ssl', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    
    /**
     * Plugin page HTML
     *
     * @since 1.0.0
     * @return void
     */
    public function wple_menu_page()
    {
        
        if ( FALSE === get_option( 'wple_version' ) ) {
            delete_option( 'wple_plan_choose' );
            update_option( 'wple_version', WPLE_PLUGIN_VERSION );
        } else {
            
            if ( version_compare( get_option( 'wple_version' ), '5.8.1', '<=' ) ) {
                delete_option( 'wple_plan_choose' );
                update_option( 'wple_version', WPLE_PLUGIN_VERSION );
            }
        
        }
        
        $this->wple_subdir_ipaddress();
        $eml = '';
        $leopts = get_option( 'wple_opts' );
        if ( $opts = get_option( 'wple_opts' ) ) {
            $eml = ( isset( $opts['email'] ) ? $opts['email'] : '' );
        }
        $pluginmode = 'FREE';
        $errorclass = '';
        
        if ( !wple_fs()->is__premium_only() && wple_fs()->can_use_premium_code() ) {
            $pluginmode = 'FREE plugin with PRO License <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Please upload and activate PRO plugin file via PLUGINS page"></span>';
            $errorclass = ' notproerror';
        }
        
        
        if ( wple_fs()->is__premium_only() && !wple_fs()->can_use_premium_code() ) {
            $pluginmode = 'PRO plugin with FREE License <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Please activate PRO license key via Account page or Activate License option under the plugin on PLUGINS page"></span>';
            $errorclass = ' notproerror';
        }
        
        $html = '
    <div class="wple-header">
      <div>
      <img src="' . WPLE_URL . 'admin/assets/logo.png" class="wple-logo"/> <span class="wple-version">v' . WPLE_PLUGIN_VERSION . ' <span class="wple-pmode' . $errorclass . '">' . $pluginmode . '</span></span>
      </div>';
        WPLE_Trait::wple_headernav( $html );
        $html .= '</div>';
        
        if ( FALSE === get_option( 'wple_plan_choose' ) || isset( $_GET['comparison'] ) ) {
            $this->wple_initial_quick_pricing( $html );
            return;
        }
        
        //5.1.0
        $complete = ( FALSE !== get_option( 'wple_complete' ) ? 1 : 0 );
        
        if ( $complete ) {
            $html .= '<div id="wple-sslgen">';
            $this->wple_completed_block( $html );
            $html .= '</div>';
            if ( !wple_fs()->is__premium_only() || !wple_fs()->can_use_premium_code() ) {
                $this->wple_upgrade_block( $html );
            }
            echo  $html ;
            return;
        }
        
        $this->wple_success_block( $html );
        $this->wple_error_block( $html );
        if ( !isset( $_GET['wpleauto'] ) && isset( $_GET['subdir'] ) ) {
            $this->wple_subdir_challenges( $html, $leopts );
        }
        
        if ( !wple_fs()->is__premium_only() || !wple_fs()->can_use_premium_code() ) {
            
            if ( isset( $_GET['subdir'] ) ) {
                $this->wple_upgrade_block( $html );
                echo  $html ;
                return;
            }
            
            
            if ( isset( $_GET['success'] ) ) {
                $this->wple_upgrade_block( $html );
                echo  $html ;
                return;
            }
        
        }
        
        $prosupport = WPLE_Trait::wple_kses( sprintf( __( 'Brought to you by %sWP Encryption%s.' ), '<a href="https://wpencryption.com" target="_blank">', '</a>' ), 'a' );
        
        if ( !is_plugin_active( 'backup-bolt/backup-bolt.php' ) && FALSE === get_option( 'wple_backup_suggested' ) ) {
            $action = 'install-plugin';
            $slug = 'backup-bolt';
            $pluginstallURL = wp_nonce_url( add_query_arg( array(
                'action' => $action,
                'plugin' => $slug,
            ), admin_url( 'update.php' ) ), $action . '_' . $slug );
            $html .= '
    <div class="le-powered">
		  <!--<span>' . $prosupport . ' ' . WPLE_Trait::wple_kses( sprintf( 'SSL Certificate will be generated by %s (An open certificate authority).', "<b>Let's Encrypt<sup style=\"font-size: 10px; padding: 3px\">TM</sup></b>" ) ) . '</span>-->
    <span style="display: flex;align-items: center;"><strong>Recommended:-</strong> Before enforcing HTTPS, We highly recommend taking a backup of your site using some good backup plugin like <img src="' . WPLE_URL . '/admin/assets/backup-bolt.png" style="max-width:120px"> - <a href="' . $pluginstallURL . '" target="_blank">Install & Activate Backup Bolt</a> | <a href="#" class="wple-backup-skip">Ignore</a></span>    
	  </div>';
        }
        
        $mappeddomain = '';
        $formheader = esc_html__( 'SSL INSTALL FORM - ENTER YOUR EMAIL BELOW & GENERATE SSL CERTIFICATE', 'wp-letsencrypt-ssl' );
        $currentdomain = esc_html( str_ireplace( array( 'http://', 'https://' ), array( '', '' ), site_url() ) );
        $maindomain = $currentdomain;
        $slashpos = stripos( $currentdomain, '/' );
        
        if ( FALSE !== $slashpos ) {
            //subdir installation
            $maindomain = substr( $currentdomain, 0, $slashpos );
            $mappeddomain = '<label style="display: block; padding: 10px 5px; color: #aaa;font-size:15px;">' . esc_html__( 'PRIMARY DOMAIN', 'wp-letsencrypt-ssl' ) . '</label>
      <p style="width: 800px; max-width:100%; margin: 5px auto 20px;">' . WPLE_Trait::wple_kses( sprintf( __( '<strong>NOTE:</strong> Since you are willing to install SSL certificate for sub-directory site, SSL certificate will be generated for your primary domain <strong>%s</strong> which will cover your primary domain + ALL sub-directory sites.', 'wp-letsencrypt-ssl' ), $maindomain ) ) . '</p>
    <input type="text" name="wple_domain" class="wple-domain-input" value="' . esc_attr( $maindomain ) . '" readonly><br />';
        }
        
        //since 5.3.4
        $tempdomain = '';
        if ( FALSE !== stripos( $maindomain, 'temp.domains' ) || FALSE !== stripos( $maindomain, '~' ) ) {
            $tempdomain = '<p style="width: 800px; max-width:100%; margin: 5px auto 20px;">' . sprintf(
                esc_html__( "%sWARNING:%s You are trying to install SSL for %stemporary domain%s which is not possible. Please point your real domain like wpencryption.com to your site and update your site url in %ssettings%s > %sgeneral%s before you could generate SSL.", "wp-letsencrypt-ssl" ),
                "<strong>",
                "</strong>",
                "<strong>",
                "</strong>",
                "<strong>",
                "</strong>",
                "<strong>",
                "</strong>"
            ) . '</p>';
        }
        if ( isset( $leopts['type'] ) && $leopts['type'] == 'wildcard' ) {
            $html .= '<script>
      jQuery(document).ready(function(){
        jQuery(".single-wildcard-switch").trigger("click");
      });
      </script>';
        }
        $html .= '<div id="wple-sslgen">
    <h2>' . $formheader . '</h2>
    <div style="text-align: center; margin-top: -30px; font-size: 16px;"><a style="text-decoration-style:dashed;text-decoration-thickness: from-font;" href="' . admin_url( 'admin.php?page=wp_encryption_faq#howitworks' ) . '">How it works?</a></div>';
        if ( is_multisite() && !wple_fs()->can_use_premium_code__premium_only() ) {
            $html .= '<p class="wple-multisite">' . WPLE_Trait::wple_kses( __( 'Upgrade to <strong>PRO</strong> version to avail Wildcard SSL support for multisite and ability to install SSL for mapped domains (different domain names).', 'wp-letsencrypt-ssl' ) ) . '</p>';
        }
        $html .= WPLE_Trait::wple_progress_bar();
        //$cname = '';
        //if (FALSE === stripos($currentdomain, '/')) {
        // if (stripos($currentdomain, 'www') === FALSE) {
        //   $cname = '<span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__("Add a CNAME with name 'www' pointing to your non-www domain", 'wp-letsencrypt-ssl') . '. ' . esc_attr__("Refer FAQ if you want to generate SSL for both www & non-www domain.", 'wp-letsencrypt-ssl') . '"></span>';
        // } else {
        //$cname = '<span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__("Refer FAQ if you want to generate SSL for both www & non-www domain.", 'wp-letsencrypt-ssl') . '"></span>';
        //}
        //}
        $bothchecked = '';
        $leadminform = '<form method="post" class="le-genform single-genform">' . $mappeddomain . $tempdomain . '
    <input type="email" name="wple_email" class="wple_email" value="' . esc_attr( $eml ) . '" placeholder="' . esc_attr__( 'Enter your email address', 'wp-letsencrypt-ssl' ) . '" title="' . esc_attr__( 'All email notifications are sent to this email ID', 'wp-letsencrypt-ssl' ) . '" ><br />';
        // if (FALSE === stripos('www', $maindomain)) {
        //   $altdomain = 'www.' . $maindomain;
        // } else {
        //   $altdomain = str_ireplace('www.', '', $maindomain);
        // }
        // $altdomaintest = wp_remote_head('http://' . $altdomain, array('sslverify' => false, 'timeout' => 30));
        ///if (!is_wp_error($altdomaintest) || isset($_GET['includewww'])) {
        if ( isset( $_GET['includewww'] ) ) {
            $bothchecked = 'checked';
        }
        $leadminform .= '<span class="lecheck">
      <label class="checkbox-label">
      <input type="checkbox" name="wple_include_www" class="wple_include_www" value="1" ' . $bothchecked . '>
        <span class="checkbox-custom rectangular"></span>
      </label>
    ' . esc_html__( 'Generate SSL Certificate for both www & non-www version of domain', 'wp-letsencrypt-ssl' ) . '&nbsp; <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__( "Before enabling this - please make sure both www & non-www version of your domain works!. Add a CNAME with name 'www' pointing to your non-www domain in your domain DNS zone editor", 'wp-letsencrypt-ssl' ) . '"></span></label>
    </span><br />';
        ///}
        
        if ( isset( $_GET['includeemail'] ) ) {
            $leadminform .= '<span class="lecheck">
      <label class="checkbox-label">
      <input type="checkbox" name="wple_include_mail" class="wple_include_mail" value="1">
        <span class="checkbox-custom rectangular"></span>
      </label>
    ' . esc_html__( 'Secure POP/IMAP email server', 'wp-letsencrypt-ssl' ) . '&nbsp; <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . sprintf( esc_attr__( "This option will secure %s but DNS based domain verification is MANDATORY", 'wp-letsencrypt-ssl' ), 'mail.' . $maindomain ) . '"></span></label>
    </span><br />';
            $webmail = 'webmail.' . $maindomain;
            $leadminform .= '<span class="lecheck">
      <label class="checkbox-label">
      <input type="checkbox" name="wple_include_webmail" class="wple_include_webmail" value="1">
        <span class="checkbox-custom rectangular"></span>
      </label>
    ' . sprintf( esc_html__( 'Secure %s', 'wp-letsencrypt-ssl' ), $webmail ) . '&nbsp; <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . sprintf( esc_attr__( "This option will secure %s but DNS based domain verification is MANDATORY", 'wp-letsencrypt-ssl' ), $webmail ) . '"></span></label>
    </span><br />';
        }
        
        $leadminform .= '<span class="lecheck">
      <label class="checkbox-label">
      <input type="checkbox" name="wple_send_usage" value="1" checked>
        <span class="checkbox-custom rectangular"></span>
      </label>
    ' . esc_html__( 'Anonymously send response data to get better support', 'wp-letsencrypt-ssl' ) . '</label>
    </span><br />';
        $leadminform .= '<span class="lecheck">
    <label class="checkbox-label">
      <input type="checkbox" name="wple_agree_le_tos" class="wple_agree_le" value="1">
      <span class="checkbox-custom rectangular"></span>
    </label>
    ' . WPLE_Trait::wple_kses( sprintf(
            __( "I agree to %sLet's Encrypt%s %sTerms of service%s", "wp-letsencrypt-ssl" ),
            '<b>',
            '<sup style="font-size: 10px; padding: 3px">TM</sup></b>',
            '<a href="' . esc_attr__( 'https://letsencrypt.org/documents/LE-SA-v1.2-November-15-2017.pdf', 'wp-letsencrypt-ssl' ) . '" rel="nofollow" target="_blank" style="margin-left:5px">',
            '</a>'
        ), 'a' ) . '
    </span> 
    <span class="lecheck">
    <label class="checkbox-label">
      <input type="checkbox" name="wple_agree_gws_tos" class="wple_agree_gws" value="1">
      <span class="checkbox-custom rectangular"></span>
    </label>
    ' . WPLE_Trait::wple_kses( sprintf( __( "I agree to <b>WP Encryption</b> %sTerms of service%s", "wp-letsencrypt-ssl" ), '<a href="https://gowebsmarty.com/terms-and-conditions/" rel="nofollow" target="_blank" style="margin-left:5px">', '</a>' ), 'a' ) . '
    </span>        
    ' . wp_nonce_field(
            'legenerate',
            'letsencrypt',
            false,
            false
        ) . '
    <button type="submit" name="generate-certs" id="singledvssl">' . esc_html__( 'Generate SSL Certificate', 'wp-letsencrypt-ssl' ) . '</button>
    </form>
    
    <div id="wple-error-popper">    
      <div class="wple-flex">
        <img src="' . WPLE_URL . 'admin/assets/loader.png" class="wple-loader"/>
        <div class="wple-error">Error</div>
      </div>
    </div>';
        $nonwww = str_ireplace( 'www.', '', $currentdomain );
        if ( FALSE !== ($ps = stripos( $nonwww, '/' )) ) {
            $nonwww = substr( $nonwww, 0, $ps );
        }
        $wwwdomain = 'www.' . $nonwww;
        
        if ( FALSE != stripos( $currentdomain, 'www.' ) ) {
            $wwwdomain = $nonwww;
            $nonwww = 'www.' . $nonwww;
        }
        
        $showonpro = '';
        $html .= '<div class="wple-single-dv-ssl">
    <div class="wple-info-box">
      <h3>' . esc_html__( 'Domains Covered', 'wp-letsencrypt-ssl' ) . '</h3>
      <strong>' . $nonwww . '</strong>
      <div class="wple-www' . $showonpro . '"><strong>' . $wwwdomain . '</strong></div>
      <div class="wple-wc"><strong>*.' . $nonwww . '</strong></div>
    </div>';
        ob_start();
        do_action( 'before_wple_admin_form', $html );
        $html .= ob_get_contents();
        ob_end_clean();
        $html .= apply_filters( 'wple_admin_form', $leadminform );
        ob_start();
        do_action( 'after_wple_admin_form', $html );
        $html .= ob_get_contents();
        ob_end_clean();
        $html .= '</div>';
        $html .= '    
    </div><!--wple-sslgen-->';
        
        if ( !wple_fs()->is__premium_only() || !wple_fs()->can_use_premium_code() ) {
            $this->wple_upgrade_block( $html );
        } else {
            $this->wple_expert_block( $html );
        }
        
        echo  $html ;
    }
    
    /**
     * log process & error in debug.log file
     *
     * @since 1.0.0
     * @param string $html
     * @return void
     */
    public function wple_debug_log( $html )
    {
        
        if ( !file_exists( WPLE_DEBUGGER ) ) {
            wp_mkdir_p( WPLE_DEBUGGER );
            $htacs = '<Files debug.log>' . "\n" . 'Order allow,deny' . "\n" . 'Deny from all' . "\n" . '</Files>';
            file_put_contents( WPLE_DEBUGGER . '.htaccess', $htacs );
        }
        
        //show only upon error since 4.6.0
        
        if ( isset( $_GET['error'] ) ) {
            $html = '<div class="toggle-debugger"><span class="dashicons dashicons-arrow-down-alt2"></span> ' . esc_html__( 'Show/hide full response', 'wp-letsencrypt-ssl' ) . '</div>';
            $file = WPLE_DEBUGGER . 'debug.log';
            
            if ( file_exists( $file ) ) {
                $log = file_get_contents( $file );
                $hideh2 = '';
                if ( isset( $_GET['dnsverified'] ) || isset( $_GET['dnsverify'] ) ) {
                    $hideh2 = 'hideheader';
                }
                $html .= '<div class="le-debugger running ' . $hideh2 . '"><h3>' . esc_html__( 'Response Log', 'wp-letsencrypt-ssl' ) . ':</h3>' . WPLE_Trait::wple_kses( nl2br( $log ) ) . '</div>';
            } else {
                $html .= '<div class="le-debugger">' . esc_html__( "Full response will be shown here", 'wp-letsencrypt-ssl' ) . '</div>';
            }
            
            echo  $html ;
        }
    
    }
    
    /**
     * Save email & proceed upon clicking install SSL
     *
     * @since 1.0.0
     * @return void
     */
    public function wple_save_email_generate_certs()
    {
        //since 2.4.0
        //force https upon success
        
        if ( isset( $_POST['wple-https'] ) ) {
            if ( !wp_verify_nonce( $_POST['sslready'], 'wplehttps' ) || !current_user_can( 'manage_options' ) ) {
                exit( 'Unauthorized access' );
            }
            $basedomain = str_ireplace( array( 'http://', 'https://' ), array( '', '' ), addslashes( site_url() ) );
            //4.7
            if ( FALSE != stripos( $basedomain, '/' ) ) {
                $basedomain = substr( $basedomain, 0, stripos( $basedomain, '/' ) );
            }
            $client = WPLE_Trait::wple_verify_ssl( $basedomain );
            
            if ( !$client && !is_ssl() ) {
                wp_redirect( admin_url( '/admin.php?page=wp_encryption&success=1&nossl=1', 'http' ) );
                exit;
            }
            
            // $SSLCheck = @fsockopen("ssl://" . $basedomain, 443, $errno, $errstr, 30);
            // if (!$SSLCheck) {
            //   wp_redirect(admin_url('/admin.php?page=wp_encryption&success=1&nossl=1', 'http'));
            //   exit();
            // }
            $reverter = uniqid( 'wple' );
            $savedopts = get_option( 'wple_opts' );
            $savedopts['force_ssl'] = 1;
            $savedopts['revertnonce'] = $reverter;
            ///WPLE_Trait::wple_send_reverter_secret($reverter);
            update_option( 'wple_opts', $savedopts );
            delete_option( 'wple_error' );
            //complete
            update_option( 'wple_complete', 1 );
            update_option( 'siteurl', str_ireplace( 'http:', 'https:', get_option( 'siteurl' ) ) );
            update_option( 'home', str_ireplace( 'http:', 'https:', get_option( 'home' ) ) );
            wp_redirect( admin_url( '/admin.php?page=wp_encryption', 'https' ) );
            exit;
        }
        
        //single domain ssl
        
        if ( isset( $_POST['generate-certs'] ) ) {
            if ( !wp_verify_nonce( $_POST['letsencrypt'], 'legenerate' ) || !current_user_can( 'manage_options' ) ) {
                die( 'Unauthorized request' );
            }
            if ( empty($_POST['wple_email']) ) {
                wp_die( esc_html__( 'Please input valid email address', 'wp-letsencrypt-ssl' ) );
            }
            $leopts = array(
                'email'           => sanitize_email( $_POST['wple_email'] ),
                'date'            => date( 'd-m-Y' ),
                'expiry'          => '',
                'type'            => 'single',
                'send_usage'      => ( isset( $_POST['wple_send_usage'] ) ? 1 : 0 ),
                'include_www'     => ( isset( $_POST['wple_include_www'] ) ? 1 : 0 ),
                'include_mail'    => ( isset( $_POST['wple_include_mail'] ) ? 1 : 0 ),
                'include_webmail' => ( isset( $_POST['wple_include_webmail'] ) ? 1 : 0 ),
                'agree_gws_tos'   => ( isset( $_POST['wple_agree_gws_tos'] ) ? 1 : 0 ),
                'agree_le_tos'    => ( isset( $_POST['wple_agree_le_tos'] ) ? 1 : 0 ),
            );
            
            if ( isset( $_POST['wple_domain'] ) && !is_multisite() ) {
                $leopts['subdir'] = 1;
                $leopts['domain'] = sanitize_text_field( $_POST['wple_domain'] );
            }
            
            update_option( 'wple_opts', $leopts );
            new WPLE_Core( $leopts );
        }
    
    }
    
    /**
     * Download cert files based on clicked link
     *
     * certs for multisite mapped domains cannot be downloaded yet
     * @since 1.0.0
     * @return void
     */
    public function wple_download_files()
    {
        
        if ( isset( $_GET['le'] ) && current_user_can( 'manage_options' ) ) {
            switch ( $_GET['le'] ) {
                case '1':
                    $file = uniqid() . '-cert.crt';
                    file_put_contents( $file, file_get_contents( ABSPATH . 'keys/certificate.crt' ) );
                    break;
                case '2':
                    $file = uniqid() . '-key.pem';
                    file_put_contents( $file, file_get_contents( ABSPATH . 'keys/private.pem' ) );
                    break;
                case '3':
                    $file = uniqid() . '-cabundle.crt';
                    
                    if ( file_exists( ABSPATH . 'keys/cabundle.crt' ) ) {
                        $cabundlefile = file_get_contents( ABSPATH . 'keys/cabundle.crt' );
                    } else {
                        $cabundlefile = file_get_contents( WPLE_DIR . 'cabundle/ca.crt' );
                    }
                    
                    file_put_contents( $file, $cabundlefile );
                    break;
            }
            header( 'Content-Description: File Transfer' );
            header( 'Content-Type: text/plain' );
            header( 'Content-Length: ' . filesize( $file ) );
            header( 'Content-Disposition: attachment; filename=' . basename( $file ) );
            readfile( $file );
            if ( file_exists( $file ) ) {
                unlink( $file );
            }
            exit;
        }
    
    }
    
    /**
     * Rate us admin notice
     *
     * @since 2.0.0 
     * @return void
     */
    public function wple_rateus()
    {
        $cert = ABSPATH . 'keys/certificate.crt';
        
        if ( file_exists( $cert ) ) {
            if ( isset( $_GET['page'] ) && $_GET['page'] == 'wp_encryption' ) {
                return;
            }
            $reviewnonce = wp_create_nonce( 'wplereview' );
            $html = '<div class="notice notice-info wple-admin-review">
        <div class="wple-review-box">
          <img src="' . WPLE_URL . 'admin/assets/symbol.png"/>
          <span><strong>' . esc_html__( 'Congratulations!', 'wp-letsencrypt-ssl' ) . '</strong><p>' . WPLE_Trait::wple_kses( __( 'SSL certificate generated successfully!. <b>WP Encryption</b> just saved you several $$$ by generating free SSL certificate in record time!. Could you please do us a BIG favor & rate us with 5 star review to support further development of this plugin.', 'wp-letsencrypt-ssl' ) ) . '</p></span>
        </div>
        <a class="wple-lets-review wplerevbtn" href="https://wordpress.org/support/plugin/wp-letsencrypt-ssl/reviews/#new-post" rel="nofollow noopener" target="_blank">' . esc_html__( 'Rate plugin', 'wp-letsencrypt-ssl' ) . '</a>
        <a class="wple-did-review wplerevbtn" href="#" data-nc="' . esc_attr( $reviewnonce ) . '" data-action="1">' . esc_html__( "Don't show again", 'wp-letsencrypt-ssl' ) . '</a>
        <a class="wple-later-review wplerevbtn" href="#" data-nc="' . esc_attr( $reviewnonce ) . '" data-action="2">' . esc_html__( 'Remind me later', 'wp-letsencrypt-ssl' ) . '&nbsp;<span class="dashicons dashicons-clock"></span></a>
      </div>';
            echo  $html ;
        }
    
    }
    
    /**
     * Check if wp install is IP or subdir based
     *
     * @since 2.4.0
     * @return void
     */
    public function wple_subdir_ipaddress()
    {
        $siteURL = str_ireplace( array( 'http://', 'https://', 'www.' ), array( '', '', '' ), site_url() );
        $flg = 0;
        if ( filter_var( $siteURL, FILTER_VALIDATE_IP ) ) {
            $flg = 1;
        }
        if ( FALSE !== stripos( $siteURL, 'localhost' ) ) {
            $flg = 1;
        }
        
        if ( FALSE != stripos( $siteURL, '/' ) && is_multisite() ) {
            $html = '<div class="wrap" id="le-wrap">
      <div class="le-inner">
        <div class="wple-header">
          <img src="' . WPLE_URL . 'admin/assets/logo.png" class="wple-logo"/> <span class="wple-version">v' . esc_html( WPLE_PLUGIN_VERSION ) . '</span>
        </div>
        <div class="wple-warning-notice">
        <h2>' . esc_html__( 'You do not need to install SSL for each sub-directory site in multisite, Please install SSL for your primary domain and it will cover ALL sub directory sites too.', 'wp-letsencrypt-ssl' ) . '</h2>
        </div>
      </div>
      </div>';
            echo  $html ;
            wp_die();
        }
        
        
        if ( $flg ) {
            $html = '<div class="wrap" id="le-wrap">
      <div class="le-inner">
        <div class="wple-header">
          <img src="' . WPLE_URL . 'admin/assets/logo.png" class="wple-logo"/> <span class="wple-version">v' . esc_html( WPLE_PLUGIN_VERSION ) . '</span>
        </div>
        <div class="wple-warning-notice">
        <h2>' . esc_html__( 'SSL Certificates cannot be issued for localhost and IP address based WordPress site. Please use this on your real domain based WordPress site.', 'wp-letsencrypt-ssl' ) . ' ' . esc_html__( 'This restriction is not implemented by WP Encryption but its how SSL certificates work.', 'wp-letsencrypt-ssl' ) . '</h2>
        </div>
      </div>
      </div>';
            echo  $html ;
            wp_die();
        }
    
    }
    
    /**
     * Upgrade to PRO
     *
     * @param string $html
     * @since 2.5.0
     * @return void
     */
    public function wple_upgrade_block( &$html )
    {
        $upgradeurl = admin_url( '/admin.php?page=wp_encryption-pricing' );
        ///$upgradeurl = admin_url('/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=lifetime&pricing_id=7965&currency=usd&coupon=FIRSTBUY');
        $nopricing = get_option( 'wple_no_pricing' );
        //gdy
        $cp = get_option( 'wple_have_cpanel' );
        // if (FALSE === $nopricing && !$cp) { //not gdy & not cpanel
        //   $nopricing = rand(0, 1);
        // }
        $automatic = esc_html__( 'Automatic', 'wp-letsencrypt-ssl' );
        $manual = esc_html__( 'Manual', 'wp-letsencrypt-ssl' );
        $domain = str_ireplace( array( 'https://', 'http://', 'www.' ), '', site_url() );
        $dverify = $automatic;
        if ( stripos( $domain, '/' ) != FALSE ) {
            //subdir site
            $dverify = $manual;
        }
        $html .= ' 
      <div id="wple-upgradepro">';
        
        if ( FALSE !== $cp && $cp ) {
            $html .= '<strong style="display: block; text-align: center; color: #666;">Woot Woot! You have <b>CPANEL</b>! Why struggle with manual SSL renewal every 90 days? - Enjoy 100% automation with PRO version.</strong>';
            ///$upgradeurl = admin_url('/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=lifetime&pricing_id=7965&currency=usd');
        }
        
        $compareurl = 'https://wpencryption.com?utm_source=wordpress&utm_medium=comparison&utm_campaign=wpencryption';
        //$compareurl = admin_url('/admin.php?page=wp_encryption&comparison=1');
        
        if ( $nopricing ) {
            $compareurl = admin_url( '/admin.php?page=wp_encryption&comparison=1' );
            //$upgradeurl = admin_url('/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=11394&plan_name=pro&billing_cycle=annual&pricing_id=11717&currency=usd');
            //$upgradeurl = 'https://checkout.freemius.com/mode/dialog/plugin/5090/plan/10643/'; //CDN
            $html .= '<div class="wple-error-firewall fire-pro wple-procdn">
        <div>
          <img src="' . WPLE_URL . 'admin/assets/firewall-shield-pro.png"/>
        </div>
        <div class="wple-upgrade-features">
          <span><b>Automatic SSL Installation</b><br>Hassle free automatic installation of SSL Certificate - Super simple DNS based setup.</span>
          <span><b>Automatic SSL Renewal</b><br>Your SSL certificate will be automatically renewed in background without the need of any action or manual work.</span>
          <span><b>Security</b><br>Enterprise level protection against known vulnerabilities, Bad Bots, Brute Force, DDOS, Spam & much more attack vectors.</span>
          <span><b>Automatic CDN</b><br>Your site is served from 42 full scale edge locations for faster content delivery and fastest performance.</span>
        </div>
      </div>';
        } else {
            $html .= '<div class="wple-plans">
            <span class="free">* ' . esc_html__( 'FREE', 'wp-letsencrypt-ssl' ) . '</span>
            <span class="pro">* ' . esc_html__( 'PRO', 'wp-letsencrypt-ssl' ) . '</span>
          </div>
          <div class="wple-plan-compare">
            <div class="wple-compare-item">
              <img src="' . WPLE_URL . 'admin/assets/verified.png"/>
              <h4>' . esc_html__( 'HTTP Verification', 'wp-letsencrypt-ssl' ) . '</h4>
              <span class="wple-free">' . $manual . '</span>
              <span class="wple-pro">' . $automatic . '</span>
            </div>
            <div class="wple-compare-item">
              <img src="' . WPLE_URL . 'admin/assets/DNS.png"/>
              <h4>' . esc_html__( 'DNS Verification', 'wp-letsencrypt-ssl' ) . ' <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__( 'In case of HTTP verification fail / not possible', 'wp-letsencrypt-ssl' ) . '"></span></h4>
              <span class="wple-free">' . $manual . '</span>
              <span class="wple-pro">' . $automatic . '</span>
            </div>
            <div class="wple-compare-item">
              <img src="' . WPLE_URL . 'admin/assets/Install.png"/>
              <h4>' . esc_html__( 'SSL Installation', 'wp-letsencrypt-ssl' ) . ' <!--<span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__( 'PRO - We offer one time free manual support for non-cPanel based sites', 'wp-letsencrypt-ssl' ) . '"></span>--></h4>
              <span class="wple-free">' . $manual . '</span>
              <span class="wple-pro">' . $automatic . '</span>
            </div>
            <div class="wple-compare-item">
              <img src="' . WPLE_URL . 'admin/assets/renewal.png"/>
              <h4>' . esc_html__( 'SSL Renewal', 'wp-letsencrypt-ssl' ) . ' <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__( 'Free users must manually renew / re-generate SSL certificate every 90 days.', 'wp-letsencrypt-ssl' ) . '"></span></h4>
              <span class="wple-free">' . $manual . '</span>
              <span class="wple-pro">' . $automatic . '</span>
            </div>
            <div class="wple-compare-item">
              <img src="' . WPLE_URL . 'admin/assets/wildcard.png"/>
              <h4>' . esc_html__( 'Wildcard SSL', 'wp-letsencrypt-ssl' ) . ' <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__( 'PRO - Your domain DNS must be managed by cPanel or Godaddy for full automation', 'wp-letsencrypt-ssl' ) . '"></span></h4>
              <span class="wple-free">' . esc_html__( 'Not Available', 'wp-letsencrypt-ssl' ) . '</span>
              <span class="wple-pro">' . esc_html__( 'Available', 'wp-letsencrypt-ssl' ) . '</span>
            </div>
            <div class="wple-compare-item">
              <img src="' . WPLE_URL . 'admin/assets/multisite.png"/>
              <h4>' . esc_html__( 'Multisite Support', 'wp-letsencrypt-ssl' ) . ' <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="' . esc_attr__( 'PRO - Support for Multisite + Mapped domains', 'wp-letsencrypt-ssl' ) . '"></span></h4>
              <span class="wple-free">' . esc_html__( 'Not Available', 'wp-letsencrypt-ssl' ) . '</span>
              <span class="wple-pro">' . esc_html__( 'Available', 'wp-letsencrypt-ssl' ) . '</span>
            </div>            
          </div>';
        }
        
        ///$html .= '<div style="text-align:center"><img src="' . WPLE_URL . '/admin/assets/new-year.png"></div>';
        $html .= '<div class="wple-upgrade-pro">
              <a href="' . $compareurl . '" target="_blank" class="wplecompare">' . esc_html__( 'COMPARE FREE & PRO VERSION', 'wp-letsencrypt-ssl' ) . '  <span class="dashicons dashicons-external"></span></a>';
        // if (isset($_GET['success']) && FALSE == $nopricing) {
        //   $html .= '<a href="' . $upgradeurl . '">' . esc_html__('UPGRADE TO PRO', 'wp-letsencrypt-ssl') . '<span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Requires cPanel or root SSH access"></span></a>
        //             <a href="https://wpencryption.com/#firewall" target="_blank">' . esc_html__('UPGRADE TO FIREWALL', 'wp-letsencrypt-ssl') . '<span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Why buy an SSL alone when you can get Premium SSL + CDN + Firewall Security for even lower cost."></span></a>';
        // } else {
        // if ($nopricing) {
        //   $html .= '<a href="' . $upgradeurl . '">' . esc_html__('UPGRADE TO CDN', 'wp-letsencrypt-ssl') . '</a>';
        // } else {
        $html .= '<a href="' . $upgradeurl . '">' . esc_html__( 'UPGRADE TO PRO', 'wp-letsencrypt-ssl' ) . '</a>';
        //}
        //$html .= '<a href="https://checkout.freemius.com/mode/dialog/plugin/5090/plan/10643/" target="_blank" id="upgradetocdn">' . esc_html__('UPGRADE TO CDN', 'wp-letsencrypt-ssl') . ' <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Sky rocket your WordPress site performance with Fastest Content Delivery Network + Premium Sectigo SSL"></span></a>';
        // }
        $html .= '</div>';
        // $rnd = rand(0, 1);
        // if ($rnd) {
        //   $html .= '<div class="wple-hire-expert"><a href="https://wpencryption.com/cdn-firewall/?utm_campaign=wpencryptionsite&utm_medium=checkoutcdn&utm_source=upgradeblock" target="_blank">Sky Rocket your site speed with our <strong>CDN</strong> plan (<strong>Includes SSL + Performance</strong>) <span class="dashicons dashicons-external"></span></a></div>';
        // } else {
        //   $html .= '<div class="wple-hire-expert"><a href="https://wpencryption.com/hire-ssl-expert/?utm_campaign=wpencryptionsite&utm_medium=hiresslexpert&utm_source=upgradeblock" target="_blank">Too busy? <b>Hire an expert</b> for secure migration to HTTPS (<b>ONE YEAR PRO LICENSE FREE</b>) <span class="dashicons dashicons-external"></span></a></div>';
        // }
        $html .= '</div><!--wple-upgradepro-->';
        $html .= '<div id="ourotherplugin">Check out our another awesome plugin <a href="https://wordpress.org/plugins/go-viral/" target="_blank"><img src="' . WPLE_URL . 'admin/assets/goviral-logo.png"/> - All in one social toolkit</a></div>';
    }
    
    /**
     * Success Message block
     *
     * @param string $html
     * @since 2.5.0
     * @return void
     */
    public function wple_success_block( &$html )
    {
        //since 2.4.0
        
        if ( isset( $_GET['success'] ) ) {
            $this->wple_wellknown_htaccess();
            update_option( 'wple_error', 5 );
            //all success
            $html .= '
      <div id="wple-sslgenerator">
      <div class="wple-success-form">';
            // if (!isset($_GET['resume']) && !isset($_GET['nossl'])) {
            //   $this->wple_send_success_mail();
            // }
            $html .= '<h2><span class="dashicons dashicons-yes"></span>&nbsp;' . WPLE_Trait::wple_kses( __( '<b>Congrats! SSL Certificate have been successfully generated.</b>', 'wp-letsencrypt-ssl' ) ) . '</h2>
        <h3 style="width: 87%; margin: 0px auto; color: #7b8279; font-weight:400;">' . WPLE_Trait::wple_kses( __( 'We just completed major task of generating SSL certificate! Now we have ONE final step to complete.', 'wp-letsencrypt-ssl' ) ) . '</h3>';
            $html .= WPLE_Trait::wple_progress_bar();
            ///$nopricing = get_option('wple_no_pricing');
            //$colclass = FALSE != $nopricing ? 'wple-three-cols' : '';
            $html .= '   

        <div class="wple-success-flex">
        <div class="wple-success-flex-video">
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/aKvvVlAlZ14" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="wple-success-flex-final">  
        <ul class="download-ssl-certs">
          <li>1. ' . sprintf( __( '%sClick here%s to login into your cPanel.', 'wp-letsencrypt-ssl' ), '<a href="' . site_url( 'cpanel' ) . '" target="_blank">', '</a>' ) . '</li>
          <li>2. ' . sprintf( __( 'Open %sSSL/TLS%s option on your cPanel', 'wp-letsencrypt-ssl' ), '<strong><img src="' . WPLE_URL . '/admin/assets/tls.png" style="width: 20px;margin-bottom: -5px;">&nbsp;', '</strong>' ) . '</li>
          <li>3. ' . sprintf( __( 'Click on %sManage SSL Sites%s option', 'wp-letsencrypt-ssl' ), '<strong>', '</strong>' ) . '</li>          
          <li>4. ' . sprintf(
                __( 'Copy the contents of %sCertificate.crt%s, %sPrivate.pem%s, %sCABundle.crt%s files from below & paste them into its appropriate fields on cPanel', 'wp-letsencrypt-ssl' ),
                '<strong>',
                '</strong>',
                '<strong>',
                '</strong>',
                '<strong>',
                '</strong>'
            ) . '. ' . esc_html( "You can also download the cert files to your local computer, right click > open with notepad to view/copy", "wp-letsencrypt-ssl" ) . '</li>
          <li>';
            WPLE_Trait::wple_copy_and_download( $html );
            $html .= '</li>
          <li>5. ' . sprintf( __( 'Click on %sInstall certificate%s', 'wp-letsencrypt-ssl' ), '<strong>', '</strong>' ) . '</li>
          <li>6. ' . sprintf( __( 'Please wait few minutes and click on %sEnable HTTPS Now%s button', 'wp-letsencrypt-ssl' ), '<strong>', '</strong>' ) . '</li>
        </ul>

        </div>
        </div>  

            <div class="wple-success-cols wple-three-cols">
              <div>
                <h3>' . esc_html__( "Don't have cPanel?", 'wp-letsencrypt-ssl' ) . '</h3>
                <p>' . esc_html__( "cPanel link goes to 404 not found page?. ", 'wp-letsencrypt-ssl' ) . sprintf(
                __( "If you have root SSH access, edit your server config file and point your SSL paths to %scertificate.crt%s & %sprivate.pem%s files in %skeys/%s folder. If you don't have either cPanel or root SSH access, Upgrade to %sPRO%s version for automatic SSL installation and automatic SSL renewal.", 'wp-letsencrypt-ssl' ),
                '<strong>',
                '</strong>',
                '<strong>',
                '</strong>',
                '<strong>',
                '</strong>',
                '<a href="' . admin_url( '/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=annual&pricing_id=7965&currency=usd' ) . '"><strong>',
                '</strong></a>'
            ) . '<br><br><span style="display:none">' . sprintf( __( 'You can also upgrade to our %sCDN%s plan to avail fully automatic SSL + Fastest CDN + Firewall Security.', 'wp-letsencrypt-ssl' ), '<a href="https://wpencryption.com/cdn-firewall/" target="_blank">', '</a>' ) . '</span></p>
              </div>
              <div>
                <h3>' . esc_html__( "Test SSL Installation", 'wp-letsencrypt-ssl' ) . '</h3>
                <p>' . esc_html__( "After installing SSL certs on your cPanel, open your site in https:// and click on padlock to see if valid certificate exists. You can also test your site's SSL on SSLLabs.com", "wp-letsencrypt-ssl" ) . '</p>
              </div>
              <div>
                <h3>' . esc_html__( "By Clicking Enable HTTPS", 'wp-letsencrypt-ssl' ) . '</h3>
                <p>' . esc_html__( 'Your site & admin url will be changed to https:// and all assets, js, css, images will strictly load over https:// to avoid mixed content errors.', 'wp-letsencrypt-ssl' ) . '</p>
              </div>';
            // if (FALSE == $nopricing) {
            //   $html .= '<div>
            //         <h3>' . esc_html__("Looking for instant SSL solution?", 'wp-letsencrypt-ssl') . '</h3>
            //         <p>' . sprintf(__('Why pay for an SSL certificate alone when you can get %sPremium Sectigo SSL%s + %sCDN Performance%s + %sSecurity Firewall%s for even lower cost with our %sCDN%s Service.', 'wp-letsencrypt-ssl'), '<strong>', '</strong>', '<strong>', '</strong>', '<strong>', '</strong>', '<a href="https://wpencryption.com/cdn-firewall/?utm_campaign=wpencryption&utm_source=wordpress&utm_medium=gocdn" target="_blank">', '</a>') . '!.</p>
            //       </div>';
            // }
            $html .= '</div>

          <ul>          
          <!--<li>' . WPLE_Trait::wple_kses( __( '<b>Note:</b> Use below "Enable HTTPS" button ONLY after SSL certificate is successfully installed on your cPanel', 'wp-letsencrypt-ssl' ) ) . '</li>-->
          </ul>';
            if ( isset( $_GET['nossl'] ) ) {
                $html .= '<h3 style="color:#ff4343;margin-bottom:10px;margin: 0 auto 10px; max-width: 800px;">' . esc_html__( 'We could not detect valid SSL certificate installed on your site!. Please try after some time. You can also try opening wp-admin via https:// and click on enable https button.', 'wp-letsencrypt-ssl' ) . '</h3>
        <p>' . esc_html__( 'Switching to HTTPS without properly installing the SSL certificate might break your site.', 'wp-letsencrypt-ssl' ) . '</p>';
            }
            $html .= '<form method="post">
        ' . wp_nonce_field(
                'wplehttps',
                'sslready',
                false,
                false
            ) . '
        <button type="submit" name="wple-https">' . esc_html__( 'ENABLE HTTPS NOW', 'wp-letsencrypt-ssl' ) . '</button>
        </form>
        </div>
        </div><!--wple-sslgenerator-->';
        }
    
    }
    
    /**
     * Show pending challenges
     *
     * @return void
     */
    public function wple_domain_verification()
    {
        //since 5.1.0
        
        if ( isset( $_GET['restart'] ) ) {
            //click to restart from beginning
            delete_option( 'wple_error' );
            delete_option( 'wple_complete' );
            wp_redirect( admin_url( '/admin.php?page=wp_encryption' ), 302 );
            exit;
        }
        
        
        if ( isset( $_GET['complete'] ) ) {
            //Forced SSL completion flag
            delete_option( 'wple_error' );
            update_option( 'wple_complete', 1 );
            update_option( 'wple_backend', 1 );
            if ( wp_next_scheduled( 'wple_ssl_renewal' ) ) {
                wp_clear_scheduled_hook( 'wple_ssl_renewal' );
            }
            wp_redirect( admin_url( '/admin.php?page=wp_encryption' ), 302 );
            exit;
        }
        
        $estage = get_option( 'wple_error' );
        //redirections
        
        if ( FALSE !== $estage && $estage == 2 && !isset( $_GET['subdir'] ) && !isset( $_GET['error'] ) && !isset( $_GET['includewww'] ) && !isset( $_GET['wpleauto'] ) && isset( $_GET['page'] ) && $_GET['page'] == 'wp_encryption' && !isset( $_GET['success'] ) && !isset( $_GET['wplereset'] ) && !isset( $_GET['comparison'] ) && !isset( $_GET['lasterror'] ) ) {
            wp_redirect( admin_url( '/admin.php?page=wp_encryption&subdir=1' ), 302 );
            exit;
        }
        
        
        if ( FALSE !== $estage && $estage == 5 && !isset( $_GET['subdir'] ) && !isset( $_GET['error'] ) && !isset( $_GET['includewww'] ) && !isset( $_GET['wpleauto'] ) && isset( $_GET['page'] ) && $_GET['page'] == 'wp_encryption' && !isset( $_GET['resume'] ) && !isset( $_GET['nossl'] ) && !isset( $_GET['wplereset'] ) && !isset( $_GET['comparison'] ) && !isset( $_GET['nocpanel'] ) ) {
            wp_redirect( admin_url( '/admin.php?page=wp_encryption&success=1&resume=1' ), 302 );
            exit;
        }
    
    }
    
    /**
     * Error Message block
     *
     * @param string $html
     * @since 2.5.0
     * @return void
     */
    public function wple_error_block( &$html )
    {
        if ( !isset( $_GET['subdir'] ) && !isset( $_GET['success'] ) ) {
            
            if ( isset( $_GET['sperror'] ) ) {
            } else {
                
                if ( isset( $_GET['error'] ) || FALSE != ($error_code = get_option( 'wple_error' )) ) {
                    $error_code = get_option( 'wple_error' );
                    $generic = esc_html__( 'There was some issue while generating SSL for your site. Please check debug log or try Reset option once.', 'wp-letsencrypt-ssl' );
                    $generic .= '<p style="font-size:16px;color:#888">' . sprintf( esc_html__( 'Feel free to open support ticket at %s for any help.', 'wp-letsencrypt-ssl' ), 'https://wordpress.org/support/plugin/wp-letsencrypt-ssl/#new-topic-0' ) . '</p>';
                    $firerec = sprintf(
                        esc_html__( "We highly recommend upgrading to our %sPRO%s annual plan for %sPremium SSL%s with automatic %sCDN%s + %sFirewall Security%s that works on ANY host.", 'wp-letsencrypt-ssl' ),
                        '<a href="' . admin_url( '/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=annual&pricing_id=7965&currency=usd' ) . '">',
                        '</a>',
                        '<strong>',
                        '</strong>',
                        '<strong>',
                        '</strong>',
                        '<strong>',
                        '</strong>'
                    );
                    $thirdparty = esc_html__( "Your hosting server don't seem to support third party SSL.", "wp-letsencrypt-ssl" );
                    
                    if ( FALSE !== $error_code && ($error_code == 1 || $error_code == 400) ) {
                        $generic .= '<p class="firepro">' . $thirdparty . ' ' . $firerec . '</p>';
                    } else {
                        if ( file_exists( ABSPATH . 'keys/certificate.crt' ) ) {
                            $generic .= '<br><br>' . WPLE_Trait::wple_kses( __( 'You already seem to have certificate generated and stored. Please try downloading certs from <strong>Download SSL Certificates</strong> page and open in a text editor like notepad to check if certificate is not empty.', 'wp-letsencrypt-ssl' ) );
                        }
                    }
                    
                    
                    if ( FALSE !== $error_code && $error_code == 429 ) {
                        $generic = sprintf( esc_html__( 'Too many registration attempts from your IP address (%s). Please try after 2-3 hours.', 'wp-letsencrypt-ssl' ), 'https://letsencrypt.org/docs/rate-limits/' );
                        $generic .= '<p class="firepro">' . $firerec . '</p>';
                        $generic .= '<p style="font-size:17px;color:#888">' . sprintf( esc_html__( 'Feel free to open support ticket at %s for any help.', 'wp-letsencrypt-ssl' ), 'https://wordpress.org/support/plugin/wp-letsencrypt-ssl/#new-topic-0' ) . '</p>';
                    }
                    
                    if ( $error_code != 5 ) {
                        $html .= '
          <div id="wple-sslgenerator" class="error">
            <div class="wple-error-message">
              ' . $generic . '
            </div>
          </div><!--wple-sslgenerator-->';
                    }
                }
            
            }
        
        }
    }
    
    /**
     * Handles review box actions
     *
     * @since 4.4.0
     * @return void
     */
    public function wple_review_handler()
    {
        //since 5.0.0
        $this->wple_intro_pricing_handler();
    }
    
    /**
     * Sets review flag to show review request
     * 
     * @since 4.4.0
     */
    public function wple_set_review_flag()
    {
        update_option( 'wple_show_review', 1 );
    }
    
    /**
     * Handle the reset keys action
     *
     * @since 4.5.0
     * @return void
     */
    public function wple_reset_handler()
    {
        
        if ( isset( $_GET['wplereset'] ) ) {
            if ( !current_user_can( 'manage_options' ) ) {
                exit( 'No Trespassing Allowed' );
            }
            if ( !wp_verify_nonce( $_GET['wplereset'], 'restartwple' ) ) {
                exit( 'No Trespassing Allowed' );
            }
            $keys = ABSPATH . 'keys/';
            $files = array(
                $keys . 'public.pem',
                $keys . 'private.pem',
                $keys . 'order',
                $keys . 'fullchain.crt',
                $keys . 'certificate.crt',
                $keys . '__account/private.pem',
                $keys . '__account/public.pem'
            );
            foreach ( $files as $file ) {
                if ( file_exists( $file ) ) {
                    unlink( $file );
                }
            }
            delete_option( 'wple_error' );
            delete_option( 'wple_complete' );
            delete_option( 'wple_backend' );
            ///if (wple_fs()->can_use_premium_code__premium_only()) {
            delete_option( 'wple_firewall_stage' );
            delete_option( 'wple_spmode_dns' );
            delete_option( 'wple_spmode_activated' );
            ///}
            add_action( 'admin_notices', array( $this, 'wple_reset_success' ) );
        }
        
        //since 4.6.0
        
        if ( isset( $_GET['wplesslrenew'] ) ) {
            if ( !wp_verify_nonce( $_GET['wplesslrenew'], 'wple_renewed' ) ) {
                exit( 'Unauthorized' );
            }
            delete_option( 'wple_show_reminder' );
            wp_redirect( admin_url( '/admin.php?page=wp_encryption' ), 302 );
        }
    
    }
    
    /**
     * Reset success notice
     * 
     * @since 4.5.0
     */
    public function wple_reset_success()
    {
        echo  '<div class="notice notice-success is-dismissable">
    <p>' . esc_html( 'Reset successful!. You can start with the SSL install process again.', 'wp-letsencrypt-ssl' ) . '</p>
    </div>' ;
    }
    
    /**
     * Local check DNS records via Ajax
     * 
     * @since 4.6.0
     * @return void
     */
    public function wple_ajx_verify_dns()
    {
        
        if ( isset( $_POST['nc'] ) ) {
            if ( !wp_verify_nonce( $_POST['nc'], 'verifydnsrecords' ) ) {
                exit( 'Unauthorized' );
            }
            $toVerify = get_option( 'wple_opts' );
            
            if ( array_key_exists( 'dns_challenges', $toVerify ) && !empty($toVerify['dns_challenges']) ) {
                $toVerify = $dnspendings = $toVerify['dns_challenges'];
                //array
                foreach ( $toVerify as $index => $item ) {
                    $domain_code = explode( '||', $item );
                    $acme = '_acme-challenge.' . esc_html( $domain_code[0] );
                    $requestURL = 'https://dns.google.com/resolve?name=' . addslashes( $acme ) . '&type=TXT';
                    $handle = curl_init();
                    curl_setopt( $handle, CURLOPT_URL, $requestURL );
                    curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
                    curl_setopt( $handle, CURLOPT_FOLLOWLOCATION, true );
                    $response = json_decode( trim( curl_exec( $handle ) ) );
                    
                    if ( $response->Status === 0 && isset( $response->Answer ) ) {
                        //if ($answer->type == 16) {
                        $found = 'Pending';
                        foreach ( $response->Answer as $answer ) {
                            $livecode = str_ireplace( '"', '', $answer->data );
                            
                            if ( $livecode == $domain_code[1] ) {
                                unset( $dnspendings[$index] );
                                $found = 'OK';
                            }
                        
                        }
                        WPLE_Trait::wple_logger( "\n" . esc_html( $requestURL . ' should return ' . $domain_code[1] . ' -> ' . $found ) . "\n" );
                    } else {
                        $ledebug = WPLE_Trait::wple_lets_debug( 'dns-01' );
                        
                        if ( $ledebug != false ) {
                            echo  $ledebug ;
                            exit;
                        }
                        
                        echo  'fail' ;
                        exit;
                    }
                
                }
                
                if ( empty($dnspendings) ) {
                    WPLE_Trait::wple_logger(
                        "Local check - All DNS challenges verified\n",
                        'success',
                        'a',
                        false
                    );
                    echo  1 ;
                    exit;
                } else {
                    $ledebug = WPLE_Trait::wple_lets_debug( 'dns-01' );
                    
                    if ( $ledebug != false ) {
                        echo  $ledebug ;
                        exit;
                    }
                    
                    echo  'fail' ;
                    exit;
                }
            
            } else {
                
                if ( empty($toVerify['dns_challenges']) ) {
                    WPLE_Trait::wple_logger(
                        "Local check - DNS challenges empty\n",
                        'success',
                        'a',
                        false
                    );
                    echo  1 ;
                    exit;
                }
            
            }
        
        }
        
        WPLE_Trait::wple_send_log_data();
        echo  'fail' ;
        exit;
    }
    
    /**
     * Show expiry reminder in admin notice
     *
     * @see 4.6.0
     * @return void
     */
    public function wple_start_show_reminder()
    {
        update_option( 'wple_show_reminder', 1 );
        $opts = get_option( 'wple_opts' );
        $to = sanitize_email( $opts['email'] );
        $subject = sprintf( esc_html__( 'ATTENTION - SSL Certificate of %s expires in just 10 days', 'wp-letsencrypt-ssl' ), str_ireplace( array( 'https://', 'http://' ), array( '', '' ), site_url() ) );
        $headers = array( 'Content-Type: text/html; charset=UTF-8' );
        $body = '<p>' . sprintf( esc_html__( 'Your SSL Certificate is expiring soon!. Please make sure to re-generate new SSL Certificate using %sWP Encryption%s and install it on your hosting server to avoid site showing insecure warning with expired certificate.', 'wp-letsencrypt-ssl' ), '<a href="' . admin_url( '/admin.php?page=wp_encryption', 'http' ) . '">', '</a>' ) . '</p><br /><br />';
        $body .= '<b>' . esc_html__( 'Tired of manual SSL renewal every 90 days?, Upgrade to PRO version for automatic SSL installation and automatic SSL renewal', 'wp-letsencrypt-ssl' ) . '. <br><a href="' . admin_url( '/admin.php?page=wp_encryption-pricing', 'http' ) . '" style="background: #0073aa; text-decoration: none; color: #fff; padding: 12px 20px; display: inline-block; margin: 10px 0; font-weight: bold;">' . esc_html__( 'UPGRADE TO PREMIUM', 'wp-letsencrypt-ssl' ) . '</a></b><br /><br />';
        wp_mail(
            $to,
            $subject,
            $body,
            $headers
        );
    }
    
    public function wple_reminder_notice()
    {
        $already_did = wp_nonce_url( admin_url( 'admin.php?page=wp_encryption' ), 'wple_renewed', 'wplesslrenew' );
        $html = '<div class="notice notice-info wple-admin-review">
        <div class="wple-review-box wple-reminder-notice">
          <img src="' . WPLE_URL . 'admin/assets/symbol.png"/>
          <span><strong>WP ENCRYPTION: ' . esc_html__( 'Your SSL certificate expires in less than 10 days', 'wp-letsencrypt-ssl' ) . '</strong><p>' . WPLE_Trait::wple_kses( __( 'Renew your SSL certificate today to avoid your site from showing as insecure. Please support our contribution by upgrading to <strong>Pro</strong> and avail automatic SSL renewal with automatic SSL installation.', 'wp-letsencrypt-ssl' ) ) . '</p></span>
        </div>
        <a class="wple-lets-review wplerevbtn" href="' . admin_url( '/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=lifetime&pricing_id=7965&currency=usd' ) . '">' . esc_html__( 'Upgrade to Pro', 'wp-letsencrypt-ssl' ) . '</a>
        <a class="already-renewed wplerevbtn" href="' . $already_did . '">' . esc_html__( 'I already renewed', 'wp-letsencrypt-ssl' ) . '&nbsp;<span class="dashicons dashicons-smiley"></span></a>
      </div>';
        echo  $html ;
    }
    
    /**
     * Manual HTTP challenges for subdir sites
     *
     * @since 4.7.0
     * @param string $html
     * @param array $opts
     * @return string
     */
    public function wple_subdir_challenges( &$html, $opts )
    {
        if ( isset( $_GET['subdir'] ) ) {
            $html .= '
      <div id="wple-sslgenerator">
      <div class="wple-success-form">
          ' . WPLE_Subdir_Challenge_Helper::show_challenges( $opts ) . '
      </div>
      </div><!--wple-sslgenerator-->';
        }
    }
    
    /**
     * Local check HTTP records via Ajax for subdir sites
     * 
     * @since 4.7.0
     * @return void
     */
    public function wple_ajx_verify_http()
    {
        
        if ( isset( $_POST['nc'] ) ) {
            if ( !wp_verify_nonce( $_POST['nc'], 'verifyhttprecords' ) ) {
                exit( 'Unauthorized' );
            }
            $domain = str_ireplace( array( 'https://', 'http://' ), '', site_url() );
            if ( stripos( $domain, '/' ) != FALSE ) {
                //subdir site
                $domain = substr( $domain, 0, stripos( $domain, '/' ) );
            }
            $opts = get_option( 'wple_opts' );
            $httpch = $opts['challenge_files'];
            
            if ( empty($httpch) ) {
                echo  'empty' ;
                exit;
            }
            
            $counter = get_option( 'wple_failed_verification' );
            $curl_exists = function_exists( 'curl_init' );
            if ( $curl_exists ) {
                foreach ( $httpch as $index => $ch ) {
                    $chfile = sanitize_file_name( $ch['file'] );
                    $chval = esc_html( $ch['value'] );
                    $fpath = trailingslashit( ABSPATH ) . '.well-known/acme-challenge/';
                    
                    if ( $counter >= 5 ) {
                        if ( !file_exists( $fpath ) ) {
                            mkdir( $fpath, 0775, true );
                        }
                        WPLE_Trait::wple_logger( 'Helping with HTTP challenge file', 'success', 'a' );
                        file_put_contents( $fpath . $chfile, trim( $chval ) );
                    }
                    
                    $acmefilepath = $fpath . $chfile;
                    
                    if ( file_exists( $acmefilepath . '.txt' ) ) {
                        unlink( $acmefilepath . '.txt' );
                        file_put_contents( $acmefilepath, trim( $chval ) );
                    }
                    
                    //cleanup htaccess files
                    $ABS = trailingslashit( ABSPATH );
                    if ( file_exists( $ABS . '.well-known/.htaccess' ) ) {
                        unlink( $ABS . '.well-known/.htaccess' );
                    }
                    if ( file_exists( $ABS . '.well-known/acme-challenge/.htaccess' ) ) {
                        unlink( $ABS . '.well-known/acme-challenge/.htaccess' );
                    }
                    $check = LEFunctions::checkHTTPChallenge(
                        $domain,
                        $chfile,
                        $chval,
                        false
                    );
                    $chfileexists = file_exists( $fpath . $chfile );
                    
                    if ( !$check && $chfileexists ) {
                        if ( !file_exists( $fpath ) ) {
                            mkdir( $fpath, 0775, true );
                        }
                        WPLE_Trait::wple_logger( 'Local file exists - Trying to help with HTTP challenge file', 'success', 'a' );
                        file_put_contents( $fpath . $chfile, trim( $chval ) );
                        //re-check once
                        $check = LEFunctions::checkHTTPChallenge(
                            $domain,
                            $chfile,
                            $chval,
                            false
                        );
                        
                        if ( !$check ) {
                            echo  'not_possible' ;
                            exit;
                        }
                    
                    }
                    
                    // if ($check === true) {
                    //   //skip
                    // } else if ($check == 200 && $chfileexists) {
                    //   $check = 2;
                    // } else {
                    
                    if ( !$check ) {
                        
                        if ( FALSE === $counter ) {
                            update_option( 'wple_failed_verification', 1 );
                        } else {
                            update_option( 'wple_failed_verification', $counter + 1 );
                        }
                        
                        WPLE_Trait::wple_logger(
                            "HTTP challenge file (" . $domain . "/.well-known/acme-challenge/" . $chfile . ") checked locally - found invalid ({$chfileexists})",
                            'success',
                            'a',
                            false
                        );
                        WPLE_Trait::wple_send_log_data();
                        $ledebug = WPLE_Trait::wple_lets_debug( 'http-01' );
                        
                        if ( $ledebug != false ) {
                            echo  $ledebug ;
                            exit;
                        }
                        
                        echo  'fail' ;
                        exit;
                    }
                
                }
            }
            // if ($check == 2) {
            //   WPLE_Trait::wple_logger("Local check - Found challenge file in acme-challenge => proceeding to ACME verification\n", 'success', 'a', false);
            //   delete_option('wple_failed_verification');
            //   echo 1;
            //   exit();
            // }
            if ( !$curl_exists ) {
                WPLE_Trait::wple_logger(
                    "HTTP local verification skipped due to non-availability of CURL\n",
                    'success',
                    'a',
                    false
                );
            }
            WPLE_Trait::wple_logger(
                "Local check - All HTTP challenges verified\n",
                'success',
                'a',
                false
            );
            delete_option( 'wple_failed_verification' );
            echo  1 ;
            exit;
        }
    
    }
    
    /**
     * Continue process on wpleauto param
     *
     * @return void
     */
    public function wple_continue_certification()
    {
        
        if ( isset( $_GET['wpleauto'] ) ) {
            $leopts = get_option( 'wple_opts' );
            
            if ( $_GET['wpleauto'] == 'http' ) {
                new WPLE_Core( $leopts );
            } else {
                //DNS
                new WPLE_Core(
                    $leopts,
                    true,
                    false,
                    true
                );
            }
        
        }
    
    }
    
    /**
     * Simple success notice for admin
     *
     * @since 4.7.2
     * @return void
     */
    public function wple_success_notice()
    {
        $html = '<div class="notice notice-success">
        <p>' . esc_html__( 'Success', 'wp-letsencrypt-ssl' ) . '!</p>
      </div>';
        echo  $html ;
    }
    
    /**
     * Show Pricing table once on activation
     *
     * @since 5.0.0
     * @param string $html
     * @return $html
     */
    public function wple_initial_quick_pricing( &$html )
    {
        $host = site_url();
        if ( FALSE != ($slashpos = stripos( $host, '/', 9 )) ) {
            $host = substr( $host, 0, $slashpos );
        }
        $cp = $host . ':2083';
        if ( FALSE === stripos( $host, 'https' ) ) {
            $cp = $host . ':2082';
        }
        $response = wp_remote_get( $cp, [
            'headers'   => [
            'Connection' => 'close',
        ],
            'sslverify' => false,
            'timeout'   => 30,
        ] );
        $cpanel = true;
        if ( is_wp_error( $response ) ) {
            $cpanel = false;
        }
        $html .= '<div id="wple-sslgen">';
        $cppricing = ( FALSE !== stripos( ABSPATH, 'srv/htdocs' ) ? true : false );
        
        if ( $cpanel || $cppricing ) {
            $show_rp = '';
            if ( !$cppricing ) {
                $show_rp = 1;
            }
            update_option( 'wple_have_cpanel', $show_rp );
            $html .= $this->wple_cpanel_pricing_table( 1 );
        } else {
            update_option( 'wple_have_cpanel', 0 );
            // if (isset($_SERVER['GD_PHP_HANDLER'])) {
            //   if ($_SERVER['SERVER_SOFTWARE'] == 'Apache' && isset($_SERVER['GD_PHP_HANDLER']) && $_SERVER['DOCUMENT_ROOT'] == '/var/www') {
            $html .= $this->wple_firewall_pricing_table();
            //   }
            // } else {
            //   $html .= $this->wple_cpanel_pricing_table('');
            // }
        }
        
        $html .= '</div>';
        echo  $html ;
    }
    
    /**
     * Pricing table html
     *
     * @since 5.0.0
     * @return $table
     */
    public function wple_cpanel_pricing_table( $cpanel = '' )
    {
        ob_start();
        ?>

      <h2 class="pricing-intro-head"><?php 
        esc_html_e( 'SAVE MORE THAN $90+ EVERY YEAR IN SSL CERTIFICATE FEE', 'wp-letsencrypt-ssl' );
        ?></h2>

      <h4 class="pricing-intro-subhead">Purchase once and use for lifetime - Trusted Globally by <b>110,000+</b> WordPress Users (Looking for <a href="<?php 
        echo  admin_url( '/admin.php?page=wp_encryption&gopro=3' ) ;
        ?>">Annual</a> | <a href="<?php 
        echo  admin_url( '/admin.php?page=wp_encryption&gopro=2' ) ;
        ?>">Unlimited Sites License?</a>)</h4>

      <div style="text-align:center">
        <img src="<?php 
        echo  WPLE_URL ;
        ?>admin/assets/limited-offer.png" style="max-width:650px" />
      </div>

      <!-- <div class="plan-toggler" style="margin:60px 0 -20px !important">
        <span>Annual</span><label class="toggle">
          <input class="toggle-checkbox initplan-switch" type="checkbox" <?php 
        // if ($cpanel == 1) {
        //                                                                       echo 'checked';
        //                                                                     }
        ?>>
          <div class="toggle-switch"></div>
          <span class="toggle-label">Lifetime</span>
        </label>
      </div> -->

      <div id="quick-pricing-table">
        <div class="free-pricing-col wplepricingcol">
          <div class="quick-pricing-head free">
            <h3>FREE</h3>
            <large>$0</large>
          </div>
          <ul>
            <li><strong>Manual</strong> domain verification</li>
            <li><strong>Manual</strong> SSL installation</li>
            <li><strong>Manual</strong> SSL renewal <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="You will manually need to re-generate SSL certificate every 90 days once using WP Encryption"></span></li>
            <li><strong>Mixed</strong> Content Scanner <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Scan your site to detect which insecure assets are causing browser padlock to not show"></span></li>
            <!-- <li><strong>Expires</strong> in 90 days <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="You will manually need to re-generate SSL certificate every 90 days using WP Encryption"></span></li> -->
            <li><strong>Basic</strong> support</li>
          </ul>
          <div class="pricing-btn-block">
            <a href="<?php 
        echo  admin_url( '/admin.php?page=wp_encryption&gofree=1' ) ;
        ?>" class="pricingbtn free">Select Plan</a>
          </div>
        </div>

        <div class="pro-pricing-col wplepricingcol proplan">
          <div class="quick-pricing-head pro">
            <span class="wple-trending">Popular</span>
            <h3>PRO</h3>
            <div class="quick-price-row">
              <large>$49<sup></sup></large>
              <small>/lifetime</small>
            </div>
          </div>
          <ul>
            <li><strong>Automatic</strong> domain verification</li>
            <li><strong>Automatic</strong> SSL installation</li>
            <li><strong>Automatic</strong> SSL renewal</li>
            <li><strong>Wildcard</strong> SSL support <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="One SSL certificate to cover all your sub-domains"></span></li>
            <li><strong>Multisite</strong> mapped domains <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Install SSL for different domains mapped to your multisite network with MU domain mapping plugin"></span></li>
            <li><strong>DNS</strong> Automation <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Automatic Domain verification with DNS if HTTP domain verification fails"></span></li>
            <li><strong>Never</strong> expires <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Never worry about SSL again - Your SSL certificate will be automatically renewed in background 30 days prior to its expiry dates"></span></li>
            <li><strong>Priority</strong> support <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="gowebsmarty.in"></span></li>
          </ul>
          <div class="pricing-btn-block">
            <a href="<?php 
        echo  admin_url( '/admin.php?page=wp_encryption&gopro=1' ) ;
        ?>" class="pricingbtn free">Select Plan</a>
          </div>
        </div>

      </div>

      <br />
      <?php 
        if ( $cpanel != '' ) {
            ?>
        <div class="quick-refund-policy">
          <strong>7 Days Refund Policy</strong>
          <p>We're showing this recommendation because you have cPanel hosting where our PRO plugin is 100% guaranteed to work. Your purchase will be completely refunded if WP Encryption fail to work on your site.</p>
        </div>
      <?php 
        }
        ?>

    <?php 
        $table = ob_get_clean();
        return $table;
    }
    
    public function wple_firewall_pricing_table()
    {
        ob_start();
        ?>

      <h2 class="pricing-intro-head">FLAWLESS SSL SOLUTION FOR LOWEST PRICE EVER <small>(Limited Offer)</small></h2>
      <h4 class="pricing-intro-subhead">Upgrade to PRO today for <strong>Fully automatic SSL</strong> & get automatic <strong>CDN + Security</strong> for FREE! - Trusted Globally by <b>110,000+</b> WordPress Users <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="A complete bundle worth $360!"></span></h4>

      <div style="text-align:center">
        <img src="<?php 
        echo  WPLE_URL ;
        ?>admin/assets/limited-offer.png" style="max-width:650px" />
      </div>

      <div id="quick-pricing-table" class="non-cpanel-plans">
        <div class="free-pricing-col wplepricingcol">
          <div class="quick-pricing-head free">
            <h3>FREE</h3>
            <large>$0</large>
          </div>
          <ul>
            <li><strong>Manual</strong> domain verification</li>
            <li><strong>Manual</strong> SSL installation</li>
            <li><strong>Manual</strong> SSL renewal <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="You will manually need to re-generate SSL certificate every 90 days once using WP Encryption"></span></li>
            <li><strong>Basic</strong> support</li>
          </ul>
          <div class="pricing-btn-block">
            <a href="<?php 
        echo  admin_url( '/admin.php?page=wp_encryption&gofree=1' ) ;
        ?>" class="pricingbtn free">Select Plan</a>
          </div>
        </div>

        <div class="pro-pricing-col wplepricingcol firewallplan">
          <div class="quick-pricing-head pro">
            <span class="wple-trending">Popular</span>
            <h3>PRO</h3>
            <div class="quick-price-row">
              <large>$29</large>
              <small>/year</small>
            </div>
          </div>
          <ul>
            <li><strong>Automatic</strong> Domain Verification</li>
            <li><strong>Automatic</strong> SSL Installation</li>
            <li><strong>Automatic</strong> SSL Renewal</li>
            <li><strong>Wildcard</strong> SSL support <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="One SSL certificate to cover all your sub-domains"></span></li>
            <li><strong>Multisite</strong> mapped domains <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Install SSL for different domains mapped to your multisite network with MU domain mapping plugin"></span></li>
            <li><strong>Automatic</strong> CDN <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Your site is cached and served from 45+ full-scale edge locations worldwide for faster delivery and lowest TTFB thus improving Google pagespeed score"></span></li>
            <li><strong>Security</strong> Firewall <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="All your site traffic routed through secure StackPath firewall offering protection against DDOS attacks, XSS, SQL injection, File inclusion, Common WordPress exploits, CSRF, etc.,"></span></li>
            <li><strong>100%</strong> Compatible <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="Guaranteed to work on ANY hosting platform"></span></li>
            <li><strong>Priority</strong> Support</li>
          </ul>
          <div class="pricing-btn-block">
            <a href="<?php 
        echo  admin_url( '/admin.php?page=wp_encryption&gofirewall=1' ) ;
        ?>" class="pricingbtn free">Select Plan</a>
          </div>
        </div>

      </div>
      <!-- <div class="intro-pricing-refund">
        7 days money back guarantee <span class="dashicons dashicons-editor-help wple-tooltip" data-tippy="If you are not satisfied with the service within 7 days of purchase, We will refund your purchase no questions asked"></span>
      </div> -->

    <?php 
        $table = ob_get_clean();
        return $table;
    }
    
    /**
     * Intro pricing table handler
     * 
     * @since 5.0.0     
     * @return void
     */
    public function wple_intro_pricing_handler()
    {
        $goplan = '';
        
        if ( isset( $_GET['gofree'] ) ) {
            update_option( 'wple_plan_choose', 1 );
            wp_redirect( admin_url( '/admin.php?page=wp_encryption' ), 302 );
            exit;
        } else {
            
            if ( isset( $_GET['gopro'] ) ) {
                update_option( 'wple_plan_choose', 1 );
                
                if ( $_GET['gopro'] == 2 ) {
                    //unlimited
                    wp_redirect( admin_url( '/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=annual&pricing_id=10873&currency=usd' ), 302 );
                } else {
                    
                    if ( $_GET['gopro'] == 3 ) {
                        //annual
                        wp_redirect( admin_url( '/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=annual&pricing_id=7965&currency=usd' ), 302 );
                    } else {
                        //single lifetime
                        wp_redirect( admin_url( '/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=lifetime&pricing_id=7965&currency=usd' ), 302 );
                    }
                
                }
                
                exit;
            } else {
                
                if ( isset( $_GET['gofirewall'] ) ) {
                    update_option( 'wple_plan_choose', 1 );
                    ///wp_redirect(admin_url('/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=11394&plan_name=pro&billing_cycle=annual&pricing_id=11717&currency=usd'), 302);
                    wp_redirect( admin_url( '/admin.php?page=wp_encryption-pricing&checkout=true&plan_id=8210&plan_name=pro&billing_cycle=annual&pricing_id=7965&currency=usd' ), 302 );
                    exit;
                }
            
            }
        
        }
    
    }
    
    /**
     * After all stages completion
     *
     * @param string $html
     * @return void
     */
    public function wple_completed_block( &$html )
    {
        $html .= WPLE_Trait::wple_progress_bar();
        $cert = ABSPATH . 'keys/certificate.crt';
        $leopts = get_option( 'wple_opts' );
        $future = strtotime( $leopts['expiry'] );
        //Future date.
        $timefromdb = time();
        $timeleft = $future - $timefromdb;
        $daysleft = round( $timeleft / 24 / 60 / 60 );
        $wple_support = get_option( 'wple_backend' );
        $renewtext = esc_html__( 'Click Here To Renew SSL Certificate', 'wp-letsencrypt-ssl' );
        $renewlink = '<a href="#" class="letsrenew wple-tooltip disabled" data-tippy="' . esc_html__( 'This renew button will get enabled during last 30 days of current SSL certificate expiry', 'wp-letsencrypt-ssl' ) . ' ' . esc_html__( 'You can also click on STEP 1 in above progress bar to renew/re-generate SSL Certificate again.', 'wp-letsencrypt-ssl' ) . '">' . $renewtext . '</a>';
        if ( $daysleft <= 30 ) {
            $renewlink = '<a href="' . admin_url( '/admin.php?page=wp_encryption&restart=1' ) . '" class="letsrenew">' . $renewtext . '</a>';
        }
        if ( $wple_support ) {
            //forced completion
            $renewlink = '';
        }
        $headline = esc_html__( 'Woohoo! WP Encryption just saved you $$$ in SSL Certificate Fee.', 'wp-letsencrypt-ssl' );
        $sharetitle = urlencode( 'Generated & Installed free SSL certificate using WP ENCRYPTION WordPress plugin within minutes! Thanks for the great plugin' );
        $html .= '<div id="wple-completed">
        <div class="wple-completed-review">
          <h2>' . $headline . '</h2>
          <p>' . sprintf(
            __( 'Can you please do us a BIG favor by leaving a %s%s%s%s%s rating on WordPress.org', 'wp-letsencrypt-ssl' ),
            '<span class="dashicons dashicons-star-filled"></span>',
            '<span class="dashicons dashicons-star-filled"></span>',
            '<span class="dashicons dashicons-star-filled"></span>',
            '<span class="dashicons dashicons-star-filled"></span>',
            '<span class="dashicons dashicons-star-filled"></span>'
        ) . ' <span class="wple-share-success">' . sprintf(
            __( "or spread the word on %s %s %s %s", "wp-letsencrypt-ssl" ),
            '<a href="https://twitter.com/share?url=https://wpencryption.com&text=' . $sharetitle . '&hashtags=wp_encryption,wordpress_ssl,wordpress_https" target="_blank" title="Twitter" class="tw">T</a>',
            '<a href="https://www.facebook.com/sharer.php?u=wpencryption.com" target="_blank" title="Facebook" class="fb">F</a>',
            '<a href="https://reddit.com/submit?url=wpencryption.com&title=' . $sharetitle . '" target="_blank" title="Reddit" class="rd">R</a>',
            '<a href="https://pinterest.com/pin/create/bookmarklet/?media=https://wpencryption.com/wp-content/uploads/2021/08/banner-772x250-1.png&url=wpencryption.com&description=' . $sharetitle . '" target="_blank" title="Pinterest" class="pt">P</a>'
        ) . '</span></p>
          <a href="https://wordpress.org/support/plugin/wp-letsencrypt-ssl/reviews/#new-post" target="_blank" class="letsrate">' . esc_html__( 'LEAVE A RATING', 'wp-letsencrypt-ssl' ) . ' <span class="dashicons dashicons-external"></span></a>
          ' . $renewlink . '
          <small>' . esc_html__( 'Just takes a moment', 'wp-letsencrypt-ssl' ) . '</small>
        </div>';
        if ( file_exists( $cert ) && isset( $leopts['expiry'] ) && !$wple_support ) {
            $html .= '<div class="wple-completed-remaining">
          <div class="progress--circle progress--' . esc_attr( $daysleft ) . '">
            <div class="progress__number"><strong>' . esc_html( $daysleft ) . '</strong><br><small>' . esc_html__( 'Days', 'wp-letsencrypt-ssl' ) . '</small></div>
          </div>  
          <div class="wple-circle-expires">  
          <strong>' . esc_html__( 'Your generated SSL certificate expires on', 'wp-letsencrypt-ssl' ) . ': <br><b>' . esc_html( $leopts['expiry'] ) . '</b></strong>
          <p>' . WPLE_Trait::wple_kses( __( "Let's Encrypt® SSL Certificate expires in 90 days by default. You can easily regenerate new SSL certificate using <strong>RENEW SSL CERTIFICATE</strong> option found on left or by clicking on <strong>STEP 1</strong> in progress bar.", "wp-letsencrypt-ssl" ) ) . '<br /><br />' . WPLE_Trait::wple_kses( __( 'Major browsers like Chrome will start showing insecure site warning IF you fail to renew / re-generate certs before this expiry date. <strong>PLEASE NOTE: If you are using PRO version - Ignore the above expiry date as your SSL certificates will be auto renewed in background 30 days prior to expiry date.</strong>', 'wp-letsencrypt-ssl' ) ) . ' Please clear your browser cache once.</p>           
          </div>
        </div>';
        }
        $html .= '</div>';
        // if (wple_fs()->can_use_premium_code__premium_only()) {
        // $rand = rand(0, 1);
        // if ($rand) {
        //   $html .= '<div class="wple-error-firewall fire-pro">
        //     <div>
        //       <img src="' . WPLE_URL . 'admin/assets/firewall-shield-firewall.png"/>
        //     </div>
        //     <div class="wple-upgrade-features">
        //       <span><b>WP Encryption CDN</b><br>Easily upgrade from <strong>PRO</strong> to <strong>CDN</strong> plan with pro-rated adjustment (Use your license key during the checkout). </span>
        //       <span><b>CDN Performance</b><br>Your site is served from <strong>42 global locations worldwide</strong> for fastest content delivery and fastest performance.</span>
        //       <span><b>Security</b><br>Protection against known vulnerabilities, Bad Bots, Brute Force, DDOS, Spam & much more attack vectors.</span>
        //       <a href="https://wpencryption.com/cdn-firewall/?utm_campaign=wpencryptionsite&utm_source=pro&utm_medium=upgradetocdn" target="_blank" id="upgradetocdn">Learn More</a>
        //     </div>
        //   </div>';
        // } else {
        //   $lic = wple_fs()->_get_license();
        //   $checkoutURL = 'https://checkout.freemius.com/mode/dialog/plugin/7616/plan/12469/licenses/1/';
        //   if (isset($lic->expiration) && $lic->expiration != '') {
        //     $minus = '$29';
        //     $checkoutURL = 'https://checkout.freemius.com/mode/dialog/plugin/7616/plan/12469/licenses/1/?coupon=WPENPROUSER';
        //   } else {
        //     $minus = '$49';
        //     $checkoutURL = 'https://checkout.freemius.com/mode/dialog/plugin/7616/plan/12469/licenses/1/?coupon=WPENUSERLIFETIME';
        //   }
        //   // $para = 'There\'s much more to take care after migrating to HTTPS to rank higher on Google!. Let one of our SSL Expert handle all the hassle of migrating your HTTP site to HTTPS safely and securely without any loss of Search Engine rankings and Social metrics including shares, likes & tweets count.';
        //   $para = 'Save your precious time and energy!. Let one of our SSL expert handle the end to end SSL setup for you including fixing of mixed content issues on your site, making secure padlock visible, restoring lost social likes / tweets counter, migrating your analytics to HTTPS and also handle SEO fixes to avoid duplicate content issues on major search engines.';
        //   // if (FALSE != get_option('wple_spmode_activated')) {
        //   //   $para = 'There\'s much more to take care after migrating to HTTPS to rank higher on Google!. Let one of our SSL Expert safely and securely handle your SEO fixes, Google Analytics & Search engine fixes, mixed content issue fixes and restore lost social share, likes, tweets counter.';
        //   // }
        //   $html .= '<div id="wple-upgradepro" class="wple-expert-block" style="margin-bottom:0">
        //     <div class="wple-upgrade-pro">
        //       <h2>HIRE AN EXPERT</h2>
        //       <p>' . $para . '</p>
        //       <div class="wple-expert-actions">
        //       <a href="' . esc_attr($checkoutURL) . '" target="_blank" class="wple-expert-hire">Hire Now<br>$149 (-' . esc_html($minus) . ')</a>
        //       <a href="https://wpencryption.com/hire-ssl-expert/" target="_blank" class="wple-expert-more">Know more <span class="dashicons dashicons-external"></span></a>
        //       </div>
        //     </div>
        //     </div>';
        // }
        // }
    }
    
    /**
     * Make verificiation possible with broken cert
     *
     * commented out to avoid redirection loops
     * @return void
     */
    public function wple_wellknown_htaccess()
    {
        // $dir = ABSPATH . '.well-known/acme-challenge/.htaccess';
        // if (!file_exists($dir)) {
        //   $file = @touch($dir);
        // } else {
        //   $file = true;
        // }
        // if (is_writable($dir) && $file !== FALSE) {
        //   $ruleset = "<IfModule mod_rewrite.c>" . "\n";
        //   $ruleset .= "RewriteEngine on" . "\n";
        //   $ruleset .= "RewriteCond %{HTTPS} =on [NC]" . "\n";
        //   $ruleset .= "RewriteRule ^(.*)\$ http://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]" . "\n";
        //   $ruleset .= "</IfModule>" . "\n";
        //   insert_with_markers($dir, 'WP_Encryption', $ruleset);
        // }
    }
    
    /**
     * Grouped admin init hooks
     *
     * @since 5.2.4
     * @return void
     */
    public function wple_admin_init_hooks()
    {
        WPLE_Subdir_Challenge_Helper::download_challenge_files();
        $this->wple_save_email_generate_certs();
        $this->wple_download_files();
        $this->wple_review_handler();
        $this->wple_reset_handler();
        $this->wple_continue_certification();
        $this->wple_domain_verification();
        //redirects handler
    }
    
    /**
     * Validate SSL button for non-cpanel
     *
     * @since 5.2.6
     * @return void
     */
    public function wple_validate_nocp_ssl()
    {
        if ( !current_user_can( 'manage_options' ) ) {
            exit( 'Unauthorized' );
        }
        $basedomain = str_ireplace( array( 'http://', 'https://' ), array( '', '' ), addslashes( site_url() ) );
        //4.7
        if ( FALSE != stripos( $basedomain, '/' ) ) {
            $basedomain = substr( $basedomain, 0, stripos( $basedomain, '/' ) );
        }
        $client = WPLE_Trait::wple_verify_ssl( $basedomain );
        
        if ( $client || is_ssl() ) {
            $reverter = uniqid( 'wple' );
            $savedopts = get_option( 'wple_opts' );
            $savedopts['force_ssl'] = 1;
            $savedopts['revertnonce'] = $reverter;
            ///WPLE_Trait::wple_send_reverter_secret($reverter);
            update_option( 'wple_opts', $savedopts );
            delete_option( 'wple_error' );
            //complete
            update_option( 'wple_complete', 1 );
            update_option( 'siteurl', str_ireplace( 'http:', 'https:', get_option( 'siteurl' ) ) );
            update_option( 'home', str_ireplace( 'http:', 'https:', get_option( 'home' ) ) );
            echo  1 ;
        } else {
            echo  0 ;
        }
        
        exit;
    }
    
    public function wple_expert_block( &$html, $spmode = 0 )
    {
    }
    
    /**
     * This site have mixed content issues
     *
     * @since 5.3.12
     * @return void
     */
    public function wple_mixed_content_notice()
    {
        $html = '<div class="notice notice-info wple-admin-review wple-mx-prom">
      <div class="wple-review-box">
        <img src="' . WPLE_URL . 'admin/assets/symbol.png"/>
        <span><strong>Warning: ' . esc_html__( 'Your site have mixed content issues!', 'wp-letsencrypt-ssl' ) . '</strong><p>' . WPLE_Trait::wple_kses( __( 'Mixed content issues cause browser padlock to show as insecure even if you have installed SSL certificate perfectly. Hire an SSL Expert today to get rid of all SSL issues once and for all.', 'wp-letsencrypt-ssl' ) ) . '</p></span>
      </div>
      <a class="wple-lets-review wplerevbtn" href="https://checkout.freemius.com/mode/dialog/plugin/7616/plan/12469/licenses/1/" target="_blank">' . esc_html__( 'Hire SSL Expert', 'wp-letsencrypt-ssl' ) . '</a>
      <a class="wple-mx-ignore wplerevbtn" href="#">' . esc_html__( "Don't show again", 'wp-letsencrypt-ssl' ) . '</a>
    </div>';
        echo  $html ;
    }
    
    /**
     * Ajax Get cert contents for copy
     *
     * @since 5.3.16
     * @return void
     */
    public function wple_retrieve_certs_forcopy()
    {
        if ( !wp_verify_nonce( $_GET['nc'], 'copycerts' ) || !current_user_can( 'manage_options' ) ) {
            exit( 'Authorization Failure' );
        }
        $ftype = $_GET['gettype'];
        $output = '';
        $keypath = ABSPATH . 'keys/';
        switch ( $ftype ) {
            case 'cert':
                if ( file_exists( $keypath . 'certificate.crt' ) ) {
                    $output = file_get_contents( $keypath . 'certificate.crt' );
                }
                break;
            case 'key':
                if ( file_exists( $keypath . 'private.pem' ) ) {
                    $output = file_get_contents( $keypath . 'private.pem' );
                }
                break;
            case 'cabundle':
                
                if ( file_exists( ABSPATH . 'keys/cabundle.crt' ) ) {
                    $output = file_get_contents( ABSPATH . 'keys/cabundle.crt' );
                } else {
                    $output = file_get_contents( WPLE_DIR . 'cabundle/ca.crt' );
                }
                
                break;
        }
        echo  esc_html( $output ) ;
        exit;
    }
    
    /**
     * Ajax check if both www & non-www domain accessible
     *
     * @since 5.6.2
     * @return void
     */
    public function wple_include_www_check()
    {
        if ( !current_user_can( 'manage_options' ) || !wp_verify_nonce( $_GET['nc'], 'legenerate' ) ) {
            exit( 'Unauthorized request' );
        }
        $maindomain = WPLE_Trait::get_root_domain( false );
        $errcode = 'www';
        
        if ( FALSE === stripos( 'www', $maindomain ) ) {
            $altdomain = 'www.' . $maindomain;
        } else {
            $errcode = 'nonwww';
            $altdomain = str_ireplace( 'www.', '', $maindomain );
        }
        
        $altdomaintest = wp_remote_head( 'http://' . $altdomain, array(
            'sslverify' => false,
            'timeout'   => 30,
        ) );
        
        if ( !is_wp_error( $altdomaintest ) ) {
            echo  1 ;
            exit;
        }
        
        echo  $errcode ;
        exit;
    }
    
    /**
     * Backup recommendation
     *
     * @since 5.7.14
     */
    // public function wple_backup_suggestion()
    // {
    //   if (!wple_fs()->is__premium_only()) {
    //     if (FALSE === get_option('wple_plan_choose')) return true;
    //   }
    //   if (is_plugin_active('backup-bolt/backup-bolt.php')) return true;
    //   $action = 'install-plugin';
    //   $slug = 'backup-bolt';
    //   $pluginstallURL = wp_nonce_url(
    //     add_query_arg(
    //       array(
    //         'action' => $action,
    //         'plugin' => $slug
    //       ),
    //       admin_url('update.php')
    //     ),
    //     $action . '_' . $slug
    //   );
    //   $html = '<div class="notice notice-info wple-admin-review wple-backup-suggestion">
    //   <img src="' . WPLE_URL . 'admin/assets/symbol.png"/>
    //   <p>Before installing SSL certificate or enforcing HTTPS, We HIGHLY recommend you backup your site using <b>"BACKUP BOLT"</b> WordPress plugin</p>
    //   <a href="' . esc_url($pluginstallURL) . '" class="wple-backup-link wple-backup-install">Install & Activate Plugin</a>
    //   <a href="#" class="wple-backup-link wple-backup-skip">Skip - I already have the backup</a>
    // </div>';
    //   echo $html;
    // }
    public function wple_ignore_backup_suggest()
    {
        if ( !current_user_can( 'manage_options' ) ) {
            exit;
        }
        update_option( 'wple_backup_suggested', true );
        echo  1 ;
        exit;
    }

}