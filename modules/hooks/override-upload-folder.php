<?php
function override_upload_folder() {
	if (!getenv('OVERRIDE_UPLOAD_FOLDER')) {
		return;
	}
	add_filter('upload_dir', function() {
		$subdir = '';
		if (!empty($settings['subdir'])) {
			$subdir = $settings['subdir'];
		}
		if (!$basedir = realpath(UPLOAD_STORAGE_FOLDER)) {
			throw new Error('Invalid UPLOAD_STORAGE_FOLDER [' . UPLOAD_STORAGE_FOLDER . ']');
		}
		$url_path = UPLOAD_URL_PATH;
		$baseurl = home_url($url_path);
		$path = $basedir . $subdir;
		$url = $baseurl . $subdir;
		$result = array_merge($settings, compact('path', 'url', 'subdir', 'basedir', 'baseurl'));
		return $result;
	});
}
