<?php

/*-------------------------------------------------------
  Custom Enqueue Scripts & Styles
-------------------------------------------------------*/

function custom_uncached_enqueue(){
  wp_enqueue_script('jquery');

  // wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&family=Urbanist:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap');

  // wp_enqueue_script('fa-fontawesome-js', 'https://kit.fontawesome.com/64d6e7b6d4.js');

  wp_enqueue_style('aos-css', 'https://unpkg.com/aos@next/dist/aos.css');
  wp_enqueue_script('aos-js', 'https://unpkg.com/aos@next/dist/aos.js');

  wp_enqueue_style('swiper-css', get_stylesheet_directory_uri().'/assets/css/swiper.min.css', array(), filemtime(get_stylesheet_directory().'/assets/css/swiper.min.css'));
  wp_enqueue_script('swiper-js', get_stylesheet_directory_uri().'/assets/js/swiper.min.js', array(), filemtime(get_stylesheet_directory().'/assets/js/swiper.min.js'));

  wp_enqueue_style('theme-css', get_stylesheet_directory_uri().'/assets/css/theme.css', array(), filemtime(get_stylesheet_directory().'/assets/css/theme.css'));

  wp_enqueue_script('theme-js', get_stylesheet_directory_uri().'/assets/js/scripts.js', array(), filemtime(get_stylesheet_directory().'/assets/js/scripts.js'));
  wp_localize_script('theme-js', 'theme_ajax', array('url' => admin_url('admin-ajax.php'), 'token' => wp_create_nonce('bones_nonce')));
}
add_action('wp_enqueue_scripts', 'custom_uncached_enqueue');

/*-------------------------------------------------------
  Admin Styles
-------------------------------------------------------*/

add_editor_style(get_stylesheet_directory_uri() . '/assets/css/admin.css?v=' . filemtime(get_stylesheet_directory() . '/assets/css/admin.css'));


/*-------------------------------------------------------
  ACF Styles
-------------------------------------------------------*/

function custom_acf_styles() { ?>
  <style type="text/css">
    #no-label > .acf-label label,
    .postbox-header a.acf-hndle-cog {
      display: none !important;
    }
  </style>
<?php }
add_action('acf/input/admin_head', 'custom_acf_styles');
