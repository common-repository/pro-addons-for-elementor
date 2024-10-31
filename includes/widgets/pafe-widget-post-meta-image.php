<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Post Meta (Image) widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Post_Meta_Image extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Post Meta (Image) widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'pafe-post-meta-image';

	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Post Meta (Image) widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return esc_html__( 'Post Meta (Image)', 'pro-addons-for-elementor' );

	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Post Meta (Image) widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'pafe eicon-image';

	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Post Meta (Image) widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {

		return [ 'theme-elements-single', 'pro-elements' ];

	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {

		return [ 'image', 'meta', 'custom', 'dynamic', 'post', 'single' ];

	}

	/**
	 * Register Post Meta (Image) widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(

			'section_image',

			[

				'label' => esc_html__( 'Image', 'pro-addons-for-elementor' ),

			]

		);

		
		$this->add_control(

			'meta_key',

			[

				'label' => esc_html__( 'Meta Key', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::TEXT,

				'placeholder' => 'meta key',

			]

		);


		$this->add_control(

			'link',

			[

				'label' => esc_html__( 'Link', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'options' => [

					'none' => 'Select',

					'custom_link' => 'Custom',

					'meta_field' => 'Meta Field',

				],

				'default' => 'none',

			]

		);


		$this->add_control(

			'custom_link',

			[
				'label' => esc_html__( 'URL', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::URL,

				'options' => false,

				'condition' => [

					'link' => 'custom_link',

				],

			]

		);


		$this->add_control(

			'link_meta_key',

			[

				'label' => esc_html__( 'Link Meta Key', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::TEXT,

				'placeholder' => 'meta key',

				'condition' => [

					'link' => 'meta_field',

				],

			]

		);


		$this->add_control(

			'link_target',

			[

				'label' => esc_html__( 'Open in new window', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::SWITCHER,

				'return_value' => '_blank'

			]

		);


		$this->end_controls_section();



		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Image', 'pro-addons-for-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'pro-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'pro-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'pro-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => esc_html__( 'Max Width', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default', 'pro-addons-for-elementor' ),
					'fill' => esc_html__( 'Fill', 'pro-addons-for-elementor' ),
					'cover' => esc_html__( 'Cover', 'pro-addons-for-elementor' ),
					'contain' => esc_html__( 'Contain', 'pro-addons-for-elementor' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'object-position',
			[
				'label' => esc_html__( 'Object Position', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'center center' => esc_html__( 'Center Center', 'pro-addons-for-elementor' ),
					'center left' => esc_html__( 'Center Left', 'pro-addons-for-elementor' ),
					'center right' => esc_html__( 'Center Right', 'pro-addons-for-elementor' ),
					'top center' => esc_html__( 'Top Center', 'pro-addons-for-elementor' ),
					'top left' => esc_html__( 'Top Left', 'pro-addons-for-elementor' ),
					'top right' => esc_html__( 'Top Right', 'pro-addons-for-elementor' ),
					'bottom center' => esc_html__( 'Bottom Center', 'pro-addons-for-elementor' ),
					'bottom left' => esc_html__( 'Bottom Left', 'pro-addons-for-elementor' ),
					'bottom right' => esc_html__( 'Bottom Right', 'pro-addons-for-elementor' ),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				'condition' => [
					'height[size]!' => '',
					'object-fit' => 'cover',
				],
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'pro-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Opacity', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'pro-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}}:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover img',
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'pro-addons-for-elementor' ) . ' (s)',
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} img',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} img',
			]
		);

		$this->end_controls_section();



	}


	public function get_image_alt_text($image_url) {
	    
    global $wpdb;

    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); // phpcs:ignore WordPress.DB.DirectDatabaseQuery

    $attachment_id = $attachment[0];
    
    $alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
   	
   	return strip_tags($alt_text);

	}



	/**
	 * Render Post Meta (Image) widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		// Check if Elementor's editor mode is active
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
		  
		  // The code here will run when the Elementor editor mode is active

		  // Retrieve the page settings manager
			$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

			// Retrieve the settings model for the current page
			$page_settings_model = $page_settings_manager->get_model( get_the_ID() );

			// Retrieve data from a custom control
			$post_id = $page_settings_model->get_settings( 'pafe_preview_settings_control' );

			$pafe_template_type = get_post_meta(get_the_ID(), 'pafe_template_type', true);

			if($pafe_template_type == 'type_single_taxonomy'):

				$pafe_template_taxonomy = get_post_meta(get_the_ID(), 'pafe_template_taxonomy', true);

				$term = get_term_by('id', $post_id, $pafe_template_taxonomy);

			endif;

		} 

		else {

	    // The code here will run when the Elementor editor mode is not active
			$post_id = get_the_ID();

		}

		$settings = $this->get_settings_for_display();

		if ( '' === $settings['meta_key'] ) {

			return;

		}


		//get control value
		$post_meta_image = '';

		$meta_key = $settings['meta_key'];

		$link = $settings['link'];

		$custom_link = $settings['custom_link']['url'];

		$link_meta_key = $settings['link_meta_key'];

		$link_target = $settings['link_target'];

		$image_style = 'display: block;';


		//set image
		if(!empty($meta_key)):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, 'term_' . $term->term_id))):

						$post_meta_image = '<img src="' . get_field($meta_key, 'term_' . $term->term_id) . '" style="' . $image_style . '">';

					else:

						$post_meta_image = '<img src="' . get_term_meta($term->term_id, $meta_key, true) . '" style="' . $image_style . '">';

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, $post_id))):

						$post_meta_image = '<img src="' . get_field($meta_key, $post_id) . '" style="' . $image_style . '">';

					else:

						$post_meta_image = '<img src="' . get_post_meta($post_id, $meta_key, true) . '" style="' . $image_style . '">';

					endif;

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, 'term_' . $term->term_id))):

						$post_meta_image = '<img src="' . get_field($meta_key, 'term_' . $term->term_id) . '" style="' . $image_style . '" alt="' . $this->get_image_alt_text(get_field($meta_key, 'term_' . $term->term_id)) . '">';

					else:

						$post_meta_image = '<img src="' . get_term_meta($term->term_id, $meta_key, true) . '" style="' . $image_style . '" alt="' . $this->get_image_alt_text(get_term_meta($term->term_id, $meta_key, true)) . '">';

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, $post_id))):

						$post_meta_image = '<img src="' . get_field($meta_key, $post_id) . '" style="' . $image_style . '" alt="' . $this->get_image_alt_text(get_field($meta_key, $post_id)) . '">';

					else:

						$post_meta_image = '<img src="' . get_post_meta($post_id, $meta_key, true) . '" style="' . $image_style . '" alt="' . $this->get_image_alt_text(get_post_meta($post_id, $meta_key, true)) . '">';

					endif;

				endif;

			endif;

		endif;



		//set link
		if($link == 'custom_link'):

			$post_meta_link = $custom_link;

		elseif($link == 'meta_field' && !empty($link_meta_key)):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($link_meta_key, 'term_' . $term->term_id))):

						$post_meta_link = get_field($link_meta_key, 'term_' . $term->term_id);

					else:

						$post_meta_link = get_term_meta($term->term_id, $link_meta_key, true);

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($link_meta_key, $post_id))):

						$post_meta_link = get_field($link_meta_key, $post_id);

					else:

						$post_meta_link = get_post_meta($post_id, $link_meta_key, true);

					endif;

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($link_meta_key, 'term_' . $term->term_id))):

						$post_meta_link = get_field($link_meta_key, 'term_' . $term->term_id);

					else:

						$post_meta_link = get_term_meta($term->term_id, $link_meta_key, true);

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($link_meta_key, $post_id))):

						$post_meta_link = get_field($link_meta_key, $post_id);

					else:

						$post_meta_link = get_post_meta($post_id, $link_meta_key, true);

					endif;

				endif;

			endif;

		endif;



		if ( $link !== 'none' ) {

			$post_meta_image = sprintf( '<a href="%1$s" target="%2$s" class="pafe-post-meta-image">%3$s</a>', $post_meta_link, $link_target, $post_meta_image );

		}

		// PHPCS - the variable $post_meta_image holds safe data.
		echo $post_meta_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

}


?>