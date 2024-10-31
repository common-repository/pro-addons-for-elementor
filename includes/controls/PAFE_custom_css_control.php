<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

$post_id = get_the_ID();

if(get_post_type($post_id) != 'elementor-hf'):

$document->start_controls_section(

  'pafe_custom_css',

  [

    'label' => esc_html__( 'Custom CSS', 'pro-addons-for-elementor' ),

    'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,

  ]

);

$document->add_control(

	'pafe_custom_css_code',

	[

		'label' => esc_html__( 'Add your own custom CSS here', 'pro-addons-for-elementor' ),

		'type' => \Elementor\Controls_Manager::CODE,

		'language' => 'css',
		
		'rows' => 20,

	]
	
);

$document->end_controls_section();

endif;

?>