<?php
    get_header();
    get_template_part('nav');
?>

<section id="news-home">
	<div class="uk-container">
		<div uk-grid>
			<div class="uk-width-2-3@m uk-animation-fast" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div; delay: 250; repeat: false">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template_parts/content', 'page' );
						endwhile; // end of the loop.
					else:
						echo "<div class='uk-text-center uk-padding'><h2 class='uk-text-uppercase'>No results found</h2></div>";
					endif;
					?>
					<!-- Checks if more pages exist. Displays pagination -->
					<?php if ( paginate_links() ): ?>
						<div id="pagination">
							<?php echo paginate_links() ?>
						</div>
					<?php endif;
				?>
			</div>
			<div class="uk-width-1-3@m">
				<aside id="news-sidebar" class="main-sidebar">
					<?php dynamic_sidebar( 'blog-sidebar' ); ?>
				</aside>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>