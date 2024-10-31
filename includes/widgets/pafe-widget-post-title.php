<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

  exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Post Title widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Post_Title extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   *
   * Retrieve Post Title widget name.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {

    return 'pafe-post-title';

  }

  /**
   * Get widget title.
   *
   * Retrieve Post Title widget title.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {

    return esc_html__( 'Post Title', 'pro-addons-for-elementor' );

  }

  /**
   * Get widget icon.
   *
   * Retrieve Post Title widget icon.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {

    return 'pafe eicon-post-title';

  }

  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the Post Title widget belongs to.
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

    return [ 'title', 'post', 'dynamic', 'single', 'blog' ];

  }

  /**
   * Register Post Title widget controls.
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

        'label' => esc_html__( 'Post Title', 'pro-addons-for-elementor' ),

      ]

    );


    $this->add_control(

      'before_text',

      [

        'label' => esc_html__( 'Before Text', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::TEXT,

      ]

    );


    $this->add_control(

      'after_text',

      [

        'label' => esc_html__( 'After Text', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::TEXT,

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

        ],

        'default' => 'h1',

      ]

    );

    $this->end_controls_section();


    $this->start_controls_section(

      'section_text_style',

      [

        'label' => esc_html__( 'Post Title', 'pro-addons-for-elementor' ),

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

          '{{WRAPPER}} .pafe-post-title' => 'text-align: {{VALUE}};',

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

          '{{WRAPPER}} .pafe-post-title' => 'color: {{VALUE}};',

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

        'selector' => '{{WRAPPER}} .pafe-post-title',

      ]

    );

    $this->add_group_control(

      \Elementor\Group_Control_Text_Stroke::get_type(),

      [

        'name' => 'text_stroke',

        'selector' => '{{WRAPPER}} .pafe-post-title',

      ]

    );

    $this->add_group_control(

      \Elementor\Group_Control_Text_Shadow::get_type(),

      [

        'name' => 'text_shadow',

        'selector' => '{{WRAPPER}} .pafe-post-title',

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

          '{{WRAPPER}} .pafe-post-title' => 'mix-blend-mode: {{VALUE}}',

        ],

        'separator' => 'none',

      ]

    );

    $this->end_controls_section();

  }

  /**
   * Render Post Title widget output on the frontend.
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

    $settings = $this->get_settings_for_display();


    //get control value
    $before_text = $settings['before_text'];

    $after_text = $settings['after_text'];

    //set title
    $post_title = get_the_title($post_id);


    //add before and after text
    $post_title = $before_text . ' ' . $post_title . ' ' . $after_text;


    $post_title_html = sprintf( 

      '<%1$s class="pafe-post-title">%2$s</%1$s>', 

      \Elementor\Utils::validate_html_tag( $settings['html_tag'] ),

      $post_title

    );

    // PHPCS - the variable $post_title_html holds safe data.
    echo $post_title_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

  }


}


?>