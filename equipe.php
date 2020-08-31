<?php /* Template Name: Page Equipe */ ?>

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

      <?php if (tr_posts_field('teams')) : ?>

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

      <?php endif; ?>
    </div>
    <!-- /.container -->
  </section>
  <!-- /.team-area -->



<?php endwhile; ?>

<?php get_footer(); ?>