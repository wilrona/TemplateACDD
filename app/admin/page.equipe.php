<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 01/05/2018
 * Time: 01:42
 */


$box1 = tr_meta_box('Information page equipe');
$box1->addScreen('page'); // updated
$box1->setCallback(function () {
    $form = tr_form();

    echo $form->text('subtitle')->setLabel('Sous titre de la page');
});

$box3 = tr_meta_box('Equipe team');
$box3->addScreen('page'); // updated
$box3->setCallback(function () {
    $form = tr_form();

    echo $form->text('titre_team')->setLabel('Titre');
    echo $form->text('titre2_team')->setLabel('Sous Titre');

    $repeater = $form->repeater('teams')->setFields([

        $form->search('team')->setLabel('Recherche membre equipe')->setPostType('equipe')

    ])->setLabel('Quelque membre de l\'equipe');

    echo $repeater;
});

add_action('admin_head', function () use ($box1, $box3) {
    if (get_page_template_slug(get_the_ID()) === 'equipe.php') :
        remove_post_type_support('page', 'editor');
    else :
        remove_meta_box($box1->getId(), 'page', 'normal');
        remove_meta_box($box3->getId(), 'page', 'normal');
    endif;
});
