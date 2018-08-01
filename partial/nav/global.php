<?php
/**
 * Global Navigation Bar
 *
 * The menu bar of top of the page.
 *
 * @todo Implement Submenu
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

            // Display only 1st menu
            if ($object->menu_item_parent !== '0') :
                return;
            endif;

            // If proper translation does not exists
            if (now_lang() !== "ko" && $object->title == _s($object->title)) :
                if (now_lang() === "sv") :
                    $menu_title = strtolower(_gs($object->title));
                else:
                    $menu_title = _gs($object->title);
                endif;
            // If proper translation exists or Korean
            else :
                $menu_title = $object->title;
            endif;

            $output .= "<li><a".($object->current ? " class='now'" : "")." href='".$object->url."'>".$menu_title;

        }
        function end_el(&$output, $object, $depth = 0, $args = array()) {

            $output .= "</a></li>";

        }

        // HACK Not used in this context, but just for safety
        function start_lvl(&$output, $depth = 0, $args = array()) {}
        function end_lvl(&$output, $depth = 0, $args = array()) {}

    }

    wp_nav_menu(
        array(

            'menu' => 'top',
            'container' => 'nav',
            'container_id' => 'nav',
            'container_class' => 'navigator',
            'depth' => 0,
            'fallback_cb' => false,
            'walker' => new I18nWalker()

        )
    );

?>
