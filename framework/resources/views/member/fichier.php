<?php get_header() ?>

<?php $user = _wp_get_current_user(); ?>


<div class="uk-slider uk-height-medium uk-flex uk-flex-middle uk-flex-center" style="background-image: url('<?= get_template_directory_uri() . '/images/librairie.jpg' ?>');">

  <div class="uk-width-1-1 uk-text-center ">
    <h1 class="uk-heading-small uk-text-white uk-text-bold">Vos fichiers</h1>
    <p class="uk-h3 uk-text-white">
      Espace Membre
    </p>
  </div>

</div>


<div class="uk-section">

  <div class="uk-container uk-container-small">

    <div class="uk-grid">

      <div class="uk-width-4-4">

        <?php $fichiers = get_user_meta($user->ID, 'fichier', true) ?>

        <table class="uk-table uk-table-middle uk-table-divider uk-table-striped dataTableMember">
          <thead>
            <tr>
              <th>Nom du fichier</th>
              <th style="width:20%">Date validite</th>
              <th style="width:5%"></th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($fichiers as $fichier) :
              $post = get_post($fichier['id']);

              $toDay = date('Y-m-d');
              $endDay = date('Y-m-d', strtotime($fichier['dateValid']));
              ?>

              <tr>

                <td><?= $post->post_title ?></td>
                <td>
                  <?= date('d/m/Y', strtotime($fichier['dateValid'])) ?> <br />
                  <?= ($endDay > $toDay) ? '<small class="uk-text-success uk-text-center">Valide</small>' : '<small class="uk-text-danger uk-text-center">Expire</small>'; ?>

                </td>
                <td>
                  <?php if ($endDay > $toDay) : ?>
                    <a href="<?= wp_get_attachment_url(tr_posts_field('fichier', $post->ID)) ?>" class="uk-button uk-button-primary uk-button-small" target="_blank" download><i class="fas fa-file-download"> </i> </a>
                  <?php else : ?>
                    <a href="#" uk-toggle="target: #modal" class="uk-button uk-button-primary uk-button-small add_cart" id="<?= $post->ID ?>"><i class="fas fa-cart-plus"> </i> </a>
                  <?php endif; ?>
                </td>

              </tr>


            <?php
          endforeach;
          ?>

          </tbody>
        </table>

      </div>

    </div>

  </div>

</div>


<script>
  var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

  jQuery(function($) {

    $('body').on('click', '.add_cart', function(e) {
      e.preventDefault();
      var data = {
        'action': 'load_cart',
        'security': '<?php echo wp_create_nonce("load_cart_security"); ?>',
        'current_item': $(this).attr('id'),
        'actions': 'add'
      };

      $.post(ajaxurl, data, function(response) {
        if (response !== '') {
          $('#modal .uk-body-custom').html(response);
          reloadPanier();
        }
      });
    });


  });
</script>


<?php get_footer(); ?>