<?php
function override_upload_folder() {
	if (!getenv('UPLOADS_PATH__enabled')) {
		return;
	}
	$path = getenv('UPLOADS_PATH__storage_path') ?: ROOT_DIR . 'storage/uploads';
	if (!$basedir = realpath($path)) {
		throw new Exception('Invalid storage path for uploads');
	}
	$url_path = getenv('UPLOADS_PATH__url_path') ?: 'uploads';

	add_filter('upload_dir', function($settings) use ($basedir, $url_path) {
		$subdir = '';
		if (!empty($settings['subdir'])) {
			$subdir = $settings['subdir'];
		}
		$baseurl = home_url($url_path);
		$path = $basedir . $subdir;
		$url = $baseurl . $subdir;
		$result = array_merge($settings, compact('path', 'url', 'subdir', 'basedir', 'baseurl'));
		return $result;
	});
}
