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
    ?>
</head>
<body>
    <?php get_header(); ?>
    <span>창공이다</span>
    <?php get_footer(); ?>
</body>
</html>
