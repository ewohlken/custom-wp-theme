<?php
/**
 * @subpackage Custom_Platform
 */


/**
 * Adds specific functionality and filters to wordpress that our theme requires
 * @return void
 */
add_action('after_setup_theme', 'custom_theme_support');
function custom_theme_support()
{
    // Allows us to use shortcodes inside of the text widget. Makes it easy to execute things
    // like a form from Contact Form 7
    add_filter('widget_text', 'do_shortcode');

    // Add menu support
    add_theme_support('menus');

    // Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);

    // rss thingy
    add_theme_support('automatic-feed-links');

    // Add post formarts support: http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
}

/**
 * Replaces the default WordPress [...] text added after every excerpt with a horizontal ellipsis that links
 * to the full article/post
 * @return void
 */
add_filter('excerpt_more', 'custom_excerpt_more_link');
function custom_excerpt_more_link($more) {
    global $post;
    return ' <a class="ellipsis" href="' . get_permalink($post->ID) . '" title="' . get_the_title() . '">&hellip;</a>';
}

/**
 * Adds a new column to the admin edit screen for pages.
 * @return void
 */
add_filter( 'manage_pages_columns', 'custom_add_page_template_col' );
function custom_add_page_template_col($columns){
    $new = array();
    foreach($columns as $key => $title) {
        if ($key=='author'){
            // Pus the template column after before the Author
            $new['template'] = __('Template',THEME_DOMAIN);
        }
        $new[$key] = $title;
    }
    return $new;
}

/**
 * Displays the template name in the template column
 * @return void
 */
add_action( 'manage_pages_custom_column', 'custom_add_page_template_name', 10, 2 );
function custom_add_page_template_name($column, $post_id){
    if ( $column == 'template' ) {
        $raw = get_post_meta( $post_id, '_wp_page_template', true );
        $clean = str_replace( array( '.php', 'page' ), '', $raw );
        $clean = str_replace( array( '-', '_'), ' ', $clean );
        echo ucwords($clean)."<br><small>". ( $clean != 'default' ? $raw : "page.php" )."</small>";
    }
}

/**
 * Restrict the template column width
 * @return void
 */
add_action( 'admin_head','custom_add_page_template_col_style' );
function custom_add_page_template_col_style(){
    ?><style>.column-template{width:15%;}</style><?php
}
