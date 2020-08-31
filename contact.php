<?php /* Template Name: Page Contact */ ?>

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



  <!--===========================-->
  <!--=         Contact         =-->
  <!--===========================-->
  <section id="contact-single">
    <div class="contact-top">

      <div class="container">
        <div class="contact-infos-box">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
              <div class="contact-info wow fadeIn">
                <div class="icon"><i class="ei ei-icon_house_alt"></i></div>

                <h3 class="title">Adresse</h3>

                <div class="content">
                  <p>
                    <?= tr_options_field('options.adress_website'); ?>
                  </p>
                </div>
                <!-- /.content -->
              </div>
              <!-- /.contact-info -->
            </div>
            <!-- /.col-lg-4 col-md-6 col-sm-6 -->

            <div class="col-lg-4 col-md-6 col-sm-6 mb-30">

              <div class="contact-info wow fadeIn" data-wow-delay="0.3s">
                <div class="icon"><i class="ei ei-icon_phone"></i></div>

                <h3 class="title">Telephone</h3>
                <div class="content">
                  <p>
                    <?php
                    if (tr_options_field('options.phone_website')) :
                      foreach (tr_options_field('options.phone_website') as $phone) :
                        ?>

                        <?= $phone['phone'] ?> <br>

                      <?php
                    endforeach;
                  endif; ?>
                  </p>
                </div>
                <!-- /.content -->
              </div>
              <!-- /.contact-info -->
            </div>
            <!-- /.col-lg-4 col-md-6 col-sm-6 -->

            <div class="col-lg-4 col-md-6 col-sm-6 mb-30">

              <div class="contact-info wow fadeIn" data-wow-delay="0.5s">
                <div class="icon"><i class="ei ei-icon_mail_alt"></i></div>

                <h3 class="title">Adresse Email</h3>

                <div class="content">
                  <p>
                    <?php
                    if (tr_options_field('options.email_website')) :
                      foreach (tr_options_field('options.email_website') as $phone) :
                        ?>

                        <?= $phone['email'] ?> <br>

                      <?php
                    endforeach;
                  endif;
                  ?>
                  </p>
                </div>
                <!-- /.content -->
              </div>
              <!-- /.contact-info -->
            </div>
            <!-- /.col-lg-4 col-md-6 col-sm-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.contact-top -->


    <div class="container">

      <div class="contact-from-wrapper wrapper-padding">
        <div class="section-title text-center">
          <h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_contact') ?></h3>
          <h2 class="title wow fadeInUp" data-wow-delay="0.3s"><?= tr_posts_field('titre2_contact') ?></h2>
        </div>
        <!-- /.section-title -->


        <div class="contact-form-inner form-container wow fadeIn contact-form" data-wow-delay="0.4s">
          <?= do_shortcode(tr_posts_field('contact_form')); ?>
        </div>
        <!-- /.contact-form-inner -->
      </div>
      <!-- /.contact-from-wrapper -->

    </div>
    <!-- /.container -->

  </section>



<?php endwhile; ?>

<?php get_footer(); ?>