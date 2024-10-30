<?php
/*
Plugin Name: Khoyaa Articles
Plugin URI: http://khoyaa.com/articles/
Description: Best articles feed on your siderbar.
Author: khoyaa
Author URI: https://profiles.wordpress.org/khoyaa
Version: 1.0
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if(!class_exists('Ky_Articles'))
{
  
  class Ky_Articles
  {
    private $plugin_url;
    
    public function __construct()
    {
      add_action( 'widgets_init',         array($this,'register_articles_widget'));
      add_action( 'wp_enqueue_scripts',   array($this,'articles_assests') );
      register_activation_hook( __FILE__, array($this,'Ky_activate') );
      
      $this->plugin_url                   = plugins_url('/',__FILE__);
    }
    
    public function register_articles_widget()
    {
      include 'articles-widget.php';
      register_widget( 'KyArticles_Widget' );
    }
    
    public function articles_assests()
    {
      wp_enqueue_style( 'articles-style', $this->plugin_url . 'style.css' );
    }
    
    public function Ky_activate(){}

  }
  
  new Ky_Articles;
  
}
