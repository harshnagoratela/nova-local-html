<?php get_header();

$page_ID = get_queried_object_ID();

$date = get_the_date('d.m.y', $page_ID);
$categories = get_the_category($page_ID);
$thumbnail = get_the_post_thumbnail_url($page_ID, '1200');

$prev_post = get_next_post_link('%link', '<h6>Previous Post</h6>');
$next_post = get_previous_post_link('%link', '<h6>Next Post</h6>'); ?>

<div class="single-post" data-aos="fade-in">
  <?php while (have_posts()): the_post(); ?>
    <div class="section-post-content section-padding-top">
      <div class="container-medium columns-1">
        <div class="general-content">
          <h4>Blog</h4>
          <h1><?php echo get_the_title(); ?></h1>

          <?php if ($categories): ?>
            <div class="flex-gap">
              <?php foreach ($categories as $cat): ?>
                <p class="tag"><?php echo $cat->name; ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($thumbnail): ?>
          <div class="general-content">
            <img src="<?php echo $thumbnail; ?>" alt="<?php echo get_the_title(); ?>">
          </div>
        <?php endif; ?>

        <div class="general-content">
          <?php the_content(); ?>
        </div>

        <?php if ($prev_post || $next_post): ?>
          <div class="pagination flex flex-justify-between">
            <div class="previous">
              <?php echo ($prev_post ? $prev_post : ''); ?>
            </div>
            <div class="next">
              <?php echo ($next_post ? $next_post : ''); ?>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <!-- <div class="sharing">
        SHARE THIS!
      </div> -->
    </div>
  <?php endwhile; ?>
</div>

<?php get_footer();
