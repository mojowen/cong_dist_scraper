<?php
/**
 * @package A_Fix_Directory
 * @version 1.6
 */
/*
Plugin Name: Import Map Icons from Google Spreadsheets
Plugin URI: http://scottduncombe.com
Description: This plugin imports map markers from google spreadsheets. It's custom
Author: Scott Duncombe
Version: 0.0
Author URI: http://scottduncombe.com
*/

wp_register_script('sheet_map', plugins_url('sheet_map').'/sheet_map.js');
$translation_array = array(
  'print_url' => plugins_url('sheet_map').'/print.php'
);
wp_localize_script('sheet_map', 'sheet_map', $translation_array);

wp_enqueue_script('sheet_map', plugins_url('sheet_map').'/sheet_map.js', array(), '0.0', true);
wp_enqueue_script('sheet_map_init', plugins_url('sheet_map').'/sheet_map_init.js', array('sheet_map'), '0.0', true);