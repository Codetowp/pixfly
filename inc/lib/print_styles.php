<?php




if (!function_exists('pixfly_paragraph_font'))  {
	function pixfly_paragraph_font(){
		
		$fontfamily_value = get_theme_mod('pixfly_paragraph_font', '');
		$append_family = sprintf( 'font-family: %s!important;',  $fontfamily_value );
			// Output the styles.
		if ( $fontfamily_value ) {
			echo "\n" . ' p{' . esc_html($append_family) . '}' ."\n" ;
		}
		
	}
}


if (!function_exists('pixfly_heading_font_family'))  {
	function pixfly_heading_font_family(){
		
		$fontfamily_value = get_theme_mod('pixfly_heading_font_family', '');
		$append_family = sprintf( 'font-family: %s!important;',  $fontfamily_value );
			// Output the styles.
		if ( $fontfamily_value ) {
			echo "\n" . 'h1,h2,h3,h4,h5,h6{'.esc_html($append_family).'}' ;
		}
		
	}
}




if(!function_exists('pixfly_main_styles')){
 function pixfly_main_styles(){
echo '<style type="text/css" id="pixfly-css">';

pixfly_paragraph_font();

pixfly_heading_font_family();



echo "\n". "</style>". "\n";
} 	
 }
 
add_action( 'wp_head', 'pixfly_main_styles' );



