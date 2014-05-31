<?php if(!isset($content_width)) $content_width = 660;	

//Load Core; check existing core or load development core
$core_path = get_template_directory().'/core/';
require_once $core_path.'init.php';

$include_path = get_template_directory().'/includes/';

//Main components
require_once($include_path.'setup.php');
require_once($include_path.'metaboxes.php');

//Metadata & variables
require_once($include_path.'metadata/data_general.php');
require_once($include_path.'metadata/data_metaboxes.php');
require_once($include_path.'metadata/data_settings.php');

//Layout & Display components
require_once($include_path.'layout/layout_custom.php');
require_once($include_path.'layout/layout_post.php');
require_once($include_path.'layout/layout_comments.php');

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Header Widget'),
   'id' => 'header_widget',
   'description' => __( 'Header Widget', 'intuition' ),
   'before_widget' => '<aside id="%1$s" class="widget %2$s header_widget">',
   'after_widget' => "</aside>",
   ) );

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Footer Sidebar 4'),
   'id' => 'footersidebar4',
   'description' => __( 'Footer Sidebar 4', 'intuition' ),
   'before_widget' => '<aside id="%1$s" class="widget %2$s footersidebar4">',
   'after_widget' => "</aside>",
   ) );