<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Post Navigation widget.
 *
 * Elementor widget that displays an post next/prev navigation
 *
 * @since 1.0.0
 */
class PAFE_Widget_Post_Navigation extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve post navigation widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'pafe-post-navigation';

	}

	/**
	 * Get widget title.
	 *
	 * Retrieve post navigation widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return esc_html__( 'Post Navigation', 'pro-addons-for-elementor' );

	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve post navigation widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'pafe eicon-post-navigation';

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

		return [ 'post', 'navigation', 'post navigation', 'next', 'prev'];

	}
	
	
	/**
   * Get widget categories.
   *
   * Retrieve the list of categories the Post Info Navigation belongs to.
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
	 * Register post navigation widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'section_post_navigation',
			[
				'label' => esc_html__( 'Post Navigation', 'pro-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'prev_icon',
			[
				'label' => esc_html__( 'Icon Previous', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-chevron-left',
					'library' => 'fa-solid',
				],
			]
		);


		$this->add_control(
			'next_icon',
			[
				'label' => esc_html__( 'Icon Next', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-chevron-right',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'prev_text',
			[
				'label' => esc_html__( 'Previous Label', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Previous Blog', 'pro-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your text', 'pro-addons-for-elementor' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'next_text',
			[
				'label' => esc_html__( 'Next Label', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Next Blog', 'pro-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your text', 'pro-addons-for-elementor' ),
				'label_block' => true,
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_box',
			[
				'label' => esc_html__( 'Icon', 'pro-addons-for-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-navigation .post-nav svg' => 'fill: {{VALUE}};',
				],
			]
		);


		$this->add_responsive_control(
			'icon_space',
			[
				'label' => esc_html__( 'Icon Spacing', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
					'em' => [
						'max' => 10,
					],
					'rem' => [
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--post-navigation-icon-margin: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'prev_icon[value]!' => '',
					'next_icon[value]!' => '',
				],
			]
		);


		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-navigation .post-nav svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Opacity', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.5,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--post-navigation-disabled-opacity: {{SIZE}}',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__( 'Text', 'pro-addons-for-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => esc_html__( 'Title', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'pro-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-navigation .post-nav a' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .post-navigation .post-nav a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .post-navigation .post-nav a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .post-navigation .post-nav a',
			]
		);


		$this->end_controls_section();


	}

	/**
	 * Render post navigation widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$prev_post = get_previous_post();

		$next_post = get_next_post();
		
		$settings = $this->get_settings_for_display();

		?>

			<style>
				
				.post-navigation {
				  display: flex;
				  justify-content: space-between;
				  flex-wrap: wrap;
				}
				.post-navigation a{
				  color: #000;
				  display: flex;
				  align-items: center;
				  column-gap: var(--post-navigation-icon-margin);
				}
				.post-navigation .post-nav.disabled a{
				  opacity: var(--post-navigation-disabled-opacity);
				  pointer-events: none;
				}

			</style>

			<div class="post-navigation">
		
				<div class="post-nav prev-btn <?php echo (empty($prev_post) ? 'disabled' : ''); ?>">
					
					<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">

						<?php 

							\Elementor\Icons_Manager::render_icon( $settings['prev_icon'], [ 'aria-hidden' => 'true' ] );

							echo esc_html($settings['prev_text']); 

						?>

					</a>

				</div>

				<div class="post-nav next-btn <?php echo (empty($next_post) ? 'disabled' : ''); ?>">
					
					<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">

						<?php 

							echo esc_html($settings['next_text']); 

							\Elementor\Icons_Manager::render_icon( $settings['next_icon'], [ 'aria-hidden' => 'true' ] );

						?>

					</a>

				</div>

			</div>

		<?php

	}


}
