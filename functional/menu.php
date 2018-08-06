<?php
/**
 * Lighthalzen menu generator
 *
 * Because wp_nav_menu() does not operates as expected, custom menu genertor is here.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    /**
     * Lighthalzen Menu Generator
     *
     * @param string $slug Menu location label (slug)
     * @param array $args Menu generation options
     *    $args = [
     *      'id'     => (string) [id] attribute of nav tag. (default: (empty))
     *      'class'  => (array|string) [class] attribute of nav tag. (default: (empty))
     *      'depth'  => (int) maximum depth. if 0, generate all depth. (default: 0)
     *      'echo'   => (boolean) whether echo & return or just return the result. (default: true)
     *      'google' => (boolean) whether use google translation or not. (default: false)
     *    ]
     *
     * @return string Returns menu HTML
     *
    **/
    function get_menu($slug, $args = array()) {

        // Generate outer <nav>
        $html = "<nav";

        if (isset($args['id']))
            $html .= " id='".$args['id']."'";

        if (isset($args['class']))
            if (is_string($args['class'])) :
                $html .= " class='".$args['class']."'";
            else :
                $html .= " class='".implode(' ', $args['class'])."'";
            endif;

        $html .= ">";

        // Check of the existance of menu, if not exists, return only <nav>
        $menus = get_nav_menu_locations();

        if (isset($menus[$slug])) {

            // Get menu variables to prepare repeatly generate each menu item
            $menu = get_term($menus[$slug]);
            $items = wp_get_nav_menu_items($menu->term_id);
            $max_depth = isset($args['depth']) ? ($args['depth'] === 0 ? 100 : $args['depth']) : 100;

            $depths = array('0' => 0);
            $before_depth = 0;
            $index = 1;

            if (count($items) > 0) {

                foreach ($items as &$item) {

                    // Calculate depth
                    if (!isset($depths[(string) $item->ID]))
                        $depths[(string) $item->ID] = $depths[$item->menu_item_parent] + 1;
                    $depth = $depths[(string) $item->ID];

                    // Make HTML of it
                    if ($depth > $max_depth)
                        continue;
                    else {

                        // Making wrapper
                        if ($before_depth < $depth)
                            $html .= "<ul><li>";
                        elseif ($before_depth > $depth) {

                            for($i = $before_depth - $depth; $i > 0; $i--)
                                $html .= "</li></ul>";

                            $html .= "</li><li>";

                        } else
                            $html .= "</li><li>";

                        // Get Title: If proper translation does not exists, translate it
                        $title = _s($item->title);
                        if (isset($args['google']) && $args['google'] && now_lang() !== "ko" && $item->title == $title) {

                            if (now_lang() === "sv") :
                                $title = strtolower(_gs($item->title));
                            else :
                                $title = _gs($item->title);
                            endif;

                        }

                        // THE PARTY OF <li>s
                        $html .=
                            "<a href='".$item->url."' tabindex='".$index."'>".
                                $title.
                            "</a>"
                            ;

                        // Save depth & tabindex++
                        $before_depth = $depth;
                        $index += 1;

                    }

                }

                $html .= "</li></ul>";

            }

        }

        if (!isset($args['echo']) || $args['echo'] === true)
            echo $html."</nav>";

        return $html."</nav>";

    }

?>
