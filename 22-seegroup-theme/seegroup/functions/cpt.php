<?php

/*-------------------------------------------------------
  Register People CPT
-------------------------------------------------------*/

function register_people_cpt() {
  $labels = array(
    'name'                  => _x('People', 'textdomain'),
    'singular_name'         => _x('People', 'textdomain'),
    'menu_name'             => _x('People', 'textdomain'),
    'name_admin_bar'        => _x('People', 'textdomain'),
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'has_archive'           => true,
    'hierarchical'          => false,
    'capability_type'       => 'post',
    'menu_icon'             => 'dashicons-groups',
    'supports'              => array('title', 'editor', 'thumbnail'),
    'rewrite'               => array('slug' => 'people'),
  );
  register_post_type('people', $args);

  unset($args); unset($labels);
}
add_action('init', 'register_people_cpt');


/*-------------------------------------------------------
  Register Projects CPT
-------------------------------------------------------*/

function register_projects_cpt() {
  $labels = array(
    'name'                  => _x('Projects', 'textdomain'),
    'singular_name'         => _x('Project', 'textdomain'),
    'menu_name'             => _x('Projects', 'textdomain'),
    'name_admin_bar'        => _x('Projects', 'textdomain'),
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'has_archive'           => true,
    'hierarchical'          => true,
    'capability_type'       => 'post',
    'menu_icon'             => 'dashicons-admin-tools',
    'rewrite'               => array('slug' => 'projects'),
    'supports'              => array('title', 'editor', 'thumbnail'),
  );
  register_post_type('projects', $args);
  unset($args); unset($labels);

  $labels = array(
    'name'                  => _x('Categories', 'textdomain'),
    'menu_name'             => __('Categories', 'textdomain'),
    'singular_name'         => _x('Category', 'textdomain'),
    'all_items'             => __('All Categories', 'textdomain'),
    'parent_item'           => __('Parent Category', 'textdomain'),
    'parent_item_colon'     => __('Parent Category:', 'textdomain'),
    'edit_item'             => __('Edit Category', 'textdomain'),
    'update_item'           => __('Update Category', 'textdomain'),
    'search_items'          => __('Search Categories', 'textdomain'),
    'add_new_item'          => __('Add New Category', 'textdomain'),
    'new_item_name'         => __('New Category Name', 'textdomain'),
  );

  $args = array(
    'labels'                => $labels,
    'hierarchical'          => true,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'hierarchical'          => true,
    // 'rewrite'               => array('slug' => 'projectss', 'with_front' => false),
  );
  register_taxonomy('projects_category', 'projects', $args);
  unset($args); unset($labels);
}
add_action('init', 'register_projects_cpt');

/* Featured Project Column */

function set_featured_projects_column($columns) {
  $columns['featured_project_col'] = __( 'Featured', 'your_text_domain' );
  return $columns;
}
add_filter('manage_projects_posts_columns', 'set_featured_projects_column');

function populate_featured_projects_column($column, $post_id) {
  $status = get_field('featured_project', $post_id);
  switch ($column) {
    case 'featured_project_col':
        echo ($status == 'yes' ? '★' : '');
        break;
  }
}
add_action('manage_projects_posts_custom_column' , 'populate_featured_projects_column', 10, 2);

/* Remove Featured Projects from Relationship Field */

function remove_featured_projects_from_relationship($args, $field, $post_id) {
  $args['meta_query'] = array(
    array(
      'key' => 'featured_project',
      'value' => 'no',
      'compare' => '='
    ),
  );

  return $args;
}
add_filter('acf/fields/relationship/query/name=child_projects', 'remove_featured_projects_from_relationship', 10, 3);
