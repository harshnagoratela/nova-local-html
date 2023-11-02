<?php get_header();

$page_ID = get_queried_object_ID();

$thumbnail = get_the_post_thumbnail_url($page_ID, 'profile-thumbnail');

$position = get_field('position_title', $page_ID);
$phone_number = get_field('phone_number', $page_ID);
$email_address = get_field('email_address', $page_ID);
$linkedin = get_field('linkedin', $page_ID); ?>

<div class="single-people" data-aos="fade-in">
  <?php while (have_posts()): the_post(); ?>
    <div class="section-post-content section-padding-top">
      <div class="container-small">
        <div class="columns-2">
          <div class="general-content">
            <?php if ($thumbnail): ?>
              <img src="<?php echo $thumbnail; ?>" alt="<?php echo get_the_title(); ?>">
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
            <h3><?php echo get_the_title(); ?></h3>
            <?php if ($position): ?>
              <p class="muted"> <?php echo $position; ?></p>
            <?php endif; ?>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<?php get_footer();
