<?php /* Template Name: About */  ?>

<?php
    get_header();
    get_template_part('nav');
    include( locate_template( 'template_parts/sub-hero.php', false, false ) );
?>

<section id="about" class="uk-padding-remove">
        <?php include( locate_template( 'template_parts/two-column.php', false, false ) ); ?>
</section>

<?php if (get_field("video_info")){ ?>
<section class="bg-orange-gradient uk-text-center uk-position-relative" id="about-video-section">
    <a id="about-video">a</a>
    <div class="uk-container">
        <?php if (get_field("video_heading")){ ?>
            <h1><?php the_field("video_heading"); ?></h1>
        <?php } ?>
        <?php the_field("video_info"); ?>
    </div>
</section>
<?php } ?>

<section id="process">
    <div class="uk-container">
        <?php if ( get_field('process_heading') ) : ?>
            <h2 class="uk-text-center"><?php echo ucwords(get_field('process_heading')); ?></h2>
            <span class="uk-display-block uk-margin-large uk-margin-auto uk-margin-remove-top uk-width-1-4"><hr class="hr-orange expand uk-margin-auto"></span>
        <?php endif; ?>
        
        <div class="uk-padding-remove-top uk-padding-remove-bottom uk-child-width-1-3@m two-column-row uk-animation-fast" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div; delay: 300; repeat: false">
            <?php 
                if( have_rows('process_details') ):
                    while ( have_rows('process_details') ) : the_row();
                        $img = get_sub_field('image');
                        $title = ucwords(get_sub_field('title'));
                        $info = get_sub_field('info');

                        if ($img && $info && $title){
                            $alt = $img['alt'];
                            if(!$alt) { // If no alt tag exists, use the name
                                $alt = $name;
                            } ?>
                                <div>
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $alt; ?>" class="uk-width-1-1 uk-margin-bottom">
                                    <h3 class="uk-text-center"><?php echo $title ?></h3>
                                    <?php echo $info; ?>
                                </div>
                            <?php 
                        }
                    endwhile;
                endif;
            ?>
        </div> <!-- .row -->
    </div> <!-- .container -->
</section>


<?php 
    include( locate_template( 'template_parts/get-started.php', false, false ) );
    get_footer();
?>
