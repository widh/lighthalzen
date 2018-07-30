<?php
/**
 * Lighthalzen -- Creative IT Engineering Theme
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 * @version 1.0.0
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
        if ( is_front_page() ) :
            print("<title>창공</title>");
        else:
            print("<title>낫창공</title>");
        endif;
        wp_head();
    ?>
</head>
<body>
    <?php get_header(); ?>
    <span>창공좆까</span>
    <?php get_footer(); ?>
</body>
</html>
