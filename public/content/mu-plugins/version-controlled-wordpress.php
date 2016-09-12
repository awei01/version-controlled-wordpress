<?php
/*
 | -------------------
 | Initialize
 | -------------------

 We'll put all our hooks here in one place so
 we can limit the number of hooks that we're
 introducing to the system

 */

// first, load developer hooks
require ROOT_DIR . '/configure/hooks.php';

// next, load our hooks
require ROOT_DIR . '/modules/hooks/init.php';

