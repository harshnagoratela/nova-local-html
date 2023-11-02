<?php

/*-------------------------------------------------------
  Thrive Admin Link
-------------------------------------------------------*/

function custom_admin_footer() {
  echo 'By <a href="http://thriveweb.com.au/" title="Web Design & Development by Thrive Digital">Thrive Digital</a>';
}
add_filter('admin_footer_text', 'custom_admin_footer');

/*-------------------------------------------------------
  Custom Theme Support
-------------------------------------------------------*/

function custom_theme_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'custom_theme_support');

/*-------------------------------------------------------
  Disable Gutenburg Editor
-------------------------------------------------------*/

add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

/*-------------------------------------------------------
  Remove Title Prefix
-------------------------------------------------------*/

function remove_protected_text() {
  return __('%s');
}
add_filter('protected_title_format', 'remove_protected_text');

/*-------------------------------------------------------
  Check No Robots
-------------------------------------------------------*/

function no_robots_notice(){
  if (!get_option('blog_public')){
    echo '<div class="error"><p>Search engines are blocked</p></div>';
  }
}
add_action('admin_notices', 'no_robots_notice');

/*-------------------------------------------------------
  Conditional IE HTML5
-------------------------------------------------------*/

function conditional_ie_html5 () {
  global $is_IE;
  if ($is_IE){
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
  }
}
add_action('wp_head', 'conditional_ie_html5');

/*-------------------------------------------------------
  No Pingbacks
-------------------------------------------------------*/

add_filter('xmlrpc_methods', function($methods) {
  unset($methods['pingback.ping']);
  return $methods;
});

/*-------------------------------------------------------
  Pretty URL
-------------------------------------------------------*/

function pretty_url($url) {
	$url = str_replace('http://', '', $url);
	$url = str_replace('https://', '', $url);
	$url = str_replace('www.', '', $url);
	$url = rtrim($url, "/");
    return $url;
}

/*-------------------------------------------------------
  Disable Anchor Scroll (Gravity Forms)
-------------------------------------------------------*/

add_filter('gform_confirmation_anchor', '__return_false');

/*-------------------------------------------------------
  Replace dashes with a space
-------------------------------------------------------*/

function replace_dashes($string) {
  $clean = str_replace("-", " ", $string);
  $string = ucwords($clean);
  return $string;
}

/*-------------------------------------------------------
  Responsive Content Embeds (iframe)
-------------------------------------------------------*/

add_filter('the_content', function($content) {
	return str_replace(array("<iframe", "</iframe>"), array('<div class="embed-container"><iframe', "</iframe></div>"), $content);
});

add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
	if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
  		return '<div class="responsive-embed youtube-embed">' . $html . '</div>';
	} else {
	 return $html;
	}
}, 10, 4);

add_filter('embed_oembed_html', function($code) {
  return str_replace('<iframe', '<iframe class="responsive-embed-item" ', $code);
});

add_filter( 'gppa_object_type_col_rows_query', function( $sql, $col, $table, $gppa_obj ) {
	$meta_limit = 5000;

	global $wpdb;
	if ( $wpdb->postmeta === $table ) {
		$sql = str_replace( '1000', $meta_limit, $sql );
	}
	return $sql;
}, 10, 4 );

/*-------------------------------------------------------
  Custom WYSIWYG Colours
-------------------------------------------------------*/

function custom_mce_text_colours($init) {
  $custom_colours = '
    "ff8a11", "Orange",
    "6b6867", "Mid Grey",
    "e8e8e8", "Light Grey",
  ';

  $init['textcolor_map'] = '['.$custom_colours.']';
  $init['textcolor_rows'] = 1;

  return $init;
}
add_filter('tiny_mce_before_init', 'custom_mce_text_colours');


/*-------------------------------------------------------
  Register Menus
-------------------------------------------------------*/

function register_custom_menu() {
	register_nav_menu('main_left', 'Main Menu Left');
	register_nav_menu('main_right', 'Main Menu Right');
	register_nav_menu('privacy', 'Privacy Menu');
}
add_action('init', 'register_custom_menu');


/*-------------------------------------------------------
  Enable Active Menu for CPT
-------------------------------------------------------*/

function custom_active_cpt_menu_classes($classes = array(), $menu_item = false) {
  if (in_array('menu-item-64', $classes) && is_singular('projects')) {
    $classes[] = 'current-menu-item';
  }

  if (in_array('menu-item-64', $classes) && is_post_type_archive('projects')) {
    $classes[] = 'current-menu-item';
  }

  if (in_array('menu-item-64', $classes) && is_tax('projects_category')) {
    $classes[] = 'current-menu-item';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'custom_active_cpt_menu_classes', 10, 2);

/*-------------------------------------------------------
  Console Log
-------------------------------------------------------*/

function console_log($data) {
  echo '<script>';
  echo 'console.log("PHP", '.json_encode($data).')';
  echo '</script>';
}

/*-------------------------------------------------------
  User Documentation
-------------------------------------------------------*/

function documentation() {
  echo '<style media="screen">
    .docs {
      width: 90%;
      height: 100%;
      padding-bottom: 105%;
    }
    iframe {
      position: absolute;
      top:0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
  <div class="docs">
    <iframe src="/docs2/" width="100%" height="100%"></iframe>
  </div>';
}

function register_documentation(){
  add_menu_page(
    __( 'Documentation', 'textdomain' ),
    'Documentation',
    'manage_options',
    'user-manual',
    'documentation',
    'dashicons-sos',
    3
  );
}
add_action('admin_menu', 'register_documentation');
