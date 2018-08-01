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

    require __DIR__.'/../vendor/autoload.php';
    $ko2en = new Stichoza\GoogleTranslate\TranslateClient('ko', 'en');

    // Export to text (echo)
    function _t($text) { return _e($text, 'lighthalzen'); }

    // Export to string (php)
    function _s($text) { return __($text, 'lighthalzen'); }

    // Export to text with Google Translation (echo)
    function _gt($text) { global $ko2en; echo $ko2en->translate($text); }

    // Export to text with Google Translation (php)
    function _gs($text) { global $ko2en; return $ko2en->translate($text); }

    // Parse language configuration
    function parse_lang($lang) {

        // NOTE
        // if there exists "?lang" parameter on GET request, follow it.
        // else if it is in admin panel, follow site language.
        // else, follow "Accept-Languages" header from browser.
        if (isset($_GET['lang'])) :
            return $_GET['lang'];
        elseif (strpos(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/wp-admin/") !== 0) :
            return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        else:
            return $lang;
        endif;

    }

    // Get language of now
    function now_lang($lang) {

        $lang = parse_lang($lang);

        if (strpos($lang, "ko") === 0) :
            return "ko";
        elseif (strpos($lang, "doge") === 0) :
            return "sv";
        else :
            return "en";
        endif;

    }

    // Get opposite language of now
    function opp_lang($lang) {

        $lang = parse_lang($lang);

        if (strpos($lang, "en") === 0) :
            return "ko";
        else :
            return "en";
        endif;

    }

?>
