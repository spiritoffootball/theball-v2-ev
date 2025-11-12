<?php
/**
 * Template Name: People
 *
 * The template for displaying the People page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_eV
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- page-people.php -->
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

	<?php $vorstand_loop = locate_template( 'template-parts/loop-individuals-vorstand.php' ); ?>
	<?php if ( $vorstand_loop ) : ?>
		<?php load_template( $vorstand_loop ); ?>
	<?php endif; ?>

	<?php $staff_loop = locate_template( 'template-parts/loop-individuals-staff.php' ); ?>
	<?php if ( $staff_loop ) : ?>
		<?php load_template( $staff_loop ); ?>
	<?php endif; ?>

	<?php $team_loop = locate_template( 'template-parts/loop-individuals-team.php' ); ?>
	<?php if ( $team_loop ) : ?>
		<?php load_template( $team_loop ); ?>
	<?php endif; ?>

	<?php if ( $alumni_loop = locate_template( 'template-parts/loop-individuals-alumni.php' ) ) : ?>
		<?php load_template( $alumni_loop ); ?>
	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
