<?php get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200'); ?>

<div class="page-default" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>

  <div class="section-page-content section-padding-top">
    <div class="container-small general-content">
      <?php while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer();
