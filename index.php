<?php
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			while (have_posts()) : the_post();
			?>

				<section>
					<?php the_title('<h1>', '</h1>'); ?>

					<?php
					the_content();
					?>

					<?php
					$args = array(
						'before'      		=> '<div class="page-links-XXX"><span class="page-link-text">' . __('More pages: ', 'ss') . '</span>',
						'after'       		=> '</div>',
						'link_before' 		=> '<span class="page-link">',
						'link_after'  		=> '</span>',
						'next_or_number'	=> 'next',
						'separator'			=> ' | ',
						'nextpagelink'		=> __('Next &raquo', 'ss'),
						'previouspagelink'	=> __('&laquo Previous', 'ss'),
					);

					wp_link_pages($args);
					?>
				</section>

			<?php
			endwhile; // End of the loop.
			?>

		</div><!-- #post-<?php the_ID(); ?> -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
