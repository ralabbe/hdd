<?php
    the_post();
    $blog_posts = get_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    ) );
    
    if ( $blog_posts ):
        foreach ( $blog_posts as $post ):
            setup_postdata($post); // Grabs post data from this loop (prevents grabbing page content)
?>
            <div class="col-md-12 col-lg-4 home-blog">
                    <div class="blog-img">
                    <?php if(has_post_thumbnail()): ?>
                        <?php echo the_post_thumbnail(); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog1.png" alt="">
                    <?php endif; ?>
                </div>
				<a href="<?php echo get_post_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <p><?php the_excerpt(  ); ?></p>
                <a href="<?php echo get_post_permalink(); ?>" class="live2btn">Read More</a>
            </div>
<?php
        endforeach;
    else:
        echo "<div class='col-12 no-result'>No results found</div>";

    endif;
    wp_reset_postdata(); //Reset post query
    wp_reset_query();
    the_post();
?>