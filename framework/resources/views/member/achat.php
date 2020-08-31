<?php get_header() ?>

<?php $user = _wp_get_current_user(); ?>


<div class="uk-slider uk-height-medium uk-flex uk-flex-middle uk-flex-center" style="background-image: url('<?= get_template_directory_uri() . '/images/librairie.jpg' ?>');">

  <div class="uk-width-1-1 uk-text-center ">
    <h1 class="uk-heading-small uk-text-white uk-text-bold">Vos achats</h1>
    <p class="uk-h3 uk-text-white">
      Espace Membre
    </p>
  </div>

</div>


<div class="uk-section">

  <div class="uk-container uk-container-small">

    <div class="uk-grid">

      <div class="uk-width-4-4">

        <?php $fichiers = get_user_meta($user->ID, 'achat', true) ?>

        <table class="uk-table uk-table-middle uk-table-divider uk-table-striped dataTableMember2">
          <thead>
            <tr>
              <th style="width:20%">Date Achats</th>
              <th style="width:20%">Montant</th>
              <th style="width:20%">Nbre de fichier</th>
              <!-- <th style="width:5%"></th> -->
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($fichiers as $fichier) :
              ?>

              <tr>

                <td><?= date('d/m/Y H:i', strtotime($fichier['date'])) ?></td>
                <td>
                  <?= $fichier['montant'] ?>
                </td>
                <td>
                  <?= count($fichier['fichier']) ?>
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



<?php get_footer(); ?>