<?php
/**
 * Top Slider
 *
 * Shows the most charming news of CITE.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

$items = get_dummy("top-slider");
$item_i = count($items);

$lang = (now_lang() === "ko") ? "ko" : "en";
$more = _s("더보기");

$template_url = get_bloginfo('template_url');

?>
<article class="slider">
    <script>
        Rm.d.prevSlide="<?php _t('이전 슬라이드'); ?>";
        Rm.d.nextSlide="<?php _t('다음 슬라이드'); ?>";
    </script>
    <script src="<?php echo $template_url; ?>/script/top-slider.js"></script>
    <style><?php

        for ($i = 0; $i < $item_i; $i++) {

            $whole = 10 * $item_i;

            // Print stylesheet for DOM
            echo 'section.slide[data-order="'.$i.'"]{background-image:url(';

            if (isset($items[$i]['background']))
                echo $items[$i]['background'];
            else
                echo $template_url."/image/page.jpg";

            echo ');animation:ts-'.$i.' '.$whole.'s ease infinite}';

            // Print stylesheet for animation
            $onetime = 10;
            if ($i === 0)
                echo '@keyframes ts-'.$i.
                    ' {0%{opacity:1;z-index:auto}'.
                    percent($whole, $onetime - 0.7).'%{opacity:1;z-index:auto}'.
                    percent($whole, $onetime).'%{opacity:0;z-index:auto}'.
                    percent($whole, $onetime + 0.0001).'%{opacity:0;z-index:-1}'.
                    percent($whole, $whole - 0.7001).'%{opacity:0;z-index:-1}'.
                    percent($whole, $whole - 0.7).'%{opacity:0;z-index:auto}'.
                    '100%{opacity:1;z-index:auto}}';
            else if ($i != $item_i - 1)
                echo '@keyframes ts-'.$i.
                    ' {0%{opacity:0;z-index:-1}'.
                    percent($whole, $onetime * $i - 0.7001).'%{opacity:0;z-index:-1}'.
                    percent($whole, $onetime * $i - 0.7000).'%{opacity:0;z-index:auto}'.
                    percent($whole, $onetime * $i).'%{opacity:1;z-index:auto}'.
                    percent($whole, $onetime * ($i + 1) - 0.7).'%{opacity:1;z-index:auto}'.
                    percent($whole, $onetime * ($i + 1) - 0.0001).'%{opacity:0;z-index:auto}'.
                    percent($whole, $onetime * ($i + 1)).'%{opacity:0;z-index:-1;}'.
                    '100%{opacity:0;z-index:-1;}}';
            else
                echo '@keyframes ts-'.$i.
                    ' {0%{opacity:0;z-index:-1}'.
                    percent($whole, $onetime * $i - 0.7001).'%{opacity:0;z-index:-1}'.
                    percent($whole, $onetime * $i - 0.7000).'%{opacity:0;z-index:auto}'.
                    percent($whole, $onetime * $i).'%{opacity:1;z-index:auto}'.
                    percent($whole, $onetime * ($i + 1) - 0.7).'%{opacity:1;z-index:auto}'.
                    percent($whole, $onetime * ($i + 1) - 0.0001).'%{opacity:0;z-index:auto}'.
                    percent($whole, $onetime * ($i + 1)).'%{opacity:0;z-index:-1;}}';

            // Preworking for slider href
            $items[$i]['link'] = isset($items[$i]['link']) ? $items[$i]['link'] : '';

            // Preworking for slider description
            if (isset($items[$i]['description']['ko']))
                $items[$i]['description']['ko'] = str_replace("\r\n", '', $items[$i]['description']['ko']);
            if (isset($items[$i]['description']['en']))
                $items[$i]['description']['en'] = str_replace("\r\n", '', $items[$i]['description']['en']);

            // Preworking for slider posters
            if (isset($items[$i]['poster'])) {

                $image_size = getimagesize($items[$i]['poster']['image_path']);
                $items[$i]['poster']['is_horizontal'] = ($image_size[0] / $image_size[1]) >= 1;

            }

        }

    ?></style>
    <?php for ($i = 0; $i < $item_i; $i++): ?>
    <section data-order="<?php echo $i; ?>" class="slide<?php echo (isset($items[$i]['poster'])) ? ' with-poster' : ''; ?>">
        <div class="text-box">
            <a href="<?php echo $items[$i]['link']; ?>">
                <h1><?php echo $items[$i]['title'][$lang]; ?></h1>
                <p><?php echo $items[$i]['description'][$lang]; ?></p>
                <span><?php echo $more; ?></span>
            </a>
        </div>
        <?php if (isset($items[$i]['poster'])): ?>
        <div class="poster-box <?php echo ($items[$i]['poster']['is_horizontal']) ? 'horizontal' : 'vertical'; ?>">
            <a href="<?php echo $items[$i]['link']; ?>">
                <img src="<?php echo $items[$i]['poster']['image_url']; ?>" alt="<?php echo $items[$i]['poster']['description'][$lang]; ?>" title="<?php echo $items[$i]['poster']['description'][$lang];?>">
            </a>
        </div>
        <?php endif; ?>
    </section>
    <?php endfor; ?>
</article>
