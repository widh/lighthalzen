<?php
/**
 * Information section in <footer> tag
 *
 * This includes site logo, copyright, and other links
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

$template_url = get_bloginfo('template_url');

$lang = (now_lang() === "ko") ? "ko" : "en";

?>
<div class="cite">
    <div class="links">
        <p class="text-links">
            <span class="connect-with-cite">Connect with CiTE!</span>&nbsp;·&nbsp;<a class="privacy-policy" href=""><?php _t("개인정보 처리방침"); ?></a>
        </p>
        <a class="postech" href="http://postech.ac.kr/">
            <img src="<?php echo $template_url."/image/identity/postech.png"; ?>" alt="<?php _t('POSTECH 로고'); ?>">
        </a>
    </div>
    <div class="identity">
        <a href="#top" target="_self">
            <?php get_template_part('image/icon/cite', 'i-colored'); ?>
        </a>
        <a href="http://i-lab.postech.ac.kr/" target="_self">
            <img src="<?php echo $template_url."/image/identity/i-lab.png"; ?>" alt="<?php _t('미래IT융합연구원 로고'); ?>">
        </a>
    </div>
    <div class="about">
        <p class="address h-card">
        <?php if (now_lang() === "ko") : ?>
            <span class="p-postal-code">37673</span>
            <span class="p-country-name"><?php _t("대한민국"); ?></span>
            <span class="p-region"><?php _t("경상북도"); ?></span>
            <span class="p-locality"><?php echo _s("포항시")." "._s("남구"); ?></span>
            <span class="p-street-address"><?php echo _s("청암로")." 77"; ?></span>
            <span class="p-extended-address"><?php echo _s("포항공과대학교")." C5 "._s("1층 창의IT융합공학과 사무실"); ?></span>
        <?php else : ?>
            <span class="p-extended-address"><?php echo _s("포항공과대학교")." C5 "._s("1층 창의IT융합공학과 사무실"); ?></span>,
            <span class="p-street-address"><?php echo _s("청암로")." 77"; ?></span>,
            <span class="p-locality"><?php echo _s("포항시")." "._s("남구"); ?></span>,
            <span class="p-region"><?php _t("경상북도"); ?></span>,
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
