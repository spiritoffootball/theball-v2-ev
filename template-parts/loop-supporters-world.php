<?php
/**
 * Template part for embedding a display of all Supporters with the tag "Welt".
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_eV
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$loop_include_args = [
	'post_type'      => 'organisation',
	'post_status'    => 'publish',
	'order'          => 'ASC',
	'orderby'        => 'title',
	'posts_per_page' => -1,
	// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	'tax_query'      => [
		'relation' => 'AND',
		[
			'taxonomy' => 'organisation-type',
			'field'    => 'slug',
			'terms'    => 'foerderpartner',
		],
		[
			'taxonomy' => 'organisation-tag',
			'field'    => 'slug',
			'terms'    => 'welt',
		],
	],
];

// Do the query.
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-partners-world.php -->
	<section id="organisations-partners-world" class="loop-include loop-include-four content-area clear">
		<div class="loop-include-inner">

			<header class="loop-include-header">
				<h2 class="loop-include-title"><?php esc_html_e( 'Worldwide Supporters', 'theball-v2-ev' ); ?></h2>
			</header><!-- .loop-include-header -->

			<div class="loop-include-posts">
				<?php

				// Start the loop.
				while ( $loop_include->have_posts() ) :

					$loop_include->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-partner-logo' );

				endwhile;

				?>
			</div><!-- .loop-include-posts -->

			<footer class="loop-include-footer">
				<?php /* the_posts_navigation(); */ ?>
			</footer><!-- .loop-include-footer -->

		</div><!-- .loop-include-inner -->
	</section><!-- .loop-include -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_include_args, $loop_include );
