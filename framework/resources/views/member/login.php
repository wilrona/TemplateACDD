<div class="uk-modal-body">
  <button class="uk-modal-close-default" type="button" uk-close></button>
  <h2 class="uk-modal-title uk-text-center uk-margin-remove-top">Connexion</h2>
  <div class="uk-text-center">Bienvenue! Connecte avec toi avec ton compte</div>
  <div class="uk-form-stacked uk-flex uk-flex-center uk-margin-top">
    <div class="uk-width-2-3@l">


      <form action="<?= home_url('member/login') ?>" method="post" id="loginForm">

        <?php
        wp_nonce_field("form_seed_5cd6a93738863", "_tr_nonce_form");
        ?>

        <div class="uk-margin">
          <label class="uk-form-label" for="user_login">Login ou Identifiant</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="user_login" type="text" name="user_login">
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="user_password">Mot de passe</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="user_password" type="password" name="user_password">
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-form-controls">
            <a href="<?= home_url('wp-login.php?action=lostpassword') ?>">Mot de passe oublié&nbsp;?</a>
          </div>
        </div>

        <input type="hidden" name="url" value="" />

        <div class="uk-margin">
          <button type="submit" class="uk-button uk-button-primary uk-display-block uk-width-1-1">Connexion</button>
        </div>


      </form>

      <div class="uk-margin">
        <a href="<?= home_url('member/register') ?>" class="uk-button uk-button-primary uk-display-block uk-width-1-1 modal">Inscription</a>
        <p class="uk-text-center uk-text-small">

          Tu n'as pas de compte inscrit toi. <br>
          Si vous avez des problemes avec votre compte contactez nous !!!

        </p>
      </div>



    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/additional-methods.js"></script>

<script>
  jQuery('#loginForm').validate({
    rules: {
      user_login: {
        required: true,
        minlength: 2
      },
      user_password: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      user_login: {
        required: 'Entrer un identifiant',
        minlength: 'minimum deux caracteres'
      },
      user_password: {
        required: 'Entrer un mot de passe',
        minlength: 'Au moin 5 caracteres'
      }
    },
    submitHandler: function(form) {

      var current_url = jQuery('.uk-body-custom').data('url');

      jQuery('[name=url]').val(current_url);

      jQuery.ajax({
        url: jQuery(form).attr('action'),
        method: jQuery(form).attr('method'),
        data: jQuery(form).serialize(),
        dataType: 'json',
        success: function(json) {

          if (json.error === 'OK') {

            jQuery(window).attr('location', json.url);

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