<?php
/**
 * Common top header
 *
 * This includes site logo, global navigation bar and top button box.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

// Save template_url for less bloginfo() call
$template_url = get_bloginfo('template_url');

// Calculate #top > div.button-box > button.language > a[href]
$now_url = get_parsed_url();
$now_url['path'] = localize_path($now_url['path'], opp_lang());
$chlang_url = build_url($now_url, get_parsed_query());

// Pre translation
$chlang = _s('English');
$search = _s('검색');
$menu = _s('메뉴');

?>
<div class="identity">
    <a href="<?php bloginfo('wpurl'); ?>" target="_self">
        <?php get_template_part('image/identity/cite.'.(now_lang() === "ko" ? "ko" : "en")); ?>
    </a>
</div>
<?php get_template_part('partial/nav/global'); ?>
<div id="func" class="button-box">
    <button id="bbox-language" class="language no-label" tabindex="-1" title="<?php echo $chlang; ?>">
        <a href="<?php echo $chlang_url; ?>" tabIndex="<?php echo tab_index(); ?>">
            <?php get_template_part('image/icon/'.opp_lang()); ?>
            <span><?php echo $chlang; ?></span>
        </a>
    </button>
    <button id="bbox-search" class="search" tabindex="-1" title="<?php echo $search; ?>">
        <a href="#search" tabIndex="<?php echo tab_index(); ?>">
            <?php get_template_part('image/icon/search'); ?>
            <span><?php echo $search; ?></span>
        </a>
    </button>
    <button id="bbox-menu" class="menu" tabindex="-1" title="<?php echo $menu; ?>">
        <a href="#nav" tabIndex="<?php echo tab_index(); ?>">
            <?php get_template_part('image/icon/menu'); ?>
            <span><?php echo $menu; ?></span>
        </a>
    </button>
</div>
<?php get_template_part('partial/form/search', 'top'); ?>
