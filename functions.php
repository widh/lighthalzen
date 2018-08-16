<?php
/**
 * WordPress theme function file.
 *
 * This includes global functions and some preferences who let detailed theme options
 * to be displayed in WP theme control panel.
 *
 * @todo Capability disappears when restart php.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

// Enable error reporting
error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR);

// Is now debugging mode?
$debug = true;
function on_debug($s) { global $debug; if ($debug) { echo $s; } }

// Theme functions
include 'functional/util.php';
include 'functional/i18n.php';
include 'functional/menu.php';

// Theme optioons
include 'optional/top-slider.php';
include 'optional/top-menu.php';
include 'optional/partners.php';
include 'optional/others.php';

// Theme Capability
$admin = get_role('administrator');
$manager = get_role('cite-managers');

$admin->add_cap('lighthalzen_managers');
if (!is_null($manager)) :
    $manager->add_cap('lighthalzen_managers');
endif;

// Theme Setup
function lighthalzen_setup() {

    // I18n settings
    add_filter('locale', 'now_lang');
    load_theme_textdomain('lighthalzen', get_template_directory().'/linguistic');

}
add_action('after_setup_theme', 'lighthalzen_setup');

remove_action('wp_head', 'print_emoji_detection_script', 7);



?>
