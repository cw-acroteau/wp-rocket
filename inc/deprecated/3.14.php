<?php

defined( 'ABSPATH' ) || exit;

/**
 * Remove HTTP protocol on script, link, img and form tags.
 *
 * @since 2.7
 * @deprecated 3.14
 *
 * @param string $buffer HTML content.
 * @return string Updated HTML content
 */
function rocket_protocol_rewrite( $buffer ) {
	_deprecated_function( __FUNCTION__, '3.14' );

	$re     = "/(<(script|link|img|form)([^>]*)(href|src|action)=[\"'])https?:\\/\\//i";
	$subst  = '$1//';
	$return = preg_replace( $re, $subst, $buffer );

	if ( $return ) {
		$buffer = $return;
	}

	return $buffer;
}

/**
 * Remove HTTP protocol on srcset attribute generated by WordPress
 *
 * @since 2.7
 * @deprecated 3.14
 *
 * @param array $sources an Array of images sources for srcset.
 * @return array Updated array of images sources
 */
function rocket_protocol_rewrite_srcset( $sources ) {
	_deprecated_function( __FUNCTION__, '3.14' );

	if ( (bool) $sources ) {
		foreach ( $sources as $i => $source ) {
			$sources[ $i ]['url'] = str_replace( [ 'http:', 'https:' ], '', $source['url'] );
		}
	}

	return $sources;
}