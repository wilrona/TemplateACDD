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

            <?php the_content() ?>

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