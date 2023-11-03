<?php

/*--------------------------------------------------
  Custom edit page button
---------------------------------------------------*/

function edit_page(){
	if (is_user_logged_in()) {
		echo '<a class="button button-edit button-red" href="';
		if (is_page() || is_singular()) {
			$page_ID = get_queried_object_ID();
			echo get_bloginfo('url').'/wp-admin/post.php?post='.$page_ID.'&action=edit';
		} elseif(is_tax('blog_category')){
			$term_ID = get_queried_object_ID();
			echo get_bloginfo('url').'/wp-admin/term.php?taxonomy=blog_category&post_type=blog&tag_ID='.$term_ID;
		} elseif(is_archive('blog')){
			echo get_bloginfo('url').'/wp-admin/edit.php?post_type=blog';
		} elseif(is_tax('lab_category')){
			$term_ID = get_queried_object_ID();
			echo get_bloginfo('url').'/wp-admin/term.php?taxonomy=lab_category&post_type=lab&tag_ID='.$term_ID;
		} elseif(is_archive('lab')){
			echo get_bloginfo('url').'/wp-admin/edit.php?post_type=lab';
		} else{
			echo get_bloginfo('url').'/wp-admin';
		}
		echo '">'; require(get_template_directory().'/src/img/icon-edit.svg'); echo '</a>';
	}
}
