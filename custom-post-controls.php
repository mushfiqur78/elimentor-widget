<?php 
	
	namespace Elementor;
	class CustomPostControls extends Widget_Base{
		
		public function get_name(){
			return "Custom Post Design";
		}
		public function get_title(){
			return "Custom Post Design";
		}
		public function get_categories(){
			return ['basic'];
		}
		public function get_icon(){
			return 'fa fa-sticky-note-o';
		}
		
		
		protected function _register_controls(){
			
			$args	=	array(
				'public'                => true,
				'_builtin'              => true
			);
			$output = 'names'; // names or objects, note names is the default
			$operator = 'and'; // 'and' or 'or'
			$post_types = get_post_types($args,$output,$operator);
			$posttypes_array = array();
			foreach ($post_types  as $post_type ) {
				$posttypes_array[$post_type] = $post_type;
			} 
			
			$this->start_controls_section('cpd-postnumber', array( 
				'label'				=> 'Posts Per Page',
				'tab'				=> Controls_Manager::TAB_CONTENT
			));
			$this->add_control('cpd-posttype', array( 
				'label'			=> 'Choose PostType',
				'type'			=> Controls_Manager::SELECT,
				'options'		=> $posttypes_array
			));
			$this->add_control('cpd-postnumber-val', array( 
				'label'			=> 'Insert Number',
				'type'			=> Controls_Manager::TEXT
			));
			
			$this->end_controls_section();
		}
		
		protected function render(){
			$renvalue = $this->get_settings_for_display();
			?>
				
					<div class="custom-post-design-wrap"> 
				<?php $renposttype = $renvalue['cpd-posttype'];
					$renvaluedata = $renvalue['cpd-postnumber-val'];
					
					

					$cpdquery = new \WP_Query(array( 
						'post_type'			=> $renposttype,
						'posts_per_page'	=> $renvaluedata
					));
					while($cpdquery->have_posts()) : $cpdquery->the_post(); ?>
					
						
					<div class="custom-post-design-repeater">
						<h2><?php the_title(); ?></h2>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
						else {
							echo '<div style="width: 100%;height: 200px;background: gray;color: #d2c0c0;padding-top: 92px;box-sizing: border-box;text-align: center;text-transform: uppercase;font-size: 16px;font-weight: bold;">No Image</div>';
						} ?>
						<p><?php echo wp_trim_words(get_the_content(), 10, false); ?></p>
					</div>
					
					<?php endwhile; ?>
				
					</div>
				
			<?php
		}
		
		
	}
	Plugin::instance()->widgets_manager->register_widget_type( new CustomPostControls );

?>
