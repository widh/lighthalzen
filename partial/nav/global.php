<?php
/**
 * Global Navigation Bar
 *
 * The menu bar of top of the page.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    class I18nWalker extends Walker {

        var $db_fields = array (
            'parent' => 'parent',
            'id'     => 'id'
        );

        function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0) {

            dump($object, $object->title);

            $output .= "<li>".$object->title;

        }
        function end_el(&$output, $object, $depth = 0, $args = array()) {

            $output .= "</li>";

        }

        // HACK Not used in this context, but just for safety
        function start_lvl(&$output, $depth = 0, $args = array()) { $output .= "<ul>"; }
        function end_lvl(&$output, $depth = 0, $args = array()) { $output .= "</ul>"; }

    }

    $nav_raw = wp_nav_menu(
        array(

            'menu' => 'top',
            'container' => 'nav',
            'container_id' => 'nav',
            'container_class' => 'navigator',
            'depth' => 2,
            'fallback_cb' => false,
            'walker' => new I18nWalker(),
            'echo' => false

        )
    );

    dump($nav_raw);

?>
