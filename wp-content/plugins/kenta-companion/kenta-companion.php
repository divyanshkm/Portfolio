<?php

/**
 * Plugin Name:       Kenta Companion
 * Description:       Kenta Companion is an extension to the Kenta theme. It provides a lot of features and one-click demo import for Kenta Theme.
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Version:           1.0.4
 * Author:            WP Moose
 * Author URI:        https://www.wpmoose.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Elementor tested up to: 3.5
 * Text Domain:       kenta-companion
 *
 */
// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Defining plugin constants.
 *
 * @since 1.0.0
 */
define( 'KCMP_VERSION', '1.0.4' );
define( 'MIN_KENTA_VERSION', '1.0.2' );
define( 'KCMP_PLUGIN_FILE', __FILE__ );
define( 'KCMP_PLUGIN_PATH', trailingslashit( plugin_dir_path( KCMP_PLUGIN_FILE ) ) );
define( 'KCMP_PLUGIN_URL', trailingslashit( plugins_url( '/', KCMP_PLUGIN_FILE ) ) );
define( 'KCMP_ASSETS_PATH', KCMP_PLUGIN_PATH . 'assets/' );
define( 'KCMP_ASSETS_URL', KCMP_PLUGIN_URL . 'assets/' );
define( 'KCMP_DEMO_SITE_URL', 'https://kentatheme.com/' );

if ( function_exists( 'kenta_fs' ) ) {
    kenta_fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'kenta_fs' ) ) {
        // Create a helper function for easy SDK access.
        function kenta_fs()
        {
            global  $kenta_fs ;
            
            if ( !isset( $kenta_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $kenta_fs = fs_dynamic_init( array(
                    'id'             => '10804',
                    'slug'           => 'kenta-companion',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_64db37825bd0972890eb37821be91',
                    'is_premium'     => false,
                    'premium_suffix' => 'Premium',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug'    => 'kenta-companion',
                    'contact' => true,
                    'support' => true,
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $kenta_fs;
        }
        
        // Init Freemius.
        kenta_fs();
        // Signal that SDK was initiated.
        do_action( 'kenta_fs_loaded' );
    }
    
    /**
     * Including composer autoloader globally.
     *
     * @since 1.0.0
     */
    require_once KCMP_PLUGIN_PATH . 'vendor/autoload.php';
    /**
     * Run plugin after all others plugins
     *
     * @since 1.0.0
     */
    add_action( 'plugins_loaded', function () {
        \KentaCompanion\Core\Bootstrap::run();
    } );
}
