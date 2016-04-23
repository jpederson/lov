<?php


error_reporting( E_ALL );
ini_set( "display_errors", 1 );


// set a custom field prefix
define( "CMB_PREFIX", "_p_" );


// include the faculty content type
include( "library/post-type/event.php" );


// include some theme-related things
include( "library/menus.php" );
include( "library/scripts.php" );


// an extra image manipulation function
include( "library/images.php" );


// include our metaboxes library
include( "library/metabox.php" );


// include quote metaboxes/functions
include( "library/title.php" );
include( "library/showcase.php" );
include( "library/accordion.php" );


// include the anthem feed parsing functionality
include( "library/anthem-feed.php" );

?>