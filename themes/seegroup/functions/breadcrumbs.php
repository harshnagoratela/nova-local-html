<?php

/*--------------------------------------------------
  Custom breadcrumbs
---------------------------------------------------*/

function breadcrumbs(){

	if (is_page('home')) {

	}else{
		echo '<div class="section-breadcrumbs container-large"><div class="flex">';

		global $post;

		if (is_archive()){
			echo '<strong>'.post_type_archive_title('', false).'</strong>';
		}

		elseif (is_singular('portfolio')){
			$portfolio_category = get_the_terms($post->ID, 'portfolio_category');

			echo '<a href="'.get_the_permalink(12694).'">'.get_the_title(12694).'</a> <span></span>';

      if ($portfolio_category) {
        echo '<a href="'.get_term_link($portfolio_category[0]->term_id).'">'.$portfolio_category[0]->name.'</a> <span></span>';
      }

			echo '<strong>'.get_the_title().'</strong>';
		}

		elseif (is_singular('blog')){
			$blog_category = get_the_terms($post->ID, 'blog_category');

			echo '<a href="'.get_the_permalink(9061).'">'.get_the_title(9061).'</a> <span></span>';

      if ($blog_category) {
        echo '<a href="'.get_term_link($blog_category[0]->term_id).'">'.$blog_category[0]->name.'</a> <span></span>';
      }

			echo '<strong>'.get_the_title().'</strong>';
		}

		elseif (is_singular('lab')){
			$lab_category = get_the_terms($post->ID, 'lab_category');

			echo '<a href="'.get_the_permalink(24).'">'.get_the_title(24).'</a> <span></span>';

      if ($lab_category) {
        echo '<a href="'.get_term_link($lab_category[0]->term_id).'">'.$lab_category[0]->name.'</a> <span></span>';
      }

			echo '<strong>'.get_the_title().'</strong>';
		}

		else {
			echo '<strong>'.get_the_title().'</strong>';
		}

		echo '</div></div>';
	}
}
