<?php get_header(); ?>


<!--=         404         =-->
<!--=======================-->
<section class="error-page">
  <div class="container">
    <div class="error-content">
      <h1 class="error">404</h1>
      <h2>Sorry! page not found</h2>

      <p>
        We’re sorry, the page you have looked for does not exist in our database!<br> Maybe go to our home page or try to use a search?
      </p>

      <a href="<?= home_url(); ?>" class="gp-btn">Go Back to home Page</a>
    </div>
    <!-- /.error-content -->
  </div>
  <!-- /.container -->
</section>
<!-- /.error-page -->



<?php get_footer(); ?>