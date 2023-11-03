<?php

// Template Name: Contact

get_header();

$page_ID = get_queried_object_ID();

$banner_img = get_the_post_thumbnail_url($page_ID, '1200');

$intro_content = get_field('intro_content', $page_ID);

$phone = get_field('phone_number', 'options');
$fax = get_field('fax_number', 'options');
$email = get_field('email_address', 'options');

$street_address = get_field('street_address', 'options');
$google_map_link = get_field('google_map_link', 'options');
$postal_address = get_field('postal_address', 'options');

$location_details = get_field('location_details', $page_ID);

$form_content = get_field('form_content', $page_ID);
$form_id = get_field('form_id', $page_ID);

?>

<div class="page-contact" data-aos="fade-in">
  <?php include(get_template_directory().'/parts/page-banner.php'); ?>

  <div class="section-contact section-padding-top">
    <div class="container-medium columns-2">
      <div class="general-content">
        <?php if ($intro_content): echo $intro_content; endif; ?>

        <?php if ($phone || $fax): ?>
          <div class="contact-item flex flex-gap" style="flex-direction: column;">
            <h4>Phone</h4>
            <?php if ($phone): ?>
              <p>P: <a href="tel:<?php echo $phone; ?>" target="_blank" title="Call us"><?php echo $phone; ?></a></p>
            <?php endif; ?>
            <?php if ($fax): ?>
              <p>F: <a href="tel:<?php echo $fax; ?>" target="_blank" title="Fax us"><?php echo $fax; ?></a></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($email): ?>
          <div class="contact-item flex flex-gap" style="flex-direction: column;">
            <h4>EMAIL</h4>
            <p><a href="mailto:<?php echo $email; ?>" target="_blank" title="Email us"><?php echo $email; ?></a></p>
          </div>
        <?php endif; ?>

        <?php if ($street_address): ?>
          <div class="contact-item flex flex-gap" style="flex-direction: column;">
            <h4>HEAD OFFICE</h4>
            <p>
              <?php echo $street_address; ?>
              <?php if ($google_map_link): ?>
                <br><small><a href="<?php echo $google_map_link; ?>" target="_blank" title="Get directions">Get directions</a></small>
              <?php endif; ?>
            </p>

            <?php if ($location_details): ?>
              <p><?php echo $location_details; ?></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($postal_address): ?>
          <div class="contact-item flex flex-gap" style="flex-direction: column;">
            <h4>POSTAL ADDRESS</h4>
            <p><?php echo $postal_address; ?></p>
          </div>
        <?php endif; ?>
      </div>

      <div class="form-wrap background-dark-grey">
        <?php if ($form_content): ?>
          <div class="general-content">
            <?php echo $form_content; ?><br>
          </div>
        <?php endif; ?>
        <?php if ($form_id): ?>
          <?php echo do_shortcode('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true"]') ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
