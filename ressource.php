<?php /* Template Name: Page Ressource */ ?>

<?php get_header() ?>

<?php while (have_posts()) : the_post(); ?>

  <div class="uk-slider uk-height-medium uk-flex uk-flex-middle uk-flex-center" style="background-image: url('<?= get_the_post_thumbnail_url() ?>');">

    <div class="uk-width-1-1 uk-text-center uk-padding uk-padding-remove-vertical">
      <h1 class="uk-heading-small uk-text-white uk-text-bold"><?= get_the_title() ?></h1>
      <p class="uk-h3 uk-text-white">
        <?= tr_options_field('options.slogan') ?>
      </p>
    </div>

  </div>

  <div class="uk-section uk-section-muted">

    <div class="uk-container">

      <div uk-grid class="uk-grid-collapse">
        <div class="uk-width-1-1 uk-text-center uk-flex uk-flex-center">
          <div class="uk-width-3-4@l ">
            <div class="uk-text-lead">
              <?= get_the_content(); ?>
            </div>

            <?php

            global $wp;

            $current_url = home_url($wp->request);

            $q = $_GET['q'];

            ?>

            <form class="uk-search uk-search-ressource-home uk-margin-medium-top uk-search-default uk-width-1-2@l" action="<?= $current_url ?>">
              <span class="uk-search-icon-flip" uk-search-icon></span>
              <input class="uk-search-input uk-form-large uk-input" type="search" name='q' placeholder="Recherche un texte de loi" value="<?= $q ? $q : ''; ?>">
            </form>
          </div>


        </div>

      </div>

    </div>

  </div>

  <div class="uk-section uk-section-small">
    <div class="uk-container">

      <div class="uk-grid">
        <div class="uk-width-1-4@l">

          <div class="uk-card uk-card-default uk-card-small uk-card-body">
            <h3 class="uk-card-title uk-text-center">Nos Themes</h3>
            <hr>
            <div class="">

              <ul class="tree2 tree uk-list">
                <?php

                foreach (get_terms('rubrique', array('hide_empty' => false, 'parent' => 0)) as $parent_term) :

                  $child = get_terms('rubrique', array('hide_empty' => false, 'parent' => $parent_term->term_id));

                  if (count($child)) :

                    ?>

                    <li class="branch">

                      <?= $parent_term->name ?>

                      <ul>

                        <?php foreach (get_terms('rubrique', array('hide_empty' => false, 'parent' => $parent_term->term_id)) as $child_term) : ?>

                          <li> <a href="#" id="<?= $child_term->term_id ?>" class="load_search"><?= $child_term->name ?></a></li>

                        <?php endforeach ?>
                      </ul>
                    </li>



                  <?php
                endif;
              endforeach;

              ?>
              </ul>

            </div>
          </div>



        </div>
        <div class="uk-width-3-4@l">

          <!-- <div class="uk-text-lead">
                                                                                                                                                            Resultat : Theme - Rubrique
                                                                                                                                                          </div> -->

          <div class="uk-content-search uk-position-relative">

            <div class="uk-position-cover uk-flex uk-flex-middle uk-flex-center uk-hidden uk-loading" style="background-color: #fff; z-index:1">
              <div class="uk-text-center">
                <div uk-spinner="ratio: 2"></div>
                <div class="uk-margin-top">Chargement ...</div>
              </div>
            </div>
            <div class="uk-overflow-auto">
              <table class="uk-table uk-table-small uk-table-middle uk-table-divider dataTable uk-table-striped">
                <thead>
                  <tr>
                    <th>Nom du fichier</th>
                    <th style="width:20%">Annee</th>
                    <th style="width:10%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $args = array(
                    'post_status' => 'publish',
                    'post_type' => 'ressource',
                    'posts_per_page' => '-1',
                    's' => $q
                  );

                  $query = new WP_Query($args);

                  while ($query->have_posts()) : $query->the_post();

                    ?>

                    <tr>
                      <td>
                        <?= get_the_title() ?> </br>
                        <small>
                          <?php $terms = wp_get_post_terms(get_the_ID(), 'rubrique', array("fields" => "all")) ?>


                          <?php

                          $tax = '';

                          foreach ($terms as $term) {

                            if ($term->parent) :
                              $tax .= ' - <b>' . $term->name . '</b>';
                            else :
                              $tax .= '<b>' . $term->name . '</b>';
                            endif;
                          }

                          echo $tax;
                          ?>
                        </small>


                      </td>
                      <td><?= tr_posts_field('annee', get_the_ID()) ?> </td>
                      <td>
                        <a href="#" uk-toggle="target: #modal" class="uk-button uk-button-primary uk-button-small add_cart" id="<?= get_the_ID() ?>"><i class="fas fa-cart-plus"> </i> </a>
                      </td>
                    </tr>

                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>



<?php endwhile; ?>


<script>
  var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

  jQuery(function($) {

    $('body').on('click', '.load_search', function(e) {
      e.preventDefault();
      var data = {
        'action': 'load_ressource',
        'security': '<?php echo wp_create_nonce("load_ressource_security"); ?>',
        'current_rubrique': $(this).attr('id')
      };

      $('.uk-loading').removeClass('uk-hidden');
      $('.load_search').each(function() {
        $(this).removeClass('uk-active')
      });
      $(this).addClass('uk-active');

      $.post(ajaxurl, data, function(response) {
        if (response !== '') {
          $('body .uk-content-search').html(response);
          initDataTable();
          $('.uk-loading').addClass('uk-hidden');
        }
      });
    });


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