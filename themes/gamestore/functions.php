<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gamestore
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function gamestore_styles()
{
	wp_enqueue_style('gamestore-general', get_template_directory_uri() . '/assets/css/gamestore.css', [], wp_get_theme()->get('Version'));
	wp_enqueue_script('gamestore-theme-related', get_template_directory_uri() . '/assets/js/gamestore-theme-related.js', [], wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'gamestore_styles');

function gamestore_google_fonts()
{
	$font_url = '';
	$font = 'Urbanist';
	$font_extra = 'ital,wght@0,400;0,700;1,400;1,700';
	if ('off' !== _x('on', 'Google font: on or off', 'gamestore')) {
		$query_args = array(
			'family' => urldecode($font . ':' . $font_extra),
			'subset' => urldecode('latin,latin-ext'),
			'display' => urldecode('swap'),
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css2');
	}
	return $font_url;
}

function gamestore_enqueue_google_fonts()
{
	wp_enqueue_style('gamestore-google-font', gamestore_google_fonts(), [], '1.0.0');
}
add_action('wp_enqueue_scripts', 'gamestore_enqueue_google_fonts');
