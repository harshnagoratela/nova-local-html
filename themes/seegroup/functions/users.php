<?php

/*-------------------------------------------------------
  Tidy Dashboard Menu
-------------------------------------------------------*/

function custom_dashboard_menu_order($menu_ord) {
  if (!$menu_ord) return true;

  return array(
    'index.php', // Dashboard
    'user-manual', // Documentation

    'separator1', // First separator

    'upload.php', // Media
    'gf_edit_forms', // Gravity Forms
    'edit.php?post_type=page', // Pages
    'edit.php', // Posts
    'edit.php?post_type=projects', // Projects
    'edit.php?post_type=people', // Poeple
    'edit-comments.php', // Comments
    'acf-options', // Site Options

    'separator-last', // Last separator

    'themes.php', // Appearance
    'options-general.php', // Settings
    'plugins.php', // Plugins
    'tools.php', // Tools
    'users.php', // Users

    'separator2', // Second separator

    'edit.php?post_type=acf-field-group', // ACF
    'wpseo_dashboard', // Yoast SEO
    'itsec-dashboard', // Security
    'WP-Optimize', // WP Optimize
    'activity_log_page', // Activity Log
  );
}
add_filter('custom_menu_order', 'custom_dashboard_menu_order', 10, 1);
add_filter('menu_order', 'custom_dashboard_menu_order', 10, 1);

function remove_dashboard_items() {
  remove_menu_page('edit-comments.php'); // Comments
}
add_action('admin_menu', 'remove_dashboard_items', 100);


/*-------------------------------------------------------
  Tidy Admin Bar
-------------------------------------------------------*/

function remove_admin_bar_items($wp_admin_bar) {
  $wp_admin_bar->remove_node('wp-logo');
  $wp_admin_bar->remove_node('updates');
  $wp_admin_bar->remove_node('comments');
  $wp_admin_bar->remove_node('search');
  $wp_admin_bar->remove_node('wpseo-menu');
}
add_action('admin_bar_menu', 'remove_admin_bar_items', 999);


/*-------------------------------------------------------
  Lost Password Link
-------------------------------------------------------*/

function custom_lostpassword_url() {
  return site_url('/wp-login.php?action=lostpassword');
}
add_filter('lostpassword_url',  'custom_lostpassword_url', 10, 0);


/*-------------------------------------------------------
  Default Profile Colour Scheme
-------------------------------------------------------*/

function set_user_colour_scheme($color_scheme) {
  $color_scheme = 'modern';
  return $color_scheme;
}
add_filter('get_user_option_admin_color', 'set_user_colour_scheme', 5);


/*-------------------------------------------------------
  Custom Profile Image
-------------------------------------------------------*/

function custom_user_profile_image($avatar, $id_or_email, $size, $alt, $args){
  $author_img = get_field('profile_image', 'user_'.$id_or_email);
  if ($author_img) {
    $avatar = '<img src="'.$author_img['sizes']['100'].'" width="32" height="32"/>';
    return $avatar;
  }

}
// add_filter('get_avatar', 'custom_user_profile_image', 10, 5);


/*-------------------------------------------------------
  Tidy Profile Page
-------------------------------------------------------*/

function remove_profile_fields(){
  echo '<style>
    #your-profile h2,
    #your-profile .application-passwords,
    #your-profile tr.user-syntax-highlighting-wrap,
    #your-profile tr.user-admin-color-wrap,
    #your-profile tr.user-rich-editing-wrap,
    #your-profile tr.user-comment-shortcuts-wrap,
    #your-profile tr.user-profile-picture,
    #your-profile tr.user-sessions-wrap,
    #your-profile tr.user-url-wrap,
    #your-profile tr.user-aim-wrap,
    #your-profile tr.user-yim-wrap,
    #your-profile tr.user-jabber-wrap,
    #your-profile tr.user-facebook-wrap,
    #your-profile tr.user-instagram-wrap,
    #your-profile tr.user-linkedin-wrap,
    #your-profile tr.user-myspace-wrap,
    #your-profile tr.user-pinterest-wrap,
    #your-profile tr.user-soundcloud-wrap,
    #your-profile tr.user-tumblr-wrap,
    #your-profile tr.user-twitter-wrap,
    #your-profile tr.user-youtube-wrap,
    #your-profile tr.user-wikipedia-wrap,
    #your-profile .yoast-settings{
      display: none;
    }

    #your-profile tr .description{
      color: #646970;
    }

    #your-profile td .description{
      display: block;
      margin-top: 5px;
      font-size: 12px;
    }
  </style>';
}
add_action('admin_head-user-edit.php', 'remove_profile_fields');
add_action('admin_head-profile.php', 'remove_profile_fields');
