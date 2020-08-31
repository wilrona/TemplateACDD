<?php

$box1 = tr_meta_box('Information page actualite');
$box1->addScreen('page'); // updated
$box1->setCallback(function () {
  $form = tr_form();

  echo $form->text('subtitle')->setLabel('Sous titre de la page');
});


add_action('admin_head', function () use ($box1) {
  if (get_page_template_slug(get_the_ID()) === 'actualite.php') :
    remove_post_type_support('page', 'editor');
  else :
    remove_meta_box($box1->getId(), 'page', 'normal');
  endif;
});
