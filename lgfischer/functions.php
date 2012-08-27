<?php
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// 'Settings' section
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/**
	 * Settings based on the tutorial from http://wp.tutsplus.com/tutorials/theme-development/create-a-settings-page-for-your-wordpress-theme/
	 */

	function setup_theme_admin_menus() {
		add_submenu_page('themes.php', 'Lgfischer Theme Settings', 'Lgfischer Settings', 'manage_options', 'lgfischer-theme-settings', 'page_lgfischer_theme_segttings');
	}

	add_action("admin_menu", "setup_theme_admin_menus");

	function page_lgfischer_theme_segttings() {
		if (!current_user_can('manage_options')) {
			wp_die('You do not have sufficient permissions to access this page.');
		}

		$settings_updated = false;

		if (isset($_POST["update_settings"])) {
			$settings_updated = true;
			$analytics_code = esc_attr($_POST["analytics_code"]);
			update_option("theme_lgfischer_google_analytics_code", $analytics_code);
		}
		else {
			$analytics_code = get_option("theme_lgfischer_google_analytics_code");
		}

		?>
		<div class="wrap">
			<?php screen_icon('themes'); ?> <h2>Lgfischer Theme Settings</h2>
			<?php if($settings_updated) { echo '<div id="message" class="updated">Settings saved</div>'; } ?>
			<form method="POST" action="">
				<input type="hidden" name="update_settings" value="true" />
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<label for="analytics_code">Google Analytics Tracking ID: </label>
						</th>
						<td>
							<input type="text" id="analytics_code" name="analytics_code" value="<?php echo $analytics_code;?>" />
						</td>
					</tr>
				</table>
				<p>
					<input type="submit" value="Save settings" class="button-primary"/>
				</p>
			</form>
		</div>
		<?php
	}
?>