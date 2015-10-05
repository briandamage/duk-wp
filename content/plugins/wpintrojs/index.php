<?php

/*
  Plugin Name: Introjs Tours
  Plugin URI:
  Description: Desc.
  Author: Rakhitha Nimesh
  Version: 1.0
  Author URI: http://www.innovativephp.com/
 */

$wip_message = '';

add_action('wp_enqueue_scripts', 'wpintro_enqueue_script');

function wpintro_enqueue_script() {

    wp_enqueue_script('jquery');

    wp_register_script('introjs', plugin_dir_url(__FILE__) . 'intro.js');
    wp_enqueue_script('introjs');

    wp_register_style('introjscss', plugin_dir_url(__FILE__) . 'introjs.css');
    wp_enqueue_style('introjscss');



    wp_register_script('wpintro_custom', plugin_dir_url(__FILE__) . 'custom.js', array('jquery'));
    wp_enqueue_script('wpintro_custom');

    $step_data = get_option('wpi_step_data', '');
    $step_data = unserialize($step_data);
    $step_data = array_values($step_data);
    $stepdata_array = array(
        'steps' => json_encode($step_data),
    );

    wp_localize_script('wpintro_custom', 'stepData', $stepdata_array);
}

add_action('admin_menu', 'wpintro_menu_page');

function wpintro_menu_page() {
    add_menu_page('Product Tours', 'Product Tours', 'manage_options', 'wpintro_tour', 'wpintro_menu_page_display', plugins_url('myplugin/images/icon.png'), 6);
    add_submenu_page('wpintro_tour', 'Manage Steps', 'Manage Steps', 'manage_options', 'wpintro_tour_steps', 'wpintro_manage_steps_display');
}

function wpintro_menu_page_display() {
    global $wip_message;

    $pages = get_pages();

    $html = '';
    if ($wip_message != '') {
        $html .= '<div style="background:#9FD09F;padding:5px;">' . $wip_message . '</div>';
    }
    $html .= '<h2>Create Product Tour</h2>';

    $html .= '<form action="" method="post">';

    $html .= '<table class="form-table"><tbody>';
    $html .= '	<tr valign="top">
			<th scope="row"><label>Select Page</label></th>
			<td><select class="regular-text" id="wpi_page" name="wpi_page">';
    foreach ($pages as $page) {
        $html .= '<option value="' . get_page_link($page->ID) . '">';
        $html .= $page->post_title;
        $html .= '</option>';
    }


    $html .= '			</select></td>
		</tr>';
    $html .= '	<tr valign="top">
			<th scope="row"><label>Intro Text</label></th>
			<td><textarea class="regular-text" id="wpi_intro_text" name="wpi_intro_text"></textarea></td>
		</tr>';
    $html .= '	<tr valign="top">
			<th scope="row"><label>Element ID</label></th>
			<td><input type="text" class="regular-text"  id="wpi_element_id" name="wpi_element_id"></td>
		</tr>';
    $html .= '	<tr valign="top">
			<th scope="row"><label></label></th>
			<td><input type="hidden" class="regular-text"  id="wpi_action" name="wpi_action" value="save_steps" >
			<input type="submit" class="regular-text"  id="wpi_submit" name="wpi_submit" value="Save" ></td>
		</tr>';
    $html .= '</form>';
    echo $html;
}

add_action('init', 'wpintro_save_steps');

function wpintro_save_steps() {
    global $wip_message;
    if (isset($_POST['wpi_action']) && $_POST['wpi_action'] == 'save_steps') {


        $intro_text = $_POST['wpi_intro_text'];
        $page = $_POST['wpi_page'];
        $element_id = $_POST['wpi_element_id'];

        $step_data = get_option('wpi_step_data', '');
        if ($step_data != '') {
            $step_data = unserialize($step_data);
            $step_data["wip" . rand(1000, 1000000)] = array("desc" => $intro_text, "url" => $page, "id" => $element_id);
        } else {
            $step_data = array("wip" . rand(1000, 1000000) => array("desc" => $intro_text, "url" => $page, "id" => $element_id));
        }

        $step_data = serialize($step_data);
        update_option('wpi_step_data', $step_data);

        $wip_message = "Step saved successfully";
    } else {
        $wip_message = "";
    }
}

function wpintro_manage_steps_display() {
    $step_data = get_option('wpi_step_data', '');
    if ($step_data != '') {
        $step_data = unserialize($step_data);
    }
    echo "<div id='sortable'>";
    foreach ($step_data as $key => $data) {
        echo "<div class='wip_sort' style='margin:5px;
  border:2px solid;
  background: #fff;' data-identifier=" . $key . "  >
		<ul>
			<li>" . $data['url'] . "</li>
			<li>" . $data['desc'] . "</li>
			<li>" . $data['id'] . "</li>
		</ul>
	      </div>";
    }
    echo "</div>";
}

function wpintro_admin_scripts() {
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-sortable');

    wp_register_script('wpintro_admin', plugin_dir_url(__FILE__) . 'admin.js', array('jquery'));
    wp_enqueue_script('wpintro_admin');

    $config_array = array(
        'ajaxURL' => admin_url('admin-ajax.php'),
    );

    wp_localize_script('wpintro_admin', 'conf', $config_array);
}

add_action('admin_enqueue_scripts', 'wpintro_admin_scripts');

add_action('wp_ajax_nopriv_wpintro_update_step_order', 'wpintro_update_step_order');

add_action('wp_ajax_wpintro_update_step_order', 'wpintro_update_step_order');

function wpintro_update_step_order() {

    $step_data = get_option('wpi_step_data', '');
    $step_data = unserialize($step_data);

    $updates_step_order = array();
    $step_order = explode('@', $_POST['data']);
    array_pop($step_order);
    for ($i = 0; $i < count($step_order); $i++) {
        $updates_step_order[$step_order[$i]] = $step_data[$step_order[$i]];
    }

    $step_data = serialize($updates_step_order);
    update_option('wpi_step_data', $step_data);

    echo json_encode($updates_step_order);
    exit;
}

