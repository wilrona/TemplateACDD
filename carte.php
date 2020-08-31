<?php /* Template Name: Page Carte */ ?>

<?php get_header() ?>

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


<!--=============================-->
<!--=         Food Menu         =-->
<!--=============================-->
<section class="food-menu-area">
	<div class="container">
		<div class="section-title text-center">
			<h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_carte') ?></h3>
			<h2 class="title wow fadeInUp" data-wow-delay="0.3s">
				<?= tr_posts_field('titre2_carte') ?>
			</h2>
		</div>
		<!-- /.section-title -->


		<div class="tab-content tab-content-top">
			<nav class="tabs-child">
				<div class="nav menu-tabs-child" role="tablist" style="padding: 0 130px; line-height: 45px;">

					<?php $terms = get_terms('type_de_plat', array('parent' => 0));
					$index_block = 0; ?>

					<?php foreach ($terms as $key => $term) : ?>
						<a class="nav-item nav-link <?= $index_block === 0 ? 'active' : ''; ?>" id="nav<?= $key ?>-tab" data-toggle="tab" href="#nav<?= $key ?>" role="tab" aria-controls="nav<?= $key ?>" aria-selected="<?= $index_block === 0 ? 'true' : 'false'; ?>">
							<?= $term->name ?>
						</a>

						<?php $index_block++; ?>
					<?php endforeach; ?>
				</div>
			</nav>

			<div class="tab-content tab-content-child">

				<?php $index = 0; ?>
				<?php foreach ($terms as $key => $term) : ?>
					<div class="tab-pane fade <?= $index === 0 ? 'show active' : ''; ?>" id="nav<?= $key ?>" role="tabpanel" aria-labelledby="nav<?= $key ?>-tab">
						<div class="row">

							<?php

							$args = array(
								'post_type' => 'plat',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order' => 'ASC',
								'tax_query' => array(
									array(
										'taxonomy' => 'type_de_plat',
										'field' => 'slug',
										'terms' => $term->slug
									)
								)
							);
							$query = new WP_Query($args);

							while ($query->have_posts()) :
								$query->the_post();
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
											<h3 class="title"><?= $post->post_title ?></h3>
											<span class="price"><?= tr_posts_field('prix_plat', $post->ID) ? tr_posts_field('prix_plat', $post->ID) . ' FCFA' : '';  ?></span>

											<div>
												<?= tr_posts_field('desc_plat', $post->ID) ?>
											</div>
										</div>
									</div>
									<!-- /.food-item -->
								</div>

							<?php endwhile;
						wp_reset_postdata(); ?>
							<!-- /.col-lg-6 -->
						</div>
						<!-- /.row -->
					</div>
					<?php $index++;
				endforeach; ?>
			</div>
		</div>

	</div>
</section>

<!--================================-->
<!--=         Reservations         =-->
<!--================================-->
<section id="reservations" class="color-bg">

	<div class="container">

		<div class="section-title text-center">
			<h3 class="sub-title wow fadeInUp"><?= tr_posts_field('titre_carte_reser') ?></h3>
			<h2 class="title wow fadeInUp" data-wow-delay="0.3s"><?= tr_posts_field('titre2_carte_reser') ?></h2>
		</div>
		<!-- /.section-title -->


		<div class="contact-form-inner form-container wow fadeIn contact-form" data-wow-delay="0.4s">
			<?= do_shortcode(tr_posts_field('contact_form')); ?>
		</div>
		<!-- /.contact-form-inner -->

	</div>
	<!-- /.contact-form-inner -->

</section>
<!-- /#contact -->





<?php get_footer(); ?>