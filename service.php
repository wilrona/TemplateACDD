<?php /* Template Name: Page Service */ ?>

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

  <div class="uk-section">

    <div class="uk-container">

      <div class="uk-flex uk-flex-center" uk-grid>

        <div class="uk-width-1-1 uk-margin-small-bottom uk-flex uk-flex-center">
          <div class="uk-width-3-4@l">
            <div class="uk-h2"><?= get_the_content() ?></div>
            <hr class="uk-divider-icon">
          </div>
        </div>

        <?php
        if (tr_posts_field('boxservices')) :
          ?>
          <div class="uk-width-3-4@l">

            <ul uk-accordion>

              <?php

              $count = 0;
              foreach (tr_posts_field('boxservices') as $ser) :

                ?>

                <li class="<?= $count === 0 ? 'uk-open' : ''; ?>">
                  <a class="uk-accordion-title" href="#"><?= $ser['title_section'] ?  $ser['title_section'] . ' - ' : '' ?><?= $ser['titre_service'] ?></a>
                  <div class="uk-accordion-content">
                    <div class="uk-margin-top">
                      <?= $ser['descservice'] ?>
                    </div>

                    <ul class="uk-subnav uk-position-relative" uk-switcher=' active: 3' uk-margin>
                      <?php if (tr_posts_field('title_procedure')) : ?><li><a href="#" class="uk-button uk-button-primary uk-text-white"><?= tr_posts_field('title_procedure') ?></a></li><?php endif; ?>
                      <?php if (tr_posts_field('title_payer')) : ?> <li><a href="#" class="uk-button uk-button-primary uk-text-white"><?= tr_posts_field('title_payer') ?></a></li> <?php endif; ?>
                      <?php if (tr_posts_field('title_ville')) : ?><li><a href="#" class="uk-button uk-button-primary uk-text-white"><?= tr_posts_field('title_ville') ?></a></li> <?php endif; ?>
                      <li class="uk-position-center-right uk-shower-subnav"><a href="#" class="uk-button uk-link-text "><i uk-icon="icon: close"></i></a></li>
                    </ul>

                    <ul class="uk-switcher uk-margin">
                      <?php if (tr_posts_field('title_procedure')) : ?>
                        <li>
                          <div class="uk-information uk-card uk-card-default uk-card-small uk-card-body uk-margin">
                            <?= tr_posts_field('text_procedure') ?>
                          </div>
                        </li>
                      <?php endif; ?>
                      <?php if (tr_posts_field('title_payer')) : ?>
                        <li>
                          <div class="uk-information uk-card uk-card-default uk-card-small uk-card-body uk-margin">
                            <?= tr_posts_field('text_payer') ?>
                          </div>
                        </li>
                      <?php endif; ?>
                      <?php if (tr_posts_field('title_ville')) : ?>
                        <li>
                          <div class="uk-information uk-card uk-card-default uk-card-small uk-card-body uk-margin">
                            <?= tr_posts_field('text_ville') ?>
                          </div>
                        </li>
                      <?php endif; ?>
                      <li></li>
                    </ul>

                  </div>
                  <hr>
                </li>

                <?php $count += 1;
              endforeach; ?>
            </ul>


          </div>
        <?php endif; ?>
      </div>

    </div>

  </div>


<?php endwhile; ?>

<?php get_footer(); ?>