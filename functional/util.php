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

        // http_build_url() for no PECL fallback
        if (!function_exists('http_build_url')) {

            define('HTTP_URL_REPLACE', 1);              // Replace every part of the first URL when there's one of the second URL
            define('HTTP_URL_JOIN_PATH', 2);            // Join relative paths
            define('HTTP_URL_JOIN_QUERY', 4);           // Join query strings
            define('HTTP_URL_STRIP_USER', 8);           // Strip any user authentication information
            define('HTTP_URL_STRIP_PASS', 16);          // Strip any password authentication    information
            define('HTTP_URL_STRIP_AUTH', 32);          // Strip any authentication information
            define('HTTP_URL_STRIP_PORT', 64);          // Strip explicit port numbers
            define('HTTP_URL_STRIP_PATH', 128);         // Strip complete path
            define('HTTP_URL_STRIP_QUERY', 256);        // Strip query string
            define('HTTP_URL_STRIP_FRAGMENT', 512);     // Strip any fragments (#identifier)
            define('HTTP_URL_STRIP_ALL', 1024);         // Strip anything but scheme and host

            // Build an URL
            // The parts of the second URL will be merged into the first according to the flags argument.
            //
            // @param   mixed           (Part(s) of) an URL in form of a string or associative array like parse_url() returns
            // @param   mixed           Same as the first argument
            // @param   int             A bitmask of binary or'ed HTTP_URL constants (Optional)HTTP_URL_REPLACE is the default
            // @param   array           If set, it will be filled with the parts of the composed url like parse_url() would return
            function http_build_url($url, $parts=array(), $flags=HTTP_URL_REPLACE, &$new_url=false) {

                $keys = array('user','pass','port','path','query','fragment');

                if ($flags & HTTP_URL_STRIP_ALL) {

                    // HTTP_URL_STRIP_ALL becomes all the HTTP_URL_STRIP_Xs
                    $flags |= HTTP_URL_STRIP_USER;
                    $flags |= HTTP_URL_STRIP_PASS;
                    $flags |= HTTP_URL_STRIP_PORT;
                    $flags |= HTTP_URL_STRIP_PATH;
                    $flags |= HTTP_URL_STRIP_QUERY;
                    $flags |= HTTP_URL_STRIP_FRAGMENT;
                } else if ($flags & HTTP_URL_STRIP_AUTH) {

                    // HTTP_URL_STRIP_AUTH becomes HTTP_URL_STRIP_USER and HTTP_URL_STRIP_PASS
                    $flags |= HTTP_URL_STRIP_USER;
                    $flags |= HTTP_URL_STRIP_PASS;
                }

                // Parse the original URL
                // - Suggestion by Sayed Ahad Abbas
                //   In case you send a parse_url array as input
                $parse_url = !is_array($url) ? parse_url($url) : $url;

                // Scheme and Host are always replaced
                if (isset($parts['scheme']))
                    $parse_url['scheme'] = $parts['scheme'];
                if (isset($parts['host']))
                    $parse_url['host'] = $parts['host'];

                // (If applicable) Replace the original URL with it's new parts
                if ($flags & HTTP_URL_REPLACE) {

                    foreach ($keys as $key) {
                        if (isset($parts[$key]))
                            $parse_url[$key] = $parts[$key];
                    }

                } else {

                    // Join the original URL path with the new path
                    if (isset($parts['path']) && ($flags & HTTP_URL_JOIN_PATH)) {

                        if (isset($parse_url['path']))
                            $parse_url['path'] = rtrim(str_replace(basename($parse_url['path']), '', $parse_url['path']), '/') . '/' . ltrim($parts['path'], '/');
                        else
                        $parse_url['path'] = $parts['path'];

                    }

                    // Join the original query string with the new query string
                    if (isset($parts['query']) && ($flags & HTTP_URL_JOIN_QUERY)) {

                        if (isset($parse_url['query']))
                            $parse_url['query'] .= '&' . $parts['query'];
                        else
                            $parse_url['query'] = $parts['query'];

                    }
                }

                // Strips all the applicable sections of the URL
                // Note: Scheme and Host are never stripped
                foreach ($keys as $key) {
                    if ($flags & (int)constant('HTTP_URL_STRIP_' . strtoupper($key)))
                        unset($parse_url[$key]);
                }

                $new_url = $parse_url;

                return
                    ((isset($parse_url['scheme'])) ? $parse_url['scheme'] . '://' : '')
                    .((isset($parse_url['user'])) ? $parse_url['user'] . ((isset($parse_url['pass'])) ? ':' . $parse_url['pass'] : '') .'@' : '')
                    .((isset($parse_url['host'])) ? $parse_url['host'] : '')
                    .((isset($parse_url['port'])) ? ':' . $parse_url['port'] : '')
                    .((isset($parse_url['path'])) ? $parse_url['path'] : '')
                    .((isset($parse_url['query'])) ? '?' . $parse_url['query'] : '')
                    .((isset($parse_url['fragment'])) ? '#' . $parse_url['fragment'] : '')
                ;
                
            }

        }

    }

?>
