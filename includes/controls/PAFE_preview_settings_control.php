<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

$post_id = get_the_ID();

$pafe_template_type = get_post_meta($post_id, 'pafe_template_type', true);

if((get_post_type($post_id) == 'pafe') && ($pafe_template_type == 'type_single_post' || $pafe_template_type == 'type_single_taxonomy')):

	$document->start_controls_section(

	  'pafe_preview_settings',

	  [

	    'label' => esc_html__( 'Preview Settings', 'pro-addons-for-elementor' ),

	    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,

	  ]

	);

	$pafe_template_post_type = get_post_meta($post_id, 'pafe_template_post_type', true);

	$pafe_template_taxonomy = get_post_meta($post_id, 'pafe_template_taxonomy', true);

	$options = array();

	//posts
	if($pafe_template_type == 'type_single_post'):

		$posts = get_posts(

			array(

				'numberposts' => -1,

				'post_type'		=> $pafe_template_post_type,

				'post_status'	=> 'publish',

			),

		);


		if(is_array($posts) && count($posts) > 0):

			foreach ($posts as $single_post):

				$options[$single_post->ID] = esc_html__( $single_post->post_title, 'pro-addons-for-elementor' );

			endforeach;

		endif;


	//taxonomy
	elseif($pafe_template_type == 'type_single_taxonomy'):

		$all_terms = get_terms(

			array (

			'taxonomy' => $pafe_template_taxonomy,

			'orderby' => 'name',

			'order' => 'ASC',

			)

		);


		if(is_array($all_terms) && count($all_terms) > 0):

			foreach($all_terms as $term):

				$options[$term->term_id] = esc_html__( $term->name, 'pro-addons-for-elementor' );

			endforeach;

		endif;

	endif;


	$document->add_control(

		'pafe_preview_settings_control',

		[

			'label' => esc_html__( 'Select', 'pro-addons-for-elementor' ),

			'type' => \Elementor\Controls_Manager::SELECT,

			'options' => $options,

			'default' => array_key_first($options),
			
			'description' => 'Note: Please refresh the page after changing this value to get an effect.'

		]
		
	);

	$document->end_controls_section();

endif;

?>