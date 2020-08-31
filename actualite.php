<?php /* Template Name: Page Actualite */ ?>

<?php get_header() ?>

<?php while (have_posts()) : the_post(); ?>

  <!--==========================-->
  <!--=         Banner         =-->
  <!--==========================-->
  <section id="page-banner">
    <div class="banner-top" data-bg-image="<?= get_the_post_thumbnail_url() ?>">
      <div class="container">
        <div class="page-banner-title">
          <h1 class="title"><?= get_the_title() ?></h1>

          <p><?= tr_posts_field('subtitle') ?></p>
        </div>
        <!-- /.page-banner-title -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.banner-top -->
    <div class="breadcrumb-wrapper">
      <div class="container">
        <div class="breadcrumb-inner">
          <div class="home-link">
            <a href="<?= home_url(); ?>"><i class="ei ei-icon_house_alt"></i></a>
          </div>

          <ul class="site-breadcrumb">
            <li><a href="<?= home_url(); ?>">Accueil</a></li>
            <li><?= get_the_title() ?></li>
          </ul>
        </div>
        <!-- /.breadcrumb-wrapper -->
      </div>
      <!-- /.container -->
    </div>
  </section>
  <!-- /#page-banner -->


  <!--========================-->
  <!--=         News         =-->
  <!--========================-->
  <div class="blog-post-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-wrapper">

            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $categorie = isset($_GET['cat']) ? $_GET['cat'] : '';
            $q = isset($_GET['s']) ? $_GET['s'] : '';


            $custom_args = array(
              'post_type' => 'post',
              'posts_per_page' => 6,
              'paged' => $paged
            );

            if ($q) :

              $custom_args['s'] = $q;

            endif;

            if ($categorie) :

              $custom_args['tax_query'] = array(
                array(
                  'taxonomy' => 'type_de_plat',
                  'field' => 'id',
                  'terms' => $categorie
                )
              );

            endif;

            $custom_query = new WP_Query($custom_args);

            if ($custom_query->have_posts()) :
              ?>

              <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <article class="post">
                  <div class="feature-image">
                    <a href="blog-signle.html">
                      <img src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                    </a>
                  </div>
                  <div class="blog-content">
                    <ul class="post-meta">
                      <li><a href="<?= get_the_permalink($post->ID); ?>"><?php sky_date_french('d F Y', get_post_time('U', true), 1); ?></a></li>
                    </ul>

                    <div class="categories">
                      <?php
                      $terms = get_the_terms($post->ID, 'category');
                      $term_article = '';

                      if (!empty($terms)) {
                        // get the first term
                        $term_article = array_shift($terms);
                      }
                      ?>
                      <a href="<?= $current_url ?>?cat=<?= $term_article->term_id ?>" class="category-item"><?= $term_article->name; ?></a>
                    </div>


                    <h3 class="entry-title"><a href="<?= get_the_permalink($post->ID); ?>"><?= $post->post_title ?></a></h3>

                    <div style="margin-bottom: 20px;">
                      <?php
                      echo wp_trim_words(get_the_content(), 20, '...');
                      ?>
                    </div>

                    <a href="<?= get_the_permalink($post->ID); ?>" class="read-more">Lire plus <i class="ei ei-arrow_right"></i></a>

                  </div>
                  <!-- /.post-content -->
                </article>

              <?php endwhile; ?>
              <?php

              kriesi_pagination($custom_query->max_num_pages);
              ?>
            <?php else :  ?>
              <div class="uk-card uk-width-1-1 uk-card-small uk-text-center">
                <h1 class="uk-heading-primary">Aucune Actualite</h1>
                <p>Veuillez revenir plutard</p>
              </div>
            <?php endif; ?>

          </div>
          <!-- /.post-wrapper -->
        </div>
        <!-- /.col-md-8 -->

        <div class="col-md-4">
          <div class="sidebar">
            <div id="search" class="widget widget_search">
              <form role="search" class="search-form-widget" action="<?= get_the_permalink(tr_options_field('options.lien_actualite')) ?>">
                <label>
                  <input type="search" class="search-field" placeholder="Recherche..." value="" name="s">
                </label>
                <button type="submit" class="search-submit">
                  <i class="ei ei-icon_search"></i>
                </button>
              </form>
            </div>
            <div id="categories" class="widget widget_categories">
              <h2 class="widget-title">Categories</h2>
              <ul>
                <?php $terms = get_terms('category', array('hide_empty' => true)); ?>

                <?php foreach ($terms as $key => $term) : ?>
                  <li>
                    <a href="<?= get_the_permalink(tr_options_field('options.lien_actualite')) ?>?cat=<?= $term->term_id ?>"><?= $term->name ?> <span class="count">(<?= $term->count ?>)</span></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>


            <!-- /.widget -->
          </div>
          <!-- /.sidebar -->
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.blog-post-archive -->


<?php endwhile; ?>

<?php get_footer(); ?>