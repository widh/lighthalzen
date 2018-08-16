<?php
/**
 * Theme "Options" page - Top Menu
 *
 * This includes wordpress controlpanel integration of top menu.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/

require_once(ABSPATH."wp-admin/includes/nav-menu.php");

// Add other resources when only in this page
if ($pagenow === "admin.php" && $_GET['page'] === "lighthalzen_admin_options_top_menu") {
    add_filter('nav_menu_meta_box_object', 'lighthalzen_top_menu_add_meta_box', 10, 1);
    add_action('admin_head', 'lighthalzen_top_menu_head_load');
    add_action('admin_head', 'lighthalzen_top_menu_head_translation');
}

// Create Option Page
function lighthalzen_admin_top_menu_options_create() {

    add_menu_page(

        // Title for <title> tag
        _s("메인 메뉴 관리"),

        // Title for left aside section
        _s("메뉴"),

        // Capability to access this page
        "lighthalzen_managers",

        // Slug
        "lighthalzen_admin_options_top_menu",

        // HTML function
        "lighthalzen_top_menu_options",

        // Left aside icon
        "dashicons-menu"

    );

    // Register option items
    add_action('admin_init', 'lighthalzen_top_menu_register');

}
add_action('admin_menu', 'lighthalzen_admin_top_menu_options_create');

// Register settings
function lighthalzen_top_menu_register() {
    register_setting(
        "lighthalzen-config", "ltz-top-menu",
        array(
            "type" => "string",
            "description" => "Top Menu for Lighthalzen Theme"
        )
    );
}

// Header Load
function lighthalzen_top_menu_head_load() { ?>

<link href="<?php bloginfo('template_url'); ?>/optional/lighthalzen.css" rel="stylesheet">
<script src="<?php bloginfo('template_url'); ?>/optional/script/jquery.cookie.js"></script>
<script src="<?php bloginfo('template_url'); ?>/optional/script/top-menu.js"></script>
<script src="<?php bloginfo('template_url'); ?>/optional/script/touch-dnd.with-move-action.js"></script>

<?php }

// Prepare translation for JS
function lighthalzen_top_menu_head_translation() {

    echo "<script> ltzTranslation={};";

    echo "ltzTranslation.itemNotFound='"._s("검색어와 일치하는 항목이 없습니다.")."';";
    echo "ltzTranslation.page='"._s("페이지")."';";
    echo "ltzTranslation.label='"._s("라벨")."';";
    echo "ltzTranslation.post='"._s("글")."';";
    echo "ltzTranslation.category='"._s("카테고리")."';";
    echo "ltzTranslation.customLink='"._s("사용자 정의 링크")."';";
    echo "ltzTranslation.subitem='"._s("서브 아이템")."';";
    echo "ltzTranslation.edit='"._s("편집")."';";
    echo "ltzTranslation.koreanLabel='"._s("한글")."';";
    echo "ltzTranslation.englishLabel='"._s("영어")."';";
    echo "ltzTranslation.original='"._s("원본")."';";
    echo "ltzTranslation.delete='"._s("삭제")."';";
    echo "ltzTranslation.noOriginal='"._s("원본 없음")."';";

    echo "</script>";

}

// Config save function
function lighthalzen_top_menu_save () {

    if (isset($_POST['ltz-menu-data'])) {

        update_option('ltz-top-menu', $_POST['ltz-menu-data']);

        echo '<div id="message" class="updated notice is-dismissible"><p>'._s("메인 메뉴가 업데이트되었습니다.").'</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">'._s("무시").'</span></button></div>';

        echo "<script>var ltzMenuStr='".$_POST['ltz-menu-data']."';</script>";

    } else {

        echo "<script>var ltzMenuStr='".get_option('ltz-top-menu')."';</script>";

    }

}

// Add Custom Meta Box
function lighthalzen_top_menu_add_meta_box($object) {

	add_meta_box('ltz-meta-label', _s("라벨"), 'lighthalzen_top_menu_label_meta_box', 'nav-menus', 'side', 'default');
    add_meta_box('ltz-meta-link', _s("사용자 정의 링크"), 'lighthalzen_top_menu_link_meta_box', 'nav-menus', 'side', 'default');

	return $object;
}

// Display "Label(Text)" Meta Box Content
function lighthalzen_top_menu_label_meta_box() { ?>

<div id="labeldiv" class="customlinkdiv">
    <p class="ltz-label-desc"><?php _t("메뉴에서 라벨을 클릭하면 그 첫 번째 하위 메뉴로 이동합니다. 하위 메뉴가 없으면 클릭해도 이동하지 않습니다."); ?></p>
    <p id="menu-item-label-wrap" class="wp-clearfix">
        <label class="howto" for="menu-label-name-ko"><?php _t("한글"); ?></label>
        <input id="menu-label-name-ko" name="menu-label-name-ko" type="text" class="code menu-item-textbox">
    </p>
    <p id="menu-item-label-wrap" class="wp-clearfix">
        <label class="howto" for="menu-label-name-en"><?php _t("영어"); ?></label>
        <input id="menu-label-name-en" name="menu-label-name-en" type="text" class="code menu-item-textbox">
    </p>
    <p class="button-controls wp-clearfix">
		<span class="add-to-menu">
			<input type="submit" class="button submit-add-to-menu right" value="<?php _t("메뉴에 추가"); ?>" name="add-custom-menu-item" id="submit-customlinkdiv">
			<span class="spinner"></span>
		</span>
	</p>
</div>

<?php }

// Display "Link" Meta Box Content
function lighthalzen_top_menu_link_meta_box() { ?>

<div id="customlinkdiv" class="customlinkdiv">
    <p id="menu-item-url-wrap" class="wp-clearfix">
        <label class="howto" for="custom-menu-item-url"><?php _t("URL"); ?></label>
        <input id="custom-menu-item-url" name="custom-menu-item-url" type="text" class="code menu-item-textbox" value="http://">
    </p>
    <p id="menu-item-label-wrap" class="wp-clearfix">
        <label class="howto" for="custom-menu-item-name-ko"><?php _t("한글 라벨"); ?></label>
        <input id="custom-menu-item-name-ko" name="custom-menu-item-name-ko" type="text" class="code menu-item-textbox">
    </p>
    <p id="menu-item-label-wrap" class="wp-clearfix">
        <label class="howto" for="custom-menu-item-name-en"><?php _t("영어 라벨"); ?></label>
        <input id="custom-menu-item-name-en" name="custom-menu-item-name-en" type="text" class="code menu-item-textbox">
    </p>
    <p class="button-controls wp-clearfix">
		<span class="add-to-menu">
			<input type="submit" class="button submit-add-to-menu right" value="<?php _t("메뉴에 추가"); ?>" name="add-custom-menu-item" id="submit-customlinkdiv">
			<span class="spinner"></span>
		</span>
	</p>
</div>

<?php }

// Display Page
function lighthalzen_top_menu_options() { ?>

<div class="wrap">
    <h1><?php _t("메인 메뉴 관리"); ?></h1>
    <?php lighthalzen_top_menu_save(); ?>
    <noscript>
        <div class="frame-container">
            <div class="frame">
                <div class="header alone">
                    <h2><?php _t("JavaScript 비활성화 알림"); ?></h2>
                    <p><?php _t("JavaScript가 비활성화되어 있습니다. 허나 이 페이지는 JavaScript가 없으면 살아갈 수 없는 페이지입니다. JavaScript가 있는 환경에서 기능을 정상적으로 이용할 수 있습니다."); ?></p>
                </div>
            </div>
        </div>
        <hr>
    </noscript>
    <?php if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) : ?>
    <div class="frame-container">
        <div class="frame">
            <div class="header alone">
                <h2><?php _t("Internet Explorer 알림"); ?></h2>
                <p><?php _t("이 페이지는 Internet Explorer에서 제대로 작동하지 않습니다. Internet Explorer는 이제 놔 줄 때가 되었습니다! 얼른 다른 최신 브라우저로 갈아타십시오!"); ?></p>
            </div>
        </div>
    </div>
    <hr>
    <?php endif; if (!isset($_COOKIE['ltz-tmii']) || $_COOKIE['ltz-tmii'] !== 'true'): ?>
    <div id="intro" class="frame-container">
        <div class="frame">
            <div class="header">
                <h2><?php _t("설명"); ?></h2>
                <p><?php _t("이 페이지에서는 메인 메뉴를 관리합니다."); ?></p>
            </div>
            <hr>
            <div class="content">
                <div class="group help-img">
                    <picture>
                        <img src="<?php bloginfo('template_url'); ?>/image/help/top-menu-intro.png" alt="<?php _t("메인 메뉴 예시"); ?>" title="<?php _t("메인 메뉴 예시"); ?>">
                    </picture>
                </div>
                <div class="group">
                    <div>
                        <h3><?php _t("메인 메뉴는 어디에"); ?></h3>
                        <p><?php _t("메인 메뉴란 사이트 최상단에 존재하는 메뉴를 말합니다."); ?></p>
                    </div>
                </div>
                <div class="group">
                    <div>
                        <h3><?php _t("조작 방법"); ?></h3>
                        <p><?php _t("드래그 앤 드롭으로 메뉴의 위치를 변경할 수 있으며, 최대 <b>3단계</b>까지 설정이 가능합니다."); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <a id="ignore-intro" class="close" href="#"><?php _t("무시"); ?></a>
    </div>
    <hr>
    <?php endif; ?>
    <div class="config-container nav-menus-php">
        <div id="menu-settings-column" class="meta-box-container metabox-holder">
            <div id="nav-menu-meta"><?php

                wp_nav_menu_post_type_meta_boxes();
                wp_nav_menu_taxonomy_meta_boxes();
                add_filter( 'manage_nav-menus_columns', 'wp_nav_menu_manage_columns' );

                do_accordion_sections( 'nav-menus', 'side', null );

            ?></div>
        </div>
        <div id="menu-management-liquid">
            <div id="menu-management">
                <form class="menu-edit" method="POST">
                    <div id="nav-menu-header" class="major-publishing-actions wp-clearfix">
                        <h3><?php _t("메뉴 구조"); ?></h3>
                        <div class="publishing-action">
                            <input type="submit" name="save_menu" id="save_menu_header" class="button button-primary button-large menu-save" value="<?php _t('메뉴 저장'); ?>">
                        </div>
                    </div>
                    <div id="post-body">
                        <div id="post-body-content">
                            <div class="drag-instructions post-body-plain">
                                <p><?php _t("각 아이템을 원하는 순서로 끌어놓으세요. 추가 설정 옵션을 보려면 아이템 오른쪽의 화살표를 클릭하세요."); ?></p>
                            </div>
                            <ul id="menu-dnd-list"></ul>
                            <div class="drag-instructions post-body-plain">
                                <p><?php _t("메뉴 저장 전 각 메뉴의 한글, 영어 이름이 모두 적절히 설정되었는지 확인하세요."); ?></p>
                            </div>
                        </div>
                    </div>
                    <div id="nav-menu-footer">
                        <div class="major-publishing-actions wp-clearfix">
                            <span class="delete-action">
								<a id="ltz-menu-init" class="submitdelete deletion menu-delete" href="#">초기화</a>
							</span>
                            <div class="publishing-action">
                                <input type="submit" name="save_menu" id="save_menu_header" class="button button-primary button-large menu-save" value="<?php _t('메뉴 저장'); ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="ltz-menu-data" id="ltz-menu-data">
                </form>
            </div>
        </div>
    </div>
</div>

<?php } ?>
