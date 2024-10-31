<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

  exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Lottie widget.
 *
 * Elementor widget that displays an Lottie Animation
 *
 * @since 1.0.0
 */
class PAFE_Widget_Lotttie extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   *
   * Retrieve Lottie widget name.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {

    return 'pafe-lottie';

  }

  /**
   * Get widget title.
   *
   * Retrieve Lottie widget title.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {

    return esc_html__( 'Lottie', 'pro-addons-for-elementor' );

  }

  /**
   * Get widget icon.
   *
   * Retrieve Lottie widget icon.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {

    return 'pafe eicon-lottie';

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

    return [ 'lottie', 'animation', 'json'];

  }
  
  
  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the Lottie belongs to.
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
   * 
   * Dependent Scripts
   * 
   * */
  public function get_script_depends() {

    return [ 'pafe-dotlottie-player' ];

  }
  

  /**
   * Register Lottie widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 3.1.0
   * @access protected
   */
  protected function register_controls() {

    $this->start_controls_section(
      'section_lottie',
      [
        'label' => esc_html__( 'Lottie', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );


    $this->add_control(
      'lottie_json_file',
      [
        'label' => esc_html__( 'Lottie JSON File', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'media_types' => [ 'application/json' ],
      ]
    );


    $this->add_control(
      'autoplay',
      [
        'label' => esc_html__( 'Autoplay', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Yes', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'No', 'pro-addons-for-elementor' ),
        'return_value' => true,
        'default' => true,
      ]
    );


    $this->add_control(
      'loop',
      [
        'label' => esc_html__( 'Loop', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Yes', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'No', 'pro-addons-for-elementor' ),
        'return_value' => true,
        'default' => true,
      ]
    );

    $this->add_control(
      'play_on_hover',
      [
        'label' => esc_html__( 'Play on Hover', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Yes', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'No', 'pro-addons-for-elementor' ),
        'return_value' => true,
        'default' => false,
      ]
    );

    $this->add_control(
      'show_controls',
      [
        'label' => esc_html__( 'Show Controls', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Yes', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'No', 'pro-addons-for-elementor' ),
        'return_value' => true,
        'default' => false,
      ]
    );


    $this->add_control(
      'speed',
      [
        'label' => esc_html__( 'Speed', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '1',
        'options' => [
          '1' => esc_html__( '1x', 'pro-addons-for-elementor' ),
          '2' => esc_html__( '2x', 'pro-addons-for-elementor' ),
          '3' => esc_html__( '3x', 'pro-addons-for-elementor' ),
        ]
      ]
    );


    $this->add_control(
      'playmode',
      [
        'label' => esc_html__( 'Play mode', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'normal',
        'options' => [
          'normal' => esc_html__( 'Normal', 'pro-addons-for-elementor' ),
          'bounce' => esc_html__( 'Bounce', 'pro-addons-for-elementor' ),
        ]
      ]
    );


    $this->add_control(
      'direction',
      [
        'label' => esc_html__( 'Direction', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '1',
        'options' => [
          '1' => esc_html__( 'Forward', 'pro-addons-for-elementor' ),
          '-1' => esc_html__( 'Backward', 'pro-addons-for-elementor' ),
        ]
      ]
    );


    $this->end_controls_section();



    $this->start_controls_section(
      'section_lottie_style',
      [
        'label' => esc_html__( 'Lottie Style', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );


    $this->add_control(
      'background_color',
      [
        'label' => esc_html__( 'Background Color', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => 'transparent',
      ]
    );


    $this->add_control(
      'width',
      [
        'label' => esc_html__( 'Width', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1200,
            'step' => 5,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} dotlottie-player' => 'width: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->add_control(
      'height',
      [
        'label' => esc_html__( 'Height', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1200,
            'step' => 5,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} dotlottie-player' => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->end_controls_section();

  }

  /**
   * Render Lottie widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render() {
    
    $settings = $this->get_settings_for_display();

    $lottie_json_file = $settings['lottie_json_file']['url'];

    $background_color = $settings['background_color'];

    $loop = $settings['loop'];

    $show_controls = $settings['show_controls'];

    $autoplay = $settings['autoplay'];

    $play_on_hover = $settings['play_on_hover'];

    $speed = $settings['speed'];

    $playmode = $settings['playmode'];

    $direction = $settings['direction'];

    ?>

      <div class="lottie-widget">

        <dotlottie-player 
          src="<?php echo esc_html($lottie_json_file); ?>" 
          background="<?php echo esc_html($background_color); ?>" 
          speed="<?php echo esc_html($speed); ?>" 
          direction="<?php echo esc_html($direction); ?>" 
          playMode="<?php echo esc_html($playmode); ?>" 
          <?php echo (($loop == true) ? 'loop' : ''); ?>
          <?php echo (($show_controls == true) ? 'controls' : ''); ?>
          <?php echo (($autoplay == true) ? 'autoplay' : ''); ?>
          <?php echo (($play_on_hover == true) ? 'hover' : ''); ?>
        ></dotlottie-player>

      </div>

    <?php

  }


}
