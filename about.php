<?php /* Template Name: Page About */ ?>

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
  <section class="about-two section-padding">
    <div class="container">
      <div class="section-title text-center">
        <h3 class="sub-title wow fadeInUp"><?= tr_posts_field('title_pres') ?></h3>
        <h2 class="title wow fadeInUp" data-wow-delay="0.3s">
          <?= tr_posts_field('subtitle_pres') ?>
        </h2>
      </div>
      <!-- /.section-title -->

      <div class="about-content-two text-center">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
          <?= tr_posts_field('desc_pres') ?>
        </div>

        <?php if (tr_posts_field('image_pied')) : ?>
          <div class="about-feature-thumb-two wow fadeIn" data-wow-delay="0.7s">
            <img src="<?php echo wp_get_attachment_image_src(tr_posts_field('image_pied'), 'full')[0] ?>" alt="about">
          </div>
        <?php endif; ?>
        <!-- /.about-feature-thumb-two -->
      </div>
      <!-- /.about-content-two -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /.about-two -->


  <section id="contact">
    <div class="contact-info-wrapper contact-info-wrapper-notbefore">
      <div class="container">

        <div class="contact-infos">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
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
            <!-- /.col-xl-3 col-lg-3 col-md-4 col-sm-6 -->

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">

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
                  endif;
                  ?>
                  </p>
                </div>
                <!-- /.content -->
              </div>
              <!-- /.contact-info -->
            </div>
            <!-- /.col-xl-3 col-lg-3 col-md-4 col-sm-6 -->

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">

              <div class="contact-info wow fadeIn" data-wow-delay="0.4s">
                <div class="icon"><i class="ei ei-icon_clock_alt"></i></div>

                <h3 class="title">Horaire d'ouverture</h3>

                <div class="content">
                  <p>
                    <?php
                    if (tr_options_field('options.horaire_website')) :
                      foreach (tr_options_field('options.horaire_website') as $phone) :
                        ?>

                        <?= $phone['horaire'] ?> <br>

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
            <!-- /.col-xl-3 col-lg-3 col-md-4 col-sm-6 -->

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">

              <div class="contact-info wow fadeIn" data-wow-delay="0.5s">
                <div class="icon"><i class="ei ei-icon_mail_alt"></i></div>

                <h3 class="title">Email</h3>

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
            <!-- /.col-xl-3 col-lg-3 col-md-4 col-sm-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->
    </div>
  </section>

  <?php if (tr_posts_field('teams')) : ?>
    <!--=======================-->
    <!--=         Team         =-->
    <!--=======================-->
    <section class="team-area section-padding">
      <div class="container">
        <div class="section-title text-center">
          <h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_team') ?></h3>
          <h2 class="title wow fadeInUp" data-wow-delay="0.3s">
            <?= tr_posts_field('titre2_team') ?>
          </h2>
        </div>
        <!-- /.section-title -->



        <div class="row">
          <?php foreach (tr_posts_field('teams') as $team) :  $equipe = get_post($team['team']); ?>
            <div class="col-lg-4 col-md-6">
              <div class="team-member style-two wow fadeInRight" data-wow-delay="0.5s">
                <div class="member-image">
                  <img src="<?= get_the_post_thumbnail_url($equipe->ID) ?>" alt="team-member style-two">

                  <div class="member-cont">
                    <ul class="member-link">
                      <?php if (tr_posts_field('facebook_team', $equipe->ID)) : ?>
                        <li><a href="<?= tr_posts_field('facebook_team', $equipe->ID) ?>"><i class="fab fa-facebook-f"></i></a></li>
                      <?php endif; ?>
                      <?php if (tr_posts_field('twitter_team', $equipe->ID)) : ?>
                        <li><a href="<?= tr_posts_field('twitter_team', $equipe->ID) ?>"><i class="fab fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <?php if (tr_posts_field('linkedin_team', $equipe->ID)) : ?>
                        <li><a href="<?= tr_posts_field('linkedin_team', $equipe->ID) ?>"><i class="fab fa-linkedin-in"></i></a></li>
                      <?php endif; ?>
                    </ul>

                    <span class="separator"></span>
                    <p><?= tr_posts_field('phone_team', $equipe->ID) ? 'Tel:' . tr_posts_field('phone_team', $equipe->ID) : '' ?></p>
                  </div>
                </div>

                <div class="member-bio">
                  <h4 class="name"><?= $equipe->post_title; ?></h4>
                  <span class="job"><?= tr_posts_field('post_team', $equipe->ID) ?></span>

                </div>
              </div>
              <!-- /.team-member style-two -->
            </div>
          <?php endforeach; ?>
          <!-- /.col-lg-4 col-md-6 -->
        </div>


        <!-- /.row -->
        <?php if (tr_posts_field('link_team')) : ?>
          <div class="btn-container text-center wow fadeInUp" data-wow-delay="0.3s">
            <a href="<?= get_the_permalink(tr_posts_field('link_team')) ?>" class="gp-btn">Consulter notre equipe</a>
          </div>
        <?php endif; ?>
        <!-- /.btn-container -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.team-area -->
  <?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>