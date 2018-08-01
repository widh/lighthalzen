<?php
/**
 * Lighthalzen var_dump wrapper
 *
 * This function var_dump and generates proper HTML debug modal layer.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    include "util.php";

    function dump($var, $title) {

        $dumpno = random_hex();

        // Print stylesheet
        echo '<style>.ltz-debug{display:none;position:fixed;z-index:100;padding-top:100px;left:0;top:0;width:100%;height:100%;overflow:auto;background:rgba(0,0,0,.4)}.ltz-debug-container{position:relative;background-color:white;margin:auto;padding:0;width:480px;box-shadow:0 0 5px rgba(0,0,0,.2);}.ltz-debug-title{margin:0;padding:2px 16px;background-color:#000737;color:white;}.ltz-debug-close{color:white;float:right;font-weight:bold;}.ltz-debug-close:hover,.ltz-debug-close:focus{text-decoration:underline;cursor:pointer;}.ltz-debug-dump{font-size:14px;margin:0;padding:20px 16px;}</style>';

        // Print structure tags
        echo "<div id='ltz-debug-".$dumpno."' class='ltz-debug'><div class='ltz-debug-container'><div class='ltz-debug-title'><span id='ltz-debug-close-".$dumpno."' class='ltz-debug-close'>&times;</span><h6>".$title."</h6></div><div class='ltz-debug-dump'><samp>".var_export($var, true)."</samp></div></div></div>";

        // Print script
        echo "<script>var ltz_".$dumpno." = document.getElementById('ltz-debug-".$dumpno."');document.getElementById('ltz-debug-close-".$dumpno."').onclick=function(){ltz_".$dumpno.".style.display='none'};window.onclick=function(e){if(e.target==ltz_".$dumpno."){ltz_".$dumpno.".style.display='none'}};ltz_".$dumpno.".style.display='block'</script>";

    }

?>
