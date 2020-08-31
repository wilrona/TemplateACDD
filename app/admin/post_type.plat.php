<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 01/05/2018
 * Time: 09:51
 */


$post_type = tr_post_type('Plat', 'Plats');

$post_type->setIcon('books');
$post_type->setArgument('supports', ['title', 'thumbnail']);

$box = tr_meta_box('fichier')->setLabel('Information complementaire');

$box->addPostType($post_type->getId());


$box->setCallback(function () {
    $form = tr_form();
    echo $form->text('prix_plat')->setType('number')->setLabel('Prix du plat');
    echo $form->editor('desc_plat')->setLabel('Description du plat');
});

$rub = tr_taxonomy('type de plat');
$rub->setHierarchical();
$rub->apply($post_type);

/**
 * Snippet Name: Create new image sizes for custom post types
 * Snippet URL: http://www.wpcustoms.net/snippets/create-new-image-sizes-for-custom-post-types/
 */
add_filter('intermediate_image_sizes', 'ravs_slider_image_sizes', 999);
function ravs_slider_image_sizes($image_sizes)
{

    // size for slider
    $slider_image_sizes = array('smalling');

    // for ex: $slider_image_sizes = array( 'thumbnail', 'medium' );

    // instead of unset sizes, return your custom size for slider image
    if (isset($_REQUEST['post_id']) && 'plat' === get_post_type($_REQUEST['post_id']))
        return $slider_image_sizes;

    return $image_sizes;
}

// to create a custom size you can use this:
add_image_size('smalling', 170, 110, true); // Crop mode
