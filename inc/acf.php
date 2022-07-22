<?php
/**
 * ACF STUFF
 *
 * @package Understrap
 */

function divh_home_repeater(){
    // Check rows exists.
    if( have_rows('home_sections') ):
            $tag_line = get_bloginfo('description');
        echo "<div class='col-md-8'> 
            <div class='tag-line'><p>{$tag_line}</p></div>
            <div class='colors'>
          <div class='color dark-blue'></div>
          <div class='color slate'></div>
          <div class='color lighter-blue'></div>
          <div class='color lightest-blue'></div>
        </div>";
        // Loop through rows.
        while( have_rows('home_sections') ) : the_row();

            $title = get_sub_field('title');
            $id = sanitize_title($title);
            $content = get_sub_field('content');
            // Do something...
            echo "
                <div class='home-section'><h2 id='{$id}'>{$title}</h2>{$content}</div>           
            ";
        // End loop.
        endwhile;
        echo "</div>";
    // No value.
    else :
        // Do something...
    endif;
}

function divh_home_img($image){
    if($image){
        return "<div class='col-md-4'><img class='sidebar-img' src='{$image}'></div>";
    } else {
        return "<div class=''col-md-4'></div>";
    }

}

//save acf json
add_filter('acf/settings/save_json', 'divh_json_save_point');
 
function divh_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
    
    
    // return
    return $path;
    
}


// load acf json
add_filter('acf/settings/load_json', 'divh_json_load_point');

function divh_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
    
    
    // return
    return $paths;
    
}