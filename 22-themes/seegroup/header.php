<!doctype html>
<html lang="en">
	<head>
		<?php if ($_SERVER['SERVER_NAME'] === 'seegroup.e.thrivex.io') { ?>
	  	<meta name="robots" content="noindex, nofollow">
	  <?php } ?>

		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>">

		<?php wp_head(); ?>
	</head>

	<?php if (is_singular('post') || is_singular('people') || is_singular('projects') || is_404() || is_page(1426)): $classes = ''; else: $classes = 'transparent-header'; endif; ?>

	<body <?php body_class($classes); ?>>

		<header>
			<div class="container-large flex flex-justify flex-align-center">
				<div class="menu-left flex flex-align-center">
					<?php wp_nav_menu(array('menu' => 'Main Menu Left', 'menu_id' => false, 'container' => false)); ?>
				</div>

				<a class="logo" href="<?php echo bloginfo('url'); ?>" title="<?php echo get_bloginfo('title'); ?>">
					<?php require(get_template_directory().'/assets/img/logo-see-group.svg'); ?>
				</a>

				<div class="menu-right flex flex-align-center flex-justify-end">
					<?php wp_nav_menu(array('menu' => 'Main Menu Right', 'menu_id' => false, 'container' => false)); ?>
				</div>

				<div class="hamburger">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
				</div>
			</div>
		</header>

		<div class="responsive-menu">
			<div class="container-small">
				<?php wp_nav_menu(array('menu' => 'Main Menu Left', 'menu_id' => false, 'container' => false)); ?>
				<?php wp_nav_menu(array('menu' => 'Main Menu Right', 'menu_id' => false, 'container' => false)); ?>
			</div>
			<a class="button button-dark" href="#">
				Contact Us
				<?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
			</a>
		</div>
