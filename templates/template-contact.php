<?php /* Template Name: Contact */  ?>

<?php
    get_header();
    get_template_part('nav');

    include( locate_template( 'template_parts/get-started.php', false, false ) );
    while ( have_posts() ) :
		the_post(); 
?>


<section id="contact">
    <div class="uk-container">
        <div class="uk-child-width-1-2@m" uk-grid>
            <div>
                <?php the_content(); ?>
            </div>
            <div>
                <?php echo the_field('form'); ?>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>


<?php 
    include( locate_template( 'footer_contact.php', false, false ) );
?>
