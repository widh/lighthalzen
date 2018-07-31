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

wp_nav_menu(
    array(

        'container' => 'nav',
        'container_id' => 'nav',
        'container_class' => 'navigator',
        'depth' => 0

    )
);

?>
