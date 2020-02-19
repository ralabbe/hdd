<?php /* Template Name: Homepage */  ?>

<?php
    get_header();
    get_template_part('nav');
    include( locate_template( 'template_parts/hero.php', false, false ) );
?>
    

<section id="hdd-info">
    <div class="uk-container text-white">
        <?php include( locate_template( 'template_parts/two-column.php', false, false ) ); ?>
    </div>
</section>


<section id="equipment" class="bg-grey">
    <div class="uk-container">
        <?php if ( get_field('equipment_heading') ) : ?>
            <h1 class="uk-text-center"><?php echo get_field('equipment_heading'); ?></h1>
        <?php endif; ?>
        
        <?php if ( get_field('equipment_copy') ) : ?>
            <div class="uk-margin-bottom">
                <?php echo get_field('equipment_copy'); ?>
            </div>
        <?php endif; ?>
       
        
        <div class="uk-child-width-1-3@s uk-animation-fast" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div; delay: 100; repeat: false">
            <?php 
                if( have_rows('equipment') ):
                    while ( have_rows('equipment') ) : the_row();
                        $img = get_sub_field('image');
                        $name = get_sub_field('name');
                        $info = get_sub_field('info');
                        
                        // If no alt tag exists, use the name
                        $alt = $img['alt'];
                        if(!$alt) {
                            $alt = $name;
                        }
                        ?>
                            <div class="uk-padding-remove-top uk-padding-remove-bottom">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $alt; ?>" class="uk-width-1-1 equipment-img bg-white btm-shadow">
                                <h4 class="uk-margin-remove uk-text-center uk-text-uppercase"><?php echo $name; ?></h4>
                                <p class="uk-text-center uk-margin-remove"><?php echo $info; ?></p>
                            </div>                            
                        <?php 
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>

<?php 
    include( locate_template( 'template_parts/get-started.php', false, false ) );
    get_footer();
?>
