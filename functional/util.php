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

        // Dump to HTML
        function dump(&$var, $title = "DEBUG") {

            $dumpno = random_hex();

            // Print structure tags
            echo "<div id='debug-".$dumpno."' class='debug-box'><div><div class='title'><span id='debug-close-".$dumpno."'>&times;</span><h6>".$title."</h6></div><div class='code'><pre>".htmlspecialchars(var_export($var, true), ENT_COMPAT | ENT_HTML5)."</pre></div></div></div>";

            // Print script
            echo "<script>var ltz_".$dumpno." = document.getElementById('debug-".$dumpno."');document.getElementById('debug-close-".$dumpno."').onclick=function(){ltz_".$dumpno.".style.display='none'};window.onclick=function(e){if(e.target==ltz_".$dumpno."){ltz_".$dumpno.".style.display='none'}};ltz_".$dumpno.".style.display='block'</script>";

        }

    }

?>
