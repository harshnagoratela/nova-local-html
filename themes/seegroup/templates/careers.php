<?php

// Template Name: Careers

get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');

$about_left_content = get_field('about_left_content', $page_ID);
$about_left_button = get_field('about_left_button', $page_ID);
$about_right_content = get_field('about_right_content', $page_ID);
$about_right_button = get_field('about_right_button', $page_ID);

$benefits_content = get_field('benefits_content', $page_ID);
$add_benefits = get_field('add_benefits', $page_ID);

$gallery_content = get_field('gallery_content', $page_ID);
$gallery = get_field('gallery', $page_ID);

$video_content = get_field('video_content', $page_ID);
$video_embed = get_field('video_embed', $page_ID);

$columns_content = get_field('columns_content', $page_ID);
$add_columns = get_field('add_columns', $page_ID);

$accordion_content = get_field('accordion_content', $page_ID);
$accordion = get_field('add_accordion', $page_ID);

?>

<div class="page-careers" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>

  <?php if ($about_left_content && $about_right_content): ?>
    <div class="section-content section-padding">
      <div class="container-medium columns-2 flex-align-center">
        <div class="general-content">
          <?php echo $about_left_content; ?>
          <?php if ($about_left_button): ?>
            <div class="button-group">
              <a class="button" href="<?php echo $about_left_button['url']; ?>" target="<?php echo $about_left_button['target']; ?>" title="<?php echo $about_left_button['title']; ?>">
                <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                <?php echo $about_left_button['title']; ?>
              </a>
            </div>
          <?php endif; ?>
        </div>

        <div class="general-content">
          <?php echo $about_right_content; ?>
          <?php if ($about_right_button): ?>
            <div class="button-group">
              <a class="button" href="<?php echo $about_right_button['url']; ?>" target="<?php echo $about_right_button['target']; ?>" title="<?php echo $about_right_button['title']; ?>">
                <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                <?php echo $about_right_button['title']; ?>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($add_benefits): ?>
    <div class="section-benefits section-padding background-light-grey">
      <div class="container-small columns-1">
        <?php if ($benefits_content): ?>
          <div class="general-content">
            <?php echo $benefits_content; ?>
          </div>
        <?php endif; ?>

        <div class="benefits-list columns-2">
          <?php foreach ($add_benefits as $benefit): ?>
            <div class="benefit-item general-content">
              <?php if ($benefit['title']): ?>
                <h4><?php echo $benefit['title']; ?></h4>
              <?php endif; ?>
              <?php if ($benefit['blurb']): ?>
                <p><?php echo $benefit['blurb']; ?></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($video_embed): ?>
    <div class="section-video section-padding">
      <div class="columns-1">
        <?php if ($video_content): ?>
          <div class="container-xsmall general-content">
            <?php echo $video_content; ?>
          </div>
        <?php endif; ?>

        <div class="container-small">
          <div class="embed-container">
            <?php echo $video_embed; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($add_columns): ?>
    <div class="section-content-columns section-padding background-light-grey">
      <div class="container-large columns-1">
        <?php if ($columns_content): ?>
          <div class="general-content">
            <?php echo $columns_content; ?>
          </div>
        <?php endif; ?>

        <?php if ($add_columns): ?>
          <div class="columns-2 flex-align-center">
            <?php foreach ($add_columns as $col):
              $left_content = $col['left_content'];
              $left_button = $col['left_button'];
              $right_content = $col['right_content'];
              $right_button = $col['right_button'];  ?>
              <?php if ($col['left_content']): ?>
                <div class="general-content">
                  <?php echo $col['left_content']; ?>
                  <?php if ($col['left_button']): ?>
                    <div class="button-group">
                      <a class="button" href="<?php echo $col['left_button']['url']; ?>" target="<?php echo $col['left_button']['target']; ?>" title="<?php echo $col['left_button']['title']; ?>">
                        <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                        <?php echo $col['left_button']['title']; ?>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php if ($col['right_content']): ?>
                <div class="general-content">
                  <?php echo $col['right_content']; ?>
                  <?php if ($col['right_button']): ?>
                    <div class="button-group">
                      <a class="button" href="<?php echo $col['right_button']['url']; ?>" target="<?php echo $col['right_button']['target']; ?>" title="<?php echo $col['right_button']['title']; ?>">
                        <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                        <?php echo $col['right_button']['title']; ?>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($gallery): ?>
    <div class="section-gallery section-padding columns-1">
      <?php if ($gallery_content): ?>
        <div class="container-small general-content">
          <?php echo $gallery_content; ?>
        </div>
      <?php endif; ?>

      <div class="container-xlarge">
        <div class="slider-navigation flex flex-gap">
          <div class="slider-button-prev"></div>
          <div class="slider-button-next"></div>
        </div>
        <div class="swiper image-slider">
          <div class="swiper-wrapper">
            <?php foreach ($gallery as $img): ?>
              <img class="swiper-slide" src="<?php echo $img['sizes']['gallery-thumbnail']; ?>" alt="<?php echo $img['alt']; ?>">
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($accordion): ?>
    <div class="section-faq section-padding background-light-grey">
      <div class="container-medium columns-1">
        <?php if ($accordion_content): ?>
          <div class="general-content">
            <?php echo $accordion_content; ?>
          </div>
        <?php endif; ?>
        <?php include(get_template_directory().'/parts/accordion.php'); ?>
      </div>
    </div>
  <?php endif; ?>

</div>

<?php get_footer(); ?>
