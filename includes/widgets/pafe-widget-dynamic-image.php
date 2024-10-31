<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Dynamic Image widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Dynamic_Image extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Dynamic Image widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'dynamic_image';

	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Dynamic image widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return esc_html__( 'Post Dynamic Image', 'pro-addons-for-elementor' );

	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Dynamic image widget icon.
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
	 * Retrieve the list of categories the Dynamic image widget belongs to.
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

		return [ 'image', 'featured image', 'dynamic', 'post', 'single' ];

	}

	/**
	 * Register Dynamic image widget controls.
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

			'dynamic_image',

			[

				'label' => esc_html__( 'Image', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'options' => [

					'featured_image' => 'Featured Image',

					'custom_field' => 'Custom Field',

				],

				'default' => 'featured_image',

			]

		);


		$this->add_control(

			'meta_key',

			[

				'label' => esc_html__( 'Image Meta Key', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::TEXT,

				'placeholder' => 'meta key',

				'condition' => [

					'dynamic_image' => 'custom_field',

				],

			]

		);


		$this->add_control(

			'dynamic_link',

			[

				'label' => esc_html__( 'Link', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'options' => [

					'none' => 'Select',

					'post_permalink' => 'Post Permalink',

					'custom_field' => 'Custom Field',

				],

				'default' => 'none',

			]

		);


		$this->add_control(

			'dynamic_link_meta_key',

			[

				'label' => esc_html__( 'Link Meta Key', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::TEXT,

				'placeholder' => 'meta key',

				'condition' => [

					'dynamic_link' => 'custom_field',

				],

			]

		);


		$this->add_control(

			'dynamic_link_target',

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

	/**
	 * Render Dynamic image widget output on the frontend.
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

		if ( '' === $settings['dynamic_image'] ) {

			return;

		}

		$this->add_render_attribute( 'dynamic_image', 'class', 'elementor-dynamic-image' );

		//get control value
		$dynamic_image = $settings['dynamic_image'];

		$meta_key = $settings['meta_key'];

		$dynamic_link = $settings['dynamic_link'];

		$dynamic_link_meta_key = $settings['dynamic_link_meta_key'];

		$dynamic_link_target = $settings['dynamic_link_target'];

		$image_style = 'display: block;';



		//set image
		if($dynamic_image == 'featured_image'):

			$dynamic_image = get_the_post_thumbnail( $post_id, 'full' );

		elseif($dynamic_image == 'custom_field' && !empty($meta_key)):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, 'term_' . $term->term_id))):

						$dynamic_image = '<img src="' . get_field($meta_key, 'term_' . $term->term_id) . '" style="' . $image_style . '">';

					else:

						$dynamic_image = '<img src="' . get_term_meta($term->term_id, $meta_key, true) . '" style="' . $image_style . '">';

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, $post_id))):

						$dynamic_image = '<img src="' . get_field($meta_key, $post_id) . '" style="' . $image_style . '">';

					else:

						$dynamic_image = '<img src="' . get_post_meta($post_id, $meta_key, true) . '" style="' . $image_style . '">';

					endif;

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, 'term_' . $term->term_id))):

						$dynamic_image = '<img src="' . get_field($meta_key, 'term_' . $term->term_id) . '" style="' . $image_style . '">';

					else:

						$dynamic_image = '<img src="' . get_term_meta($term->term_id, $meta_key, true) . '" style="' . $image_style . '">';

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($meta_key, $post_id))):

						$dynamic_image = '<img src="' . get_field($meta_key, $post_id) . '" style="' . $image_style . '">';

					else:

						$dynamic_image = '<img src="' . get_post_meta($post_id, $meta_key, true) . '" style="' . $image_style . '">';

					endif;

				endif;

			endif;

		endif;



		//set link
		if($dynamic_link == 'post_permalink'):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					$dynamic_link = get_term_link($term->term_id, $pafe_template_taxonomy);

				else:

					$dynamic_link = get_the_permalink($post_id);

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					$dynamic_link = get_term_link($term->term_id, $pafe_template_taxonomy);

				else:

					$dynamic_link = get_the_permalink($post_id);

				endif;

			endif;

		elseif($dynamic_link == 'custom_field' && !empty($dynamic_link_meta_key)):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($dynamic_link_meta_key, 'term_' . $term->term_id))):

						$dynamic_link = get_field($dynamic_link_meta_key, 'term_' . $term->term_id);

					else:

						$dynamic_link = get_term_meta($term->term_id, $dynamic_link_meta_key, true);

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($dynamic_link_meta_key, $post_id))):

						$dynamic_link = get_field($dynamic_link_meta_key, $post_id);

					else:

						$dynamic_link = get_post_meta($post_id, $dynamic_link_meta_key, true);

					endif;

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($dynamic_link_meta_key, 'term_' . $term->term_id))):

						$dynamic_link = get_field($dynamic_link_meta_key, 'term_' . $term->term_id);

					else:

						$dynamic_link = get_term_meta($term->term_id, $dynamic_link_meta_key, true);

					endif;

				else:

					//if ACF exists
					if(function_exists('get_field') && !empty(get_field($dynamic_link_meta_key, $post_id))):

						$dynamic_link = get_field($dynamic_link_meta_key, $post_id);

					else:

						$dynamic_link = get_post_meta($post_id, $dynamic_link_meta_key, true);

					endif;

				endif;

			endif;

		endif;



		if ( $dynamic_link !== 'none' ) {

			$dynamic_image = sprintf( '<a href="%1$s" target="%2$s">%3$s</a>', $dynamic_link, $dynamic_link_target, $dynamic_image );

		}

		// PHPCS - the variable $dynamic_image_html holds safe data.
		echo $dynamic_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

	/**
	 * Render heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */

	// =========== THIS FUNCTION IS NOT USED IN THE WIDGET =============

	protected function content_template_notused() {

		// The code here will run when the Elementor editor mode is not active
		
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

		?>

			<#
			
				//add attribute
				view.addRenderAttribute( 'dynamic_img', 'class', [ 'elementor-dynamic-image' ] );

				//get value
				var dynamic_image = settings.dynamic_image;

				var meta_key = settings.meta_key;

				var dynamic_link = settings.dynamic_link;

				var dynamic_link_meta_key = settings.dynamic_link_meta_key;

				var dynamic_link_target = settings.dynamic_link_target;


				//set image
				if(dynamic_image == 'featured_image'){

					dynamic_image = `<?php 

						echo get_the_post_thumbnail( $post_id, 'full' );

					?>`;

				}

				else if(dynamic_image == 'custom_field' && meta_key != ''){

					dynamic_image = meta_key;

				}



				//set link
				if(dynamic_link == 'post_permalink'){

					dynamic_link = '<?php 

						if($pafe_template_type == 'type_single_taxonomy'):

							echo esc_url(get_term_link($term->term_id, $pafe_template_taxonomy));

						else:

							echo esc_url(get_the_permalink($post_id));

						endif;

					?>';

				}

				else if(dynamic_link == 'custom_field' && dynamic_link_meta_key != ''){

					dynamic_link = "#";

				}


				if ( dynamic_link !== 'none' ) {

					dynamic_image = `<a href="${dynamic_link}" target="${dynamic_link_target}">${dynamic_image}</a>`;

				}


				print(dynamic_image);


			#>

		<?php

	}

}


?>