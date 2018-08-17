<?php
/**
 * Lighthalzen utils
 *
 * This function provides several useful functions for theme/theme development.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

if(!defined('LIGHTHALZEN_UTIL')) {
    define('LIGHTHALZEN_UTIL', true);

    $tab_index_history = 0;

    // Tabindex generator
    function tab_index() {

        global $tab_index_history;
        $tab_index_history += 1;
        return $tab_index_history;

    }

    // Random hex string generator
    function random_hex($bytes = 10) {

        return bin2hex(random_bytes($bytes));

    }

    // Dump to HTML
    function dump(&$var, $title = "DEBUG") {

        $dumpno = random_hex();

        // Print structure tags
        echo "<div id='debug-".$dumpno."' class='debug-box'><div><div class='title'><span id='debug-close-".$dumpno."'>&times;</span><h6>".$title."</h6></div><div class='code'><pre>".htmlspecialchars(var_export($var, true), ENT_COMPAT | ENT_HTML5)."</pre></div></div></div>";

        // Print script
        echo "<script>var ltz_".$dumpno." = document.getElementById('debug-".$dumpno."');document.getElementById('debug-close-".$dumpno."').onclick=function(){ltz_".$dumpno.".style.display='none'};window.onclick=function(e){if(e.target==ltz_".$dumpno."){ltz_".$dumpno.".style.display='none'}};ltz_".$dumpno.".style.display='block'</script>";

    }

    // Make base64 encoded svg
    function svg64($svg) {

        return "data:image/svg+xml;base64,".base64_encode($svg);

    }

    // Calculate percentage
    function percent ($whole, $part) {

        return $part / $whole * 100;

    }

    // Give dummy data
    function get_dummy($type) {

        include __DIR__."/../dummy/".$type.".php";

        return $dummy;

    }

    // Give icon as base64
    function get_icon($name) {

        ob_start();

        include __DIR__."/../image/icon/".$name.".php";

        $original = ob_get_contents();

        ob_end_clean();

        return svg64($original);

    }
    
}

?>
