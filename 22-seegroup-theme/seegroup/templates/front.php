<?php

// Template Name: Front

get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');

$opener_content = get_field('opener_content', $page_ID);
$opener_buttons = get_field('opener_buttons', $page_ID);
$opener_video = get_field('opener_video', $page_ID);

$about_left_content = get_field('about_left_content', $page_ID);
$about_left_button = get_field('about_left_button', $page_ID);
$about_right_content = get_field('about_right_content', $page_ID);
$about_right_button = get_field('about_right_button', $page_ID);

$stats_title = get_field('stats_title', $page_ID);
$add_stats = get_field('add_stats', $page_ID);

$companies_content = get_field('companies_content', $page_ID);
$add_companies = get_field('add_company', $page_ID);

$projects_content = get_field('projects_content', $page_ID);
$add_projects = get_field('add_projects', $page_ID);

$values_content = get_field('values_content', $page_ID);
$values_button = get_field('values_button', $page_ID);
$add_values = get_field('add_values', $page_ID);

$posts_content = get_field('posts_content', $page_ID);
$add_posts = get_field('add_posts', $page_ID);
?>

<div class="page-front" >
  <div class="section-front-opener section-padding relative">
    <?php if ($opener_content): ?>
      <div class="container-large">
        <div class="general-content">
          <?php echo $opener_content; ?>

          <div class="button-group">
            <?php $button_group = $opener_buttons;
            include(get_template_directory().'/parts/button-group.php'); ?>

            <?php if ($opener_video): ?>
              <div class="button button-white button-video popup-trigger" data-popup-name="popup-video">
                <div class="play-icon">
                  <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                </div>
                Play Video
              </div>

              <div class="popup-container popup-video" id="popup-video">
                <div class="popup-wrap">
                  <div class="popup-close">
                    <?php include(get_template_directory().'/assets/img/icon-cross.svg');  ?>
                  </div>
                  <div class="video-embed-container">
                    <video controls playslinline>
                      <source src="<?php echo $opener_video['url']; ?>" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php require(get_template_directory().'/assets/img/background-opener.svg'); ?>

    <?php if ($banner_img && empty($opener_video)): ?>
      <div class="background-img" style="background-image: url(<?php echo $banner_img; ?>)"></div>
    <?php elseif ($opener_video): ?>
      <div class="background-video">
        <video autoplay muted loop playslinline poster="<?php echo $banner_img; ?>">
          <source src="<?php echo $opener_video['url']; ?>" type="video/mp4">
        </video>
      </div>
    <?php endif; ?>
  </div>

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

  <?php if ($add_stats): ?>
    <div class="section-stats section-padding background-orange">
      <div class="container-medium">
        <?php if ($stats_title): ?>
          <div class="general-content container-padding-bottom tacenter">
            <h2><?php echo $stats_title; ?></h2>
          </div>
        <?php endif; ?>

        <div class="counting-stats columns-5">
          <?php foreach ($add_stats as $stat): ?>
            <div class="post-item counter-item tacenter">
              <h3 class="h1"><?php echo ($stat['prefix'] ? $stat['prefix'] : ''); ?><span class="counter h1"><?php echo $stat['value']; ?></span></h3>
              <h6><?php echo $stat['label']; ?></h6>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($add_companies || $add_projects): ?>
    <div class="section-wrap section-padding background-light-grey columns-1">
      <?php if ($add_companies): ?>
        <div class="section-our-companies columns-1">
          <?php if ($companies_content): ?>
            <div class="container-small general-content">
              <?php echo $companies_content; ?>
            </div>
          <?php endif; ?>

          <div class="container-medium">
            <div class="company-list columns-2">
              <?php foreach ($add_companies as $company):
                $company_ID = $company['select_page'];
                $banner_img = get_the_post_thumbnail_url($company_ID, '600');
                $logo = get_field('company_logo_inverted', $company_ID);
                $overlay = get_field('banner_overlay', $company_ID);
                $excerpt = get_field('excerpt', $company_ID);
                $statistics = get_field('statistics', $company_ID); ?>
                <div class="post-item company-item">
                  <div class="general-content">
                    <?php if ($banner_img || $logo): ?>
                      <div class="image-wrap">
                        <?php if ($logo): ?>
                          <div class="company-logo">
                            <img src="<?php echo $logo['sizes']['600']; ?>" alt="<?php echo get_the_title($company_ID); ?>">
                          </div>
                        <?php endif; ?>
                        <?php if ($overlay): ?>
                          <img class="company-overlay" src="<?php echo $overlay['sizes']['600']; ?>" alt="<?php echo get_the_title($company_ID); ?>">
                        <?php endif; ?>
                        <div class="background-img" style="background-image: linear-gradient(to right, rgba(255, 138, 17, 1), rgba(255, 138, 17, .7)), url(<?php echo $banner_img; ?>);"></div>
                      </div>
                    <?php endif; ?>

                    <h4><?php echo get_the_title($company_ID); ?></h4>
                    <?php if ($excerpt): ?>
                      <p><?php echo $excerpt; ?></p>
                    <?php endif; ?>

                    <?php if ($statistics): ?>
                      <div class="flex" style="gap: 30px;">
                        <?php foreach ($statistics as $stat): ?>
                          <div>
                            <h4><?php echo $stat['value']; ?></h4>
                            <p class="muted"><?php echo $stat['label']; ?></p>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($company_ID): ?>
                      <div class="button-group">
                        <a class="button" href="<?php echo get_permalink($company_ID); ?>" target="" title="<?php echo get_the_title($company_ID); ?>">
                          <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                          More Info
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($add_projects): ?>
        <div class="section-project-slider columns-1 <?php if ($add_companies): echo 'container-padding-top'; endif; ?>">
          <?php if ($projects_content): ?>
            <div class="container-small general-content">
              <?php echo $projects_content; ?>
            </div>
          <?php endif; ?>

          <div class="container-xlarge">
            <div class="swiper posts-slider">
              <div class="swiper-wrapper">
                <?php foreach ($add_projects as $item): $post_ID = $item; ?>
                  <div class="swiper-slide">
                    <?php include(get_template_directory().'/parts/project-item.php'); ?>
                  </div>
                <?php endforeach; wp_reset_postdata(); ?>
              </div>
            </div>
          </div>

          <div class="container-small slider-meta flex flex-align-center">
            <div class="slider-navigation flex flex-gap">
              <div class="slider-button-prev"></div>
              <div class="slider-button-next"></div>
            </div>
            <div class="swiper-pagination"></div>
            <a href="<?php echo get_permalink(62); ?>" class="button">
              <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
              View all
            </a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if ($add_values): ?>
    <div class="section-values section-padding background-orange">
      <div class="container-medium columns-2 flex-align-center">
        <?php if ($values_content): ?>
          <div class="general-content">
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

        <div class="values-list columns-2 flex-align-center">
          <div></div>
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

  <?php if ($add_posts): ?>
    <div class="section-blog-list section-padding-top background-light">
      <div class="container-large columns-1">
        <?php if ($posts_content): ?>
          <div class="flex-wrap flex-align-center flex-justify-between flex-gap">
            <div class="general-content">
              <?php echo $posts_content; ?>
            </div>
            <a class="button" href="<?php echo get_permalink(38); ?>" title="View all">
              <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
              View all
            </a>
          </div>
        <?php endif; ?>
        <div class="project-list columns-3">
          <?php foreach ($add_posts as $item): $post_ID = $item; ?>
            <?php include(get_template_directory().'/parts/post-item.php'); ?>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
