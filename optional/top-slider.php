<?php
/**
 * Theme "Options" page - Top Slider
 *
 * This includes wordpress controlpanel integration of top slider.
 *
 * @package Lighthalzen
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th), Seungwon Jung (CiTE 5th)
 * @copyright Yuoa (Jio Gim), Seungwon Jung
 *
**/

add_action('admin_menu', 'lighthalzen_admin_top_slider_options_create');

function lighthalzen_admin_top_slider_options_create() {

    add_menu_page(
        _s("메인 슬라이더 관리"),
        _s("슬라이더"),
        "lighthalzen_managers",
        "lighthalzen_admin_options_top_slider",
        "lighthalzen_top_slider_options",
        "dashicons-images-alt2"
    );

    add_action('admin_init', 'lighthalzen_top_slider_register');

}

function lighthalzen_top_slider_register() {
    register_setting(  "lighthalzen-config", 'new_option_name' );
	register_setting(  "lighthalzen-config", 'some_other_option' );
	register_setting(  "lighthalzen-config", 'option_etc' );
}

function lighthalzen_top_slider_options() {
?>

<div class="wrap">
<h1><?php _t("메인 슬라이더 관리"); ?></h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
</div>

<?php
}
?>
