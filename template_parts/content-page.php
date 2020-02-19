<div class="post-entry" uk-grid>
	<div class="uk-width-1-1">
		<?php if(has_post_thumbnail()): ?>
			<figure>
				<?php echo the_post_thumbnail("large"); ?>
			</figure>
		<?php endif; ?>
	</div>
	<!-- News post info -->
	<div>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="uk-position-relative uk-inline-block"><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h1>
			<small class="uk-display-block"><time><?php echo get_the_date( 'F j, Y' );?></time>
				<!-- Edit button -->
				<?php
					if ( get_edit_post_link() ) :
						echo  " <span>|</span> ";
						edit_post_link(
							sprintf(
								esc_html__( 'Edit this post' )
							), "<a>" , "</a>" , null , "uk-text-emphasis link-underline"
						);
					endif; 
				?>
				<!-- End edit button -->
			</small>
			<div class="entry-content page-execerpt">
				<?php the_excerpt(  ); ?> <a href="<?php echo get_post_permalink(); ?>" class="read-more text-orange link-underline">Read more >></a>
			</div>
		</article>
	</div> <!-- .uk-width -->
</div>
