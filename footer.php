<?php
/**
 * Template for <footer> tag
 *
 * This <footer> includes site & sponsor's logo, copyright, and other links
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

    // Save template_url for less bloginfo() call
    $template_url = get_bloginfo('template_url');

    $dummy_data = array(
        array(
            'name' => array(
                "ko" => "Yuoa",
                "en" => "Yuoa"
            ),
            'link' => 'https://blog.yuoa.pm',
            'identity' => 'https://api-storage.cloud.toast.com/v1/AUTH_2dd5312e734b44ff9622d1ce38bd9a04/common/images/yuoa/banner/@1200.png'
        ),
        array(
            'name' => array(
                "ko" => "봉구스 밥버거",
                "en" => "BonGousse"
            ),
            'link' => 'http://www.bongousse.net/main.aspx',
            'identity' => $template_url.'/image/bongus@bottom.png'
        ),
        array(
            'name' => array(
                "ko" => "맥심 KANU",
                "en" => "Maxim KANU"
            ),
            'link' => 'http://www.maximkanu.co.kr/kanu/',
            'identity' => 'http://www.maximkanu.co.kr/kanu/images/kanu/logo2.png'
        ),
        array(
            'name' => array(
                "ko" => "열정 Pay",
                "en" => "Youth Slave"
            ),
            'link' => 'https://ko.wikipedia.org/wiki/%EC%97%B4%EC%A0%95%ED%8E%98%EC%9D%B4',
            'identity' => 'http://kyup.konyang.ac.kr/wp-content/uploads/2017/10/20171030_102826.png'
        ),
        array(
            'name' => array(
                "ko" => "리세르그산 디에틸아미드",
                "en" => "LSD"
            ),
            'link' => 'https://ko.wikipedia.org/wiki/%EB%A6%AC%EC%84%B8%EB%A5%B4%EA%B7%B8%EC%82%B0_%EB%94%94%EC%97%90%ED%8B%B8%EC%95%84%EB%AF%B8%EB%93%9C',
            'identity' => 'https://thehustle.co/wp-content/uploads/2017/10/microdosing_week_1.jpg'
        ),
        array(
            'name' => array(
                'ko' => '시바',
                'en' => 'doge'
            ),
            'link' => 'https://en.wikipedia.org/wiki/Doge_(meme)',
            'identity' => 'https://i.ytimg.com/vi/Yj7ja6BANLM/maxresdefault.jpg'
        ),
        array(
            'name' => array(
                'ko' => '정전',
                'en' => 'Power Outage'
            ),
            'link' => 'https://ko.wikipedia.org/wiki/%EC%A0%95%EC%A0%84_(%EC%A0%84%EA%B8%B0)',
            'identity' => 'https://i1.wp.com/richmond2day.com/wp-content/uploads/2018/06/power-outage.png?fit=559%2C334'
        ),
        array(
            'name' => array(
                'ko' => '나나치',
                'en' => 'Nanachi'
            ),
            'link' => 'https://www.google.co.kr/search?q=7%EC%B9%98',
            'identity' => 'http://cdn.tvple.net/public/file/573/573345.md-16x9'
        ),
        array(
            'name' => array(
                'ko' => '뷔페',
                'en' => 'Buffet'
            ),
            'link' => 'http://blog.naver.com/cpcc86/220611979066',
            'identity' => 'http://www.kamogawa-seaworld.jp/facilities/restaurant/images/suncruise/rest_exterior.jpg'
        ),
        array(
            'name' => array(
                'ko' => '피로',
                'en' => 'Fatigue'
            ),
            'link' => 'https://ko.wikipedia.org/wiki/%ED%94%BC%EB%A1%9C',
            'identity' => 'http://imaginativethinking.ca/blog/wp-content/uploads/2014/07/fatigue.png'
        ),
        array(
            'name' => array(
                'ko' => '답이 없는 학과',
                'en' => 'NO ANSWER CITE'
            ),
            'link' => 'https://www.italki.com/question/213936?hl=ko',
            'identity' => 'http://rabble.ca/sites/default/files/styles/large_story_850px/public/node-images/the_answer_is_still_no.jpg?itok=c6g4kdLz'
        ),
        array(
            'name' => array(
                'ko' => '오뚜기 즉석 컵밥',
                'en' => 'Ottogi Instant Cuprice'
            ),
            'link' => 'https://www.ottogi.co.kr/main/main.asp',
            'identity' => 'http://www.00news.co.kr/news/photo/201711/50938_99519_1246.jpg'
        ),
        array(
            'name' => array(
                'ko' => '코딩하느라 움직이질 못해 만들어진 지방으로 이루어진 뱃살',
                'en' => 'VET-SSAL'
            ),
            'link' => '',
            'identity' => 'http://myvenus.co.kr/files/attach/images/116/803/032/snap674.jpg'
        ),
        array(
            'name' => array(
                'ko' => '라스트팡',
                'en' => 'LastPang'
            ),
            'link' => '',
            'identity' => ''
        )
    );

    $items = $dummy_data;
    $item_i = count($items);

    $lang = (now_lang() === "ko") ? "ko" : "en";

?>
<footer id="bottom">
    <div class="partners">
        <h3><?php _t("협력 기관"); ?></h3>
        <?php for ($i = 0; $i < $item_i; $i++) { ?>
        <div class="partner">
            <a href="<?php echo $items[$i]['link']; ?>" target="_blank">
                <img src="<?php echo isset($items[$i]['identity']) ? $items[$i]['identity'] : ''; ?>" alt="<?php echo $items[$i]['name'][$lang]; ?>" title="<?php echo $items[$i]['name'][$lang]; ?>">
            </a>
        </div>
        <?php } ?>
    </div>
    <div class="cite">
        <div class="links">
            <p class="text-links">
                <span class="connect-with-cite">Connect with CiTE!</span>&nbsp;·&nbsp;<a class="privacy-policy" href=""><?php _t("개인정보 처리방침"); ?></a>
            </p>
            <a class="postech" href="http://postech.ac.kr/">
                <img src="<?php echo $template_url; ?>/image/postech@bottom.png" alt="<?php _t('POSTECH 로고'); ?>">
            </a>
        </div>
        <div class="identity">
            <a href="#top" target="_self">
                <img src="<?php echo $template_url; ?>/image/identity@bottom.png" alt="<?php _t('창의IT융합공학과 로고'); ?>">
            </a>
            <a href="http://i-lab.postech.ac.kr/" target="_self">
                <img src="<?php echo $template_url; ?>/image/i-lab@bottom.png" alt="<?php _t('i-lab 로고'); ?>">
            </a>
        </div>
        <div class="about">
            <p class="address h-card">
            <?php if (now_lang() === "ko") : ?>
                <span class="p-postal-code">37673</span>
                <span class="p-country-name"><?php _t("대한민국"); ?></span>
                <span class="p-region"><?php echo _t("경상북도"); ?></span>
                <span class="p-locality"><?php echo _s("포항시")." "._s("남구"); ?></span>
                <span class="p-street-address"><?php echo _s("청암로")." 77"; ?></span>
                <span class="p-extended-address"><?php echo _s("포항공과대학교")." C5 "._s("1층 창의IT융합공학과 사무실"); ?></span>
            <?php else : ?>
                <span class="p-extended-address"><?php echo _s("포항공과대학교")." C5 "._s("1층 창의IT융합공학과 사무실"); ?></span>,
                <span class="p-street-address"><?php echo _s("청암로")." 77"; ?></span>,
                <span class="p-locality"><?php echo _s("포항시")." "._s("남구"); ?></span>,
                <span class="p-region"><?php echo _t("경상북도"); ?></span>,
                <span class="p-postal-code">37673</span>,
                <span class="p-country-name"><?php _t("대한민국"); ?></span>
            <?php endif; ?>
            </p>
            <p class="call">
                Tel.
                <a href="tel:+82542798810">+82-054-279-8810</a>
                |&nbsp;Fax.
                <a href="tel:+82542798899">+82-054-279-8899</a>
            </p>
            <p class="copyright">
                Copyright &copy; Department of Creative IT Engineering, all rights reserved.
            </p>
        </div>
    </div>
</footer>
