<?php
/**
 * The Ball v2 "Spirit of Football eV" Child Theme Functions.
 *
 * Theme amendments and overrides.
 *
 * @package The_Ball_v2_eV
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set our version here.
define( 'THE_BALL_V2_EV_THEME_VERSION', '1.0.0' );

/**
 * Bootstraps theme object and returns instance.
 *
 * @since 1.0.0
 *
 * @return The_Ball_v2_eV_Theme $theme The theme instance.
 */
function the_ball_v2_ev_theme() {

	// Declare as static.
	static $theme;

	// Instantiate theme class if not yet instantiated.
	if ( ! isset( $theme ) ) {
		require get_stylesheet_directory() . '/includes/classes/class-theme.php';
		$theme = new The_Ball_v2_eV_Theme();
	}

	// --<
	return $theme;

}

// Bootstrap immediately.
the_ball_v2_ev_theme();

/**
 * Enqueue stylesheets.
 *
 * @since 1.0.0
 */
function the_ball_v2_ev_styles() {

	// Define version.
	$version = THE_BALL_V2_EV_THEME_VERSION;
	if ( defined( 'THE_BALL_V2_THEME_DEBUG' ) && true === THE_BALL_V2_THEME_DEBUG ) {
		$version .= '-' . time();
	}

	// Variables stylesheet.
	wp_enqueue_style(
		'the-ball-v2-ev-variables',
		get_stylesheet_directory_uri() . '/assets/css/variables.css',
		[ 'the-ball-v2-variables' ],
		$version,
		'all' // Media.
	);

	// Screen stylesheet.
	wp_enqueue_style(
		'the-ball-v2-ev-screen',
		get_stylesheet_directory_uri() . '/assets/css/screen.css',
		[ 'the-ball-v2-global' ],
		$version,
		'all' // Media.
	);

}

add_action( 'wp_enqueue_scripts', 'the_ball_v2_ev_styles', 60 );
