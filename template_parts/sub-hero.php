<?php 
  $hero_file = get_field( 'hero_file' );
  $tagline = get_field('hero_tagline');


  if ( $hero_file ) {
      $hero_filetype = wp_check_filetype($hero_file['url'])['ext'];
      if ( $hero_filetype == "mp4" ||  $hero_filetype == "mov" || $hero_filetype == "avi" || $hero_filetype == "wmv"){ ?>
          <section id="hero" class="uk-cover-container uk-width-1-1 sub-hero">
              <video autoplay loop muted playsinline uk-cover>
                  <source src="<?php echo $hero_file['url']; ?>" type="video/<?php echo $hero_filetype; ?>">
              </video>
          </section>
      <?php } else { ?>
          <section id="hero" class="uk-cover-container uk-width-1-1 sub-hero">
              <img src="<?php echo $hero_file['url']; ?>" alt="<?php echo $hero_file['alt']; ?>" class="z-index--1" uk-cover>
          </section>
      <?php }  ?>

  <?php } 
?>