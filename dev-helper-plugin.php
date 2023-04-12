<?php

/*
 * Plugin Name:       Dev Helper Plugin
 * Plugin URI:        https://wpforpro.com/plugins/my-plugins/
 * Description:       Plugin that is meant to help in project creation/administration
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Josanu Andrei
 * Author URI:        https://josanua.github.io/mycv/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       dev-helper-plugin
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('PLUGIN_NAME','DEV_HELPER_PLUGIN');

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_VERSION', '1.0.0' );

register_activation_hook(
    __FILE__,
    'pluginprefix_function_to_run'
);

register_deactivation_hook(
    __FILE__,
    'pluginprefix_function_to_run'
);

register_uninstall_hook(
    __FILE__,
    'pluginprefix_function_to_run'
);

function pluginprefix_function_to_run() {

}

if( ! class_exists('PLUGIN_CLASS') ) {
    class PLUGIN_CLASS {
        /** @var string The plugin version number */
        var $version = '5.7.7';

        /** @var array The plugin settings array */
        var $settings = array();

        /** @var array The plugin data array */
        var $data = array();

        /** @var array Storage for class instances */
        var $instances = array();



    }

}