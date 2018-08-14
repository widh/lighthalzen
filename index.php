<?php
/**
 * The main theme template file
 *
 * The main templates that includes DOCTYPE and html tag.
 * All other parts are included in 'partial' directory.
 *
 * @todo Add [role] and [aria].
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

$is_front = is_front_page();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><?php

    // Insert common part first
    get_template_part('partial/head/common');

    // Two cases: Mainpage vs Subpage
    if ($is_front):
        get_template_part('partial/head/main');
    else:
        get_template_part('partial/head/sub');
    endif;

?></head>
<body id="begin">
    <div class="shortcut-box">
        <a href="#content" tabindex="<?php echo tab_index(); ?>"><?php _t("본문으로 바로가기"); ?></a>
    </div>
    <header id="top"<?php if (!$is_front) echo ` class="sub"`; ?>><?php

        // Insert common part first
        get_template_part('partial/header/common');

        // Two cases: Mainpage vs Subpage
        if ($is_front):
            get_template_part('partial/header/main');
        else:
            get_template_part('partial/header/sub');
        endif;

        // Insert top search form
        get_template_part('partial/form/search', 'top');

    ?></header>
    <noscript>
        <div class="nojs-disclaimer">
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
    <footer id="bottom"><?php

        // Insert partners' section
        get_template_part('partial/footer/partners');

        // Insert site information
        get_template_part('partial/footer/info');

    ?></footer>
    <div id="go-top">
        <a href="#top"><?php _t("제일 위로"); ?></a>
    </div>
</body>
</html>
