<?php

/**
 * Provide a admin area dashboard view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://catchplugins.com
 * @since      1.0.0
 *
 * @package    Header_Enhancement
 * @subpackage Header_Enhancement/partials
 */
?>

<div id="header-enhancement" class="header-enhancement-main">
    <div class="content-wrapper">
        <div class="header">
            <h2><?php esc_html_e( 'Dashboard', 'header-enhancement' ); ?></h2>
        </div> <!-- .Header -->
        <div class="content">
            <p><?php esc_html_e( 'Header Enhancement is a simple yet extremely handy WordPress plugin to enhance your custom header video. The plugin is for those who’re trying to showcase the best in their header section with their communicative videos. It is completely free of cost and comes with powerful features. With the plugin installed and activated, you can easily add the video you want in your header and that too with sound effects. Also, not to forget, your header video will be displayed elegantly on mobile devices as well. A header video with sound and full support for small screen sizes, what more could you ask for? Set a header image, just for a backup if something goes wrong with your header video at times. Flaunt the best in you through your expressive header video and make your website of any kind engaging. The features you would get in Header Enhancement are Sound Support and Mobile Friendliness - features your header video needs to catch the visitors’ eyes. You can either upload your local video or paste the YouTube URL of the video. Either way, your header video will be displayed elegantly across all screen sizes, even on the mobile devices.', 'header-enhancement' ); ?>
            </p>
            <?php
                $customizer_link = add_query_arg( array(
                        'autofocus[section]' => 'header_image',
                    ),
                    admin_url('customize.php')
                );

                $settings_link = '<a href="' . esc_url( $customizer_link ) . '">' .esc_html__( 'Here', 'header-enhancement' ) . '</a>';
            ?>
            <p>
                <?php esc_html_e( 'You can add Header Video from the link', 'header-enhancement' ); echo ' ' . $settings_link; ?>
            </p>
        </div><!-- .content -->
    </div> <!-- .content-wrapper -->
</div> <!-- Main Content-->
