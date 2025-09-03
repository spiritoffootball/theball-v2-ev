<?php
/**
 * The Ball v2 eV Theme Class.
 *
 * @package The_Ball_v2_eV
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * The Ball v2 eV Theme Class.
 *
 * A class that encapsulates this theme's functionality.
 *
 * @since 1.0.0
 */
class The_Ball_v2_eV_Theme {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Listen for parent theme class to be loaded.
		add_action( 'the_ball_v2/theme/loaded', [ $this, 'initialise' ] );

	}

	/**
	 * Initialises this object.
	 *
	 * @since 1.0.0
	 */
	public function initialise() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && true === $done ) {
			return;
		}

		// Bootstrap object.
		$this->include_files();
		$this->setup_objects();
		$this->register_hooks();

		/**
		 * Broadcast that this instance is loaded.
		 *
		 * @since 1.0.0
		 */
		do_action( 'the_ball_v2_ev/theme/loaded' );

		// We're done.
		$done = true;

	}

	/**
	 * Include files.
	 *
	 * @since 1.0.0
	 */
	private function include_files() {

		/*
		// Include class files.
		require get_stylesheet_directory() . '/includes/classes/class-geo-mashup.php';
		require get_stylesheet_directory() . '/includes/classes/class-shortcode-the-ball.php';
		*/

		/*
		// Include functions files.
		require get_stylesheet_directory() . '/includes/functions-theme.php';
		*/

	}

	/**
	 * Set up this plugin's objects.
	 *
	 * @since 1.0.0
	 */
	private function setup_objects() {

		/*
		// Instantiate classes.
		$this->geo_mashup         = new The_Ball_v2_2022_Geo_Mashup( $this );
		$this->shortcode_the_ball = new The_Ball_v2_2022_Theme_Shortcode_The_Ball( $this );
		*/

	}

	/**
	 * Register WordPress hooks.
	 *
	 * @since 1.0.0
	 */
	private function register_hooks() {

		// Set up this theme's defaults.
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );

	}

	/**
	 * Augment the Base Theme's setup function.
	 *
	 * @since 1.0.0
	 */
	public function theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be added to the /languages/ directory of the child theme.
		 */
		load_child_theme_textdomain(
			'the-ball-v2-ev',
			get_stylesheet_directory() . '/languages'
		);

	}

}
