<?php
/**
 * The content of <head> tag at main page.
 *
 * This includes several main-page-specified heads.
 *
 * @todo Make banner.png and put it to static directory.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    $title = _s('창의IT융합공학과');
    $description = _s('창의IT융합공학과 메인 페이지');

    $template_url = get_bloginfo('template_url');

?>
<meta name="description" content="<?php echo $description; ?>">
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:url" content="<?php the_permalink(); ?>">
<meta property="og:image" content="<?php echo $template_url; ?>/static/banner.png">
<meta property="og:description" content="<?php echo $description; ?>">
<title><?php echo $title; ?></title>
<script src="<?php echo $template_url; ?>/script/main.js"></script>
