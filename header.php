<?php
/**
 * Template for <header> tag
 *
 * This <header> includes site logo, global navigation bar, and top slider.
 *
 * @todo Implement slider
 * @todo Implement search & translate button
 * @todo Implement i18n in this page
 * @todo Iconaization of button box
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
?>
<header id="top">
    <div class="identity">
        <a href="<?php bloginfo('wpurl'); ?>" target="_self">
            <img src="<?php bloginfo('template_url'); ?>/resource/identity@top.png" alt="<?php _t('CITE Identity'); ?>">
        </a>
    </div>
    <?php get_template_part('partial/nav/global'); ?>
    <div class="button-box">
        <button class="search" href=""><a href=""><img src="" alt="<?php _t("Search"); ?>"></a></button>
        <button class="translate" href=""><a href=""><span><?php _t("한글 보기"); ?></span></a></button>
    </div>
    <?php get_template_part('partial/slider/top'); ?>
</header>
