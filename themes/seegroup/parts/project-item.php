<?php
$thumbnail = get_the_post_thumbnail_url($post_ID, 'post-thumbnail');
$categories = get_the_terms($post_ID, 'projects_category'); ?>

<div class="post-item">
  <?php if ($thumbnail): ?>
    <a href="<?php echo get_permalink($post_ID); ?>" title="<?php echo get_the_title($post_ID); ?>">
      <img src="<?php echo $thumbnail; ?>" alt="<?php echo get_the_title($post_ID); ?>">
    </a>
  <?php endif; ?>

  <?php if ($categories): ?>
    <div class="flex-gap">
      <?php foreach ($categories as $cat): ?>
        <p class="tag"><?php echo $cat->name; ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <h4><?php echo get_the_title($post_ID); ?></h4>

  <div class="button-group">
    <a class="button" href="<?php echo get_permalink($post_ID); ?>" title="Read <?php echo get_the_title($post_ID); ?>">
      <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
      View Project
    </a>
  </div>
</div>
