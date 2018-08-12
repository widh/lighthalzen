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
<?php if (is_front_page()) : ?>
<header id="top">
<?php else: ?>
<header id="top" class="sub">
<?php endif; ?>
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
    <?php if (is_front_page()) : get_template_part('partial/slider/top');
          elseif (have_posts() == false || (is_page() && get_the_title() == "404")) : ?>
    <div class="header not-found">
        <style>header#top.sub>div.header{background-image:url('<?php echo $template_url; ?>/image/not-found@top.jpg')}</style>
        <h1>404 Not Found</h1>
    </div>
    <?php elseif (is_category()) : ?>
    <div class="header">
        <style>header#top.sub>div.header{background-image:url('<?php echo (isset($hou) ? $hou : $template_url."/image/page@top.jpg") ?>')}</style>
        <h1><?php echo get_post_type();#the_title(); ?></h1>
    </div>
    <?php else : ?>
    <div class="header">
        <style>header#top.sub>div.header{background-image:url('<?php echo (isset($hou) ? $hou : $template_url."/image/page@top.jpg") ?>')}</style>
        <h1><?php echo get_post_type();#the_title(); ?></h1>
    </div>
    <?php endif; get_template_part('partial/search/top'); ?>
</header>
