<?php
/**
 * Template Name: People
 *
 * The template for displaying the People page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
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

	<?php $backoffice_loop = locate_template( 'template-parts/loop-individuals-backoffice.php' ); ?>
	<?php if ( $backoffice_loop ) : ?>
		<?php load_template( $backoffice_loop ); ?>
	<?php endif; ?>

	<?php $projektmanagerinnen_loop = locate_template( 'template-parts/loop-individuals-projektmanagerinnen.php' ); ?>
	<?php if ( $projektmanagerinnen_loop ) : ?>
		<?php load_template( $projektmanagerinnen_loop ); ?>
	<?php endif; ?>

	<?php if ( $supporters_loop = locate_template( 'template-parts/loop-individuals-supporters.php' ) ) : ?>
		<?php load_template( $supporters_loop ); ?>
	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
