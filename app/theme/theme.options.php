<?php
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Setup Form
$form = tr_form()->useJson()->setGroup($this->getName());
?>

<h1>Theme Options</h1>
<div class="typerocket-container">
    <?php
    echo $form->open();

    $config = function () use ($form) {


        echo $form->editor('adress_website')->setLabel('Adresse ou Lieu de  l\'entreprise');

        $phone = $form->repeater('phone_website')->setFields([

            $form->text('phone')->setLabel('Numero de telephone'),


        ])->setLabel('Les numeros de telephone de l\'entreprise');

        echo $phone;

        $horaire = $form->repeater('horaire_website')->setFields([

            $form->text('horaire')->setLabel('Horaire ouverture'),


        ])->setLabel('Les horaires ouverture de l\'entreprise');

        echo $horaire;

        $horaire = $form->repeater('email_website')->setFields([

            $form->text('email')->setLabel('Adresse Email'),


        ])->setLabel('Les adresses email de contact de l\'entreprise');

        echo $horaire;
    };

    $pied_page = function () use ($form) {

        echo $form->text('newsletter_footer')->setLabel('Shortcode de newsletter')->setHelp('Introduire le shortcode du plugin "Newsletter" afin d\'afficher le formulaire d\'inscription a une newsletter');

        echo $form->text('link_facebook')->setLabel('Lien facebook de l\'entreprise');
        echo $form->text('link_twitter')->setLabel('Lien twitter de l\'entreprise');
        echo $form->text('link_linkedin')->setLabel('Lien linkedin de l\'entreprise');

        $repeater = $form->repeater('lien_pieds')->setFields([

            $form->search('lien_pied')->setLabel('Recherche page')->setPostType('page'),


        ])->setLabel('Liens rapide au pied de la page');

        echo $repeater;
    };

    $page = function () use ($form) {

        echo $form->search('lien_reservation')->setLabel('Lien de la page de reservation')->setPostType('page');

        echo $form->search('lien_actualite')->setLabel('Lien de la page actualite')->setPostType('page')->setHelp('Pour la recherche et le filtre par categorie');
    };



    // Save
    $save = $form->submit('Enregistrement');

    // Layout
    tr_tabs()->setSidebar($save)
        ->addTab('Congiguration des liens de pages', $page)
        ->addTab('Congiguration de contact', $config)
        ->addTab('Information de pied de page', $pied_page)
        ->render('box');
    echo $form->close();
    ?>

</div>