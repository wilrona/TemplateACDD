<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 03/05/2018
 * Time: 22:30
 */

/**
 * Snippet Name: Create new image sizes for custom post types
 * Snippet URL: http://www.wpcustoms.net/snippets/create-new-image-sizes-for-custom-post-types/
 */
add_filter('intermediate_image_sizes', 'ravs_post_image_sizes', 999);
function ravs_post_image_sizes($image_sizes)
{

    // size for slider
    $slider_image_sizes = array('bigger', 'smaller');

    // for ex: $slider_image_sizes = array( 'thumbnail', 'medium' );

    // instead of unset sizes, return your custom size for slider image
    if (isset($_REQUEST['post_id']) && 'post' === get_post_type($_REQUEST['post_id']))
        return $slider_image_sizes;

    return $image_sizes;
}


// to create a custom size you can use this:
add_image_size('bigger', 670, 380, true); // Crop mode
add_image_size('smaller', 550, 470, true); // Crop mode
