<?php
/**
 * Top Slider
 *
 * Shows the most charming news of CITE.
 *
 * @todo Implement i18n in this page
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
<article class="slider">
    <style>
        section.slide[data-num="0"] { background-image: url(<?php bloginfo('template_url'); ?>/resource/slider.example@top.jpg); }
    </style>
    <section data-num="0" class="slide">
        <div class="text-box">
            <h1><?php _gt("창공인의 요람 C5, 리모델링 완료"); ?></h1>
            <p><?php _gt("2015년부터 창의공간을 대신하여 사용해오던 C5 1층 학부생 공간이 3년만에 리모델링되었습니다."); ?></p>
            <a href=""><?php _t("더보기"); ?></a>
        </div>
    </section>
</article>
