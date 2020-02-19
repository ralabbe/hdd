<?php
    get_header();
    get_template_part('nav');

	while ( have_posts() ) :
		the_post();
			$thumb = get_the_post_thumbnail_url();
			?>
			<div id="news-post" class="bg-grey">
				<div class="uk-container">
					<article class="bg-white">
						<div class="uk-width-1-1">
							<figure class="news-thumb">
								<?php echo the_post_thumbnail(); ?>
							</figure>
						</div>
						<div class="uk-padding" uk-grid>
							<div class="uk-width-3-4@m">
								<div class="news-content">
									<h1 class="uk-margin-remove"><?php the_title(); ?></h1>
									<time><?php echo get_the_date( 'F j, Y' );?></time>
									<?php the_content(); ?>
									<a href="<?php echo site_url(); ?>/news" class="text-orange">Back to News >></a>
								</div>
							</div>
							<div class="uk-width-1-4@m single-sidebar" id="news-sidebar">
								<aside>
									<?php dynamic_sidebar( 'blog-sidebar' ); ?>
								</aside>
							</div>
						</article>
					</div>
				</div>
		<?php endwhile;
	wp_reset_postdata(); //Reset post query
	the_post();


	get_footer();
?>