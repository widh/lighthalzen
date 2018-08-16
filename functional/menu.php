<?php
/**
 * Lighthalzen menu generator
 *
 * Because wp_nav_menu() does not operates as expected, custom menu genertor is here.
 *
 * @package Lighthalzen
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
     *      'before' => (string) additional HTML in position of ::before (default: (empty))
     *      'after' => (string) additional HTML in position of ::after (default: (empty))
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

        if (isset($args['before']))
            $html .= $args['before'];

        // Get menu from option page
        $menu = json_decode(stripslashes(get_option('ltz-top-menu')));
        $items = array();
        foreach ($menu as $item)
            array_push($items, json_decode($item));

        // Prepare to depth calculation
        $max_depth = isset($args['depth']) ? ($args['depth'] === 0 ? 100 : $args['depth']) : 100;
        $before_depth = -1;

        if (count($items) > 0) {

            foreach ($items as &$item) {

                // Calculate depth
                $depth = $item[2]->depth;

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
                    if (now_lang() !== "ko")
                        $title = $item[1]->en;
                    else
                        $title = $item[1]->ko;

                    if (!isset($item[2]->url))
                        $item[2]->url = "#nopenope";

                    // THE PARTY OF <li>s
                    $html .=
                        "<a href='".$item[2]->url."' tabindex='".tab_index()."'>".
                            $title.
                        "</a>"
                        ;

                    // Save depth
                    $before_depth = $depth;

                }

            }

            $html .= "</li></ul>";

        }

        if (isset($args['after']))
            $html .= $args['after'];

        if (!isset($args['echo']) || $args['echo'] === true)
            echo $html."</nav>";

        return $html."</nav>";

    }

?>
