<?php

function override_upload_dir($settings) {
	$subdir = '';
	if (!empty($settings['subdir'])) {
		$subdir = $settings['subdir'];
	}
	$basedir = realpath(UPLOAD_STORAGE_FOLDER);
	$baseurl = home_url(UPLOAD_URL_PATH);
	$path = $basedir . $subdir;
	$url = $baseurl . $subdir;
	$result = array_merge($settings, compact('path', 'url', 'subdir', 'basedir', 'baseurl'));
	return $result;
}

add_filter('upload_dir', 'override_upload_dir');

/*
Some code for testing

function my_setup() {
	add_filter('upload_dir', 'override_upload_dir');
	wp_upload_dir();
}

add_action( 'admin_init', 'my_setup' );

*/
