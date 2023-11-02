<?php

// Template Name: Company

get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');
$banner_overlay = get_field('banner_overlay', $page_ID);

$company_logo = get_field('company_logo', $page_ID);

$intro_left_content = get_field('intro_left_content', $page_ID);
$intro_left_button = get_field('intro_left_button', $page_ID);
$intro_right_content = get_field('intro_right_content', $page_ID);
$intro_right_button = get_field('intro_right_button', $page_ID); ?>

<div class="page-company" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>

  <?php if ($intro_left_content || $intro_right_content): ?>
    <div class="section-content section-padding background-white">
      <div class="container-medium columns-1">
        <?php if ($company_logo): ?>
          <div class="general-content">
            <img src="<?php echo $company_logo['url']; ?>" alt="<?php echo get_the_title(); ?>" width="100" height="">
          </div>
        <?php endif; ?>
        <div class="columns-2 flex-align-center">
          <div class="general-content">
            <?php echo ($intro_left_content ? $intro_left_content : ''); ?>
            <?php if ($intro_left_button): ?>
              <div class="button-group">
                <a class="button button-white" href="<?php echo $intro_left_button['url']; ?>" target="<?php echo $intro_left_button['target']; ?>" title="<?php echo $intro_left_button['title']; ?>">
                  <?php echo $intro_left_button['title']; ?>
                  <?php require(get_template_directory().'/assets/img/icon-arrow.svg'); ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
          <div class="general-content">
            <?php echo ($intro_right_content ? $intro_right_content : ''); ?>
            <?php if ($intro_right_button): ?>
              <div class="button-group">
                <a class="button button-white" href="<?php echo $intro_right_button['url']; ?>" target="<?php echo $intro_right_button['target']; ?>" title="<?php echo $intro_right_button['title']; ?>">
                  <?php echo $intro_right_button['title']; ?>
                  <?php require(get_template_directory().'/assets/img/icon-arrow.svg'); ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php include(get_template_directory().'/parts/flexible-layout.php'); ?>
</div>

<?php get_footer(); ?>
