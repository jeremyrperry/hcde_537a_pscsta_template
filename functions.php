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

function my_excerpt($excerpt_length = 55, $id = false, $echo = true) {
    
    $text = '';
    
    if($id) {
      $the_post = & get_post( $my_id = $id );
      $text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
    } else {
      global $post;
      $text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
    }
    
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
  
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
      array_pop($words);
      $text = implode(' ', $words);
      $text = $text . $excerpt_more;
    } else {
      $text = implode(' ', $words);
    }
  if($echo)
  echo apply_filters('the_content', $text);
  else
  return $text;
}

function get_my_excerpt($excerpt_length = 55, $id = false, $echo = false) {
 return my_excerpt($excerpt_length, $id, $echo);
}