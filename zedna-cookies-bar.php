<?php
/*
Plugin Name: Zedna Cookies Bar
Description: Lightweight cookies bar to inform visitors that your website uses cookies without beign too disturbing. Frontend is independent on jQuery.
Text Domain: zedna-cookies-bar
Domain Path: /languages
Author: Radek Mezulanik
Author URI: https://www.mezulanik.cz
Version: 1.4.2
License: GPL3
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

function zedna_cookies_bar_menu() {
	add_options_page('Zedna Cookies Bar Settings', 'Zedna Cookies Bar', 'administrator', 'zedna-cookies-bar-settings', 'zedna_cookies_bar_settings_page');
}
add_action('admin_menu', 'zedna_cookies_bar_menu');

function zedna_cookies_bar_settings_page() {
	$cookie_message = (get_option('zedna_cookies_bar_message') != '') ? get_option('zedna_cookies_bar_message') : 'By browsing this website you are agreeing to our <a href="'.get_home_url().'" target="_blank" rel="nofollow">cookies policy</a>.';
	$button_text = (get_option('zedna_cookies_bar_button') != '') ? get_option('zedna_cookies_bar_button') : 'I Agree';
	$close_text = (get_option('zedna_cookies_bar_close') != '') ? get_option('zedna_cookies_bar_close') : 'x';
	$close_color = (get_option('zedna_cookies_bar_close_color') != '') ? get_option('zedna_cookies_bar_close_color') : '#2e363f';
	$button_bg_color = (get_option('zedna_cookies_bar_btn_bg_color') != '') ? get_option('zedna_cookies_bar_btn_bg_color') : '#45ae52';
	$button_text_color = (get_option('zedna_cookies_bar_btn_text_color') != '') ? get_option('zedna_cookies_bar_btn_text_color') : '#ffffff';
	$cookie_bar_bg_color = (get_option('zedna_cookies_bar_bg_color') != '') ? get_option('zedna_cookies_bar_bg_color') : '#2e363f';
	$cookie_bar_text_color = (get_option('zedna_cookies_bar_text_color') != '') ? get_option('zedna_cookies_bar_text_color') : '#ffffff';
	$cookie_bar_link_color = (get_option('zedna_cookies_bar_link_color') != '') ? get_option('zedna_cookies_bar_link_color') : '#ffffff';
	$cookie_bar_position = (get_option('zedna_cookies_bar_position') != '') ? get_option('zedna_cookies_bar_position') : 'bottom';
	$cookie_bar_custom_css = (get_option('zedna_cookies_bar_custom_css') != '') ? get_option('zedna_cookies_bar_custom_css') : '';
	$cookies_bar_show_button = (get_option('zedna_cookies_bar_show_button') != '') ? get_option('zedna_cookies_bar_show_button') : 'yes';
	$cookie_bar_custom_js = (get_option('zedna_cookies_bar_custom_js') != '') ? get_option('zedna_cookies_bar_custom_js') : '';
?>
<script>
jQuery(document).ready(function($){
	$(".zedna_cookies_bar_btn_bg_color").wpColorPicker();
	$(".zedna_cookies_bar_btn_text_color").wpColorPicker();
	$(".zedna_cookies_bar_bg_color").wpColorPicker();
	$(".zedna_cookies_bar_text_color").wpColorPicker();
	$(".zedna_cookies_bar_link_color").wpColorPicker();
	$(".zedna_cookies_bar_close_color").wpColorPicker();
});
</script>
<div class="wrap">
<h2><?php _e('Zedna Cookies Bar Settings', 'zedna-cookies-bar'); ?></h2>
<p><?php _e('Small cookies bar to inform visitors that your website uses cookies without beign too disturbing.', 'zedna-cookies-bar'); ?></p>
<form method="post" action="options.php">
    <?php settings_fields( 'zedna-cookies-bar-settings' ); ?>
    <?php do_settings_sections( 'zedna-cookies-bar-settings' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('Cookies bar Message', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" size="100" name="zedna_cookies_bar_message" value="<?php echo esc_html( $cookie_message ); ?>" /> <small>(HTML allowed)</small></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Button Text', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" size="20" name="zedna_cookies_bar_button" value="<?php echo esc_attr( $button_text ); ?>" /> <small>(e.g. I Agree)</small></td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Show button', 'zedna-cookies-bar'); ?></th>
        <td>
					<select name='zedna_cookies_bar_show_button'>
						<?php
						if ($cookies_bar_show_button == "no"){
						echo "<option value='yes'>".__('Yes','zedna-cookies-bar')."</option>
						<option value='no' selected=selected>".__('No','zedna-cookies-bar')."</option>";
						}else{ 
						echo "<option value='yes' selected=selected>".__('Yes','zedna-cookies-bar')."</option>
						<option value='no'>".__('No','zedna-cookies-bar')."</option>";
						}
						?>
					</select>	
				</td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Close Text', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" size="20" name="zedna_cookies_bar_close" value="<?php echo esc_attr( $close_text ); ?>" /> <small>(The 'X' icon)</small></td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Close text color', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" name="zedna_cookies_bar_close_color" value="<?php echo esc_attr( $close_color ); ?>" class="zedna_cookies_bar_close_color" data-default-color="#45AE52" /></td>
				</tr>
        <tr valign="top">
        <th scope="row"><?php _e('Button background color', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" name="zedna_cookies_bar_btn_bg_color" value="<?php echo esc_attr( $button_bg_color ); ?>" class="zedna_cookies_bar_btn_bg_color" data-default-color="#45AE52" /></td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Button text color', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" name="zedna_cookies_bar_btn_text_color" value="<?php echo esc_attr( $button_text_color ); ?>" class="zedna_cookies_bar_btn_text_color" data-default-color="#ffffff" /></td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Bar background color', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" name="zedna_cookies_bar_bg_color" value="<?php echo esc_attr( $cookie_bar_bg_color ); ?>" class="zedna_cookies_bar_bg_color" data-default-color="#2e363f" /></td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Bar text color', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" name="zedna_cookies_bar_text_color" value="<?php echo esc_attr( $cookie_bar_text_color ); ?>" class="zedna_cookies_bar_text_color" data-default-color="#ffffff" /></td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Bar link color', 'zedna-cookies-bar'); ?></th>
        <td><input type="text" name="zedna_cookies_bar_link_color" value="<?php echo esc_attr( $cookie_bar_link_color ); ?>" class="zedna_cookies_bar_link_color" data-default-color="#ffffff" /></td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Bar position', 'zedna-cookies-bar'); ?></th>
        <td>
					<select name='zedna_cookies_bar_position'>
						<?php
						if ($cookie_bar_position == "bottom"){
						echo "<option value='top'>".__('Top','zedna-cookies-bar')."</option>
						<option value='bottom' selected=selected>".__('Bottom','zedna-cookies-bar')."</option>";
						}else{ 
						echo "<option value='top' selected=selected>".__('Top','zedna-cookies-bar')."</option>
						<option value='bottom'>".__('Bottom','zedna-cookies-bar')."</option>";
						}
						?>
					</select>	
				</td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Custom styles', 'zedna-cookies-bar'); ?></th>
        <td>
				<textarea name="zedna_cookies_bar_custom_css" class="zedna_cookies_bar_custom_css" rows="10" cols="50"><?php echo esc_attr( $cookie_bar_custom_css ); ?></textarea>
				<small>Use identifier #zedna-cookies-bar</small>
				</td>
				</tr>
				<tr valign="top">
        <th scope="row"><?php _e('Custom javascript', 'zedna-cookies-bar'); ?></th>
        <td>
					<table>
						<tr>
							<td>
								<pre>function zednaAcceptCookiesCallback() {</pre>
							</td>
						</tr>
						<tr>
							<td>
								<textarea name="zedna_cookies_bar_custom_js" class="zedna_cookies_bar_custom_js" rows="10" cols="50"><?php echo esc_attr( $cookie_bar_custom_js ); ?></textarea>
								<small>Callback function is called when user agree with cookie consent.</small>
							</td>
						</tr>
						<tr>
							<td>
								<pre>}</pre>
							</td>
						</tr>
					</table>
				</td>
				</tr>
    </table>
    <?php submit_button(); ?>
</form>
<p><?php print __('If you like this plugin, please donate us for faster upgrade','wp-image-lazy-load');?></p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit"
		alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
<?php }

function zedna_cookies_bar_settings() {
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_message' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_button' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_btn_bg_color' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_btn_text_color' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_bg_color' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_text_color' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_link_color' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_position' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_custom_css' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_show_button' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_close' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_close_color' );
	register_setting( 'zedna-cookies-bar-settings', 'zedna_cookies_bar_custom_js' );
}
add_action( 'admin_init', 'zedna_cookies_bar_settings' );

function zedna_cookies_bar_uninstall() {
    delete_option( 'zedna_cookies_bar_message' );
    delete_option( 'zedna_cookies_bar_button' );
		delete_option( 'zedna_cookies_bar_btn_bg_color' );
		delete_option( 'zedna_cookies_bar_btn_text_color' );
		delete_option( 'zedna_cookies_bar_bg_color' );
		delete_option( 'zedna_cookies_bar_text_color' );
		delete_option( 'zedna_cookies_bar_link_color' );
		delete_option( 'zedna_cookies_bar_position' );
		delete_option( 'zedna_cookies_bar_custom_css' );
		delete_option( 'zedna_cookies_bar_show_button' );
		delete_option( 'zedna_cookies_bar_close' );
		delete_option( 'zedna_cookies_bar_close_color' );
		delete_option( 'zedna_cookies_bar_custom_js' );
}
register_uninstall_hook( __FILE__, 'zedna_cookies_bar_uninstall' );

function zedna_cookies_bar_dependencies() {
	wp_register_script( 'zedna-cookies-bar-js', plugins_url('js/zedna-cookies-bar.js', __FILE__), '', true, true );
	wp_enqueue_script( 'zedna-cookies-bar-js' );
	wp_register_style( 'zedna-cookies-bar-css', plugins_url('css/zedna-cookies-bar.css', __FILE__), true, true  );
	wp_enqueue_style( 'zedna-cookies-bar-css' );
}
add_action( 'wp_enqueue_scripts', 'zedna_cookies_bar_dependencies' );

class zedna_cookies_bar_languages {
    public static function loadTextDomain() {
				load_plugin_textdomain( 'zedna-cookies-bar', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
    }
}
add_action('plugins_loaded', array('zedna_cookies_bar_languages', 'loadTextDomain'));

function zedna_cookies_bar_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'zedna-cookies-bar-color-picker', plugins_url('js/zedna-cookies-bar.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'zedna_cookies_bar_color_picker' );

function zedna_cookies_bar() {
$cookies_bar_show_button = get_option('zedna_cookies_bar_show_button');
$zedna_cookies_bar_message_output = get_option( 'zedna_cookies_bar_message' );
$zedna_cookies_bar_button_output = esc_attr( get_option('zedna_cookies_bar_button') );
$zedna_cookies_bar_close_output = esc_attr( get_option('zedna_cookies_bar_close') );
$zedna_cookies_bar_close_callback = htmlspecialchars_decode( get_option('zedna_cookies_bar_custom_js') );
$cookie_bar_custom_css = get_option('zedna_cookies_bar_custom_css');
if ( empty( $zedna_cookies_bar_message_output ) ) $zedna_cookies_bar_message_output = "By browsing this website you are agreeing to our <a href='".get_home_url()."' target='_blank' rel='nofollow'>cookies policy</a>.";
if ( empty( $zedna_cookies_bar_button_output ) ) $zedna_cookies_bar_button_output = "I Agree";
if ( empty( $zedna_cookies_bar_close_output ) ) $zedna_cookies_bar_close_output = "X";
?>
<!-- Cookies bar -->
<div id="zedna-cookies-bar" class="<?php echo strlen($cookie_bar_custom_css) > 0 ? esc_attr( get_option('zedna_cookies_bar_position') ) : '';?>" style="background-color:<?php echo esc_attr( get_option('zedna_cookies_bar_bg_color') ); ?>;color:<?php echo esc_attr( get_option('zedna_cookies_bar_text_color') ); ?>;"><?php echo $zedna_cookies_bar_message_output; ?> <?php if($cookies_bar_show_button == 'yes'){?><button id="zednaAcceptCookies" <?php if (get_option('zedna_cookies_bar_btn_bg_color') == true) { ?> style="background-color:<?php echo esc_attr( get_option('zedna_cookies_bar_btn_bg_color') ); ?>;color:<?php echo esc_attr( get_option('zedna_cookies_bar_btn_text_color') ); ?>;" <?php } ?> onclick="zednaAcceptCookies();"><?php echo $zedna_cookies_bar_button_output; ?></button><?php } ?>
<?php if($cookies_bar_show_button == 'no'):?>
<a class="cross" onclick="zednaAcceptCookies();"><?php echo htmlspecialchars_decode($zedna_cookies_bar_close_output);?></a>
<?php endif;?>
</div>
<style>
#zedna-cookies-bar a{color: <?php echo esc_attr( get_option('zedna_cookies_bar_link_color') ); ?>}
<?php echo esc_attr( get_option('zedna_cookies_bar_custom_css') )?>
<?php if($cookies_bar_show_button == 'no'):?>
	#zedna-cookies-bar .cross{color: <?php echo esc_attr( get_option('zedna_cookies_bar_close_color') ); ?>}
	<?php endif;?>
</style>
<script type="text/javascript">
function zednaAcceptCookiesCallback(){
<?php echo $zedna_cookies_bar_close_callback;?>
}
</script>
<!-- End Cookies bar -->
<?php
}
add_action( 'wp_footer', 'zedna_cookies_bar', 10 );
