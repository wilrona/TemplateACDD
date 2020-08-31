<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 30/04/2018
 * Time: 11:09
 */

?>

<?php /* Template Name: Page accueil */ ?>

<?php get_header() ?>

<?php while (have_posts()) : the_post(); ?>


  <!--==========================-->
  <!--=         Banner         =-->
  <!--==========================-->
  <header class="banner">
    <div class="swiper-container banner-slider" data-swiper-config='{
	                                                                                                                                                                                        "loop": true,
	                                                                                                                                                                                        "speed": 900,
	                                                                                                                                                                                        "autoplay": 10000,
	                                                                                                                                                                                        "pagination":"#banner-swiper-pagination",
	                                                                                                                                                                                        "slidesPerView": 1,
	                                                                                                                                                                                        "parallax": true,
	                                                                                                                                                                                        "nextButton":"#slide-next",
	                                                                                                                                                                                        "prevButton":"#slide-prev",
	                                                                                                                                                                                        "grabCursor": false,
	                                                                                                                                                                                        "paginationClickable": true
                                                                                                                                                                                        }'>



      <div class="swiper-wrapper">
        <?php foreach (tr_posts_field('sliders') as $slider) :  ?>

          <div class="swiper-slide" data-bg-image="<?php echo wp_get_attachment_image_src($slider['image_fond'], 'full')[0] ?>">


            <div class="container">
              <div class="banner-content text-center">
                <h3 class="sub-title" data-animate="fadeInDown"><?= $slider['texte_heading1'] ?></h3>
                <h2 class="banner-title" data-animate="fadeInDown" data-delay="0.3s"><?= $slider['texte_heading2'] ?></h2>

                <div class="seaperator-line">
                  <span class="line line-left"></span>
                  <span class="star" data-animate="fadeIn">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22px" height="20px">
                      <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M19.583,11.544 L19.570,11.572 L19.545,11.588 C19.517,11.605 16.718,13.384 14.335,12.085 C14.329,12.082 14.021,11.911 13.614,11.660 C15.151,12.918 17.057,14.822 16.937,16.450 L16.937,18.824 L16.937,19.013 L16.783,18.906 C16.771,18.897 15.516,18.029 14.763,17.934 L14.741,17.931 L14.722,17.919 C14.692,17.899 11.940,16.054 10.904,13.479 C10.812,15.838 10.382,18.574 8.926,19.307 C8.856,19.345 7.207,20.215 6.388,19.906 L6.310,19.877 L6.326,19.794 C6.329,19.780 6.611,18.324 6.233,17.275 L6.220,17.242 L6.232,17.209 C6.242,17.180 7.197,14.478 8.239,12.334 C6.196,13.830 5.863,14.219 5.827,14.311 L5.823,14.317 L5.820,14.323 C5.810,14.341 5.580,14.730 4.921,14.883 C4.134,15.065 2.655,14.917 0.079,13.169 L0.001,13.117 L0.051,13.036 C0.160,12.855 2.771,8.633 5.740,9.032 C5.750,9.032 6.557,9.076 7.486,9.200 C3.755,7.128 3.963,2.546 3.966,2.497 L3.969,2.455 L4.002,2.427 C4.557,1.962 4.849,0.229 4.852,0.212 L4.886,0.006 L5.023,0.163 C5.685,0.925 6.741,1.319 6.752,1.322 L6.738,1.319 C9.490,1.904 10.545,4.205 10.942,6.184 C11.288,4.869 12.036,3.931 13.161,3.502 C13.776,3.206 15.388,2.287 15.464,1.603 L15.655,1.583 C15.724,1.796 17.217,6.572 15.341,8.328 C17.627,7.824 19.216,7.964 20.051,8.762 L20.043,8.755 C20.055,8.766 21.283,9.706 21.910,9.436 L21.998,9.611 C21.977,9.624 19.861,10.889 19.583,11.544 ZM12.278,10.177 C12.264,10.129 12.238,10.084 12.215,10.038 C12.202,10.010 12.194,9.980 12.177,9.953 C12.150,9.910 12.112,9.870 12.077,9.830 C12.056,9.804 12.040,9.777 12.016,9.754 C11.985,9.724 11.946,9.700 11.911,9.674 C11.874,9.645 11.840,9.613 11.798,9.588 C11.695,9.526 11.583,9.478 11.465,9.447 C11.348,9.415 11.224,9.398 11.099,9.397 L11.068,9.398 C10.951,9.400 10.839,9.415 10.732,9.443 C10.671,9.459 10.618,9.486 10.562,9.509 C10.518,9.527 10.471,9.539 10.430,9.561 C10.377,9.589 10.334,9.629 10.287,9.664 C10.251,9.691 10.210,9.712 10.178,9.743 C10.143,9.776 10.119,9.818 10.090,9.856 C10.056,9.898 10.017,9.936 9.990,9.983 C9.909,10.123 9.868,10.269 9.868,10.416 C9.868,10.593 9.925,10.765 10.038,10.926 L10.039,10.926 C10.183,11.135 10.418,11.275 10.681,11.356 C10.734,11.372 10.779,11.404 10.835,11.414 C10.925,11.429 11.009,11.436 11.091,11.436 C11.602,11.436 12.062,11.164 12.236,10.757 L12.237,10.755 C12.255,10.715 12.267,10.683 12.275,10.651 C12.300,10.563 12.313,10.488 12.313,10.416 C12.313,10.335 12.301,10.254 12.278,10.177 Z" />
                    </svg>
                  </span>
                  <span class="line line-right"></span>
                </div>

                <p data-animate="fadeInUp" data-delay="0.7s">
                  <?= $slider['texte_msg'] ?>
                </p>

                <?php if ($slider['show_button']) : ?>
                  <a href="<?= get_the_permalink($slider['search']) ?>" class="gp-btn btn-light" data-animate="fadeInUp" data-delay="0.9s"><?= $slider['text_button'] ?></a>
                <?php endif; ?>

              </div>
              <!-- /.banner-content -->
            </div>
            <!-- /.container -->
          </div>
          <!-- /.swiper-slide -->


        <?php endforeach; ?>
      </div>
      <!-- /.swiper-wrapper -->


      <div class="swiper-pagination" id="banner-swiper-pagination"></div>

    </div>
    <!-- /.swiper-container -->
  </header>
  <!-- /.banner -->

  <!--=========================-->
  <!--=         About         =-->
  <!--=========================-->
  <section class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about-content">
            <div class="section-title text-left">
              <h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_about') ?></h3>
              <h2 class="title wow fadeInUp" data-wow-delay="0.3s"> <?= tr_posts_field('titre2_about') ?> </h2>
            </div>
            <!-- /.section-title -->


            <div class="wow fadeInUp" data-wow-delay="0.5s">
              <?= tr_posts_field('descr_about') ?>
            </div>
            <?php if (tr_posts_field('show_button_about')) : ?>
              <a href="<?= get_the_permalink(tr_posts_field(('search_about'))) ?>" class="gp-btn wow fadeInUp" data-wow-delay="0.7s"><?= tr_posts_field('text_button_about') ?></a>
            <?php endif; ?>
          </div>
          <!-- /.about-content -->
        </div>
        <!-- /.col-lg-6 -->

        <div class="col-lg-6">
          <div class="about-feature-image">
            <div class="img-one" data-parallax='{"y" : 25}'>
              <img src="<?php echo wp_get_attachment_image_src(tr_posts_field('image1'), 'full')[0] ?> " alt="about" class="wow fadeInDown" style="width: 270px; height: 600p">
            </div>

            <div class="img-two" data-parallax='{"y" : -25}'>
              <img src="<?php echo wp_get_attachment_image_src(tr_posts_field('image2'), 'full')[0] ?>" alt="about" class="wow fadeInUp">
            </div>
          </div>
          <!-- /.about-feature-image -->
        </div>
        <!-- /.col-lg-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /.about -->



  <!--==================================-->
  <!--=         Call To Action         =-->
  <!--==================================-->
  <section class="call-to-action jarallax">

    <img src="<?php echo wp_get_attachment_image_src(tr_posts_field('image_fond_ca'), 'full')[0] ?>" alt="" class="jarallax-img">

    <div class="container">
      <div class="call-to-action-wrapper wow fadeInUp">
        <div class="content-left">
          <h2>
            <?= tr_posts_field('titre_ca') ?>
          </h2>

          <h4>
            <?= tr_posts_field('titre2_ca') ?>
          </h4>
        </div>
        <!-- /.content-left -->

        <div class="action-btn-inner">
          <a href="<?= get_the_permalink(tr_posts_field(('search_ca'))) ?>" class="gp-btn btn-light"><?= tr_posts_field('text_button_ca') ?></a>
        </div>
        <!-- /.action-btn-inner -->
      </div>
      <!-- /.call-to-action-wrapper -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /.call-to-acteon -->



  <!--=============================-->
  <!--=         Food Menu         =-->
  <!--=============================-->
  <section class="food-menu-area">
    <div class="container">
      <div class="section-title text-center">
        <h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_spec') ?></h3>
        <h2 class="title wow fadeInUp" data-wow-delay="0.3s">
          <?= tr_posts_field('titre2_spec') ?>
        </h2>
      </div>
      <!-- /.section-title -->

      <?php if (tr_posts_field('specialites')) : ?>

        <div class="food-tabs-wrapper wow fadeInUp" data-wow-delay="0.5s">
          <nav class="tabs-inner">
            <div class="nav menu-tabs" role="tablist">
              <?php $index_block = 0;
              foreach (tr_posts_field('specialites') as $key => $special) : ?>
                <a class="nav-item nav-link <?= $index_block === 0 ? 'active' : ''; ?>" id="nav<?= $key ?>-tab" data-toggle="tab" href="#nav<?= $key ?>" role="tab" aria-controls="nav<?= $key ?>" aria-selected="<?= $index_block === 0 ? 'true' : 'false'; ?>">
                  <i class="fi <?= $special['icone'] ?>"></i>
                  <span><?= $special['titre'] ?></span>
                </a>
                <?php $index_block++;
              endforeach; ?>
            </div>
          </nav>
          <div class="tab-content tab-content-top">
            <?php $index_desc = 0;
            foreach (tr_posts_field('specialites') as $key => $special) : ?>
              <div class="tab-pane fade <?= $index_desc === 0 ? 'show active' : ''; ?> " id="nav<?= $key ?>" role="tabpanel" aria-labelledby="nav<?= $key ?>-tab">
                <?= $special['description']; ?>
              </div>
              <?php $index_desc++;
            endforeach; ?>
          </div>
        </div>

      <?php endif; ?>
      <!-- /.food-tabs-wrapper -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /.food-menu-area -->

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


  <section class="food-menu-area">

    <div class="container">
      <div class="section-title text-center">
        <h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_plat') ?></h3>
        <h2 class="title wow fadeInUp" data-wow-delay="0.3s">
          <?= tr_posts_field('titre2_plat') ?>
        </h2>
      </div>

      <?php if (tr_posts_field('plats')) : ?>

        <div class="tab-content tab-content-child tab-no-thumb">
          <div class="row">

            <?php
            foreach (tr_posts_field('plats') as $plat) :
              $post_plat = get_post($plat['plat']);
              ?>

              <div class="col-lg-6">
                <div class="food-item">
                  <?php if (get_the_post_thumbnail($post_plat->ID, 'smalling')) : ?>
                    <div class="food-thumb">
                      <div class="thumb">
                        <?php get_the_post_thumbnail($post_plat->ID, 'smalling') ?>
                        <span><i class="ei ei-icon_plus"></i></span>
                      </div>
                    </div>
                  <?php endif; ?>

                  <div class="content">
                    <h3 class="title"><?= $post_plat->post_title ?></h3>
                    <span class="price"><?= tr_posts_field('prix_plat', $post_plat->ID) ? tr_posts_field('prix_plat', $post_plat->ID) . ' FCFA' : '';  ?></span>

                    <div>
                      <?= tr_posts_field('desc_plat', $post_plat->ID) ?>
                    </div>
                  </div>
                </div>
                <!-- /.food-item -->
              </div>
              <!-- /.col-lg-6 -->

            <?php endforeach; ?>
            <!-- /.col-lg-6 -->
          </div>
        </div>

      <?php endif; ?>



    </div>

  </section>


  <!--===============================-->
  <!--=         Blog Post         =-->
  <!--===============================-->

  <?php if (tr_posts_field('show_actu')) : ?>
    <section id="blog-grid">

      <div class="section-title text-center">
        <h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_actu') ?></h3>
        <h2 class="title wow fadeInUp" data-wow-delay="0.3s"><?= tr_posts_field('titre2_actu') ?></h2>
      </div>
      <!-- /.section-title -->

      <?php if (tr_posts_field('actualites')) : ?>
        <div class="container">
          <div class="row">

            <?php $count = 0;
            foreach (tr_posts_field('actualites') as $actu) : $actuas = get_post($actu['actualite']) ?>

              <div class="<?= $count === 0 ? 'col-lg-7 com-md-7' : 'col-lg-5 com-md-5'; ?> ">
                <article class="blog-post wow <?= $count === 0 ? 'fadeInRight' : 'fadeInLeft'; ?>" data-wow-delay="0.5">
                  <div class="feature-image">
                    <a href="<?= get_the_permalink($actuas->ID); ?>">
                      <?= $count === 0 ? get_the_post_thumbnail($actuas->ID, 'bigger') : get_the_post_thumbnail($actuas->ID, 'smaller'); ?>
                    </a>
                  </div>
                  <!-- /.feature-image -->
                  <div class="blog-content">
                    <ul class="post-meta">
                      <li><a href="<?= get_the_permalink($actuas->ID); ?>"><?php sky_date_french('d F Y', get_post_time('U', true), 1); ?></a></li>
                    </ul>

                    <h3 class="entry-title">
                      <a href="<?= get_the_permalink($actuas->ID); ?>">
                        <?= $actuas->post_title ?>
                      </a>
                    </h3>

                  </div>
                  <!-- /.blog-content -->
                </article>
                <!-- /.blog-post -->
              </div>
              <!-- /.col-lg-4 com-md-6 -->
              <?php $count++;
            endforeach; ?>
          </div>
          <!-- /.row -->
        </div>
      <?php endif; ?>
      <!-- /.container -->
    </section>
    <!-- /#blog-grid -->
  <?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>