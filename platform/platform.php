<?php
/**
 * The main file that includes all other functionality and sets constants
 * @subpackage Custom_Platform
 */

// THEME CONSTANTS
define('THEME_VERSION', '1.0');
define('THEME_DOMAIN',  'wordpress');

define('THEME_PATH',    get_template_directory());
define('THEME_DIR',     get_template_directory_uri().'/');

define('THEME_CSS',     THEME_DIR.'css/');
define('THEME_JS',      THEME_DIR.'js/');
define('THEME_IMAGES',  THEME_DIR.'images/');


/**
 * Retrieves a list of the files in a given directory.
 *
 * @param string $dir
 * @return array
 */
function custom_get_platform_includes($dir = '')
{
    $_path = THEME_PATH."/platform/$dir";
    $_handle = opendir($_path);

    // the empty list of files to populate
    $_files = array();

    while ($_file = readdir($_handle)) {

        // add the file if not a directory to the list of files.
        if ($_file !== '.' && $_file !== '..') {
            $_files[$_file] = $_path .'/'. $_file;
        }
    }
    return $_files;
}

// include necessary platform files, the order matters!
foreach(array('library', 'actions') as $dir){
    foreach(custom_get_platform_includes($dir) as $file => $path) {
        load_template($path, true);
    }
}