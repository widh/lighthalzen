<?php
/**
 * The main theme template file
 *
 * The main templates that includes DOCTYPE and html tag.
 * All other parts are included in 'partial' directory.
 *
 * @todo Add [role] and [aria].
 * @todo Include shortcuts for screen reader.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php

        // Two cases: Mainpage vs Subpage
        if ( is_front_page() ) :
            get_template_part('partial/head/main');
        else:
            get_template_part('partial/head/sub');
        endif;

        // Insert common part at last
        get_template_part('partial/head/common');

    ?>
</head>
<body id="begin">
    <?php get_header(); ?>
    <span>Contents</span>
    <span><?php _gt("창의IT융합공학과"); _gt("<= 이 예시는 구글 번역의 단점을 보여줍니다.") ?></span>
    <?php get_footer(); ?>
</body>
</html>
