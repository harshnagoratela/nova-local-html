<?php

// Template Name: About

get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');

$about_left_content = get_field('about_left_content', $page_ID);
$about_left_button = get_field('about_left_button', $page_ID);
$about_right_content = get_field('about_right_content', $page_ID);
$about_right_button = get_field('about_right_button', $page_ID);

$values_content = get_field('values_content', $page_ID);
$values_button = get_field('values_button', $page_ID);
$add_values = get_field('add_values', $page_ID);

$people_content = get_field('people_content', $page_ID);
$add_people = get_field('add_people', $page_ID);

$history_content = get_field('history_content', $page_ID);
$history_image = get_field('history_image', $page_ID);

$add_logos = get_field('add_logos', $page_ID);

?>

<div class="page-about" data-aos="fade-in">
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

  <?php if ($add_values): ?>
    <div class="section-values section-padding background-orange">
      <div class="columns-1">
        <?php if ($values_content): ?>
          <div class="container-xsmall general-content">
            <?php echo $values_content; ?>

            <?php if ($values_button): ?>
              <div class="button-group">
                <a class="button button-dark" href="<?php echo $values_button['url']; ?>" target="<?php echo $values_button['target']; ?>" title="<?php echo $values_button['title']; ?>">
                  <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                  <?php echo $values_button['title']; ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <div class="container-medium values-list columns-4">
          <?php foreach ($add_values as $value): ?>
            <div class="value-item">
              <?php if ($value['icon']): ?>
                <img src="<?php echo $value['icon']['url']; ?>" alt="<?php echo $value['title']; ?>">
              <?php endif; ?>
              <?php if ($value['title']): ?>
                <h5><?php echo $value['title']; ?></h5>
              <?php endif; ?>
              <?php if ($value['blurb']): ?>
                <p class="muted"><?php echo $value['blurb']; ?></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($add_people): ?>
    <div class="section-people section-padding background-light-grey">
      <div class="columns-1">
        <?php if ($people_content): ?>
          <div class="container-xsmall general-content">
            <?php echo $people_content; ?>
          </div>
        <?php endif; ?>

        <div class="container-medium people-list columns-4">
          <?php $i = 0; foreach ($add_people as $people): $i++;
            $image = get_the_post_thumbnail_url($people, 'profile-thumbnail');
            $position = get_field('position_title', $people);
            $phone_number = get_field('phone_number', $people);
            $email_address = get_field('email_address', $people);
            $linkedin = get_field('linkedin', $people); ?>
            <div class="people-item popup-trigger" data-popup-name="people-popup-<?php echo $i; ?>">
              <div class="item-meta flex flex-align-end">
                <div>
                  <h5><?php echo get_the_title($people); ?></h5>
                  <?php if ($position): ?>
                    <p><small><?php echo $position; ?></small></p>
                  <?php endif; ?>
                </div>
                <?php require(get_template_directory().'/assets/img/icon-plus.svg'); ?>
              </div>
              <?php if ($image): ?>
                <img src="<?php echo $image; ?>" alt="<?php echo get_the_title($people); ?>">
              <?php endif; ?>
            </div>

            <div class="popup-container" id="people-popup-<?php echo $i; ?>">
              <div class="popup-wrap">
                <div class="container-small">
                  <div class="popup-close"><?php require(get_template_directory().'/assets/img/icon-cross.svg'); ?></div>
                  <div class="columns-2">
                    <div class="general-content">
                      <?php if ($image): ?>
                        <img src="<?php echo $image; ?>" alt="<?php echo get_the_title($people); ?>">
                      <?php endif; ?>

                      <div class="social-icons flex flex-align-center">
                        <?php if ($phone_number): ?>
                          <a href="tel:<?php echo $phone_number; ?>" target="_blank" title="Call <?php echo get_the_title($people); ?>">
                            <?php require(get_template_directory().'/assets/img/icon-phone.svg'); ?>
                          </a>
                        <?php endif; ?>
                        <?php if ($email_address): ?>
                          <a href="mailto:<?php echo $email_address; ?>" target="_blank" title="Email <?php echo get_the_title($people); ?>">
                            <?php require(get_template_directory().'/assets/img/icon-mail.svg'); ?>
                          </a>
                        <?php endif; ?>
                        <?php if ($linkedin): ?>
                          <a href="<?php echo $linkedin; ?>" target="_blank" title="Connect to <?php echo get_the_title($people); ?> on Linkedin">
                            <?php require(get_template_directory().'/assets/img/icon-linkedin.svg'); ?>
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>

                    <div class="general-content">
                      <h4><?php echo get_the_title($people); ?></h4>
                      <?php if ($position): ?>
                        <p class="muted"><?php echo $position; ?></p>
                      <?php endif; ?>
                      <?php echo apply_filters('the_content', get_post($people)->post_content); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($history_content): ?>
    <div class="section-history">
      <div class="container-medium section-padding">
        <div class="general-content">
          <?php echo $history_content; ?>
        </div>
      </div>

      <?php if ($history_image): ?>
        <div class="history-banner relative" style="max-height: 700px; min-height: 300px; height: 30vw;">
          <div class="background-img" style="background-image: url(<?php echo $history_image['sizes']['1200']; ?>);"></div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if ($add_logos): ?>
    <div class="section-logos section-padding-top">
      <div class="container-xlarge flex flex-align-center">
        <?php foreach ($add_logos as $logo): ?>
          <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
