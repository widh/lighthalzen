<?php
/**
 * WordPress theme function file.
 *
 * This includes global functions and some preferences who let detailed theme options
 * to be displayed in WP theme control panel.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    // Theme functions
    include 'functional/util.php';
    include 'functional/i18n.php';

    // Theme Setup
    function lighthalzen_setup() {

        // I18n settings
        add_filter('locale', 'now_lang');
        load_theme_textdomain('lighthalzen', get_template_directory().'/i18n');

        // Menu acceptances
    	register_nav_menus(
            array(
    		    'top' => _s('Top Menu')
    	    )
        );

    }
    add_action('after_setup_theme', 'lighthalzen_setup');

    remove_action('wp_head', 'print_emoji_detection_script', 7);

?>
