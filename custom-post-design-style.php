<?php 
	
	add_action('wp_head', function(){ ?>
		
		<style type="text/css"> 
			.custom-post-design-wrap{}
			.custom-post-design-wrap:after{
				content:'';
				display:block;
				clear:both
			}
			.custom-post-design-wrap > .custom-post-design-repeater {
				width: 29%;
				float: left;
				margin: 0px 10px 10px;
			}
			.custom-post-design-wrap > .custom-post-design-repeater > h2 {
				font-size: 15px;
				font-weight: bold;
				text-transform: uppercase;
				color: tomato;
			}
			.custom-post-design-wrap > .custom-post-design-repeater > img {
				width:auto;
				max-width:100%;
				height:auto;
				margin: 10px 0px;				
			}
			.custom-post-design-wrap > .custom-post-design-repeater > p {
				font-size: 14px;
				color: maroon;
			}
		</style>
		
	<?php });
	
	
?>