<?php


// register a couple nav menus
register_nav_menus( array(
	'main-menu' => 'Main',
	'footer-links' => 'Footer - Links',
	'footer-programs' => 'Footer - Programs'
) );


if ( function_exists('register_sidebar') ) {
 	register_sidebar(array(
		'name'=> 'General Sidebar',
		'id' => 'sidebar-generic',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
 	register_sidebar(array(
		'name'=> 'Homepage Events',
		'id' => 'home-events',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}


?>