<?php

/*-------------------------------------------------------
  Register Image Sizes
-------------------------------------------------------*/

function custom_theme_image_sizes() {
  add_image_size('1800', 1800, 0, false);
  add_image_size('1200', 1200, 0, false);
  add_image_size('800', 800, 0, false);
  add_image_size('600', 600, 0, false);
  add_image_size('100', 100, 100, true);

  add_image_size('square-thumbnail', 850, 850, true);
  add_image_size('post-thumbnail', 600, 430, true);
  add_image_size('gallery-thumbnail', 950, 550, true);
  add_image_size('profile-thumbnail', 550, 700, true);
}
add_action('after_setup_theme', 'custom_theme_image_sizes');

function custom_editor_image_sizes($sizes) {
  $sizes = array_merge($sizes, array(
    'square-thumbnail' => __('Square'),
    'profile-thumbnail' => __('Portrait')
  ));
  return $sizes;
}
add_filter('image_size_names_choose', 'custom_editor_image_sizes');

/*-------------------------------------------------------
  JPG Image Quality
-------------------------------------------------------*/

function set_jpeg_quality($arg) {
  return (int)90; // change 100 to whatever you prefer, but don't go below 60
}
add_filter('jpeg_quality', 'set_jpeg_quality');


/*-------------------------------------------------------
  SVG Support
-------------------------------------------------------*/

// function add_svg_support($mimes){
//   $mimes['svg'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter('upload_mimes', 'add_svg_support', 99);

function bmwp_admin_add_svg_to_upload_mimes( $upload_mimes ) {
    $file_types = array();
    $file_types['svg'] = 'image/svg+xml';
    $upload_mimes = array_merge( $file_types, $upload_mimes );
    return $upload_mimes;
}
add_filter('upload_mimes', 'bmwp_admin_add_svg_to_upload_mimes');
