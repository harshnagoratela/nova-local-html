<?php get_header();

$page_ID = 38;
$category_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');

$categories = get_terms(array('taxonomy' => 'category', 'hide_empty' => true)); ?>

<div class="page-news" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>

  <div class="section-blog-list section-padding background-light">
    <div class="container-large columns-1">
      <?php if ($categories): ?>
        <div class="category-list flex flex-justify-center">
          <a href="<?php echo get_permalink($page_ID); ?>" title="View All Posts"><h6>All</h6></a>
          <?php foreach ($categories as $cat): ?>
            <a class="<?php echo ($category_ID == $cat->term_id ? 'current' : ''); ?>" href="<?php echo get_term_link($cat->term_id); ?>" title="View <?php echo $cat->name; ?> Posts"><h6><?php echo $cat->name; ?></h6></a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if (have_posts()): ?>
        <div class="post-list columns-3">
          <?php while (have_posts()): the_post(); $post_ID = get_the_ID(); ?>
            <?php include(get_template_directory().'/parts/post-item.php'); ?>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <p>No posts found</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer();
