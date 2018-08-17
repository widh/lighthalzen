<?php
/**
 * Top header background
 *
 * This includes <h1> and background of top header of non-main pages
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th), Seungwon Jung (CiTE 5th)
 * @copyright Yuoa (Jio Gim), Seungwon Jung
 *
**/

$template_url = get_bloginfo('template_url');

switch (get_now_type()): ?>
<?php case "404" : ?>
<div class="header not-found">
<style>header#top.sub>div.header{background-image:url('<?php echo $template_url; ?>/image/404.jpg')}</style>
<h1>404 Not Found</h1>
</div>
<?php break; case "search" : ?>
<div class="header search">
<style>header#top.sub>div.header{background-image:url('<?php echo $template_url; ?>/image/search.jpg')}</style>
<h1><?php _t("검색"); ?></h1>
</div>
<?php break; case "page" : ?>
<div class="header page">
<style>header#top.sub>div.header{background-image:url('<?php echo (isset($hou) ? $hou : $template_url."/image/page.jpg") ?>')}</style>
<h1>Page: <?php the_title(); ?></h1>
</div>
<?php break; case "category" : ?>
<div class="header category">
<style>header#top.sub>div.header{background-image:url('<?php echo (isset($hou) ? $hou : $template_url."/image/page.jpg") ?>')}</style>
<h1>Category: <?php #the_title(); ?></h1>
</div>
<?php break; case "post" : ?>
<div class="header post">
<style>header#top.sub>div.header{background-image:url('<?php echo (isset($hou) ? $hou : $template_url."/image/page.jpg") ?>')}</style>
<h1>Post: <?php the_title(); ?></h1>
</div>
<?php endswitch; ?>
