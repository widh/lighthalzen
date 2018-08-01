<?php
/**
 * Template for <header> tag
 *
 * This <header> includes site logo, global navigation bar, and top slider.
 *
 * @todo Implement slider
 * @todo Implement search
 * @todo Implement 2nd menu
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

?>
<header id="top">
    <div class="identity">
        <a href="<?php bloginfo('wpurl'); ?>" target="_self">
            <img src="<?php echo $template_url; ?>/resource/identity@top.png" alt="<?php _t('창의IT융합공학과 로고'); ?>">
        </a>
    </div>
    <?php get_template_part('partial/nav/global'); ?>
    <div class="button-box">
        <button class="search"><a href=""><img src="<?php echo $template_url; ?>/resource/search@top.png" alt="<?php _t('검색'); ?>"></a></button>
        <button class="language"><a href="<?php echo $chlang_url; ?>"><img src="<?php echo $template_url."/".opp_lang()."@top.png"; ?>" alt="<?php _t('English'); ?>"></a></button>
        <button class="menu invisible"><a href="#nav"><img src="<?php echo $template_url; ?>/resource/menu@top.png" alt="<?php _t('메뉴'); ?>"></a></button>
    </div>
    <?php get_template_part('partial/slider/top'); ?>
</header>
