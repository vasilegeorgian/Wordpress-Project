<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       catchplugins.com
 * @since      1.0.0
 *
 * @package    Header_Enhancement
 * @subpackage Header_Enhancement/partials
 */

?>

<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Header Enhancement', 'header-enhancement' ); ?></h1>
    <div id="plugin-description">
        <p><?php esc_html_e( 'Header Enhancement allows you to add an expressive custom header video on your website with features like mobile compatibility and sound effects.', 'header-enhancement' ); ?></p>
    </div>
    <div class="catchp-content-wrapper">
        <div class="catchp_widget_settings">

            <h2 class="nav-tab-wrapper">
                <a class="nav-tab nav-tab-active" id="dashboard-tab" href="#dashboard"><?php esc_html_e( 'Dashboard', 'header-enhancement' ); ?></a>
                <a class="nav-tab" id="features-tab" href="#features"><?php esc_html_e( 'Features', 'header-enhancement' ); ?></a>
                <a class="nav-tab" id="premium-extensions-tab" href="#premium-extensions"><?php esc_html_e( 'Compare Table', 'header-enhancement' ); ?></a>
            </h2>

            <div id="dashboard" class="wpcatchtab  nosave active">

                <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/display-dashboard.php'; ?>

                <div id="ctp-switch" class="content-wrapper col-3 header-enhancement-main">
                    <div class="header">
                        <h2><?php esc_html_e( 'Catch Themes & Catch Plugins Tabs', 'header-enhancement' ); ?></h2>
                    </div> <!-- .Header -->

                    <div class="content">

                        <p><?php echo esc_html__( 'If you want to turn off Catch Themes & Catch Plugins tabs option in Add Themes and Add Plugins page, please uncheck the following option.', 'header-enhancement' ); ?>
                        </p>
                        <table>
                            <tr>
                                <td>
                                    <?php echo esc_html__( 'Turn On Catch Themes & Catch Plugin tabs', 'header-enhancement' );  ?>
                                </td>
                                <td>
                                    <?php $ctp_options = ctp_get_options(); ?>
                                    <div class="module-header <?php echo $ctp_options['theme_plugin_tabs'] ? 'active' : 'inactive'; ?>">
                                        <div class="switch">
                                            <input type="hidden" name="ctp_tabs_nonce" id="ctp_tabs_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ctp_tabs_nonce' ) ); ?>" />
                                            <input type="checkbox" id="ctp_options[theme_plugin_tabs]" class="ctp-switch" rel="theme_plugin_tabs" <?php checked( true, $ctp_options['theme_plugin_tabs'] ); ?> >
                                            <label for="ctp_options[theme_plugin_tabs]"></label>
                                        </div>
                                        <div class="loader"></div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div><!-- #ctp-switch -->
                <div id="go-premium" class="content-wrapper col-2">

                    <div class="header">
                        <h2><?php esc_html_e( 'Go Premium!', 'header-enhancement' ); ?></h2>
                    </div> <!-- .Header -->

                    <div class="content">
                        <button type="button" class="button dismiss">
                            <span class="screen-reader-text"><?php esc_html_e( 'Dismiss this item.', 'header-enhancement' ); ?></span>
                            <span class="dashicons dashicons-no-alt"></span>
                        </button>
                        <ul class="catchp-lists">
                            <li><strong><?php esc_html_e( 'Toggle autoplay', 'header-enhancement' ); ?></strong></li>
                            <li><strong><?php esc_html_e( 'Toggle sound', 'header-enhancement' ); ?></strong></li>
                            <li><strong><?php esc_html_e( 'Toogle loop', 'header-enhancement' ); ?></strong></li>
                            <li><strong><?php esc_html_e( 'Toggle display on small devices', 'header-enhancement' ); ?></strong></li>
                            <li><strong><?php esc_html_e( 'Max video size upto 500MB', 'header-enhancement' ); ?></strong></li>
                        </ul>

                        <a href="https://catchplugins.com/plugins/header-enhancement/" target="_blank"><?php esc_html_e( 'Find out why you should upgrade to Header Enhancement Premium »', 'header-enhancement' ); ?></a>
                    </div> <!-- .Content -->
                </div> <!-- #go-premium -->

                <div id="pro-screenshot" class="content-wrapper col-3">

                    <div class="header">
                        <h2><?php esc_html_e( 'Pro Screenshot', 'header-enhancement' ); ?></h2>
                    </div> <!-- .Header -->

                    <div class="content">
                        <ul class="catchp-lists">
                            <li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/toggle-sound.jpg' ); ?>"></li>
                            <li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/toggle-on-small-devices.jpg' ); ?>"></li>
                            <li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/toggle-autoplay.jpg' ); ?>"></li>
                            <li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/toggle-loop.jpg' ); ?>"></li>
                        </ul>
                    </div> <!-- .Content -->
                </div> <!-- #pro-screenshot -->
            </div><!-- .dashboard -->

            <div id="features" class="wpcatchtab save">
                <div class="content-wrapper col-3">
                    <div class="header">
                        <h3><?php esc_html_e( 'Features', 'header-enhancement' ); ?></h3>

                    </div><!-- .header -->
                    <div class="content">
                        <ul class="catchp-lists">
                            <li>
                                <strong><?php esc_html_e( 'Lightweight', 'header-enhancement' ); ?></strong>
                                <p><?php esc_html_e( 'It is extremely lightweight. You do not need to worry about it affecting the space and speed of your website.', 'header-enhancement' ); ?></p>
                            </li>

                            <li>
                                <strong><?php esc_html_e( 'Responsive Design', 'header-enhancement' ); ?></strong>
                                <p><?php esc_html_e( 'One of the key features of our plugins is that your website will magically respond and adapt to different screen sizes delivering an optimized design for iPhones, iPads, and other mobile devices. No longer will you need to zoom and scroll around when browsing on your mobile phone.', 'header-enhancement' ); ?></p>
                            </li>

                            <li>
                                <strong><?php esc_html_e( 'Compatible with all WordPress Themes that Supports Header Media', 'header-enhancement' ); ?></strong>
                                <p><?php esc_html_e( 'Our new Header Enhancement plugin has been crafted in a way that supports all the WordPress themes that includes the Header Media feature. Also, the plugin is completely compatible with Gutenberg as well.', 'header-enhancement' ); ?></p>
                            </li>

                            <li>
                                <strong><?php esc_html_e( 'Incredible Support', 'header-enhancement' ); ?></strong>
                                <p><?php esc_html_e( 'We have a great line of support team and support documentation. You do not need to worry about how to use the plugins we provide, just refer to our Tech Support Forum. Further, if you need to do advanced customization to your website, you can always hire our theme customizer!', 'header-enhancement' ); ?></p>
                            </li>
                        </ul>
                    </div><!-- .content -->
                </div><!-- content-wrapper -->
            </div> <!-- Featured -->

            <div id="premium-extensions" class="wpcatchtab  save">

                <div class="about-text">
                    <h2><?php esc_html_e( 'Get Header Enhancement Pro -', 'header-enhancement' ); ?> <a href="https://catchplugins.com/plugins/header-enhancement/" target="_blank"><?php esc_html_e( 'Get It Here!', 'header-enhancement' ); ?></a></h2>
                </div>

                <div class="content-wrapper">
                    <div class="header">
                        <h3><?php esc_html_e( 'Compare Table', 'header-enhancement' ); ?></h3>
                    </div><!-- .header -->
                    <div class="content">

                        <table class="widefat fixed striped posts">
                            <thead>
                                <tr>
                                    <th id="title" class="manage-column column-title column-primary"><?php esc_html_e( 'Features', 'header-enhancement' ); ?></th>
                                    <th id="free" class="manage-column column-free"><?php esc_html_e( 'Free', 'header-enhancement' ); ?></th>
                                    <th id="pro" class="manage-column column-pro"><?php esc_html_e( 'Pro', 'header-enhancement' ); ?></th>
                                </tr>
                            </thead>

                            <tbody id="the-list" class="ui-sortable">
                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Super Easy Setup', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Lightweight', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Sound in header video', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Header video on small devices', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Compatible with all WordPress Themes that Supports Header Media', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Toggle Autoplay', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Toggle Sound', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Toggle Loop', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Toogle display on small devices', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                                <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                    <td>
                                        <strong><?php esc_html_e( 'Max video size upto 500MB', 'header-enhancement' ); ?></strong>
                                    </td>
                                    <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                    <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                </tr>

                            </tbody>

                        </table>

                    </div><!-- .content -->
                </div><!-- content-wrapper -->
            </div>

        </div><!-- .catchp_widget_settings -->


        <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/sidebar.php'; ?>
    </div> <!-- .catchp-content-wrapper -->

    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/footer.php'; ?>
</div><!-- .wrap -->
