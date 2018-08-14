<?php
/**
 * Partners section in <footer> tag
 *
 * This includes sponsor's logo and links.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

$items = get_dummy("partners");
$item_i = count($items);

$lang = (now_lang() === "ko") ? "ko" : "en";

?>
<div class="partners">
    <h3><?php _t("협력 기관"); ?></h3>
    <?php for ($i = 0; $i < $item_i; $i++): ?>
    <div class="partner">
        <a href="<?php echo $items[$i]['link']; ?>" target="_blank">
            <img src="<?php echo isset($items[$i]['identity']) ? $items[$i]['identity'] : ''; ?>" alt="<?php echo $items[$i]['name'][$lang]; ?>" title="<?php echo $items[$i]['name'][$lang]; ?>">
        </a>
    </div>
    <?php endfor; ?>
</div>
