<?php get_header();

$page_ID = 62;

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');

$categories = get_terms(array('taxonomy' => 'projects_category', 'hide_empty' => true));

/* Projects Query */

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$args = array(
  'post_type' => 'projects',
  'post_status' => 'publish',
  'posts_per_page' => 12,
  'paged' => $paged,
);

$args['meta_query'][] = array(
  'key' => 'featured_project',
  'value' => 'yes',
  'compare' => '=',
);

$projects_query = new WP_Query($args); ?>

<div class="page-projects" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>

  <div class="section-blog-list section-padding-top background-light">
    <div class="columns-1">
      <?php if ($categories): ?>
        <div class="container-small">
          <div class="category-list flex flex-justify-center">
            <a class="current" href="<?php echo get_permalink($page_ID); ?>" title="View All Posts"><h6>All</h6></a>
            <?php foreach ($categories as $cat): ?>
              <a href="<?php echo get_term_link($cat->term_id); ?>" title="View <?php echo $cat->name; ?> Posts"><h6><?php echo $cat->name; ?></h6></a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="container-large">
        <?php if ($projects_query->have_posts()): ?>
          <div class="project-list columns-3">
            <?php while ($projects_query->have_posts()): $projects_query->the_post(); $post_ID = get_the_ID(); ?>
              <?php include(get_template_directory().'/parts/project-item.php'); ?>
            <?php endwhile; ?>
          </div>

          <?php if ($paged >= 1): ?>
            <div class="simple-pagination">
              <?php $big = 999999999;
                echo paginate_links(array(
                  'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                  'format'  => '?paged=%#%',
                  'current' => max(1, get_query_var('paged')),
                  'total'   => $projects_query->max_num_pages
                )); ?>
            </div>
          <?php endif; ?>
        <?php else: ?>
          <p>No posts found</p>
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer();
