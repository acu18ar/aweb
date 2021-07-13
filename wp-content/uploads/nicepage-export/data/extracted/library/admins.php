<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function theme_print_options() {
	global $theme_options;
	?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2><?php _e('Theme Options', 'default'); ?></h2>
		<?php
		if (isset($_REQUEST['Submit'])) {
			foreach ($theme_options as $value) {
				$id = theme_get_array_value($value, 'id');
				$val = stripslashes(theme_get_array_value($_REQUEST, $id, ''));
				$type = theme_get_array_value($value, 'type');
				switch ($type) {
					case 'checkbox':
						$val = ($val ? 1 : 0);
						break;
					case 'numeric':
						$val = (int) $val;
						break;
				}
				update_option($id, $val);
			}
			echo '<div id="message" class="updated fade"><p><strong>' . __('Settings saved.', 'default') . '</strong></p></div>' . "\n";
		}
		if (isset($_REQUEST['Reset'])) {
			foreach ($theme_options as $value) {
				delete_option(theme_get_array_value($value, 'id'));
			}
			echo '<div id="message" class="updated fade"><p><strong>' . __('Settings restored.', 'default') . '</strong></p></div>' . "\n";
		}
		echo '<form method="post" id="theme_options_form">' . "\n";
		$in_form_table = false;
		$dependent_fields = array();
        $op_by_id = array();
        $used_when = __('Used when <strong>"%s"</strong> is enabled', 'default');

		foreach ($theme_options as $op) {
			$id = theme_get_array_value($op, 'id');
			$type = theme_get_array_value($op, 'type');
			$name = theme_get_array_value($op, 'name');
			$desc = theme_get_array_value($op, 'desc');
			$script = theme_get_array_value($op, 'script');
			$depend = theme_get_array_value($op, 'depend');
			$show = theme_get_array_value($op, 'show', true);

			if (is_bool($show) && !$show || is_callable($show) && !call_user_func($show)) {
				continue;
			}

            $op_by_id[$id] = $op;
			if($depend) {
				$dependent_fields[] = array($depend, $id);
                $desc = (!$desc ? '' : $desc . '<br />') . sprintf($used_when, theme_get_array_value(theme_get_array_value($op_by_id, $depend), 'name', 'section'));
			}
			if ($type == 'heading') {
				if ($in_form_table) {
					echo '</table>' . "\n";
					$in_form_table = false;
				}
				echo '<h3 id="heading-' . sanitize_title_with_dashes($name) . '">' . $name . '</h3>' . "\n";
				if ($desc) {
					echo "\n" . '<p class="description">' . $desc .  '</p>' . "\n";
				}
			} else {
				if (!$in_form_table) {
					echo '<table class="form-table">' . "\n";
					$in_form_table = true;
				}
				echo '<tr valign="top">' . "\n";
				echo '<th scope="row">' . $name . '</th>' . "\n";
				echo '<td>' . "\n";
				$val = theme_template_get_option($id);
				theme_print_option_control($op, $val);
				if ($desc) {
					echo '<span class="description">' . $desc . '</span>' . "\n";
				}
				if ($script) {
					echo '<script>' . $script . '</script>' . "\n";
				}
				echo '</td>' . "\n";
				echo '</tr>' . "\n";
			}
		}
		if ($in_form_table) {
			echo '</table>' . "\n";
		}
		echo "<script>\r\n";
		for($i = 0; $i < count($dependent_fields); $i++) {
			echo "makeDependentField('{$dependent_fields[$i][0]}', '{$dependent_fields[$i][1]}');" . PHP_EOL;
		}
		echo "jQuery('#theme_options_form').bind('submit', function() {" . PHP_EOL .
			"    jQuery('input, textarea', this).each(function() {" . PHP_EOL .
			"        jQuery(this).removeAttr('disabled').removeClass('disabled');" . PHP_EOL .
			"    });" . PHP_EOL .
			"});" . PHP_EOL;
		echo "</script>" . PHP_EOL;
		?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php echo esc_attr(__('Save Changes', 'default')) ?>" />
			<input name="Reset" type="submit" class="button-secondary" value="<?php echo esc_attr(__('Reset to Default', 'default')) ?>" />
		</p>
	</form>
		<?php do_action('theme_options'); ?>
	</div>
	<?php
}

function theme_print_option_control($op, $val) {
	$id = theme_get_array_value($op, 'id');
	$type = theme_get_array_value($op, 'type');
	$options = theme_get_array_value($op, 'options');
	switch ($type) {
		case "numeric":
			echo '<input	name="' . $id . '" id="' . $id . '" type="text" value="' . absint($val) . '" class="small-text" />' . "\n";
			break;
		case "select":
			echo '<select name="' . $id . '" id="' . $id . '">' . "\n";
			foreach ($op['options'] as $key => $option) {
				$selected = ($val == $key ? ' selected="selected"' : '');
				echo '<option' . $selected . ' value="' . $key . '">' . esc_html($option) . '</option>' . "\n";
			}
			echo '</select>' . "\n";
			break;
		case "textarea":
			echo '<textarea name="' . $id . '" id="' . $id . '" placeholder="' . esc_html(theme_get_array_value($options, 'placeholder', '')) . '" rows="' . theme_get_array_value($options, 'rows', 10) . '" cols="50" class="large-text code">' . esc_html($val) . '</textarea><br />' . "\n";
			break;
		case "radio":
			foreach ($op['options'] as $key => $option) {
				$checked = ( $key == $val ? 'checked="checked"' : '');
				echo '<input type="radio" name="' . $id . '" id="' . $id . '" value="' . esc_attr($key) . '" ' . $checked . '/>' . esc_html($option) . '<br />' . "\n";
			}
			break;
		case "checkbox":
			$checked = ($val ? 'checked="checked" ' : '');
			echo '<input type="checkbox" name="' . $id . '" id="' . $id . '" value="1" ' . $checked . '/>' . "\n";
			break;
		default:
			if ($type == 'text') {
				$class = 'regular-text';
			} else {
				$class = 'large-text';
			}
			echo '<input	name="' . $id . '" id="' . $id . '" type="text" value="' . esc_attr($val) . '" class="' . $class . '" />' . "\n";
			break;
	}
}

add_action('admin_head', 'theme_admin_styles');
function theme_admin_styles() {
?>
	<style>
		select[name^=theme_template_] {
			width: 15em;
		}
		#theme_options_form .form-table {
			margin-bottom: 30px;
		}
	</style>
<?php
}