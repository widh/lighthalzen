<?php
/**
 * Lighthalzen i18n wrapper
 *
 * This function wraps __() and _e() functions to _s() _t() functions for more simple
 * translation in theme code.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    function _t($text) {

        return _e($text, 'theme/lighthalzen');

    }

    function _s($text) {

        return __($text, 'theme/lighthalzen');

    }

?>
