<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Post Meta widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Post_meta_Text extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Post Meta widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'pafe-post-meta-text';

	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Post Meta widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return esc_html__( 'Post Meta (Text)', 'pro-addons-for-elementor' );

	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Post Meta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'pafe eicon-t-letter';

	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Post Meta widget belongs to.
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

		return [ 'meta', 'custom', 'acf', 'dynamic', 'post', 'single' ];

	}

	/**
	 * Register Post Meta widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(

			'section_text',

			[

				'label' => esc_html__( 'Post Meta', 'pro-addons-for-elementor' ),

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


		$this->add_control(

			'html_tag',

			[

				'label' => esc_html__( 'HTML Tag', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'options' => [

					'h1' => 'H1',

					'h2' => 'H2',

					'h3' => 'H3',

					'h4' => 'H4',

					'h5' => 'H5',

					'h6' => 'H6',

					'div' => 'div',

					'span' => 'span',

					'p' => 'p',

				],

				'default' => 'span',

			]

		);

		$this->end_controls_section();


		$this->start_controls_section(

			'section_text_style',

			[

				'label' => esc_html__( 'Post Meta', 'pro-addons-for-elementor' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

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

					'justify' => [

						'title' => esc_html__( 'Justified', 'pro-addons-for-elementor' ),

						'icon' => 'eicon-text-align-justify',

					],

				],

				'default' => '',

				'selectors' => [

					'{{WRAPPER}}' => 'text-align: {{VALUE}};',

				],

			]

		);

		$this->add_control(

			'text_color',

			[

				'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'global' => [

					'default' => Global_Colors::COLOR_PRIMARY,

				],

				'selectors' => [

					'{{WRAPPER}} .pafe-post-meta-text' => 'color: {{VALUE}};',

				],

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography',

				'global' => [

					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,

				],

				'selector' => '{{WRAPPER}} .pafe-post-meta-text',

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Text_Stroke::get_type(),

			[

				'name' => 'text_stroke',

				'selector' => '{{WRAPPER}} .pafe-post-meta-text',

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Text_Shadow::get_type(),

			[

				'name' => 'text_shadow',

				'selector' => '{{WRAPPER}} .pafe-post-meta-text',

			]

		);

		$this->add_control(

			'blend_mode',

			[

				'label' => esc_html__( 'Blend Mode', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'options' => [

					'' => esc_html__( 'Normal', 'pro-addons-for-elementor' ),

					'multiply' => esc_html__( 'Multiply', 'pro-addons-for-elementor' ),

					'screen' => esc_html__( 'Screen', 'pro-addons-for-elementor' ),

					'overlay' => esc_html__( 'Overlay', 'pro-addons-for-elementor' ),

					'darken' => esc_html__( 'Darken', 'pro-addons-for-elementor' ),

					'lighten' => esc_html__( 'Lighten', 'pro-addons-for-elementor' ),

					'color-dodge' => esc_html__( 'Color Dodge', 'pro-addons-for-elementor' ),

					'saturation' => esc_html__( 'Saturation', 'pro-addons-for-elementor' ),

					'color' => esc_html__( 'Color', 'pro-addons-for-elementor' ),

					'difference' => esc_html__( 'Difference', 'pro-addons-for-elementor' ),

					'exclusion' => esc_html__( 'Exclusion', 'pro-addons-for-elementor' ),

					'hue' => esc_html__( 'Hue', 'pro-addons-for-elementor' ),

					'luminosity' => esc_html__( 'Luminosity', 'pro-addons-for-elementor' ),

				],

				'selectors' => [

					'{{WRAPPER}} .pafe-post-meta-text' => 'mix-blend-mode: {{VALUE}}',

				],

				'separator' => 'none',

			]

		);

		$this->end_controls_section();

	}

	/**
	 * Render Post Meta widget output on the frontend.
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
		$meta_key = $settings['meta_key'];

		$link = $settings['link'];

		$custom_link = $settings['custom_link']['url'];

		$link_meta_key = $settings['link_meta_key'];

		$link_target = $settings['link_target'];



		//set text
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

			if($pafe_template_type == 'type_single_taxonomy'):

				//if ACF exists
				if(function_exists('get_field') && !empty(get_field($meta_key, 'term_' . $term->term_id))):

					$post_meta_text = get_field($meta_key, 'term_' . $term->term_id);

				else:

					$post_meta_text = get_term_meta($term->term_id, $meta_key, true);

				endif;

			else:

				//if ACF exists
				if(function_exists('get_field') && !empty(get_field($meta_key, $post_id))):

					$post_meta_text = get_field($meta_key, $post_id);

				else:

					$post_meta_text = get_post_meta($post_id, $meta_key, true);

				endif;

			endif;

		else:

			if(is_tax() || is_category() || is_tag()):

				$term = get_queried_object();

				//if ACF exists
				if(function_exists('get_field') && !empty(get_field($meta_key, 'term_' . $term->term_id))):

					$post_meta_text = get_field($meta_key, 'term_' . $term->term_id);

				else:

					$post_meta_text = get_term_meta($term->term_id, $meta_key, true);

				endif;				

			else:

				//if ACF exists
				if(function_exists('get_field') && !empty(get_field($meta_key, $post_id))):

					$post_meta_text = get_field($meta_key, $post_id);

				else:

					$post_meta_text = get_post_meta($post_id, $meta_key, true);

				endif;

			endif;

		endif;



		//set link
		if($link == 'custom_link'):

			$post_meta_link = $custom_link;

		elseif($link == 'meta_field' && !empty($link_meta_key)):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					$post_meta_link = get_term_meta($term->term_id, $link_meta_key, true);

				else:

					$post_meta_link = get_post_meta($post_id, $link_meta_key, true);

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					$post_meta_link = get_term_meta($term->term_id, $link_meta_key, true);

				else:

					$post_meta_link = get_post_meta($post_id, $link_meta_key, true);

				endif;

			endif;

		endif;


		if ( $link !== 'none' ) {

			$post_meta_text = sprintf( '<a href="%1$s" target="%2$s">%3$s</a>', $post_meta_link, $link_target, $post_meta_text );

		}


		$post_meta_text_html = sprintf( 

			'<%1$s class="pafe-post-meta-text">%2$s</%1$s>', 

			\Elementor\Utils::validate_html_tag( $settings['html_tag'] ), 

			$post_meta_text

		);

		// PHPCS - the variable $post_meta_text_html holds safe data.
		echo $post_meta_text_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

}

?>