<?php

if ( ! function_exists( basename( __FILE__, '.function.php' ) ) {
function filesystemNormalize( $path, $before = '', $after = '', $separator = DIRECTORY_SEPARATOR )
{

	$path = str_replace( [ '\\', '/' ], $separator, $path );

	if ( isset( $before ) ) {
		$path = ltrim( $path, $separator );
		if ( ! empty( $before ) ) {
			$before = $separator;
			$path = $before . $path;
		}
	}

	if ( isset( $after ) ) {
		$path = rtrim( $path, $separator );
		if ( ! empty( $after ) ) {
			$after = $separator;
			$path = $path . $after;
		}
	}

	return $path;

}
}
