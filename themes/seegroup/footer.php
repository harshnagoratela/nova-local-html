<?php
$cta_content = get_field('cta_content', 'options');
$cta_button = get_field('cta_button', 'options');
$cta_image = get_field('cta_image', 'options');

$social_media = get_field('social_media', 'options'); ?>

<?php if ($cta_content && !is_404()): ?>
  <div class="section-cta section-padding-top">
    <div class="container-small background-orange flex flex-align-center">
      <div class="general-content">
        <?php echo $cta_content; ?>
        <?php if ($cta_button): ?>
          <div class="button-group">
            <a class="button button-dark" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>" title="<?php echo $cta_button['title']; ?>">
              <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
              <?php echo $cta_button['title']; ?>
            </a>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($cta_image): ?>
        <img src="<?php echo $cta_image['sizes']['square-thumbnail']; ?>" alt="<?php echo $cta_image['alt']; ?>">
      <?php endif; ?>

      <div class="background-img" style="background-image: url(<?php echo get_template_directory_uri().'/assets/img/background-cta.svg'; ?>);">

      </div>
    </div>
  </div>
<?php endif; ?>

<footer class="<?php if ($cta_content && !is_404()): echo 'has-cta'; endif; ?>">
  <div class="container-medium">
    <div class="flex flex-justify-between flex-align-center">
      <div>
        <?php require(get_template_directory().'/assets/img/logo-see-group.svg'); ?>
        <?php include(get_template_directory().'/parts/social-media.php'); ?>
      </div>
      <div>
        <h6>Explore More</h6><br>
        <div class="columns-2">
          <?php wp_nav_menu(array('menu' => 'Main Menu Left', 'menu_id' => false, 'container' => false)); ?>
          <?php wp_nav_menu(array('menu' => 'Main Menu Right', 'menu_id' => false, 'container' => false)); ?>
        </div>
      </div>
    </div>

    <div class="copyright flex flex-justify-between">
      <p><?php echo get_bloginfo('name'); ?> &copy; <?php echo date('Y'); ?> All Rights Reserved</p>
      <div class="flex flex-gap">
        <p><a href="<?php echo get_permalink(3); ?>"><p>Privacy Policy</a></p>
        <p><a href="<?php echo get_permalink(354); ?>"><p>Disclaimer</a></p>
        <p><a href="https://thriveweb.com.au/" target="_blank">Crafted by THRIVE</a></p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<div class="the-popups"></div>

</body>
</html>
