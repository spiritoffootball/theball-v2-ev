<?php
/**
 * Template part for embedding Award badges in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_eV
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * Example of "Apply the sort on Next / Previous site-wide navigation".
 * @see http://www.nsp-code.com/apply-custom-sorting-for-next-previous-site-wide-navigation/
 *
add_filter( 'apto/navigation_sort_apply', 'theme_apto_navigation_sort_apply' );
function theme_apto_navigation_sort_apply( $current ) {
	global $post;

	if ( 'award' === $post->post_type ) {
		$current = true;
	} else {
		$current = false;
	}

	// --<
	return $current;
}
*/

// Define query args.
$loop_include_args = [
	'post_type'   => 'award',
	'post_status' => 'publish',
	'order'       => 'ASC',
	'orderby'     => 'menu_order',
	// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	'tax_query'   => [
		[
			'taxonomy' => 'award-type',
			'field'    => 'slug',
			'terms'    => 'featured-footer',
		],
	],
];

// Do the query.
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-footer-awards.php -->
	<section id="footer-awards" class="loop-include loop-include-flex loop-include-five content-area clear">
		<div class="loop-include-inner">

			<header class="loop-include-header">
				<h2 class="loop-include-title screen-reader-text"><?php esc_html_e( 'Awards', 'theball-v2-ev' ); ?></h2>
			</header><!-- .loop-include-header -->

			<div class="loop-include-posts">
				<?php

				// Start the loop.
				while ( $loop_include->have_posts() ) :

					$loop_include->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-award-mini' );

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
