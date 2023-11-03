<?php get_header(); ?>

<div class="page-search" data-aos="fade-in">
  <div class="section-page-banner relative background-dark-grey">
    <div class="container-large tacenter">
      <?php if (get_search_query()): ?>
        <h1><strong>Search results for: <?php echo esc_html(get_search_query(false)); ?></strong></h1>
      <?php else: ?>
        <h1><strong>Search results</strong></h1>
      <?php endif; ?>
    </div>
  </div>

  <div class="section-search-results section-padding background-light-grey">
    <div class="container-small columns-1">
      <?php if (have_posts()): ?>
        <div class="post-list columns-1">
          <?php while (have_posts()): the_post();
            $post_ID = get_the_ID();
            $thumbnail = get_the_post_thumbnail_url($post_ID, 'square-thumbnail');
            $categories = get_the_category($post_ID); ?>

            <div class="post-item">
              <div class="flex flex-align-center flex-justify-between flex-gap">
                <h4 style="flex: 1;"><?php echo get_the_title($post_ID); ?></h4>

                <div class="button-group">
                  <a class="button" href="<?php echo get_permalink($post_ID); ?>" title="Read <?php echo get_the_title($post_ID); ?>">
                    <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                    Read More
                  </a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <div class="general-content tacenter">
          <h3>Nothing found matching your search. Try again?</h3>
          <form class="filter-form flex" action="<?php bloginfo('url'); ?>/" method="get">
            <input type="text" value="" name="s" placeholder="What are you looking for?"  />
            <input type="submit" value="Search" />
          </form>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer();
