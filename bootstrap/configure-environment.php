<?php
/*
 |------------------------------
 | Configure User Interface
 |------------------------------

 You should not have to edit this file
 All the values  are pulled in from the .env file

 */

/*
 |------------------------------
 | File Modification
 |------------------------------
 */
define('DISALLOW_FILE_EDIT', getenv('DISALLOW_FILE_EDIT'));
define('DISALLOW_FILE_MODS', getenv('DISALLOW_FILE_MODS'));

define('WP_DEBUG', getenv('WP_DEBUG'));
define('WP_POST_REVISIONS', getenv('WP_POST_REVISIONS'));
define('DISABLE_WP_CRON', getenv('DISABLE_WP_CRON'));

