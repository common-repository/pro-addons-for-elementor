<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Post Content widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Post_Content extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Post Content widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'pafe_post_content';

	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Post Content widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return esc_html__( 'Post Content', 'pro-addons-for-elementor' );

	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Post Content widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'pafe eicon-post-excerpt';

	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Post Content widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {

		return [ 'theme-elements-single' ];

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

		return [ 'post', 'blog', 'content', 'description', 'excerpt', 'single' ];

	}

	/**
	 * Register Post Content widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(

			'section_text_style',

			[

				'label' => esc_html__( 'Post Content', 'pro-addons-for-elementor' ),

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

					'{{WRAPPER}} .pafe-post-content *' => 'text-align: {{VALUE}};',

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

					'{{WRAPPER}} .pafe-post-content *' => 'color: {{VALUE}};',

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

				'selector' => '{{WRAPPER}} .pafe-post-content',

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Text_Stroke::get_type(),

			[

				'name' => 'text_stroke',

				'selector' => '{{WRAPPER}} .pafe-post-content *',

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Text_Shadow::get_type(),

			[

				'name' => 'text_shadow',

				'selector' => '{{WRAPPER}} .pafe-post-content *',

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

					'{{WRAPPER}} .pafe-post-content *' => 'mix-blend-mode: {{VALUE}}',

				],

				'separator' => 'none',

			]

		);

		$this->end_controls_section();

	}

	/**
	 * Render Post Content widget output on the frontend.
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

		} 

		else {

	    // The code here will run when the Elementor editor mode is not active
			$post_id = get_the_ID();

		}


		//set content
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

			$post_content = get_the_content( null, false, $post_id);

		else:

			$blocks = parse_blocks( get_the_content( null, false, $post_id) );
	
			$content_markup = '';

			foreach ( $blocks as $block ):
				
				// render_block renders a single block into a HTML string
				$content_markup .= render_block( $block );

			endforeach;

			// this will apply the_content filters for shortcodes
			// and embeds to contiune working
			$post_content = apply_filters( 'the_content', $content_markup );

		endif;

		$post_content = sprintf(
			
			'<div class="pafe-post-content">%1$s</div>',

			$post_content

		);


		// PHPCS - the variable $post_content holds safe data.
		echo $post_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}


}


?>