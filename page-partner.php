<?php
/**
 * Template Name: Partners Archive
 *
 * The template for displaying the Partners archive page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- page-partner.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<section id="archive-header" class="content-area">
		<?php
		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
	</section>

	<?php if ( $erfurt_loop = locate_template( 'template-parts/loop-partners-erfurt.php' ) ) : ?>
		<?php load_template( $erfurt_loop ); ?>
	<?php endif; ?>

	<?php if ( $germany_loop = locate_template( 'template-parts/loop-partners-germany.php' ) ) : ?>
		<?php load_template( $germany_loop ); ?>
	<?php endif; ?>

	<?php if ( $world_loop = locate_template( 'template-parts/loop-partners-world.php' ) ) : ?>
		<?php load_template( $world_loop ); ?>
	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
