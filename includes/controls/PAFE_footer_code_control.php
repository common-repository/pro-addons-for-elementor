<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}


$post_id = get_the_ID();

if(get_post_type($post_id) != 'elementor-hf'):

	$document->start_controls_section(

	  'pafe_footer_code',

	  [

	    'label' => esc_html__( 'Footer Code', 'pro-addons-for-elementor' ),

	    'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,

	  ]

	);

	$document->add_control(

		'pafe_footer_code_control',

		[

			'label' => esc_html__( 'Add your code before </body> tag', 'pro-addons-for-elementor' ),

			'type' => \Elementor\Controls_Manager::CODE,

			'language' => 'html',
			
			'rows' => 20,

		]
		
	);

	$document->end_controls_section();

endif;

?>