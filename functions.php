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

/**
 * Gets the currently displayed locale.
 *
 * @since 1.0.0
 *
 * @return string $locale The currently displayed locale.
 */
function the_ball_v2_ev_current_locale() {

	// Default to WordPress locale.
	if ( ! function_exists( 'pll_current_language' ) ) {
		return get_locale();
	}

	// Query Polylang.
	$locale = pll_current_language( 'locale' );

	// --<
	return $locale;

}

/**
 * Gets the currently displayed language.
 *
 * @since 1.0.0
 *
 * @return string $language The currently displayed language.
 */
function the_ball_v2_ev_current_language() {

	// Default to WordPress locale.
	if ( ! function_exists( 'pll_current_language' ) ) {
		return substr( get_locale(), 0, 2 );
	}

	// Query Polylang.
	$language = pll_current_language( 'slug' );

	// --<
	return $language;

}

/**
 * Gets the ACF Field suffix for the currently displayed language.
 *
 * @since 1.0.0
 *
 * @return string $suffix The ACF Field suffix for the currently displayed language.
 */
function the_ball_v2_ev_acf_language_suffix() {

	// We need the language.
	$language = the_ball_v2_ev_current_language();

	// Define ACF Field suffix.
	$suffix = '_' . $language;

	// --<
	return $suffix;

}
