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

// If not localized path, redirect!
if (!is_localized_path()) {

    $now_url = get_parsed_url();
    $now_url['path'] = localize_path();

    header("Location: ".get_site_url().build_url($now_url, get_parsed_query()), true, 301);
    die();

}

// If search in non-search page, redirect!
if (isset($_GET['s']) && strpos($_SERVER['REQUEST_URI'], "/?s=") !== 3) {

    header("Location: ".get_site_url()."/".now_lang()."/?s=".$_GET['s'], true, 301);
    die();

}

$is_front = is_front();

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
    <header id="top"<?php if (!$is_front) { echo ' class="sub"'; } ?>><?php

        // Insert common part first
        get_template_part('partial/header/common');

        // Two cases: Mainpage vs Subpage
        if ($is_front):
            get_template_part('partial/header/main');
        else:
            get_template_part('partial/header/sub');
        endif;

    ?></header>
    <noscript>
        <div class="nojs-disclaimer">
            <h3><?php _t("JavaScript 비활성화 알림"); ?></h3>
            <p><?php _t("JavaScript가 비활성화되어 있습니다. 일부 브라우저에서 페이지 표시에 문제가 생길 수 있습니다."); ?></p>
        </div>
    </noscript>
    <main id="content"><?php

        get_template_part('partial/main/content', get_now_type());

    ?></main>
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
