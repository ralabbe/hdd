<div>
    <?php 
        if( have_rows('two_column') ):
            while ( have_rows('two_column') ) : the_row();
                $img = get_sub_field('image');
                $info = get_sub_field('info');
                $alignment = get_sub_field('alignment');
                // If no alt tag exists, use the name
                $alt = $img['alt'];
                if(!$alt) {
                    $alt = $name;
                }
                
                $hide_right = "";
                // If right alignment is active, hide first image in medium screens+
                if ($alignment == "right"){
                    $hide_right = "class='uk-hidden@s'";
                    $scollspy =  "uk-scrollspy='cls: uk-animation-slide-right-small'";
                } else {
                    $scollspy =  "uk-scrollspy='cls: uk-animation-slide-left-small'";
                }
                
                $background = "";
                if ( get_sub_field('background') ) {
                    $background = "background:" . get_sub_field('background');
                }
                ?>
                
                <div style="<?php echo $background; ?>">
                    <div class="uk-container">
                        <div class="uk-padding-remove-top uk-padding-remove-bottom uk-child-width-1-2@s two-column-row" uk-grid <?php echo $scollspy; ?>>
                            <div <?php echo $hide_right; ?>>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $alt; ?>">
                            </div>
                            <div>
                                <?php echo $info; ?>
                            </div>
                            <?php if ($alignment == "right"){ // If right alignment is active, put an image on the right side, hides on small screen ?>
                            <div class="uk-visible@s">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $alt; ?>">
                            </div>
                            <?php } ?>
                        </div> <!-- .row -->
                    </div> <!-- .container -->
                </div> <!-- .background -->
                <?php 
            endwhile;
        endif;
    ?>
</div>