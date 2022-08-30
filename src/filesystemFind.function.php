<?php

if ( ! function_exists( basename( __FILE__, '.function.php' ) ) {
function filesystemFind( $startDirectory, array $directoryContains )
{

	$is = [];

	$msg = 'Unable to locate directory, %s';

	if ( is_file( $startDirectory ) ) {
		$dir = dirname( $startDirectory ) . DIRECTORY_SEPARATOR;
	} else {
		$dir = rtrim( $startDirectory, DIRECTORY_SEPARATOR ) . DIRECTORY_SEPARATOR;
	}

	foreach ( $directoryContains as $contains ) {
		$item = $dir . $contains;

		if ( is_readable( $item ) ) {
			$is[] = $item;
		}
	}

	if ( count( $directoryContains ) === count( $is ) ) {
		return $dir;
	}

	$parent = dirname( $dir );

	if ( $parent === $dir ) {
		throw new Exception( 'Reached root, no such directory as provided' );
	}

	return filesystemFind( $parent, $directoryContains );

}
}
