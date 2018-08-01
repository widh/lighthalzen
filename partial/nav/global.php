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

    }

    $nav_raw = wp_nav_menu(
        array(

            'container' => 'nav',
            'container_id' => 'nav',
            'container_class' => 'navigator',
            'depth' => 0,
            'walker' => new I18nWalker(),
            'echo' => false

        )
    );

    dump($nav_raw);

?>
