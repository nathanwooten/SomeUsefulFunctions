<?php

if ( ! function_exists( basename( __FILE__, '.function.php' ) ) {
function urlRelative( $url )
{

	$dir = '';

	$subfolder = filesystemNormalize( $url, '', '', '/' );
	$explode = explode( '/', $url );
	array_shift( $explode );
	if ( ! empty( $explode ) ) {
		foreach ( $explode as $exp ) {
			$dir = '../' . $dir;
		}
	}

	return $dir;

}
}
