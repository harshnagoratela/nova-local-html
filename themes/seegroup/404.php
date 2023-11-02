<?php get_header(); ?>

<div class="section-404 section-padding">
  <div class="container-xsmall general-content tacenter">
		<h1>Error 404</h1>
		<h4>Looks like we've lost this page.</h4>
    <p class="muted">We've searched high and low but couldn't find what you're looking for. <br>Let's find a better place for you to go.</p>
    <a class="button" href="<?php echo bloginfo('url'); ?>" title="Go home">
      <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
      Go home
    </a>
	</div>
</div>

<?php get_footer(); ?>
