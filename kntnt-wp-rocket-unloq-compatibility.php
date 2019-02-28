<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt compatibility plugin for WP-Rocket and Unloq
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Exclude Unloq's JS to be cached by WP-Rocket.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') || die;

add_filter('rocket_minify_excluded_external_js', function ($external_js) {

    $wp_dir = rtrim(strtr(ABSPATH, '\\', '/'), '/');
    $site_dir = strtr($_SERVER['DOCUMENT_ROOT'], '\\', '/');
    $wp_dir_rel_site = substr($wp_dir, strlen($site_dir));
    $external_js[] = "$wp_dir_rel_site/wp-content/plugins/unloq/vendors/ui/js/login-card.js";
        
    return $external_js;

});
