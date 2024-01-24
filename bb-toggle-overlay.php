<?php

/**
 * Plugin Name: Beaver Builder Toggle Overlay
 * Description: Lightweight plugin that adds a Toggle button in the Beaver Builder toolbar so you can toggle the overlays inside the builder
 * Version: 1.0
 * Author: Ginger Soul Plugins & PYLE/DIGITAL
 * License: GPL2

 */


if(! class_exists ( 'bb_overlay_toggle'))
{

  class bb_overlay_toggle{

    function __construct(){

      add_filter( 'wp_enqueue_scripts' , array($this,'bb_overlay_toggle_scripts'), 20 , 2 );
      
      // Add BB shortcut
      add_filter( 'fl_builder_keyboard_shortcuts', function( $shortcuts ) {
        $shortcuts['toggleBBOverlay'] = array(
          'label' => __( 'Toggle BB Overlay Visability', 'toggleBBOverlay'),
          'keyCode' => "mod+'"
          );
        return $shortcuts;
      });

    }

    function bb_overlay_toggle_scripts(){
        if(class_exists('FLBuilderModel') && FLBuilderModel::is_builder_active()){
          wp_enqueue_script( 'bb_overlay_toggle_scripts', plugin_dir_url( __FILE__ ) . 'js/hidden-class-toggle.js', array('jquery') );
          wp_enqueue_style( 'bb_overlay_toggle_styles', plugin_dir_url( __FILE__ ) . 'css/hidden-class-toggle.css' );
        }
      }
  }
  $hct = new bb_overlay_toggle();
}
