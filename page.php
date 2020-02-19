<?php
    get_header();
    get_template_part('nav');
    include( locate_template( 'template_parts/hero.php', false, false ) );

    while ( have_posts() ) :
		the_post(); 
?>


<section id="general-page" class="uk-flex uk-flex-center uk-flex-middle uk-table">
    <div class="uk-container">
        <?php the_content(); ?>
    </div>
</section>

<?php endwhile; ?>


<?php 
    include( locate_template( 'template_parts/get-started.php', false, false ) );
    get_footer();
?>
