<?php
/**
 * Lighthalzen utils
 *
 * This function provides several useful functions for theme/theme development.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    if(!defined('LIGHTHALZEN_UTIL')) {
        define('LIGHTHALZEN_UTIL', true);

        // Random hex string generator
        function random_hex($bytes = 10) {

            return bin2hex(random_bytes($bytes));

        }

    }

?>
