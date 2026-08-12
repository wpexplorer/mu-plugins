<?php
/**
 * Plugin Name: Obfuscate Email Shortcode
 * Description: Provides the [obfuscate_email] shortcode, which outputs an email address as HTML entities so scrapers can't read it as plain text.
 * Version: 1.0.0
 * Author: WPExplorer
 */

defined( 'ABSPATH' ) || exit;

/**
 * Renders an obfuscated email address, optionally as a mailto link.
 *
 * [obfuscate_email email="hello@example.com"]
 * [obfuscate_email email="hello@example.com" text="Email us"]
 * [obfuscate_email email="hello@example.com" link="false"]
 *
 * The text attribute is the link label and is ignored when link is false.
 *
 * @param array $atts Shortcode attributes.
 * @return string
 */
add_shortcode( 'obfuscate_email', function ( $atts ) {
	$atts = shortcode_atts(
		array(
			'email' => '',
			'text'  => '',
			'link'  => 'false',
			'class' => '',
		),
		$atts,
		'obfuscate_email'
	);

	$email = sanitize_email( trim( $atts['email'] ) );

	if ( ! is_email( $email ) ) {
		return '';
	}

	// antispambot() encodes the address as HTML entities, which browsers decode
	// in both the href and the link text, so its output is not escaped again.
	if ( ! filter_var( $atts['link'], FILTER_VALIDATE_BOOLEAN ) ) {
		return $atts['class']
			? sprintf(
				'<span class="%1$s">%2$s</span>',
				esc_attr( $atts['class'] ),
				antispambot( $email )
			)
			: antispambot( $email );
	}

	return sprintf(
		'<a href="mailto:%1$s"%2$s>%3$s</a>',
		antispambot( $email ),
		$atts['class'] ? ' class="' . esc_attr( $atts['class'] ) . '"' : '',
		$atts['text'] ? esc_html( $atts['text'] ) : antispambot( $email )
	);
} );