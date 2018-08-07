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

    get_menu(
        "top",
        array(

            'id' => 'nav',
            'class' => 'navigator',
            'google' => true,
            'echo' => true,
            'depth' => 3,
            'before' => '<noscript><a class="close" href="#func">&times;</a></noscript>'

        )
    );

?>
