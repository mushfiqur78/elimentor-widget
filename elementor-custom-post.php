<?php 
	
	class CustomPostDesign{
		
		public static $instance = null;
		public static function get_instance(){
			if( !self::$instance )
				self::$instance = new self;
				return self::$instance;
		}
		public function init(){
			add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));
		}
		public function widgets_registered(){
			if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){
				require_once('custom-post-controls.php');
			}
		}
		
	}
	CustomPostDesign::get_instance()->init();
	//this script for stylesheet
	require_once('custom-post-design-style.php');
?>