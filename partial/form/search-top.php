<?php
/**
 * Top header search form
 *
 * This includes search form right below of search button in button box.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/
?>
<div id="search" class="search-form">
    <form action="/search/" target="_self" method="GET">
        <input type="text" name="s" placeholder="<?php _t("검색어를 입력하세요."); ?>">
        <input type="submit" value="<?php _t('검색'); ?>">
        <a class="close" href="#nope">&times;</a>
    </form>
</div>
