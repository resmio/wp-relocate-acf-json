<?php
/*
Plugin Name:  Relocate ACF JSON folder
Description:  Change where ACF stores the json files for fields.
Version:      1.0.0
Author:       Aurélien Dias
Author URI:   https://thegentlemanstudio.com
License:      MIT License
*/

add_filter('acf/settings/load_json', 'change_acf_json_load_point');
add_filter('acf/settings/save_json', 'change_acf_json_save_point');

function change_acf_json_load_point( $paths ) {
  unset($paths[0]);
  $paths[] = ROOT_DIR . '/_acf-json';
  return $paths;
}
function change_acf_json_save_point( $paths ) {
  return ROOT_DIR . '/_acf-json';
}
