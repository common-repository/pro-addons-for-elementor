<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
* Elementor Contact Form 7 widget.
*
* Elementor widget that displays an eye-catching headlines.
*
* @since 1.0.0
*/
class PAFE_Widget_Contact_Form_7 extends \Elementor\Widget_Base {

/**
 * Get widget name.
 *
 * Retrieve Contact Form 7 widget name.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget name.
 */
public function get_name() {

  return 'pafe-contact-form-7';

}

/**
 * Get widget title.
 *
 * Retrieve Contact Form 7 widget title.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget title.
 */
public function get_title() {

  return esc_html__( 'Contact Form 7', 'pro-addons-for-elementor' );

}

/**
 * Get widget icon.
 *
 * Retrieve Contact Form 7 widget icon.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget icon.
 */
public function get_icon() {

  return 'pafe eicon-form-horizontal';

}

/**
 * Get widget categories.
 *
 * Retrieve the list of categories the Contact Form 7 widget belongs to.
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

  return [ 'form', 'contact form 7', 'contact form' ];

}

/**
 * Register Contact Form 7 widget controls.
 *
 * Adds different input fields to allow the user to change and customize the widget settings.
 *
 * @since 3.1.0
 * @access protected
 */
protected function register_controls() {

  //get all forms
  $all_forms = get_posts(

    array(
      
      'post_type'   => 'wpcf7_contact_form',
      
      'numberposts' => -1
    )

  );

  
  //create array of form ids and title
  $forms = array();

  if(count($all_forms) > 0):

    foreach ($all_forms as $form):

      $forms[$form->ID] = $form->post_title;

    endforeach;

  endif;


  /* content controls */
  $this->start_controls_section(

    'section_form',

    [

      'label' => esc_html__( 'Form', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

    ]

  );


  $this->add_control(

    'selected_form',

    [

      'label' => esc_html__( 'Select Form', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::SELECT,

      'options' => $forms,

      'default' => array_keys($forms)[0],

    ]

  );


  $this->add_control(

    'hide_labels',

    [

      'label' => esc_html__( 'Hide Labels', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::SWITCHER,

      'label_on' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),

      'label_off' => esc_html__( 'Show', 'pro-addons-for-elementor' ),

      'return_value' => 'none',

      'default' => '',

      'selectors' => [

        '{{WRAPPER}} label' => 'display: {{VALUE}}',

      ],

    ]

  );


  $this->end_controls_section();


  $this->start_controls_section(

    'section_form_errors',

    [

      'label' => esc_html__( 'Errors', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

    ]

  );


  $this->add_control(

    'hide_errors',

    [

      'label' => esc_html__( 'Hide Errors', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::SWITCHER,

      'label_on' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),

      'label_off' => esc_html__( 'Show', 'pro-addons-for-elementor' ),

      'return_value' => 'none',

      'default' => '',

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-not-valid-tip' => 'display: {{VALUE}}',

      ],

    ]

  );


  $this->add_control(

    'hide_response',

    [

      'label' => esc_html__( 'Hide Response', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::SWITCHER,

      'label_on' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),

      'label_off' => esc_html__( 'Show', 'pro-addons-for-elementor' ),

      'return_value' => 'none',

      'default' => '',

      'selectors' => [

        '{{WRAPPER}} .wpcf7-response-output' => 'display: {{VALUE}}',

      ],

    ]

  );


  $this->end_controls_section();


  /* style controls */
  $this->start_controls_section(

    'style_form_labels',

    [

      'label' => esc_html__( 'Labels', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_STYLE,

    ]

  );


  $this->add_control(

    'label_color',

    [

      'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::COLOR,

      'selectors' => [

        '{{WRAPPER}} label' => 'color: {{VALUE}}',

      ],

    ]

  );


  $this->add_group_control(

    \Elementor\Group_Control_Typography::get_type(),

    [

      'name' => 'label_typography',

      'selector' => '{{WRAPPER}} label',

    ]

  );


  $this->add_control(

    'label_margin_bottom',

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

        'size' => 5,

      ],

      'selectors' => [

        '{{WRAPPER}} label' => 'margin-bottom: {{SIZE}}{{UNIT}};',

      ],

    ]

  );


  $this->end_controls_section();


  $this->start_controls_section(

    'style_form_inputs',

    [

      'label' => esc_html__( 'Inputs & Textarea', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_STYLE,

    ]

  );

  $this->add_control(

    'input_color',

    [

      'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::COLOR,

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control' => 'color: {{VALUE}}',

      ],

    ]

  );

  $this->add_group_control(

    \Elementor\Group_Control_Typography::get_type(),

    [

      'name' => 'input_typography',

      'selector' => '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control',

    ]

  );

  $this->add_control(

    'input_bg_color',

    [
      'label' => esc_html__( 'Background Color', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::COLOR,

      'default' => '#fff',

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-text, {{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-textarea, {{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-number, {{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-quiz, {{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-select, {{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-file' => 'background-color: {{VALUE}}',

      ],

    ]

  );

  $this->add_group_control(

    \Elementor\Group_Control_Border::get_type(),

    [

      'name' => 'border',

      'selector' => '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-text, {{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-textarea, {{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control.wpcf7-number',
    ]

  );

  $this->add_control(

    'border_radius',

    [

      'label' => esc_html__( 'Border Radius', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::DIMENSIONS,

      'size_units' => [ 'px', 'em', 'rem',],

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      ],

    ]

  );

  $this->add_control(

    'input_margin_bottom',

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

        '{{WRAPPER}} .wpcf7-form-control-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',

      ],

    ]

  );


  $this->end_controls_section();


  $this->start_controls_section(

    'style_form_radio_checkbox',

    [

      'label' => esc_html__( 'Radio & Checkbox', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_STYLE,

    ]

  );


  $this->end_controls_section();


  $this->start_controls_section(

    'style_form_submit',

    [

      'label' => esc_html__( 'Submit Button', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_STYLE,

    ]

  );

  
  $this->add_group_control(

    \Elementor\Group_Control_Typography::get_type(),

    [

      'name' => 'form_typography',

      'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit',

    ]

  );

  $this->start_controls_tabs(

    'style_tabs'

  );

    $this->start_controls_tab(

      'style_normal_tab',

      [

        'label' => esc_html__( 'Normal', 'pro-addons-for-elementor' ),

      ]

    );

    $this->add_control(

    'button_text_color',

    [

      'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::COLOR,

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'color: {{VALUE}}',

      ],

    ]

  );

    $this->add_group_control(

    \Elementor\Group_Control_Background::get_type(),

    [

      'name' => 'background',

      'types' => [ 'classic', 'gradient'],

      'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit',

      'exclude' => [ 'image' ],

    ]

  );

    $this->end_controls_tab();

    $this->start_controls_tab(

      'style_hover_tab',

      [
        'label' => esc_html__( 'Hover', 'pro-addons-for-elementor' ),

      ]

    );

    $this->add_control(

    'hover_button_text_color',

    [

      'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::COLOR,

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit:hover' => 'color: {{VALUE}}',

      ],

    ]

  );

    $this->add_group_control(

    \Elementor\Group_Control_Background::get_type(),

    [

      'name' => 'hover_background',

      'types' => [ 'classic', 'gradient'],

      'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit:hover',

      'exclude' => [ 'image' ],

    ]

  );

    $this->add_group_control(

    \Elementor\Group_Control_Border::get_type(),

    [

      'name' => 'border_color',

      'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit:hover',

    ]

  );


    $this->end_controls_tab();

  $this->end_controls_tabs();

  $this->add_control(

    'hr',

    [

      'type' => \Elementor\Controls_Manager::DIVIDER,

    ]

  );


  $this->add_group_control(

    \Elementor\Group_Control_Border::get_type(),

    [

      'name' => 'button_border',

      'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit',

    ]

  );

  $this->add_responsive_control(

    'button_border_radius',

    [

        'label' => esc_html__( 'Border Radius', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::DIMENSIONS,

        'size_units' => [ 'px', 'em', 'rem', ],

        'selectors' => [

            '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

        ],

    ]

  );

  $this->add_group_control(

      \Elementor\Group_Control_Box_Shadow::get_type(),

      [

        'name' => 'box_shadow',

        'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit',

      ]

    );

  $this->add_control(

    'hr_custom',

    [

      'type' => \Elementor\Controls_Manager::DIVIDER,

    ]

  );

  $this->add_responsive_control(

      'padding',

      [

        'label' => esc_html__( 'Padding', 'pro-addons-for-elementor' ),

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

          '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

        ],

      ]

    );


  $this->end_controls_section();


  $this->start_controls_section(

    'style_form_errors',

    [

      'label' => esc_html__( 'Errors', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_STYLE,

    ]

  );


  $this->add_control(

    'errors_color',

    [

      'label' => esc_html__( 'Color', 'pro-addons-for-elementor' ),

      'type' => \Elementor\Controls_Manager::COLOR,

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-not-valid-tip' => 'color: {{VALUE}}',

      ],

    ]

  );


  $this->add_group_control(

    \Elementor\Group_Control_Typography::get_type(),

    [

      'name' => 'errors_typography',

      'selector' => '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-not-valid-tip',

    ]

  );


  $this->add_control(

    'errors_margin_top',

    [

      'label' => esc_html__( 'Margin Top', 'pro-addons-for-elementor' ),

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

        'size' => 5,

      ],

      'selectors' => [

        '{{WRAPPER}} .wpcf7-form-control-wrap .wpcf7-not-valid-tip' => 'margin-top: {{SIZE}}{{UNIT}};',

      ],

    ]

  );


  $this->end_controls_section();


  $this->start_controls_section(

    'style_form_response',

    [

      'label' => esc_html__( 'Response', 'pro-addons-for-elementor' ),

      'tab' => \Elementor\Controls_Manager::TAB_STYLE,

    ]

  );


  $this->end_controls_section();

}



/**
 * Render Contact Form 7 widget output on the frontend.
 *
 * Written in PHP and used to generate the final HTML.
 *
 * @since 1.0.0
 * @access protected
 */
protected function render() {

  //get widget settings
  $settings = $this->get_settings_for_display();

  $selected_form = $settings['selected_form'];

  ?>

    <div class="pafe-contact-form-7">

      <?php

        echo do_shortcode('[contact-form-7 id="' . esc_html($selected_form) . '"]');

      ?>

    </div>

    <style>
      
      .pafe-contact-form-7 label, .pafe-contact-form-7 .wpcf7-form-control-wrap .wpcf7-list-item label {
        display: block;
      }
      .pafe-contact-form-7 .wpcf7-form-control-wrap{
        display: block;
      }

    </style>

  <?php

}


}


?>