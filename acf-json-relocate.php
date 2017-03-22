<?php
/*
Plugin Name:  Relocate ACF JSON folder
Description:  Change where ACF stores the json files for fields.
Version:      1.0.0
Author:       Philipp Sahner
Author URI:   https://resmio.com
License:      MIT License
*/

/*
 * Inspired by the plugin from
 * Aurélien Dias https://thegentlemanstudio.com
 */

add_filter('acf/settings/load_json', 'change_acf_json_load_point');
add_filter('acf/settings/save_json', 'change_acf_json_save_point');

function change_acf_json_load_point( $paths ) {
  $acf_dir = dirname( __FILE__ ) . '/_acf-json/' . get_template();
  unset($paths[0]);
  if (!file_exists($acf_dir)) {
    mkdir($acf_dir, 0755, true);
  }
  $paths[] = $acf_dir;
  return $paths;
}
function change_acf_json_save_point( $paths ) {
  $acf_dir = dirname( __FILE__ ) . '/_acf-json/' . get_template();
  if (!file_exists($acf_dir)) {
    mkdir($acf_dir, 0755, true);
  }
  return $acf_dir;
}
?>
