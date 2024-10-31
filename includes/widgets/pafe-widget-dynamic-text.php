<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Dynamic text widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Dynamic_Text extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Dynamic text widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'dynamic_text';

	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Dynamic text widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return esc_html__( 'Post Dynamic Text', 'pro-addons-for-elementor' );

	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Dynamic text widget icon.
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
	 * Retrieve the list of categories the Dynamic text widget belongs to.
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

		return [ 'heading', 'title', 'text', 'content', 'dynamic', 'post', 'single' ];

	}

	/**
	 * Register Dynamic text widget controls.
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

				'label' => esc_html__( 'Text', 'pro-addons-for-elementor' ),

			]

		);

		
		$this->add_control(

			'dynamic_text',

			[

				'label' => esc_html__( 'Text', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'options' => [

					'post_title' => 'Post Title',

					'excerpt' => 'Post Excerpt',

					'content' => 'Post Content',

					'custom_field' => 'Custom Field',

				],

				'default' => 'post_title',

			]

		);


		$this->add_control(

			'meta_key',

			[

				'label' => esc_html__( 'Text Meta Key', 'pro-addons-for-elementor' ),

				'type' => \Elementor\Controls_Manager::TEXT,

				'placeholder' => 'meta key',

				'condition' => [

					'dynamic_text' => 'custom_field',

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

				'default' => 'h1',

			]

		);

		$this->end_controls_section();


		$this->start_controls_section(

			'section_text_style',

			[

				'label' => esc_html__( 'Dynamic Text', 'pro-addons-for-elementor' ),

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

					'{{WRAPPER}} .elementor-dynamic-text' => 'color: {{VALUE}};',

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

				'selector' => '{{WRAPPER}} .elementor-dynamic-text',

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Text_Stroke::get_type(),

			[

				'name' => 'text_stroke',

				'selector' => '{{WRAPPER}} .elementor-dynamic-text',

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Text_Shadow::get_type(),

			[

				'name' => 'text_shadow',

				'selector' => '{{WRAPPER}} .elementor-dynamic-text',

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

					'{{WRAPPER}} .elementor-dynamic-text' => 'mix-blend-mode: {{VALUE}}',

				],

				'separator' => 'none',

			]

		);

		$this->end_controls_section();

	}

	/**
	 * Render Dynamic text widget output on the frontend.
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

		if ( '' === $settings['dynamic_text'] ) {

			return;

		}

		$this->add_render_attribute( 'dynamic_text', 'class', 'elementor-dynamic-text' );

		$this->add_inline_editing_attributes( 'dynamic_text' );

		//get control value
		$dynamic_text = $settings['dynamic_text'];

		$meta_key = $settings['meta_key'];

		$dynamic_link = $settings['dynamic_link'];

		$dynamic_link_meta_key = $settings['dynamic_link_meta_key'];

		$dynamic_link_target = $settings['dynamic_link_target'];



		//set text
		if($dynamic_text == 'post_title'):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					$dynamic_text = $term->name;

				else:

					$dynamic_text = get_the_title($post_id);

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					$dynamic_text = $term->name;

				elseif(is_search()):

					$dynamic_text = 'Search results for: ' . $_GET['s'];

				else:

					$dynamic_text = get_the_title($post_id);

				endif;

			endif;

		elseif($dynamic_text == 'excerpt'):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					$dynamic_text = $term->description;

				else:

					$dynamic_text = get_the_excerpt($post_id);

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					$dynamic_text = $term->description;

				else:

					$dynamic_text = get_the_excerpt($post_id);

				endif;

			endif;

		elseif($dynamic_text == 'content'):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					$dynamic_text = $term->description;

				else:

					$dynamic_text = get_the_content( null, false, $post_id);

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					$dynamic_text = $term->description;

				else:
		
					$blocks = parse_blocks( get_the_content( null, false, $post_id) );
		
					$content_markup = '';
		
					foreach ( $blocks as $block ) {
						// render_block renders a single block into a HTML string
						$content_markup .= render_block( $block );
					}
		
					// this will apply the_content filters for shortcodes
					// and embeds to contiune working
					$dynamic_text = apply_filters( 'the_content', $content_markup );

				endif;

			endif;

		elseif($dynamic_text == 'custom_field' && !empty($meta_key)):

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ):

				if($pafe_template_type == 'type_single_taxonomy'):

					$dynamic_text = get_term_meta($term->term_id, $meta_key, true);

				else:

					$dynamic_text = get_post_meta($post_id, $meta_key, true);

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					$dynamic_text = get_term_meta($term->term_id, $meta_key, true);

				else:

					$dynamic_text = get_post_meta($post_id, $meta_key, true);

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

					$dynamic_link = get_term_meta($term->term_id, $dynamic_link_meta_key, true);

				else:

					$dynamic_link = get_post_meta($post_id, $dynamic_link_meta_key, true);

				endif;

			else:

				if(is_tax() || is_category() || is_tag()):

					$term = get_queried_object();

					$dynamic_link = get_term_meta($term->term_id, $dynamic_link_meta_key, true);

				else:

					$dynamic_link = get_post_meta($post_id, $dynamic_link_meta_key, true);

				endif;

			endif;

		endif;



		if ( $dynamic_link !== 'none' ) {

			$dynamic_text = sprintf( '<a href="%1$s" target="%2$s">%3$s</a>', $dynamic_link, $dynamic_link_target, $dynamic_text );

		}


		$dynamic_text_html = sprintf( 

			'<%1$s %2$s>%3$s</%1$s>', 

			\Elementor\Utils::validate_html_tag( $settings['html_tag'] ), 

			$this->get_render_attribute_string( 'dynamic_text' ), 

			$dynamic_text

		);

		// PHPCS - the variable $dynamic_text_html holds safe data.
		echo $dynamic_text_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

	/**
	 * Render heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */
	protected function content_template() {

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

				// (async () => {
			
					//add attribute
					view.addRenderAttribute( 'dynamic_text', 'class', [ 'elementor-dynamic-text' ] );

					//get value
					var dynamic_text = settings.dynamic_text;

					var meta_key = settings.meta_key;

					var dynamic_link = settings.dynamic_link;

					var dynamic_link_meta_key = settings.dynamic_link_meta_key;

					var dynamic_link_target = settings.dynamic_link_target;

					var api_url = '<?php echo esc_url(get_site_url() . "/wp-json/pafe/v1/get_post_meta/"); ?>';


					//set text
					if(dynamic_text == 'post_title'){

						dynamic_text = '<?php 

							if($pafe_template_type == 'type_single_taxonomy'):

								echo wp_kses_post($term->name);

							else:

								echo wp_kses_post(get_the_title($post_id));

							endif;

						?>';

					}

					else if(dynamic_text == 'excerpt'){

						dynamic_text = `<?php 

							if($pafe_template_type == 'type_single_taxonomy'):

								echo wp_kses_post($term->description);

							else:

								echo wp_kses_post(get_the_excerpt($post_id));

							endif;

						?>`;

					}

					else if(dynamic_text == 'content'){

						dynamic_text = `<?php 

							if($pafe_template_type == 'type_single_taxonomy'):

								echo wp_kses_post($term->description);

							else:
		
								$blocks = parse_blocks( get_the_content( null, false, $post_id) );
		
								$content_markup = '';

								foreach ( $blocks as $block ) {
									// render_block renders a single block into a HTML string
									$content_markup .= render_block( $block );
								}

								// this will apply the_content filters for shortcodes
								// and embeds to contiune working
								echo wp_kses_post(apply_filters( 'the_content', $content_markup ));

							endif;

						?>`;						

					}

					else if(dynamic_text == 'custom_field' && meta_key != ''){

						// var res = await fetch(api_url + '1' + '/' + meta_key);
						
						// var result = await res.json();

						// dynamic_text = result.meta_value;

						dynamic_text = meta_key;

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

						// var res = await fetch(api_url + '1' + '/' + dynamic_link_meta_key);
						
						// var result = await res.json();

						// dynamic_link = result.meta_value;

						dynamic_link = "#";

					}


					if ( dynamic_link !== 'none' ) {

						dynamic_text = `<a href="${dynamic_link}" target="${dynamic_link_target}">${dynamic_text}</a>`;

					}


					var html_tag = elementor.helpers.validateHTMLTag( settings.html_tag );

					var dynamic_text_html = `

						<${html_tag}>

							${dynamic_text}

						</${html_tag}>

					`;

					print(dynamic_text_html);

				// })();


			#>

		<?php

	}

}


?>