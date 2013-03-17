<?php
/**
 * Flint functions and definitions
 *
 * @package Flint
 * @sub-package Chennai
 * @since Chennai 0.9
 */

function flint_custom_header_setup() {
	$default_image = get_template_directory_uri();
	$args = array(
		'default-image'          => $default_image.'/inc/default-header.png',
		'default-text-color'     => '00a6e5',
		'width'                  => 360,
		'height'                 => 240,
		'flex-height'            => true,
		'random-default'		 => true,
		'wp-head-callback'       => 'flint_header_style',
		'admin-head-callback'    => 'flint_admin_header_style',
		'admin-preview-callback' => 'flint_admin_header_image',
	);

	$args = apply_filters( 'flint_custom_header_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-header', $args );
	} else {
		// Compat: Versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR',    $args['default-text-color'] );
		define( 'HEADER_IMAGE',        $args['default-image'] );
		define( 'HEADER_IMAGE_WIDTH',  $args['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
		add_custom_image_header( $args['wp-head-callback'], $args['admin-head-callback'], $args['admin-preview-callback'] );
	}
	
	register_default_headers( array(
		'basha' => array(
			'url' => '%2$s/img/headers/basha.jpg',
			'thumbnail_url' => '%2$s/img/headers/basha-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'basha', 'chennai' )
		),
		'danalakshmi' => array(
			'url' => '%2$s/img/headers/danalakshmi.jpg',
			'thumbnail_url' => '%2$s/img/headers/danalakshmi-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'danalakshmi', 'chennai' )
		),
		'mani' => array(
			'url' => '%2$s/img/headers/mani.jpg',
			'thumbnail_url' => '%2$s/img/headers/mani-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'mani', 'chennai' )
		),
		'radha' => array(
			'url' => '%2$s/img/headers/radha.jpg',
			'thumbnail_url' => '%2$s/img/headers/radha-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'Pine Cone', 'chennai' )
		),
		'sendhamarai' => array(
			'url' => '%2$s/img/headers/sendhamarai.jpg',
			'thumbnail_url' => '%2$s/img/headers/sendhamarai-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'sendhamarai', 'chennai' )
		),
		'shanthammal' => array(
			'url' => '%2$s/img/headers/shanthammal.jpg',
			'thumbnail_url' => '%2$s/img/headers/shanthammal-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'shanthammal', 'chennai' )
		),
		'siva-kumar' => array(
			'url' => '%2$s/img/headers/siva-kumar.jpg',
			'thumbnail_url' => '%2$s/img/headers/siva-kumar-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'siva-kumar', 'chennai' )
		),
		'vijayalakshmi' => array(
			'url' => '%2$s/img/headers/vijayalakshmi.jpg',
			'thumbnail_url' => '%2$s/img/headers/vijayalakshmi-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'vijayalakshmi Plant', 'chennai' )
		)
	) );
}