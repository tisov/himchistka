<?php
define('ROOT', get_template_directory_uri());

function debug($arg) {
   echo '<pre style="background-color:#f1f1f1"; font-size:14px>';
   print_r($arg);
   echo '</pre>';
}

function add_theme_scripts() {
   wp_enqueue_style('fontawesome', ROOT.'/public/fonts/fontawesome/css/all.css');
   wp_enqueue_style('plugins', ROOT.'/dist/css/plugins.bundle.css');
   wp_enqueue_style('main', ROOT . '/dist/css/main.css');
   
   wp_enqueue_script('plugins-js', ROOT.'/dist/js/plugins.bundle.js','','',true);
   wp_enqueue_script('main-js', ROOT.'/dist/js/main.js','','',true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

function himchistka_setup() {
   // custom logo support
   add_theme_support('custom-logo');
   add_theme_support('post-thumbnails');
   show_admin_bar(false);

   // nav menus
   register_nav_menus(
    array(
      'header-menu' => __( 'Меню Шапки', 'himchistka' ),
      'footer-menu-1' => __( 'Меню Футера 1', 'himchistka' ),
      'footer-menu-2' => __( 'Меню Футера 2', 'himchistka' )
     )
   );
}
add_action('after_setup_theme', 'himchistka_setup');



// Init Customizer 
require_once('includes/customize-register.php');

// Custom Walker Nav Menu 
require_once('includes/class_header_nav_menu.php');


// RESGISTER OUR SERVICES POST TYPE
function services_post_type(){
   register_post_type( 'services', array(
      'labels' => array(
         'name' => __('Услуги', 'himchistka')
      ),
      'public' => true,
      'menu_position' => 4,
      'capability_type' => 'post',
      'menu_icon' => 'dashicons-admin-post',
      'supports' => array(
         'thumbnail',
         'title',
         'editor'
      ),
   ));
}
add_action('init', 'services_post_type');


// RESGISTER REVIEWS POST TYPE
function reviews_post_type(){
   register_post_type( 'reviews', array(
      'labels' => array(
         'name' => __('Отзывы', 'himchistka')
      ),
      'public' => true,
      'menu_position' => 5,
      'capability_type' => 'post',
      'menu_icon' => 'dashicons-admin-post',
      'supports' => array(
         'thumbnail',
         'title',
         'editor'
      ),
   ));
}
add_action('init', 'reviews_post_type');
?>
