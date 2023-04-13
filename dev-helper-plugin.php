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

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if (!defined('DHP_VER')) {
    define('DH_PLUGIN_VER', '1.0.0');
}

if (!defined('PLUGIN_NAME')) {
    define('PLUGIN_NAME', 'DEV_HELPER_PLUGIN');
}

if (!defined('PLUGIN_DOMAIN')) {
    define('PLUGIN_DOMAIN', 'DHP');
}

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

function pluginprefix_function_to_run()
{

}

if (!class_exists('MAIN_PLUGIN_CLASS')) {
    class MAIN_PLUGIN_CLASS
    {
        /** @var string The plugin version number */
        var $version = '5.7.7';

        /** @var array The plugin settings array */
        var $settings = array();

        /** @var array The plugin data array */
        var $data = array();

        /** @var array Storage for class instances */
        var $instances = array();


        /**
         * This is our constructor
         *
         * @return void
         */
        private function __construct()
        {
            // back end
            add_action('plugins_loaded', array($this, 'textdomain'));
            add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
            add_action('do_meta_boxes', array($this, 'create_metaboxes'), 10, 2);
            add_action('save_post', array($this, 'save_custom_meta'), 1);

            // front end
            add_action('wp_enqueue_scripts', array($this, 'front_scripts'), 10);
            add_filter('comment_form_defaults', array($this, 'custom_notes_filter'));
        }

        /**
         * If an instance exists, this returns it.  If not, it creates one and
         * retuns it.
         *
         * @return MAIN_PLUGIN_CLASS_Notes
         */

        public static function getInstance() {
            if ( !self::$instance )
                self::$instance = new self;
            return self::$instance;
        }

        /**
         * load textdomain
         *
         * @return void
         */

        public function textdomain() {

            load_plugin_textdomain( PLUGIN_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        }

        /**
         * Admin styles
         *
         * @return void
         */

        public function admin_scripts() {

            $types = $this->get_post_types();

            $screen	= get_current_screen();

            if ( in_array( $screen->post_type , $types ) ) :

                wp_enqueue_style( 'wpcmn-admin', plugins_url('lib/css/admin.css', __FILE__), array(), WPCMN_VER, 'all' );

            endif;

        }


    }
}

// Instantiate our class
$MAIN_PLUGIN_OBJECT = MAIN_PLUGIN_CLASS::getInstance();