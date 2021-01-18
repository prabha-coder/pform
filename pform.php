<?php
/**
 * Plugin Name: PForm
 * Plugin URI: https://wordpress.org/plugins/prabha-form
 * Description: Contact-Form to Google Sheet and Get Notification on Telegram.
 * Author: PRABAKAR
 * Author URI: https://github.com/prabha-coder
 * Version: 1.0
 * Text Domain: prabha-form
 * License: GPL2
 * @package     pform
 * @author 		Prabakar
 * @version		1.0
 *Copyright (C) 2021  Prabha Tech

    PForm is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    PForm is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with PForm.  If not, see <https://www.gnu.org/licenses/>
*/
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

define("PForm_Project_PLUGIN_DIR", __file__);
define("PForm_Project_PLUGIN_BASE", dirname(__file__));
define("PForm_Project_PLUGIN_URL", plugin_dir_url(PForm_Project_PLUGIN_DIR));

define("PForm_Project_PLUGIN_INCLUDE_DIR", PForm_Project_PLUGIN_BASE. "/includes/");

function pform_js_script() {

	wp_register_style( 'style', PForm_Project_PLUGIN_URL.'assets/css/pform_project_styles.css', array(), 0.5, 'all' );
	wp_enqueue_style( 'style');
	wp_register_style( 'button_style', PForm_Project_PLUGIN_URL.'assets/css/pform_project_button_styles.css', array(), 0.5, 'all' );
	wp_enqueue_style( 'button_style');
     wp_register_script( 'validator', PForm_Project_PLUGIN_URL.'assets/js/pform_validate_min.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script( 'validator' );
    wp_enqueue_script( 'ajax-script', PForm_Project_PLUGIN_URL.'assets/js/pform_project_scripts.js', array( 'jquery' ));
    wp_localize_script( 'ajax-script', 'PForm_msg_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_register_script( 'pformbuttonfunctions', PForm_Project_PLUGIN_URL.'assets/js/pform_project_button_script.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script( 'pformbuttonfunctions' );
      
}

add_action( 'wp_footer', 'pform_js_script' );

include_once PForm_Project_PLUGIN_INCLUDE_DIR . '/pform_settings.php';
include_once PForm_Project_PLUGIN_INCLUDE_DIR . '/pform_index.php';
include_once PForm_Project_PLUGIN_INCLUDE_DIR . '/pform_button.php';
include_once PForm_Project_PLUGIN_INCLUDE_DIR . '/pform_function.php';
include_once PForm_Project_PLUGIN_INCLUDE_DIR . '/pform_gscript_function.php';

