<div class="section-page-banner relative">
  <div class="container-large tacenter">
    <?php if (is_home()): ?>
      <h1><strong><?php echo get_queried_object()->post_title; ?></strong></h1>
    <?php elseif(is_archive('post') && is_category()): ?>
      <h1><strong>NEWS</strong></h1>
    <?php elseif(is_archive()): ?>
      <h1><strong><?php echo post_type_archive_title(false); ?></strong></h1>
    <?php elseif(is_page_template('templates/company.php')): ?>
      <h1><strong>What We Do</strong></h1>
    <?php else: ?>
      <h1><strong><?php echo get_the_title($page_ID); ?></strong></h1>
    <?php endif; ?>
  </div>
  <?php if (!empty($banner_overlay)): ?>
    <img class="banner-overlay" src="<?php echo $banner_overlay['sizes']['800']; ?>" alt="<?php echo get_the_title($page_ID); ?>">
  <?php endif; ?>
  <div class="background-img" style="background-image: url(<?php echo ($banner_img ? $banner_img : ''); ?>);"></div>
</div>
