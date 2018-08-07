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

    $dummy_data = array(
        array(
            'title' => array(
                "ko" => "창공인의 요람 C5, 리모델링 완료",
                "en" => "C5 Bldg, Cradle of CiTE, Remodeling Completed"
            ),
            'description' => array(
                "ko" => "2015년부터 창의공간을 대신하여 사용해오던 C5 1층 학부생 공간이 3년만의 리모델링을 마쳤습니다.",
                "en" => "The undergraduate space at the first floor of C5, which has been used as a substitute for create space since 2015, now get remodeled."
            ),
            'link' => 'https://blog.yuoa.pm',
            'background' => get_bloginfo('template_url')."/image/slider.example@top.jpg"
        ),
        array(
            'title' => array(
                "ko" => "\"과즙美 뿜뿜\"…프로미스나인, 신곡 '두근두근' MV 티저 공개",
                "en" => "Update: fromis_9 Goes On Adventures In “DKDK” MV Teaser"
            ),
            'description' => array(
                "ko" => "프로미스나인은 1일 공식 SNS 및 유튜브 채널을 통해 두 번째 미니앨범 'To. Day' 타이틀곡 '두근두근(DKDK)' 롱버전 뮤직비디오 티저 영상을 공개했다.",
                "en" => "fromis_9 has shared an MV teaser for their return with “DKDK”! The song is the title track for their upcoming mini album “To. Day,” which is due out on June 5."
            ),
            'link' => 'https://www.youtube.com/watch?v=S6o3g4NUzs0',
            'background' => get_bloginfo('template_url')."/image/slider.example2@top.jpg",
            'poster' => array(
                "image_url" => get_bloginfo('template_url')."/image/poster.example3@top.jpg",
                "image_path" => get_template_directory()."/image/poster.example3@top.jpg",
                "description" => array(
                    "ko" => "fromis_9 ❤",
                    "en" => "fromis_9 ❤"
                )
            )
        ),
        array(
            'title' => array(
                "ko" => "프로미스나인, 당찬 컴백 \"연말 신인상이 목표\"",
                "en" => "fromis_9 Reveals Their Big Goal For The Year And What They Practiced Most For Their Comeback"
            ),
            'description' => array(
                "ko" => "프로미스나인이 당찬 컴백을 알렸다. 기다려준 팬들의 함성에 눈물을 보이는 것도 잠시, \"연말 신인상이 목표\"라는 큰 꿈을 드러냈다.",
                "en" => "The girls revealed that they were pretty emotional. Lee Saerom said, “As soon as we heard the fans cheering, everyone got tears in their eyes.” She said, “Before our first performance, we were so close to crying. I kept telling myself, ‘You’re a pro. You’re not going to cry.’”"
            ),
            'link' => 'https://www.vlive.tv/video/72961',
            'background' => get_bloginfo('template_url')."/image/slider.example3@top.jpg",
            'poster' => array(
                "image_url" => get_bloginfo('template_url')."/image/poster.example@top.jpg",
                "image_path" => get_template_directory()."/image/poster.example@top.jpg",
                "description" => array(
                    "ko" => "fromis_9 ❤❤❤",
                    "en" => "fromis_9 ❤❤❤"
                )
            )
        )
    );

    $items = $dummy_data;

    $lang = (now_lang() === "ko") ? "ko" : "en";
    $more = _s("더보기");

?>
<article class="slider">
    <style><?php

        function time2p ($whole, $time) {
            return $time / $whole * 100;
        }

        $item_i = count($items);
        for ($i = 0; $i < $item_i; $i++) {

            $whole = 10 * $item_i;

            // Print stylesheet for DOM
            echo 'section.slide[data-order="'.$i.'"]{background-image:url(';

            if (isset($items[$i]['background']))
                echo $items[$i]['background'];
            else
                echo get_bloginfo('template_url')."/image/slider.example@top.jpg";

            echo ');animation:ts-'.$i.' '.$whole.'s ease infinite}';
            echo 'section.slide[data-order="'.$i.'"] > div{animation:ts-div-'.$i.' '.$whole.'s ease infinite}';

            // Print stylesheet for animation
            if ($i === 0)
                echo '@keyframes ts-'.$i.
                    ' {0%{opacity:1;z-index:auto}'.
                    time2p($whole, 9.3).'%{opacity:1;z-index:auto}'.
                    time2p($whole, 10).'%{opacity:0;z-index:auto}'.
                    time2p($whole, 10.0001).'%{opacity:0;z-index:-1}'.
                    time2p($whole, $whole - 0.7001).'%{opacity:0;z-index:-1}'.
                    time2p($whole, $whole - 0.7).'%{opacity:0;z-index:auto}'.
                    '100%{opacity:1;z-index:auto}}';
            else if ($i != $item_i - 1)
                echo '@keyframes ts-'.$i.
                    ' {0%{opacity:0;z-index:-1}'.
                    time2p($whole, 10 * $i - 0.7001).'%{opacity:0;z-index:-1}'.
                    time2p($whole, 10 * $i - 0.7000).'%{opacity:0;z-index:auto}'.
                    time2p($whole, 10 * $i).'%{opacity:1;z-index:auto}'.
                    time2p($whole, 10 * ($i + 1) - 0.7).'%{opacity:1;z-index:auto}'.
                    time2p($whole, 10 * ($i + 1) - 0.0001).'%{opacity:0;z-index:auto}'.
                    time2p($whole, 10 * ($i + 1)).'%{opacity:0;z-index:-1;}'.
                    '100%{opacity:0;z-index:-1;}}';
            else
                echo '@keyframes ts-'.$i.
                    ' {0%{opacity:0;z-index:-1}'.
                    time2p($whole, 10 * $i - 0.7001).'%{opacity:0;z-index:-1}'.
                    time2p($whole, 10 * $i - 0.7000).'%{opacity:0;z-index:auto}'.
                    time2p($whole, 10 * $i).'%{opacity:1;z-index:auto}'.
                    time2p($whole, 10 * ($i + 1) - 0.7).'%{opacity:1;z-index:auto}'.
                    time2p($whole, 10 * ($i + 1) - 0.0001).'%{opacity:0;z-index:auto}'.
                    time2p($whole, 10 * ($i + 1)).'%{opacity:0;z-index:-1;}}';

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
    <?php for ($i = 0; $i < $item_i; $i++) { ?>
    <section data-order="<?php echo $i; ?>" class="slide<?php echo (isset($items[$i]['poster'])) ? ' with-poster' : ''; ?>">
        <div class="text-box">
            <a href="<?php echo $items[$i]['link']; ?>">
                <h1><?php echo $items[$i]['title'][$lang]; ?></h1>
                <p><?php echo $items[$i]['description'][$lang]; ?></p>
                <span><?php echo $more; ?></span>
            </a>
        </div>
        <?php if (isset($items[$i]['poster'])) { ?>
        <div class="poster-box <?php echo ($items[$i]['poster']['is_horizontal']) ? 'horizontal' : 'vertical'; ?>">
            <a href="<?php echo $items[$i]['link']; ?>">
                <img src="<?php echo $items[$i]['poster']['image_url']; ?>" alt="<?php echo $items[$i]['poster']['description'][$lang]; ?>" title="<?php echo $items[$i]['poster']['description'][$lang];?>">
            </a>
        </div>
        <?php } ?>
    </section>
    <?php } ?>
    <script src="<?php bloginfo('template_url'); ?>/script/top-slider.js"></script>
</article>
