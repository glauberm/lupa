<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

// Shortcodes in category description
add_filter( 'term_description', 'do_shortcode' );

// Authors shortcode [list_authors]
function list_authors_func( $atts ) {
    $args = array(
        'role__in' => 'Editor'
    );
    // The Query
    $user_query = new WP_User_Query( $args );

    // User Loop
    $user_loop = $user_query->get_results();
    if (!empty($user_loop)) {
    	foreach ( $user_query->get_results() as $user ) {
    		echo '<h2><a title="'.$user->display_name.'" href="'.get_author_posts_url($user->ID).'">';
            echo $user->display_name;
            echo '</a></h2>';
            echo get_the_author_meta('description', $user->ID);
    	}
    } else {
    	echo 'Nenhum integrante encontrado. Talvez a busca possa te ajudar.';
    }
}
add_shortcode( 'list_authors', 'list_authors_func' );
