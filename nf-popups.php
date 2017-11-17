<?php if (! defined( 'ABSPATH' )) {
    exit;
}

/*
 * Plugin Name: Popup Addon for Ninja Forms
 * Plugin URI: http://webholics.org
 * Description: Open Ninja Forms in beautiful Popups
 * Version: 3.1.1
 * Author: WebHolics
 * Text Domain: nf-popup
 *
 * Copyright 2017 WebHolics.
 */

define( "NF_POPUPS_URL", plugins_url()."/".basename( dirname( __FILE__ ) ) );
define( "NF_POPUPS_DIR_URL", WP_PLUGIN_DIR."/".basename( dirname( __FILE__ ) ) );

require_once NF_POPUPS_DIR_URL.'/inc/admin/class-nf-popups-postype.php';
require_once NF_POPUPS_DIR_URL.'/inc/admin/class-nf-popups-settings-metabox.php';
require_once NF_POPUPS_DIR_URL.'/inc/admin/class-nf-popups-customizer.php';
require_once NF_POPUPS_DIR_URL.'/inc/shortcode.php';
   /**
     * Enqueue scripts
     *
     * @param string $handle Script name
     * @param string $src Script url
     * @param array $deps (optional) Array of script names on which this script depends
     * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
     * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
     */
function nf_popups_scripts(){

    wp_enqueue_style('magnific-popup', NF_POPUPS_URL.'/css/magnific-popup.css');
    wp_enqueue_script( 'magnific-popup', NF_POPUPS_URL.'/js/magnific-popup.js', array( 'jquery' ), false, false);
}

add_action( 'wp_enqueue_scripts', 'nf_popups_scripts' );

function nf_popups_admin_scripts(){
    wp_enqueue_script( 'nf-popups-admin', NF_POPUPS_URL.'/js/admin.js', array( 'jquery' ), false, false );
}

add_action( 'admin_enqueue_scripts', 'nf_popups_admin_scripts' );
