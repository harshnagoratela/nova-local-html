<?php

// Template Name: Flexible

get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');?>

<div class="page-flexible" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>
  <?php include(get_template_directory().'/parts/flexible-layout.php'); ?>
</div>

<?php get_footer(); ?>
