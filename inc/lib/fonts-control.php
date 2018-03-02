<?php
/**
 * Build Fonts List, Toggle, Range Slide
 * Note: Types select for fonts, toggle, range-input
 * @package pixfly
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! class_exists( 'Customizer_Library' ) ) :
	// Helper functions for fonts.
	load_template( get_template_directory() . '/inc/lib/fonts.php', true ) ;
	class Customizer_Library {
		private static $instance;
		public $options = array();
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		public function add_options( $options = array() ) {
			$this->options = array_merge( $options, $this->options );
		}
		public function get_options() {
			return $this->options;
		}
	}
endif;