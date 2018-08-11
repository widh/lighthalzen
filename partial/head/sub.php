<?php
/**
 * The content of <head> tag at non-main page.
 *
 * This uses WordPress post information rather than specific strings.
 *
 * @todo Make banner.png and put it to static directory.
 * @todo Check for excerpt making process. For now, it's blank.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    $title = get_the_title()." - "._s('창의IT융합공학과');
    $description = get_the_excerpt();
    $thumbnail = get_the_post_thumbnail_url(null, array(1200, 628));

?>
<meta name="description" content="<?php echo $description; ?>">
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:url" content="<?php the_permalink(); ?>">
<meta property="og:image" content="<?php ($thumbnail) ? print($thumbnail) : print(get_bloginfo('template_url').'/static/banner.png'); ?>">
<meta property="og:description" content="<?php echo $description; ?>">
<title><?php echo $title; ?></title>
