<?php
/**
 * Template for <header> tag
 *
 * This <header> includes site logo, global navigation bar, and top slider.
 *
 * @todo Implement slider
 * @todo Implement search
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    // Save template_url for less bloginfo() call
    $template_url = get_bloginfo('template_url');

    // Calculate #top > div.button-box > button.language > a[href]
    $parsed_url = parse_url($_SERVER['REQUEST_URI']);
    parse_str($_SERVER['QUERY_STRING'], $parsed_query);
    $parsed_query['lang'] = opp_lang();
    $parsed_url['query'] = http_build_query($parsed_query);
    $chlang_url = http_build_url($parsed_url);

    // Pre translation
    $chlang = _s('English');
    $search = _s('검색');
    $menu = _s('메뉴');

?>
<header id="top">
    <script>Rm.d.prevSlide="<?php _t('이전 슬라이드'); ?>";Rm.d.nextSlide="<?php _t('다음 슬라이드'); ?>";</script>
    <div class="identity">
        <a href="<?php bloginfo('wpurl'); ?>" target="_self">
            <img class="normal" src="<?php echo $template_url; ?>/image/identity@top.png" alt="<?php _t('창의IT융합공학과 로고'); ?>">
            <img class="float" src="<?php echo $template_url; ?>/image/identity@top.png" alt="<?php _t('창의IT융합공학과 로고'); ?>">
        </a>
    </div>
    <?php get_template_part('partial/nav/global'); ?>
    <div id="func" class="button-box">
        <button id="bbox-language" class="language no-label" tabindex="-1" title="<?php echo $chlang; ?>">
            <a href="<?php echo $chlang_url; ?>" tabIndex="<?php echo tab_index(); ?>">
                <?php get_template_part('image/'.opp_lang().'@top'); ?>
                <span><?php echo $chlang; ?></span>
            </a>
        </button>
        <button id="bbox-search" class="search" tabindex="-1" title="<?php echo $search; ?>">
            <a href="" tabIndex="<?php echo tab_index(); ?>">
                <?php get_template_part('image/search@top'); ?>
                <span><?php echo $search; ?></span>
            </a>
        </button>
        <button id="bbox-menu" class="menu" tabindex="-1" title="<?php echo $menu; ?>">
            <a href="#nav" tabIndex="<?php echo tab_index(); ?>">
                <?php get_template_part('image/menu@top'); ?>
                <span><?php echo $menu; ?></span>
            </a>
        </button>
    </div>
    <?php get_template_part('partial/slider/top'); ?>
    <?PHP get_template_part('partial/search/top'); ?>
</header>
