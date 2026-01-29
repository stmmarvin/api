<?php
// Add Getstart admin notice
function online_documentation_admin_notice() { 
    global $online_documentation_pagenow;
    $online_documentation_theme_args      = wp_get_theme();
    $online_documentation_meta            = get_option( 'online_documentation_admin_notice' );
    $online_documentation_name            = $online_documentation_theme_args->__get( 'Name' );
    $online_documentation_current_screen  = get_current_screen();

    if( !$online_documentation_meta ){
        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } if($online_documentation_current_screen->base != 'appearance_page_online-documentation-guide-page' && $online_documentation_current_screen->id != 'appearance_page_online-documentation-info' && $online_documentation_current_screen->base != 'toplevel_page_cretats-theme-showcase' ) { ?>
        <div class="notice notice-success is-dismissible welcome-notice">
            <div class="notice-row">
                <div class="notice-text">
                    <p class="welcome-text1"><?php esc_html_e( '🎉 Welcome to VW Themes,', 'online-documentation' ); ?></p>
                    <p class="welcome-text2"><?php esc_html_e( 'You are now using the Online Documentation, a beautifully designed theme to kickstart your website.', 'online-documentation' ); ?></p>
                    <p class="welcome-text3"><?php esc_html_e( 'To help you get started quickly, use the options below:', 'online-documentation' ); ?></p>

                    <span class="import-btn">
                        <a href="javascript:void(0);" id="install-activate-button" class="button admin-button info-button">
                           <?php echo __('GET STARTED', 'online-documentation'); ?>
                        </a>
                        <script type="text/javascript">
                            document.getElementById('install-activate-button').addEventListener('click', function () {
                                const online_documentation_button = this;
                                const online_documentation_redirectUrl = '<?php echo esc_url(admin_url("themes.php?page=online-documentation-info")); ?>';
                                // First, check if plugin is already active
                                jQuery.post(ajaxurl, { action: 'check_plugin_activation' }, function (response) {
                                    if (response.success && response.data.active) {
                                        // Plugin already active — just redirect
                                        window.location.href = online_documentation_redirectUrl;
                                    } else {
                                        // Show Installing & Activating only if not already active
                                        online_documentation_button.textContent = 'Installing & Activating...';

                                        jQuery.post(ajaxurl, {
                                            action: 'install_and_activate_required_plugin',
                                            nonce: '<?php echo wp_create_nonce("install_activate_nonce"); ?>'
                                        }, function (response) {
                                            if (response.success) {
                                                window.location.href = online_documentation_redirectUrl;
                                            } else {
                                                alert('Failed to activate the plugin.');
                                                online_documentation_button.textContent = 'Try Again';
                                            }
                                        });
                                    }
                                });
                            });
                        </script>
                    </span>

                    <span class="demo-btn">
                        <a href="https://www.vwthemes.net/online-documentation-pro/" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'VIEW DEMO', 'online-documentation' ); ?>
                        </a>
                    </span>

                    <span class="upgrade-btn">
                        <a href="https://www.vwthemes.com/products/documentation-wordpress-theme" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'UPGRADE TO PRO', 'online-documentation' ); ?>
                        </a>
                    </span>

                    <span class="bundle-btn">
                        <a href="https://www.vwthemes.com/products/wp-theme-bundle" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'BUNDLE OF 400+ THEMES', 'online-documentation' ); ?>
                        </a>
                    </span>
                </div>

                <div class="notice-img1">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/arrow-notice.png' ); ?>" width="180" alt="<?php esc_attr_e( 'Online Documentation', 'online-documentation' ); ?>" />
                </div>

                <div class="notice-img2">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bundle-notice.png' ); ?>" width="180" alt="<?php esc_attr_e( 'Online Documentation', 'online-documentation' ); ?>" />
                </div>
            </div>
        </div>
         <?php

    }?>
        <?php

    }
}

add_action( 'admin_notices', 'online_documentation_admin_notice' );

if( ! function_exists( 'online_documentation_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function online_documentation_update_admin_notice(){
    if ( isset( $_GET['online_documentation_admin_notice'] ) && $_GET['online_documentation_admin_notice'] = '1' ) {
        update_option( 'online_documentation_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'online_documentation_update_admin_notice' );

//After Switch theme function
add_action('after_switch_theme', 'online_documentation_getstart_setup_options');
function online_documentation_getstart_setup_options () {
    update_option('online_documentation_admin_notice', FALSE );
}

