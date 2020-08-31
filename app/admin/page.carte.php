<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 01/05/2018
 * Time: 01:42
 */


$box1 = tr_meta_box('Information page carte');
$box1->addScreen('page'); // updated
$box1->setCallback(function () {
    $form = tr_form();

    echo $form->text('subtitle')->setLabel('Sous titre de la page');
});

$box2 = tr_meta_box('Block carte');
$box2->addScreen('page'); // updated
$box2->setCallback(function () {
    $form = tr_form();

    echo $form->text('titre_carte')->setLabel('Titre');
    echo $form->text('titre2_carte')->setLabel('Sous Titre');
});

$box3 = tr_meta_box('Block reservation');
$box3->addScreen('page'); // updated
$box3->setCallback(function () {
    $form = tr_form();

    echo $form->text('titre_carte_reser')->setLabel('Titre');
    echo $form->text('titre2_carte_reser')->setLabel('Sous Titre');

    echo $form->editor('contact_form')->setLabel('Information de reservation');
});



add_action('admin_head', function () use ($box1, $box2, $box3) {
    if (get_page_template_slug(get_the_ID()) === 'carte.php') :
        remove_post_type_support('page', 'editor');
    else :
        remove_meta_box($box1->getId(), 'page', 'normal');
        remove_meta_box($box2->getId(), 'page', 'normal');
        remove_meta_box($box3->getId(), 'page', 'normal');
    endif;
});
