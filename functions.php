<?php


//Add thumbnail, automatic feed links and title tag support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );

add_filter( 'get_custom_logo', 'change_logo_class' );


function change_logo_class( $html ) {
    $html = str_replace( 'custom-logo-link', 'uk-logo', $html );
    return $html;
}


//Add menu support and register main menu
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'main_menu' => 'Main Menu'
  		)
  	);
}

// Register left footer sidebar
add_action('widgets_init', 'theme_register_sidebar_footer_left');
function theme_register_sidebar_footer_left() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
				'id' => 'footer-left',
				'name' => 'Footer - Left',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h4>',
		    'after_title' => '</h4>',
		 ));
	}
}

// Register right footer sidebar
add_action('widgets_init', 'theme_register_sidebar_footer_right');
function theme_register_sidebar_footer_right() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
				'id' => 'footer-right',
				'name' => 'Footer - Right',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h4>',
		    'after_title' => '</h4>',
		 ));
	}
}

// Register right footer sidebar
add_action('widgets_init', 'theme_register_sidebar_get_started');
function theme_register_sidebar_get_started() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
				'id' => 'get-started',
				'name' => 'Get Started',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h4>',
		    'after_title' => '</h4>',
		 ));
	}
}

// Register blog sidebar
add_action('widgets_init', 'theme_register_sidebar_blog');
function theme_register_sidebar_blog() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
				'id' => 'blog-sidebar',
				'name' => 'News',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h4>',
		    'after_title' => '</h4>',
		 ));
	}
}

// Change excerpt string

function custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );


// Navbar_Menu_Walker setup

add_action( 'after_setup_theme', 'navbar_setup' );

if ( ! function_exists( 'navbar_setup' ) ):

	function navbar_setup(){

		add_action( 'init', 'register_menu' );

		function register_menu(){
			register_nav_menu( 'top-bar', 'Top Menu' ); 
		}

		class Navbar_Menu_Walker extends Walker_Nav_Menu {


			function start_lvl( &$output, $depth = 0, $args = array() ) {

        $indent = str_repeat( "\t", $depth );
        // Render prior to dropdown list
				$output	   .= "\n$indent<div class='uk-navbar-dropdown'><ul class=\"uk-nav uk-navbar-dropdown-nav\">\n";

			}

			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

				if (!is_object($args)) {
					return; // menu has not been configured
				}

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$li_attributes = '';
				$class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        // Classes for link within an li with children
				$classes[] = ($args->has_children) ? 'dropdown-submenu' : '';
				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '  tabindex="-1">';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        // Classes for li element containing a link with children
        $attributes .= ($args->has_children) 	    ? ' class="uk-nav uk-navbar-dropdown-nav"'  : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

				if ( !$element )
					return;

				$id_field = $this->db_fields['id'];

				//display this element
				if ( is_array( $args[0] ) )
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
				else if ( is_object( $args[0] ) )
					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);

				$id = $element->$id_field;

				// descend only when the depth is right and there are childrens for this element
				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

					foreach( $children_elements[ $id ] as $child ){

						if ( !isset($newlevel) ) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
						unset( $children_elements[ $id ] );
				}

				if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}

				//end this element
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);
			}
		}
 	}
endif;


// END THEME OPTIONS



/*------------------------------------*\
	Load Scripts and Stylesheets
\*------------------------------------*/


function wpdocs_theme_name_scripts() {
	// Fonts
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Noto+Sans&display=swap' ); // Google Fonts: Noto Sans

	// Stylesheets
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css' ); // Reset Stylesheet
	wp_enqueue_style( 'uikit.min', get_template_directory_uri() . '/assets/css/uikit/uikit.min.css' ); // UI Kit Framework
	wp_enqueue_style( 'style', get_stylesheet_uri() ); // Custom Styles
	
	// Scripts
    wp_enqueue_script( 'jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.0.0', true ); // jQuery
    wp_enqueue_script( 'uikit.min', get_template_directory_uri() . '/assets/js/uikit/uikit.min.js', array(), '1.0.0', true ); // UI Kit Framework
    wp_enqueue_script( 'uikit.icons.min', get_template_directory_uri() . '/assets/js/uikit/uikit-icons.min.js', array(), '1.0.0', true ); // UI Kit Icons
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true ); // Custom Scripts
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );




/*------------------------------------*\
	Widgets
\*------------------------------------*/

/**
 * Restrict native search widgets to the 'post' post type
 */
add_filter( 'widget_title', function( $title, $instance, $id_base )
{
    // Target the search base
    if( 'search' === $id_base )
        add_filter( 'get_search_form', 'wpse_post_type_restriction' );
    return $title;
}, 10, 3 );

function wpse_post_type_restriction( $html )
{
    // Only run once
    remove_filter( current_filter(), __FUNCTION__ );

    // Inject hidden post_type value
    return str_replace( 
        '</form>', 
        '<input type="hidden" name="post_type" value="post" /></form>',
        $html 
    );
}

/*------------------------------------*\
	Custom Style Formats for WYSIWYG
\*------------------------------------*/


// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}


// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

//add custom styles to the WordPress editor
function custom_mce_styles( $init_array ) {  
 
	$style_formats = array(  
			array(  
				'title' => 'Black Button',  
				'block' => 'span',  
				'classes' => 'btn-black text-orange',
				'wrapper' => true,
			), array(  
				'title' => 'Orange Button',  
				'block' => 'span',  
				'classes' => 'btn-orange text-white',
				'wrapper' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  

} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'custom_mce_styles' );



?>