<?php
// this is the function to actually modify the upload directory and url
function override_upload_dir($settings) {
	$subdir = '';
	if (!empty($settings['subdir'])) {
		$subdir = $settings['subdir'];
	}
	if (!$basedir = realpath(getenv('UPLOAD_STORAGE_FOLDER') ?: ROOT_DIR . 'storage/uploads')) {
		throw new Error('Invalid UPLOAD_STORAGE_FOLDER [' . getenv('UPLOAD_STORAGE_FOLDER') . ']');
	}
	$url_path = getenv('UPLOAD_URL_PATH') ?: 'uploads';
	$baseurl = home_url($url_path);
	$path = $basedir . $subdir;
	$url = $baseurl . $subdir;
	$result = array_merge($settings, compact('path', 'url', 'subdir', 'basedir', 'baseurl'));
	return $result;
}
