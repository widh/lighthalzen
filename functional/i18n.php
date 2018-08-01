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

    // Load google Translation
    require __DIR__.'/../vendor/autoload.php';
    $ko2en = new Stichoza\GoogleTranslate\TranslateClient('ko', 'en');

    // Cache language information for faster language processing
    $pLang = null;
    $nLang = null;
    $oLang = null;

    // Export to text (echo to HTML)
    function _t($text) { return _e($text, 'lighthalzen'); }

    // Export to string (php string)
    function _s($text) { return __($text, 'lighthalzen'); }

    // Export to text with Google Translation (echo to HTML)
    function _gt($text) {

        if (now_lang(get_locale()) !== "ko") :
            global $ko2en;
            echo $ko2en->translate($text);
        else :
            echo $text;
        endif;

    }

    // Export to text with Google Translation (php string)
    function _gs($text) {

        if (now_lang(get_locale()) !== "ko") :
            global $ko2en;
            return $ko2en->translate($text);
        else :
            return $text;
        endif;

    }

    // Parse language configuration
    function parse_lang($lang) {

        // NOTE
        // if there exists "?lang" parameter on GET request, follow it.
        // else if it is in admin panel, follow site language.
        // else, follow "Accept-Languages" header from browser.

        global $pLang;

        if ($pLang === null) {

            if (isset($_GET['lang'])) :
                $pLang = $_GET['lang'];
            elseif (strpos(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/wp-admin/") !== 0) :
                $pLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            else:
                $pLang = $lang;
            endif;

        }

        return $pLang;

    }

    // Get language of now
    function now_lang($lang) {

        global $nLang;

        if ($nLang === null) {

            $lang = parse_lang($lang);

            if (strpos($lang, "ko") === 0) :
                $nLang = "ko";
            elseif (strpos($lang, "doge") === 0) :
                $nLang = "sv";
            else :
                $nLang = "en";
            endif;

        }

        return $nLang;

    }

    // Get opposite language of now
    function opp_lang($lang) {

        global $oLang;

        if ($oLang === null) {

            $lang = parse_lang($lang);

            if (strpos($lang, "en") === 0) :
                $oLang = "ko";
            else :
                $oLang = "en";
            endif;

        }

        return $oLang;

    }

?>
