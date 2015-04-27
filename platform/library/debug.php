<?php
/**
 * Functions inside here are only used for debugging
 * @subpackage Custom_Platform
 */

/**
 * Prints out php arrays/variables in a human read-able format
 * @param $variable void Can be ANYTHING!
 */
function pre($variable){
    ?><pre><?php print_r($variable);?></pre><?php
}

/**
 * Displays the theme version and the last time the functions file was modified.
 * This function is useless for anything other than the demo
 */
function custom_theme_version(){
    ?>
    <h4 style="margin-top: 25px;">
        <span style="color:#FEC00F;">Custom WP Theme Baseline</span>
        <span style="font-weight:300;color: #444;">Version <?php echo THEME_VERSION?></span><br>
        <small style="font-size: 13px;font-weight:300;color:#666"><em>Last updated: <?php echo date ("F d Y", filemtime(TEMPLATEPATH.'/functions.php'))?></em></small>
    </h4>
<?php
}