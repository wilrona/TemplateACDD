<div class="uk-modal-body">
  <a href="<?= home_url('member/login') ?>" class="uk-margin-small-left uk-margin-small-top uk-position-top-left modal uk-display-block back"><i uk-icon="icon: chevron-left"></i> Retour</a>
  <button class="uk-modal-close-default" type="button" uk-close></button>
  <h2 class="uk-modal-title uk-text-center uk-margin-remove-top">Inscription</h2>
  <div class="uk-text-center">Créer votre compte sur <?= bloginfo('name') ?></div>
  <div class="uk-form-stacked uk-flex uk-flex-center uk-margin-medium-top">
    <div class="uk-width-2-3@l">


      <form action="<?= home_url('member/register') ?>" id="registerForm" autocomplete="false" method="POST">

        <?php
        wp_nonce_field("form_seed_5cd6a93738863", "_tr_nonce_form");
        ?>

        <div class="uk-margin-small-bottom">
          <label class="uk-form-label" for="user_first_name">Votre nom</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="user_first_namem" type="text" name="user_first_name">
          </div>
        </div>
        <div class="uk-margin-small-bottom">
          <label class="uk-form-label" for="user_last_name">Votre prenom</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="user_last_name" type="text" name="user_last_name">
          </div>
        </div>
        <div class="uk-margin-small-bottom">
          <label class="uk-form-label" for="user_email">Votre adresse email</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="user_email" type="email" name="user_email">
          </div>
        </div>
        <div class="uk-margin-small-bottom">
          <label class="uk-form-label" for="user_login">Votre identifiant ou login</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="user_login" type="text" name="user_login">
          </div>
        </div>
        <div class="uk-margin-small-bottom">
          <label class="uk-form-label" for="user_pass">Votre mot de passe</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="user_pass" type="password" name='user_pass'>
          </div>
        </div>
        <div class="uk-margin-small-bottom">
          <label class="uk-form-label" for="confirm_password">Confirmer le mot de passe</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="confirm_password" type="password" name="confirm_password">
          </div>
        </div>

        <div class="uk-margin">
          <button type="submit" class="uk-button uk-button-primary uk-display-block uk-width-1-1">Valider</button>
        </div>


      </form>

    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/additional-methods.js"></script>

<script>
  jQuery('#registerForm').validate({
    rules: {
      user_first_name: 'required',
      user_last_name: "required",
      user_login: {
        required: true,
        minlength: 2
      },
      user_pass: {
        required: true,
        minlength: 5
      },
      confirm_password: {
        required: true,
        minlength: 5,
        equalTo: "#user_pass"
      },
      user_email: {
        required: true,
        email: true
      }
    },
    messages: {
      user_first_name: 'Entrer votre nom',
      user_last_name: 'Entrer votre prenom',
      user_login: {
        required: 'Entrer un identifiant',
        minlength: 'minimum deux caracteres'
      },
      user_pass: {
        required: 'Entrer un mot de passe',
        minlength: 'Au moin 5 caracteres'
      },
      confirm_password: {
        required: 'Entrer la confirmation du mot de passe',
        minlength: 'Au moin 5 caracteres',
        equalTo: 'La confirmation du mot de passe n\'est pas identique au mot de passe saisie'
      },
      user_email: {
        required: 'Entrer votre adresse email',
        email: 'Entrer une adresse email valide'
      }
    },
    submitHandler: function(form) {

      jQuery.ajax({
        url: jQuery(form).attr('action'),
        method: jQuery(form).attr('method'),
        data: jQuery(form).serialize(),
        dataType: 'json',
        success: function(json) {

          if (json.error === 'OK') {

            UIkit.notification({
              message: 'Votre inscription est reussi. Vous pouvez maintenant vous connecter',
              status: 'primary',
              pos: 'top-right'
            });
            jQuery('.back').trigger('click');

          } else {

            UIkit.notification({
              message: json.error,
              status: 'danger',
              pos: 'top-right'
            });

          }
        }
      });

      // $(form).submit();
    }
  });
</script>

<style>
  .error {
    color: red;
    font-size: 12px;
  }
</style>