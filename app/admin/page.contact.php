<?php


$box1 = tr_meta_box('Information page contact');
$box1->addScreen('page'); // updated
$box1->setCallback(function () {
  $form = tr_form();

  echo $form->text('subtitle')->setLabel('Sous titre de la page');
});

$box2 = tr_meta_box('Block contact');
$box2->addScreen('page'); // updated
$box2->setCallback(function () {
  $form = tr_form();

  echo $form->text('titre_contact')->setLabel('Titre');
  echo $form->text('titre2_contact')->setLabel('Sous Titre');

  echo $form->editor('contact_form')->setLabel('Information de contact');
});



add_action('admin_head', function () use ($box1, $box2) {
  if (get_page_template_slug(get_the_ID()) === 'contact.php') :
    remove_post_type_support('page', 'editor');
  else :
    remove_meta_box($box1->getId(), 'page', 'normal');
    remove_meta_box($box2->getId(), 'page', 'normal');
  endif;
});
