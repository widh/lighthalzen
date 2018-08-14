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

if (!(is_page() && get_the_title() == "search") && (have_posts() == false || (get_the_title() == "404"))) :

?>
<div class="header not-found">
<style>header#top.sub>div.header{background-image:url('<?php echo $template_url; ?>/image/404.jpg')}</style>
<h1>404 Not Found</h1>
</div>
<?php elseif (is_category()) : ?>
<div class="header">
<style>header#top.sub>div.header{background-image:url('<?php echo (isset($hou) ? $hou : $template_url."/image/page.jpg") ?>')}</style>
<h1><?php echo get_post_type();#the_title(); ?></h1>
</div>
<?php else : ?>
<div class="header">
<style>header#top.sub>div.header{background-image:url('<?php echo (isset($hou) ? $hou : $template_url."/image/page.jpg") ?>')}</style>
<h1><?php echo get_post_type();#the_title(); ?></h1>
</div>
<?php endif; ?>
