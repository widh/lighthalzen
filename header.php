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
            <img src="<?php bloginfo('template_url'); ?>/resource/identity@top.png" alt="<?php _t('CITE Department Identity'); ?>">
        </a>
    </div>
    <?php get_template_part('partial/nav/global'); ?>
    <?php get_template_part('partial/slider/top'); ?>
    <div class="box">
        <button class="search">검색</button>
        <button class="translate">영어</button>
    </div>
</header>
