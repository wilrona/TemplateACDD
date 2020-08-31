<?php
/**
 * Created by IntelliJ IDEA.
 * User: macbookpro
 * Date: 21/02/2018
 * Time: 12:27
 */

?>

<!DOCTYPE html>
<!--[if lt IE 7]><html
        class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html
        class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html
        class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>
        <?php if (is_category()) {
            single_cat_title();
            echo ' | ';
            bloginfo('name');
            //	    } elseif ( is_tag() ) {
            //		    echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
            //	    } elseif ( is_archive() ) {
            //		    wp_title(''); echo ' Archive | '; bloginfo( 'name' );
        } elseif (is_search()) {
            echo 'Recherche pour &quot;' . wp_specialchars($s) . '&quot; | ';
            bloginfo('name');
        } elseif (is_home() || is_front_page()) {
            bloginfo('name');
            echo ' | ';
            bloginfo('description');
        } elseif (is_404()) {
            echo 'Error 404 Not Found | ';
            bloginfo('name');
        } elseif (is_single()) {
            wp_title('');
            echo ' | ';
            bloginfo('name');
        } else {
            wp_title('');
            echo ' | ';
            bloginfo('name');
        } ?>
    </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" />
    <?php
    wp_head();
    ?>
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,400i,700%7CGreat+Vibes&amp;subset=greek" rel="stylesheet">

</head>

<body id="home-version-1" class="home-version-1" data-style="default">

    <a href="#main_content" data-type="section-switch" class="return-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <div class="page-loader">
        <div class="loader">
            <ul class="loader-cup">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="wineglass left">
                <div class="top"></div>
            </div>
            <div class="wineglass right">
                <div class="top"></div>
            </div>
        </div>
    </div>

    <div id="main_content">

        <!--=========================-->
        <!--=        Navbar         =-->
        <!--=========================-->
        <header class="site-header gp-header-sticky <?= is_404() ? 'static-header' : '' ?>">
            <div class="container">
                <div class="header-inner">
                    <div class="site-logo">
                        <a href="<?= home_url(); ?>" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="site logo" class="logo-main" style="width:60%">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="site logo" class="logo-sticky" style="width:40%">
                        </a>
                    </div>
                    <!-- /.site-logo -->

                    <div class="toggle-menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>

                    <nav class="site-nav">
                        <div class="close-menu">
                            <i class="ei ei-icon_close"></i>
                        </div>

                        <?php
                        $defaults = array(
                            'container'       => '',
                            'container_class' => '',
                            'menu_class' => 'site-main-menu',
                            'theme_location' => 'header-nav',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'menu' => ''
                        );
                        wp_nav_menu($defaults);
                        ?>

                        <div class="right-menu">
                            <a href="<?= get_the_permalink(tr_options_field('options.lien_reservation')); ?> " class="nav-btn gp-btn">Reservation</a>
                        </div>
                        <!-- /.right-menu -->
                    </nav>
                    <!-- /.site-nav -->
                </div>
                <!-- /.heder-inner -->
            </div>
            <!-- /.container -->
        </header>
        <!-- /.site-header -->