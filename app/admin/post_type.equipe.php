<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 12/12/2017
 * Time: 17:50
 */



$post_type = tr_post_type('Equipe', 'Equipes');

$post_type->setIcon('user-tie');
$post_type->setArgument('supports', ['title', 'thumbnail']);

$meta_box = tr_meta_box('information')->setLabel('Informations');

$meta_box->addPostType($post_type->getId());


$meta_box->setCallback(function () {
	$form = tr_form();
	echo $form->text('post_team')->setLabel('Fonction');
	echo $form->text('phone_team')->setLabel('Numero de telephone');
	echo $form->text('facebook_team')->setLabel('Lien facebook');
	echo $form->text('twitter_team')->setLabel('Lien twitter');
	echo $form->text('linkedin_team')->setLabel('Lien linkedin');
});

/**
 * Snippet Name: Create new image sizes for custom post types
 * Snippet URL: http://www.wpcustoms.net/snippets/create-new-image-sizes-for-custom-post-types/
 */
add_filter('intermediate_image_sizes', 'ravs_equipe_image_sizes', 999);
function ravs_equipe_image_sizes($image_sizes)
{

	// size for slider
	$slider_image_sizes = array('bigger_equipe');

	// for ex: $slider_image_sizes = array( 'thumbnail', 'medium' );

	// instead of unset sizes, return your custom size for slider image
	if (isset($_REQUEST['post_id']) && 'equipe' === get_post_type($_REQUEST['post_id']))
		return $slider_image_sizes;

	return $image_sizes;
}


// to create a custom size you can use this:
add_image_size('bigger_equipe', 550, 624, true); // Crop mode
