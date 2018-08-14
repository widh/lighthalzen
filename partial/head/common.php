<?php
/**
 * The common parts of <head> tag.
 *
 * This includes several <meta> tags and executes wp_head() function.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

$template_url = get_bloginfo('template_url');

?>
<meta charset="<?php bloginfo('charset') ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta name="theme-color" content="#000737">
<script src="<?php echo $template_url; ?>/script/bezier.min.js"></script>
<script src="<?php echo $template_url; ?>/script/common.js"></script>
<script src="<?php echo $template_url; ?>/script/compat.js"></script>
<script src="<?php echo $template_url; ?>/script/register.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo $template_url; ?>/script/h5s-print.min.js"></script>
<![endif]-->
<link href="<?php echo $template_url; ?>/style.css" rel="stylesheet">
<link href="<?php echo $template_url; ?>/favicon.ico" rel="shortcut icon" type="image/x-icon">
