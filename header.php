<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('antialiased'); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site flex flex-col min-h-screen">

		<!-- ⚠ add skip link for screen reader -->

		<header id="masthead" class="site-header bg-white/30 backdrop-blur-md shadow-md sticky top-0 z-50">
			<div class="container mx-auto px-4 py-3 flex items-center justify-between">

				<div class="site-branding shrink-0 mr-6">
					<div class="flex items-center justify-start">

						<img src="<?php echo get_theme_mod('ss_logo_image', ''); ?>" alt="<?php echo get_theme_mod('ss_logo_alt_text', ''); ?>">

						<?php if (is_front_page() || is_home()) : ?>
							<h1 class="site-title text-2xl font-bold text-gray-900">
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="hover:text-blue-600 no-underline">
									<?php bloginfo('name'); ?>
								</a>
							</h1>
						<?php else : ?>
							<p class="site-title text-2xl font-bold text-gray-900">
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="hover:text-blue-600 no-underline">
									<?php bloginfo('name'); ?>
								</a>
							</p>
						<?php endif;
						$description = get_bloginfo('description', 'display');
						if ($description || is_customize_preview()) : ?>
							<p class="site-description text-sm text-gray-600">
								<?php
								echo $description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
							</p>
						<?php endif; ?>
					</div>
				</div><!-- .site-branding -->




				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu(array('theme_location' => 'menu-main', 'menu_id' => 'menu-main')); ?>
				</nav><!-- #site-navigation -->

			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">