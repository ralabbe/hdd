/* 
    Nav styling on scroll
*/
$(window).scroll(function() {
    $nav_location = $('nav').offset().top;
    
    if($nav_location == 0){ // If the nav is at the top

        if ($( window ).width() > 639){ // Desktop
            $padding = "";
        } else { // Tablet & Mobile
            $padding = "";
        }
        $background = '';
        // Adjust padding for sticky nav
        $logo_style =  "";

    } else { // If the nav is below the top

        if ($( window ).width() > 639){ // Desktop
            $padding = "padding: 15px 0 !important;";
            $logo_style =  "width: 140px; padding: 8px 0;";
        } else { // Tablet & Mobile
            $padding = "padding: 5px 20px !important;";
            $logo_style =  "width: 120px; padding: 8px 0;";
        }

        $background = '0 -70px 40px -50px rgba(0,0,0,.3) inset';
    }

    $('.uk-logo img').css("cssText", $logo_style);
    $('nav .uk-navbar-container').css("cssText", $padding + $background);
});

$('.dropdown-submenu a.subnav').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    if ($(window).width() < 1200) {
        e.preventDefault();
     }
});


// Add social media icons to bottom of article
$social = $("#dpsp-content-bottom");
if ($social){
    $("#news-sidebar").append($social);
}



/* 
    After document is ready
*/

$( document ).ready(function(){
    // Change contact form spinner color
    $(".ajax-loader").css("cssText","color:#F96305 !important");


    // Animations
    $(window).scroll(function() {
        $win_half = $( window ).height() / 1.4;

        $(".expand").each(function(){ // Grabs each element that needs to expand
            $ani_location = $(this).offset().top - $(document).scrollTop(); // Grabs the top position of the element in relation to the top of the window
            if ($win_half >= $ani_location){ // If it's about 35% in view...
                $(this).removeClass("expand"); // Remove class tracking the element
                $(this).addClass("expand-ani"); // Add animation class
            }
        })
    });
});
