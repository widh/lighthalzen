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

        // Insert common part first
        get_template_part('partial/head/common');

        // Two cases: Mainpage vs Subpage
        if (is_front_page()) :
            get_template_part('partial/head/main');
        else:
            get_template_part('partial/head/sub');
        endif;

    ?>
</head>
<body id="begin">
    <div class="shortcut-box">
        <a href="#content" tabindex="<?php echo tab_index(); ?>"><?php _t("본문으로 바로가기"); ?></a>
    </div>
    <?php get_header(); ?>
    <noscript>
        <div class="js-disclaimer">
            <h3><?php _t("JavaScript 비활성화 알림"); ?></h3>
            <p><?php _t("JavaScript가 비활성화되어 있습니다. 일부 브라우저에서 페이지 표시에 문제가 생길 수 있습니다."); ?></p>
        </div>
    </noscript>
    <main id="content">
        <article>
            <?php while (have_posts()) {

                the_post();

                if (!is_front_page())
                    the_title('<h1>', '</h1>');

                the_content();

            } ?>
        </article>
    </main>
    <?php get_footer(); ?>
    <div id="go-top">
        <a href="#top"><?php _t("제일 위로"); ?></a>
    </div>
</body>
</html>
