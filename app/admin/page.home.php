<?php

//$home = (int) get_option('page_on_front');

$box1 = tr_meta_box('Traitement du slider');
$box1->addScreen('page'); // updated
$box1->setCallback(function () {
    $form = tr_form();

    $slider = $form->repeater('sliders')->setFields([
        $form->image('image_fond')->setLabel('Image de fond du slider'),
        $form->text('texte_heading1')->setLabel('Texte 1'),
        $form->text('texte_heading2')->setLabel('Texte 2'),
        $form->text('texte_msg')->setLabel('mini message'),
        '<hr />',
        $form->checkbox('show_button')->setLabel('Afficher le bouton d\'action'),
        $form->search('search')->setLabel('Lien de la page du bouton')->setPostType('page'),
        $form->text('text_button')->setLabel('Texte du bouton')

    ])->setLabel('Liste des sliders')->setLimit(6);

    echo $slider;
});

$box2 = tr_meta_box('Presentation Entreprise');
$box2->addScreen('page'); // updated
$box2->setCallback(function () {
    $form = tr_form();

    echo $form->text('titre_about')->setLabel('Sous titre');
    echo $form->text('titre2_about')->setLabel('Titre');
    echo $form->editor('descr_about')->setLabel('Presentation');

    echo $form->image('image1')->setLabel('Image 1')->setHelp('Image de dimension 270px * 600px pour eviter de l\'applatir.');
    echo $form->image('image2')->setLabel('Image 2')->setHelp('Image de dimension 370px * 650px pour eviter de l\'applatir.');

    ?>
    <hr />
    <?php

    echo $form->checkbox('show_button_about')->setLabel('Afficher le bouton d\'action');
    echo $form->search('search_about')->setLabel('Lien de la page de presentation')->setPostType('page');
    echo $form->text('text_button_about')->setLabel('Texte du bouton');
});

$box3 = tr_meta_box('Bloque call to action');
$box3->addScreen('page'); // updated
$box3->setCallback(function () {
    $form = tr_form();

    echo $form->text('titre_ca')->setLabel('Titre');
    echo $form->text('titre2_ca')->setLabel('Sous Titre');

    echo $form->image('image_fond_ca')->setLabel('Image de fond')->setHelp('Image de fond.');

    echo $form->search('search_ca')->setLabel('Lien de la page de reservation')->setPostType('page');
    echo $form->text('text_button_ca')->setLabel('Texte du bouton');
});


$box4 = tr_meta_box('Specialites');
$box4->addScreen('page'); // updated
$box4->setCallback(function () {
    $form = tr_form();

    echo $form->text('titre_spec')->setLabel('Titre');
    echo $form->text('titre2_spec')->setLabel('Sous Titre');


    $select = [
        'grillage' => 'flaticon-bbq',
        'burger' => 'flaticon-burger',
        'bar cocktails' => 'flaticon-cocktail',
        'petit dejeuner' => 'flaticon-breakfast',
        'dessert' => 'flaticon-dessert',
        'repas' => 'flaticon-food',
        'alcool' => 'flaticon-alcohol',
        'snack' => 'flaticon-dish'
    ];

    $specialite = $form->repeater('specialites')->setFields([

        $form->select('icone')->setLabel('Icone a afficher')->setOptions($select),
        $form->text('titre')->setLabel('Titre'),
        $form->editor('description')->setLabel('Description du service')

    ])->setLabel('Les specialites')->setLimit(6);

    echo $specialite;
});

$box5 = tr_meta_box('Nos plats');
$box5->addScreen('page'); // updated
$box5->setCallback(function () {
    $form = tr_form();

    echo $form->text('titre_plat')->setLabel('Titre');
    echo $form->text('titre2_plat')->setLabel('Sous Titre');

    $plats = $form->repeater('plats')->setFields([
        $form->search('plat')->setLabel('Recherche le plat')->setPostType('plat')
    ])->setLabel('Les plats')->setLimit(8);

    echo $plats;
});

$box6 = tr_meta_box('Actualites');
$box6->addScreen('page'); // updated
$box6->setCallback(function () {
    $form = tr_form();

    echo $form->checkbox('show_actu')->setLabel('Afficher le block actualite');
    echo $form->text('titre_actu')->setLabel('Titre');
    echo $form->text('titre2_actu')->setLabel('Sous Titre');

    $actualite = $form->repeater('actualites')->setFields([
        $form->search('actualite')->setLabel('Recherche une actualite')->setPostType('post')
    ])->setLabel('Selectionnez des actualites')->setLimit(2);

    echo $actualite;
});

add_action('admin_head', function () use ($box1, $box2, $box3, $box4, $box5, $box6) {
    if (get_page_template_slug(get_the_ID()) === 'home.php') :
        remove_post_type_support('page', 'editor');
    else :
        remove_meta_box($box1->getId(), 'page', 'normal');
        remove_meta_box($box2->getId(), 'page', 'normal');
        remove_meta_box($box3->getId(), 'page', 'normal');
        remove_meta_box($box4->getId(), 'page', 'normal');
        remove_meta_box($box5->getId(), 'page', 'normal');
        remove_meta_box($box6->getId(), 'page', 'normal');
    endif;
});
