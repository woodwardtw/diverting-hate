<?php
/**
 * ACF STUFF
 *
 * @package Understrap
 */

function divh_tagline(){
    $tag_line = get_bloginfo('description');
    if($tag_line){
        return "<div class='col-md-12'><div class='tag-line'><p>{$tag_line}</p></div></div>";
    }
}

function divh_home_repeater(){
    // Check rows exists.
    if( have_rows('home_sections') ):
        echo "<div class='col-md-8'>";
        // Loop through rows.
        while( have_rows('home_sections') ) : the_row();

            $title = get_sub_field('title');
            $id = sanitize_title($title);
            $content = get_sub_field('content');
            // Do something...
            echo "
                <div class='home-section'><h2 id='{$id}'>{$title}</h2>
                {$content}
                </div> 

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

function divh_supporter_statement(){
    if(get_field('supporter_statement')){
        $statement = get_field('supporter_statement');
        return "<div class='col-md-12'>
                <div class='support-statement'>{$statement}</div>
        </div>";
    }
}

function divh_supporters_repeater(){
    $html = '';
    if( have_rows('supporters') ):

        // Loop through rows.
        while( have_rows('supporters') ) : the_row();

            // Load sub field value.
            $title = get_sub_field('supporter_title');
            $link = get_sub_field('supporter_link');
            $img = get_sub_field('supporter_logo');
            $html .= "<div class='supporter col-md-2'>
                    <div class='home-box'>
                        <a href='{$link}'>
                            <img src='{$img}'>
                            <h3>{$title}</h3>
                        </a>
                    </div>
            </div>";
            // Do something...
        // End loop.
        endwhile;
        $statement = divh_supporter_statement();
        echo "<div class='row home-row'>
            <h2 id='supporters'>Supporters</h2>
            {$statement}
            {$html}
        </div>";
        // No value.
        else :
            // Do something...
        endif;
    }


//make news permalink go to media URL rather than internal post link

function divh_news_permalink_filter($url, $post) {
    $post_id = $post->ID;
    if(get_field('media_url', $post_id)){
        $media_url = get_field('media_url', $post_id);
        return $media_url;
    } else {
        return $url;
    }
}
add_filter('post_link', 'divh_news_permalink_filter', 10, 2);    


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