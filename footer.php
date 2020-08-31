<?php
/**
 * Created by IntelliJ IDEA.
 * User: macbookpro
 * Date: 21/02/2018
 * Time: 12:27
 */
?>


<!--=========================-->
<!--=        Footer         =-->
<!--=========================-->
<footer id="site-footer">
  <div class="container">
    <div class="footer-nner">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="footer-widget widget">
            <h3 class="widget-title text-center">Cafe de delice</h3>


            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="" class="logo-footer">
          </div>
          <!-- /.footer-widget widget -->
        </div>
        <!-- /.col-md-6 col-lg-4 -->

        <div class="col-md-6 col-lg-4">
          <div class="footer-widget widget">
            <h3 class="widget-title">Lien rapide</h3>

            <ul class="footer-menu">
              <?php
              if (tr_options_field('options.lien_pieds')) :
                foreach (tr_options_field('options.lien_pieds') as $ser) :
                  $post = get_post($ser['lien_pied']);
                  ?>
                  <li><a href="<?= get_permalink($post->ID) ?>"><?= $post->post_title ?></a></li>
                <?php endforeach;
            endif; ?>
            </ul>
          </div>
          <!-- /.footer-widget widget -->
        </div>
        <!-- /.col-md-6 col-lg-4 -->

        <div class="col-md-6 col-lg-4">
          <div class="footer-widget widget">
            <h3 class="widget-title">Suivez nous</h3>


            <?= do_shortcode(tr_options_field('options.newsletter_footer')); ?>

            <!-- <form action="http://cafedia-html.pixelsigns.art/php/subscribe.php" method="post" class="footer-newsletter-form" data-sofinform="newsletter-subscribe">
              <div class="newsletter-inner">

                <input type="email" name="email" class="form-control" id="newsletter-form-email" placeholder="Enter Email" required onfocus="this.placeholder=''" onblur="this.placeholder='Enter Email'">
                <button type="submit" name="submit" id="newsletter-submit" class="newsletter-submit">
                  <span>inscription</span>
                  <i class="fa fa-circle-o-notch fa-spin"></i>
                </button>
              </div>

              <div class="clearfix"></div>
              <div class="form-result alert">
                <div class="content"></div>
              </div>              
            </form> -->

            <ul class="footer-social-link">
              <?php if (tr_options_field('options.link_facebook')) : ?>
                <li><a href="<?= tr_options_field('options.link_facebook') ?>"><i class="fab fa-facebook-f"></i></a></li>
              <?php endif; ?>
              <?php if (tr_options_field('options.link_twitter')) : ?>
                <li><a href="<?= tr_options_field('options.link_twitter') ?>"><i class="fab fa-twitter"></i></a></li>
              <?php endif; ?>
              <?php if (tr_options_field('options.link_linkedin')) : ?>
                <li><a href="<?= tr_options_field('options.link_linkedin') ?>"><i class="fab fa-linkedin-in"></i></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <!-- /.footer-widget widget -->
        </div>
        <!-- /.col-md-6 col-lg-4 -->
      </div>
      <!-- /.row -->


    </div>
    <!-- /.footer-nner -->
  </div>
  <!-- /.container -->

  <div class="container">
    <div class="site-info">
      <p class="copy-right">© 2019 Cafe de delice Rights Reserved.</p>
    </div>
    <!-- /.site-info -->
  </div>
  <!-- /.container -->
</footer>
<!-- /#footer -->


</div>

<?php wp_footer(); ?>

</body>

</html>