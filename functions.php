<?php
/**
 * The main functions file that WordPress reads. We use this to invoke our theme
 * platform, hooks and functions.
 * @subpackage Custom_Platform
 */

require_once(dirname(__FILE__).'/platform/platform.php');

// Please leverage the library files within the platform folder. Otherwise, place custom
// code under this line. For a list of theme hooks, check out:
// http://wordpress.gscadmin.com/hooks