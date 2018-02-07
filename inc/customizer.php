<?php
/**
 * Pixfly Theme Customizer
 *
 * @package Pixfly
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pixfly_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.company-name',
			'render_callback' => 'pixfly_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'pixfly_customize_partial_blogdescription',
		) );
		$wp_customize->selective_refresh->add_partial( 'pixfly_header_description', array(
			'selector'        => '#top-header .container p' ,
			'render_callback' => 'pixfly_customize_partial_header_description',
		) );
		$wp_customize->selective_refresh->add_partial( 'pixfly_header_tagline', array(
			'selector'        => '.header-tagline' ,
			'render_callback' => 'pixfly_customize_partial_header_tagline',
		) );
		$wp_customize->selective_refresh->add_partial( 'pixfly_header_intro_header_text', array(
			'selector'              => '#home-banner h1',

		) ); 

	}

//*************************** PIXFLY SETTINGS PANEL ***************************//
	$wp_customize->add_panel( 'pixfly_general_panel' ,array(
		'priority'              => 50,
		'title'                 => esc_html__( 'FRONTPAGE settings', 'pixfly' ),
		'description'           => '',
	) );

	// HEADER intro
	$wp_customize->add_section( 'pixfly_header_intro', array(
		'title'          => __('Header Intro', 'pixfly' ),
		'theme_supports' => 'custom-header',
		'priority'       => 10,
		'panel'          =>'pixfly_general_panel',
	) );
	$wp_customize->add_setting( 'pixfly_header_description', array(
		'default'                   => __('Section Description.', 'pixfly'),
		'sanitize_callback'     => 'wp_kses_post',
		'transport'             => 'postMessage',

	));
	$wp_customize->add_control( 'pixfly_header_description', array(
		'type'                      => 'textarea',
		'label'                     => __( 'Description', 'pixfly' ),
		'section'                   => 'pixfly_header_intro',
		'priority'                  =>  13,
	) );
	$wp_customize->add_setting( 'pixfly_header_tagline', array(
		'default'                   => __('Tagline', 'pixfly'),
		'sanitize_callback'     => 'sanitize_text_field',
		'transport'             => 'postMessage',

	));
	$wp_customize->add_control( 'pixfly_header_tagline', array(
		'type'                      => 'text',
		'label'                     => __( 'Tagline', 'pixfly' ),
		'section'                   => 'pixfly_header_intro',
		'priority'                  =>  14,
	) );    

	$wp_customize->add_setting( 'pixfly_header_intro_header_text', array(      
		'default'                   => __('Section Main Title', 'pixfly'),
		'sanitize_callback'         => 'sanitize_text_field',
            'transport'                 => 'refresh', // refresh or postMessage              
        ) );    

	$wp_customize->add_control( 'pixfly_header_intro_header_text', array(
		'type'						=> 'text',
		'label' 					=> __( 'Header', 'pixfly' ),
		'section'  					=> 'pixfly_header_intro',
		'priority' 					=> 15,
	) );


	$wp_customize->add_setting( 'pixfly_header_intro_sub_heading', array(      
		'default'                   => __('Section sub heading', 'pixfly'),
		'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'refresh', // refresh or postMessage              
    ) );    

	$wp_customize->add_control( 'pixfly_header_intro_sub_heading', array(
		'type'						=> 'text',
		'label' 					=> __( 'Sub heading', 'pixfly' ),
		'section'  					=> 'pixfly_header_intro',
		'priority' 					=> 16,
	) );


	$wp_customize->add_setting( 'pixfly_header_intro_link_text', array(      
		'default'                   => __('Link Text', 'pixfly'),
		'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'refresh', // refresh or postMessage              
    ) );    

	$wp_customize->add_control( 'pixfly_header_intro_link_text', array(
		'type'						=> 'text',
		'label' 					=> __( 'Link Text', 'pixfly' ),
		'section'  					=> 'pixfly_header_intro',
		'priority' 					=> 17,
	) );   
	$wp_customize->add_setting( 'pixfly_header_intro_link_url', array(      
		'default'                   =>  '#',
		'sanitize_callback'         => 'esc_url_raw',
        'transport'                 => 'refresh', // refresh or postMessage              
    ) );    

	$wp_customize->add_control( 'pixfly_header_intro_link_url', array(
		'type'                      => 'text',
		'label'                     => __( 'Link Url', 'pixfly' ),
		'section'                   => 'pixfly_header_intro',
		'priority'                  => 18,
	) );   
	$wp_customize->add_setting( 'pixfly_header_intro_image', array(
		'default'                   => esc_url( get_template_directory_uri() . '/assets/img/bg-1.jpg' ),
		'type'                      => 'theme_mod',
		'capability'                => 'edit_theme_options',
		'sanitize_callback'         => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,'pixfly_header_intro_image', array(
			'label'                     => __( 'Background Image', 'pixfly' ),
			'section'                   => 'pixfly_header_intro',
			'settings'                  => 'pixfly_header_intro_image',
			'context'                   => 'pixfly_header_intro_image',
			'priority'                  => 19,
		) 
	) );


	/*********Portfolio Section**********/

	$wp_customize->add_section('pixfly_portfolio_section', array(
		'title'                     => __('Portfolio Section', 'pixfly'),
		'description'               => __('Portfolio settings','pixfly'),
		'priority'                  => 80,
		'panel'                     => 'pixfly_general_panel'


	));

	$wp_customize->add_setting( 'pixfly_portfolio_section_count', array(
		'default'                   => 8,
		'sanitize_callback'         => 'absint'
	));
	$wp_customize->add_control( 'pixfly_portfolio_section_count', array(
		'type'                      => 'integer',
		'label'                     => __('Number Of portfolio To Show - (default is 8)','pixfly'),
		'section'                   => 'pixfly_portfolio_section',

	));
	$wp_customize->add_setting( 'pixfly_portfolio_tab_count', array(
		'default'                   => 3,
		'sanitize_callback'         => 'absint'
	));
	$wp_customize->add_control( 'pixfly_portfolio_tab_count', array(
		'type'                      => 'integer',
		'label'                     => __('Number Of types/tags tabs To Show','pixfly'),
		'section'                   => 'pixfly_portfolio_section',

	));
	$wp_customize->add_setting( 'pixfly_portfolio_terms', array(
		'default'                   => 'jetpack-portfolio-type',
		'sanitize_callback'         =>'pixfly_sanitize_choices',
	) );

	$wp_customize->add_control( 'pixfly_portfolio_terms', array(
		'label'                     => 'Portfolio Setting',
		'section' 					=> 'pixfly_portfolio_section',
		'type'                      => 'radio',
		'choices'                   => array(
			'jetpack-portfolio-type' => esc_html__( 'Portfolio-Types', 'pixfly' ),
			'jetpack-portfolio-tag' => esc_html__( 'Portfolio-Tags', 'pixfly' ),               
		),
		'priority' => 3
	) );
	$wp_customize->add_setting( 'pixfly_portfolio_layout', array(
		'default'                  => 'default',
		'sanitize_callback'        =>'pixfly_sanitize_choices',
	) );

	$wp_customize->add_control( 'pixfly_portfolio_layout', array(
		'label'   => __('Portfolio Layout','pixfly'),
		'section' => 'pixfly_portfolio_section',
		'type'    => 'radio',
		'choices' => array(
			'default'   =>  esc_html__( 'Default layout', 'pixfly' ),
			'two'       =>  esc_html__( 'Layout Two', 'pixfly' ),
			'three'   	=>  esc_html__( 'Layout Three', 'pixfly' )             
		),
		'priority' => 4
	) );
	$wp_customize->add_section( 'pixfly_social_links', array(
		'title'    					=> esc_html__( 'Social Links', 'pixfly'  ),
		'priority'                  => 110,
		'panel'                     => 'pixfly_general_panel'

		
	) );

	$social_sites = array( 'facebook', 'twitter','google-plus',  'behance', 'dribbble', 'tumblr', 'youtube', 'pinterest', 'instagram', 'linkedin');

	foreach( $social_sites as $social_site ) 
	{
	$wp_customize->add_setting( "pixfly_social[$social_site]", array(
			'type'              	=> 'theme_mod',
			'capability'        	=> 'edit_theme_options',
			'sanitize_callback' 	=> 'esc_url_raw'
		) );

	$wp_customize->add_control( "pixfly_social[$social_site]", array(
			'label'   				=> ucwords( $social_site ) . __( " Url:", 'pixfly' ),
			'section' 				=> 'pixfly_social_links',
			'type'    				=> 'text',
		) );
	}

  //Blog settings
	$wp_customize->add_section('pixfly_blog_section', array(
		'title'                     => __('Blog Section', 'pixfly'),
		'description'               => __('Blog settings','pixfly'),
		'priority'                  => 80,
		'panel'                     => 'pixfly_general_panel'


	));
	$wp_customize->add_setting( 'pixfly_blog_layout', array(
		'default'                  => 'default',
		'sanitize_callback'        =>'pixfly_sanitize_choices',
	) );

	$wp_customize->add_control( 'pixfly_blog_layout', array(
		'label'   => __('Blog Layout','pixfly'),
		'section' => 'pixfly_blog_section',
		'type'    => 'radio',
		'choices' => array(
			'default'   =>  esc_html__( 'Default layout', 'pixfly' ),
			'metro'       =>  esc_html__( 'Metro layout ', 'pixfly' ),
			             
		),
		'priority' => 4
	) );



}
add_action( 'customize_register', 'pixfly_customize_register' );

/**
 * sanitize for radio button
 *
 * @return void
 */
function pixfly_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function pixfly_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function pixfly_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function pixfly_customize_partial_header_description(){

	return get_theme_mod('pixfly_header_description');
}
function pixfly_customize_partial_header_tagline(){

	return get_theme_mod('pixfly_header_tagline');
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pixfly_customize_preview_js() {
	wp_enqueue_script( 'pixfly-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pixfly_customize_preview_js' );
