<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

  exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Flip Box widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Flip_Box extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   *
   * Retrieve Flip Box widget name.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {

    return 'pafe-flip-box';

  }

  /**
   * Get widget title.
   *
   * Retrieve Flip Box widget title.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {

    return esc_html__( 'Flip Box', 'pro-addons-for-elementor' );

  }

  /**
   * Get widget icon.
   *
   * Retrieve Flip Box widget icon.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {

    return 'pafe eicon-flip-box';

  }

  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the Flip Box widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * @since 2.0.0
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {

    return [ 'basic', 'pro-elements', 'general' ];

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

    return [ 'box', 'card', 'flip', 'team', 'service', 'animation', '3d box' ];

  }

  /**
   * Register Flip Box widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 3.1.0
   * @access protected
   */
  protected function register_controls() {

    $this->start_controls_section(

      'section_flip_box',

      [

        'label' => esc_html__( 'Flip Box', 'pro-addons-for-elementor' ),

        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

      ]

    );


    $this->add_control(
      'image',
      [
        'label' => esc_html__( 'Choose Image', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'media_types' => ['image', 'svg'],
        'default' => [
          'url' => 'https://i.ibb.co/KXXzgvm/greeting-card.png',
        ],
      ]
    );


    $this->add_control(
      'title',
      [
        'label' => esc_html__( 'Title', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'rows' => 5,
        'default' => esc_html__( 'Default title', 'pro-addons-for-elementor' ),
        'placeholder' => esc_html__( 'Type your title here', 'pro-addons-for-elementor' ),
      ]
    );


    $this->add_control(
      'title_html_tag',
      [
        'label' => esc_html__( 'HTML tag', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'h3',
        'options' => [
          'h2'  => esc_html__( 'H2', 'pro-addons-for-elementor' ),
          'h3' => esc_html__( 'H3', 'pro-addons-for-elementor' ),
          'h4' => esc_html__( 'H4', 'pro-addons-for-elementor' ),
          'h5' => esc_html__( 'H5', 'pro-addons-for-elementor' ),
          'h6' => esc_html__( 'H6', 'pro-addons-for-elementor' ),
        ],
      ]
    );


    $this->add_control(
      'box_link',
      [
        'label' => esc_html__( 'Link', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::URL,
        'options' => [ 'url', 'is_external', 'nofollow' ],
        'default' => [
          'url' => '',
          'is_external' => false,
          'nofollow' => false,
        ],
        'label_block' => true,
      ]
    );


    $this->add_control(
      'description',
      [
        'label' => esc_html__( 'Description', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'pro-addons-for-elementor' ),
        'placeholder' => esc_html__( 'Type your description here', 'pro-addons-for-elementor' ),
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_box_style',
      [
        'label' => esc_html__( 'Box', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'box_padding',
      [
        'label' => esc_html__( 'Padding', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
        'default' => [
          'top' => 20,
          'right' => 20,
          'bottom' => 20,
          'left' => 20,
          'unit' => 'px',
          'isLinked' => true,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $this->add_control(
      'content_alignment',
      [
        'label' => esc_html__( 'Alignment', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'flex-start' => [
            'title' => esc_html__( 'Left', 'pro-addons-for-elementor' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => esc_html__( 'Center', 'pro-addons-for-elementor' ),
            'icon' => 'eicon-text-align-center',
          ],
          'flex-end' => [
            'title' => esc_html__( 'Right', 'pro-addons-for-elementor' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => false,
        'selectors' => [
          '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back' => 'align-items: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'box_bg_color',
      [
        'label' => esc_html__( 'Background Color', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#fff',
        'selectors' => [
          '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back' => 'background-color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
        'name' => 'border',
        'selector' => '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back',
      ]
    );

    $this->add_control(
      'box_border_radius',
      [
        'label' => esc_html__( 'Border Radius', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
        'default' => [
          'top' => 10,
          'right' => 10,
          'bottom' => 10,
          'left' => 10,
          'unit' => 'px',
          'isLinked' => true,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name' => 'box_shadow',
        'selector' => '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back',
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_image_style',
      [
        'label' => esc_html__( 'Image', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'image_width',
      [
        'label' => esc_html__( 'Width', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1000,
            'step' => 1,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 120,
        ],
        'selectors' => [
          '{{WRAPPER}} .flip-box-image' => 'width: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $this->add_control(
      'image_margin_bottom',
      [
        'label' => esc_html__( 'Margin Bottom', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => 'px',
          'size' => 10,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-flip-box .flip-box-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );



    $this->end_controls_section();


    $this->start_controls_section(
      'section_title_style',
      [
        'label' => esc_html__( 'Title', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'title_text_color',
      [
        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#000',
        'selectors' => [
          '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front .pafe-flip-box-title' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-front .pafe-flip-box-title',
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_description_style',
      [
        'label' => esc_html__( 'Description', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'description_text_color',
      [
        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#000',
        'selectors' => [
          '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-back, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back *' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'selector' => '{{WRAPPER}} .pafe-flip-box .pafe-flip-box-back, {{WRAPPER}} .pafe-flip-box .pafe-flip-box-back p',
      ]
    );


    $this->end_controls_section();

  }

  /**
   * Render Flip Box widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render() {

    //get widget settings
    $settings = $this->get_settings_for_display();


    //get box link
    if ( ! empty( $settings['box_link']['url'] ) ) {

      $this->add_link_attributes( 'box_link', $settings['box_link'] );

    }


    // Get image HTML
    $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );

    $this->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );

    $this->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );

    $this->add_render_attribute( 'image', 'class', 'flip-box-image' );


    //Get text-alignment
    $box_text_align = $settings['content_alignment'];

    if ($box_text_align == 'flex-start') {

      $box_text_align = 'left';

    }

    elseif ($box_text_align == 'flex-end') {

      $box_text_align = 'right';
      
    }

    else{

      $box_text_align = 'center';

    }


    ?>

    <div class="pafe-flip-box-outer">
      
      <div class="pafe-flip-box">

        <?php

          if ( ! empty( $settings['box_link']['url'] ) ):

            ?>

              <a <?php $this->print_render_attribute_string( 'box_link' ); ?> class="pafe-flip-box-link">Box link</a>

            <?php

          endif;

        ?>

        <div class="pafe-flip-box-front">

          <img <?php echo wp_kses_post($this->get_render_attribute_string( 'image' )); ?>>

          <?php

          	$title_html = sprintf( '<%1$s class="pafe-flip-box-title">%2$s</%1$s>', \Elementor\Utils::validate_html_tag( $settings['title_html_tag'] ), wp_kses_post($settings['title']) );

          	// PHPCS - the variable $title_html holds safe data.
          	echo $title_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

          ?>

        </div>

        <div class="pafe-flip-box-back"><?php echo wp_kses_post($settings['description']); ?></div>

      </div>

    </div>  

    <style>

	    .pafe-flip-box-outer{
	      width: 100%;
	    }
	    .pafe-flip-box {
	      position: relative;
	      text-align: <?php echo esc_html($box_text_align); ?>;
	      transition: transform 0.8s;
	      transform-style: preserve-3d;
	    }
	    .pafe-flip-box-outer:hover .pafe-flip-box{
	    	transform: rotateY(180deg);
	    }
	    .pafe-flip-box .pafe-flip-box-link {
	      font-size: 0;
	      position: absolute;
	      inset: 0;
	      z-index: 1;
	    }
	    .pafe-flip-box .pafe-flip-box-front, .pafe-flip-box .pafe-flip-box-back {
		    position: absolute;
		    width: 100%;
		    height: 100%;
		    -webkit-backface-visibility: hidden;
		    backface-visibility: hidden;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    flex-direction: column;
	    }
	    .pafe-flip-box .pafe-flip-box-front {
	    	position: relative;
	    }
	    .pafe-flip-box .pafe-flip-box-back {
		    transform: rotateY(180deg);
		    top: 0;
		    left: 0;
	    } 

    </style>

    <?php

  }


}


?>