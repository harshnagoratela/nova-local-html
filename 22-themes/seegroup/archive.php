<?php get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200'); ?>

<div class="page-archive" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>

  <div class="section-blog-list section-padding-top background-light">
    <div class="container-large columns-1">
      <?php if (have_posts()): ?>
        <div class="post-list columns-3">
          <?php while (have_posts()): the_post(); $post_ID = get_the_ID(); ?>
            <?php include(get_template_directory().'/parts/post-item.php'); ?>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <p>No posts found</p>
      <?php endif; wp_reset_postdata(); ?>
    </div>
  </div>
</div>

<?php get_footer();
