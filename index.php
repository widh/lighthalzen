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
    <h1>Todo</h1><p>1. 상단 메뉴 드롭다운 디자인</p><p>2. 모두 펼치기 기능 구현</p><p>3. 버튼 속 메뉴 구현</p><p>4. 플로팅 메뉴 구현</p><p>5. 반응형 테스트</p><p>6. 초기 로드 시 Transition Off</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <?php get_footer(); ?>
</body>
</html>
