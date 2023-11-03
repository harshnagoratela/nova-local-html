<?php get_header();

$page_ID = get_queried_object_ID();

$categories = get_the_terms($page_ID, 'projects_category');

$thumbnail = get_the_post_thumbnail_url($page_ID, '1200');

$overview = get_field('overview', $page_ID);

$gallery = get_field('gallery', $page_ID);

$accordion = get_field('accordion', $page_ID);

$video = get_field('video', $page_ID);
$video_thumb = get_field('video_thumbnail', $page_ID);

$prev_post = get_next_post_link('%link', '<h6>Previous Post</h6>');
$next_post = get_previous_post_link('%link', '<h6>Next Post</h6>');

$add_child_projects = get_field('child_projects', $page_ID);

// $related_args = array('post_type' => get_post_type(), 'post_status' => 'publish', 'posts_per_page' => 8, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => array($page_ID));
// $related_posts = new WP_Query($related_args); ?>

<div class="single-project" data-aos="fade-in">
  <?php while (have_posts()): the_post(); ?>
    <div class="section-content section-padding-top">
      <div class="columns-1">
        <div class="container-medium general-content">
          <h4>Projects</h4>
          <h1><?php echo get_the_title(); ?></h1>

          <?php if ($categories): ?>
            <div class="flex-gap">
              <?php foreach ($categories as $cat): ?>
                <p class="tag"><?php echo $cat->name; ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($gallery): ?>
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
        <?php elseif ($thumbnail): ?>
          <div class="container-large general-content">
            <img style="width: 100%; height: auto; display: block;" src="<?php echo $thumbnail; ?>" alt="<?php echo get_the_title(); ?>">
          </div>
        <?php endif; ?>

        <?php if ($overview): ?>
          <div class="container-medium">
            <div class="meta-list columns-<?php if (count($overview) >= 5): echo '5'; else: echo count($overview); endif; ?>">
              <?php foreach ($overview as $item): ?>
                <div class="meta-item">
                  <h5><?php echo $item['value']; ?></h5>
                  <p><?php echo $item['label']; ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <div class="container-medium general-content">
          <?php the_content(); ?>
        </div>

        <?php if ($accordion): ?>
          <div class="container-medium">
            <?php include(get_template_directory().'/parts/accordion.php'); ?>
          </div>
        <?php endif; ?>

        <?php if ($video): ?>
          <div class="container-medium">
            <div class="embed-container">
              <?php echo $video; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endwhile; ?>

  <?php if ($add_child_projects): ?>
    <div class="section-project-slider section-padding-top columns-1">
      <div class="container-small general-content tacenter">
        <h2>Project Packages</h2>
      </div>

      <div class="container-xlarge">
        <?php if (count($add_child_projects) >= 4): ?>
          <div class="swiper posts-slider">
            <div class="swiper-wrapper">
              <?php foreach ($add_child_projects as $item): $post_ID = $item; ?>
                <div class="swiper-slide">
                  <?php include(get_template_directory().'/parts/project-item.php'); ?>
                </div>
              <?php endforeach; wp_reset_postdata(); ?>
            </div>
          </div>
        <?php else: ?>
          <div class="project-list columns-3">
            <?php foreach ($add_child_projects as $item): $post_ID = $item; ?>
              <?php include(get_template_directory().'/parts/project-item.php'); ?>
            <?php endforeach; wp_reset_postdata(); ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if (count($add_child_projects) >= 4): ?>
        <div class="container-small slider-meta flex flex-align-center">
          <div class="slider-navigation flex flex-gap">
            <div class="slider-button-prev"></div>
            <div class="slider-button-next"></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>

<?php get_footer();
