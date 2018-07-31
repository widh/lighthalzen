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

    include 'functional/i18n.php';

    function lighthalzen_setup () {

    	register_nav_menus(
            array(
    		    'top' => _s('상단 메뉴')
    	    )
        );

    }
    add_action('after_setup_theme', 'lighthalzen_setup');

    remove_action('wp_head', 'print_emoji_detection_script', 7);

?>
