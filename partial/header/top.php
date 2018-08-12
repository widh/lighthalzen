<?php
if (!(is_page() && get_the_title() == "search") && (have_posts() == false || (get_the_title() == "404"))) : ?>
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
<?php endif; ?>
