<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

  exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Posts widget.
 *
 * Elementor widget that displays an Posts
 *
 * @since 1.0.0
 */
class PAFE_Widget_Posts extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   *
   * Retrieve Posts widget name.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {

    return 'pafe-posts';

  }

  /**
   * Get widget title.
   *
   * Retrieve Posts widget title.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {

    return esc_html__( 'Posts', 'pro-addons-for-elementor' );

  }

  /**
   * Get widget icon.
   *
   * Retrieve Posts widget icon.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {

    return 'pafe eicon-post-list';

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

    return [ 'blog', 'blogs', 'post', 'posts', 'grid', 'list'];

  }
  
  
  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the Posts belongs to.
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
   * Register Posts widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 3.1.0
   * @access protected
   */
  protected function register_controls() {

    $this->start_controls_section(
      'section_layout',
      [
        'label' => esc_html__( 'Layout', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_responsive_control(
      'posts_columns',
      [
        'label' => esc_html__( 'Columns', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '3',
        'tablet_default' => '2',
        'mobile_default' => '1',
        'options' => [
          '1' => esc_html__( '1', 'pro-addons-for-elementor' ),
          '2' => esc_html__( '2', 'pro-addons-for-elementor' ),
          '3' => esc_html__( '3', 'pro-addons-for-elementor' ),
          '4' => esc_html__( '4', 'pro-addons-for-elementor' ),
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-posts-module' => '--pafe-posts-columns: {{VALUE}};',
        ],
      ]
    );


    $this->add_control(
      'posts_per_page',
      [
        'label' => esc_html__( 'Posts Per Page', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => -1,
        'step' => 1,
        'default' => 6,
        'description' => 'Enter (-1) to show all posts',
      ]
    );


    $this->add_control(
      'hr',
      [
        'type' => \Elementor\Controls_Manager::DIVIDER,
      ]
    );


    $this->add_control(
      'show_title',
      [
        'label' => esc_html__( 'Title', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),
        'return_value' => 'show',
        'default' => 'show',
      ]
    );


    $this->add_control(
      'title_html_tag',
      [
        'label' => esc_html__( 'Title HTML Tag', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'h3',
        'options' => [
          'h2' => esc_html__( 'H2', 'pro-addons-for-elementor' ),
          'h3' => esc_html__( 'H3', 'pro-addons-for-elementor' ),
          'h4' => esc_html__( 'H4', 'pro-addons-for-elementor' ),
          'h5' => esc_html__( 'H5', 'pro-addons-for-elementor' ),
          'h6' => esc_html__( 'H6', 'pro-addons-for-elementor' ),
        ],
        'condition' => [
          'show_title' => 'show',
        ],
      ]
    );


    $this->add_control(
      'show_excerpt',
      [
        'label' => esc_html__( 'Excerpt', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),
        'return_value' => 'show',
        'default' => 'show',
      ]
    );

    $this->add_control(
      'excerpt_length',
      [
        'label' => esc_html__( 'Excerpt Length', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 30,
        'step' => 1,
        'default' => 150,
        'condition' => [
          'show_excerpt' => 'show',
        ],
      ]
    );


    $this->add_control(
      'show_date',
      [
        'label' => esc_html__( 'Date', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),
        'return_value' => 'show',
        'default' => 'show',
      ]
    );

    $this->add_control(
      'date_format',
      [
        'label' => esc_html__( 'Date Format', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__( 'F d, Y', 'pro-addons-for-elementor' ),
        'condition' => [
          'show_date' => 'show',
        ],
      ]
    );

    $this->add_control(
      'date_position',
      [
        'label' => esc_html__( 'Date Position', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'before_excerpt',
        'options' => [
          'before_excerpt' => esc_html__( 'Before Excerpt', 'pro-addons-for-elementor' ),
          'after_excerpt' => esc_html__( 'After Excerpt', 'pro-addons-for-elementor' ),
        ],
        'condition' => [
          'show_date' => 'show',
        ],
      ]
    );

    $this->add_control(
      'show_category',
      [
        'label' => esc_html__( 'Category', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),
        'return_value' => 'show',
        'default' => 'show',
      ]
    );

    $this->add_control(
      'show_readmore',
      [
        'label' => esc_html__( 'Read More', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),
        'return_value' => 'show',
        'default' => 'show',
      ]
    );

    $this->add_control(
      'readmore_label',
      [
        'label' => esc_html__( 'Read More Label', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__( 'Read more', 'pro-addons-for-elementor' ),
        'condition' => [
          'show_readmore' => 'show',
        ],
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_query',
      [
        'label' => esc_html__( 'Query', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );


    $this->add_control(
      'current_page_posts',
      [
        'label' => esc_html__( 'Show Current Page Posts', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Yes', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'No', 'pro-addons-for-elementor' ),
        'return_value' => 'yes',
        'default' => 'no',
        'description' => 'Works for category, tag, and search page',
      ]
    );


    $this->add_control(
      'order',
      [
        'label' => esc_html__( 'Order', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'DESC',
        'options' => [
          'ASC' => esc_html__( 'ASC', 'pro-addons-for-elementor' ),
          'DESC' => esc_html__( 'DESC', 'pro-addons-for-elementor' ),
        ]
      ]
    );


    $this->add_control(
      'orderby',
      [
        'label' => esc_html__( 'Order By', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'date',
        'options' => [
          'ID' => esc_html__( 'ID', 'pro-addons-for-elementor' ),
          'title' => esc_html__( 'title', 'pro-addons-for-elementor' ),
          'date' => esc_html__( 'date', 'pro-addons-for-elementor' ),
          'rand' => esc_html__( 'rand', 'pro-addons-for-elementor' ),
        ]
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_pagination',
      [
        'label' => esc_html__( 'Pagination', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'show_pagination',
      [
        'label' => esc_html__( 'Pagination', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'pro-addons-for-elementor' ),
        'label_off' => esc_html__( 'Hide', 'pro-addons-for-elementor' ),
        'return_value' => 'show',
        'default' => 'hide',
      ]
    );

    $this->add_control(
      'pagination_style',
      [
        'label' => esc_html__( 'Pagination Style', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'style1',
        'options' => [
          'style1' => esc_html__( 'Style 1', 'pro-addons-for-elementor' ),
          'style2' => esc_html__( 'Style 2', 'pro-addons-for-elementor' ),
        ],
        'description' => 'Please check the actual output on frontend',
        'condition' => [
          'show_pagination' => 'show',
        ],
      ]
    );

    $this->add_control(
      'pagination_prev_label',
      [
        'label' => esc_html__( 'Previous Label', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__( 'Previous', 'pro-addons-for-elementor' ),
        'condition' => [
          'show_pagination' => 'show',
        ],
      ]
    );

    $this->add_control(
      'pagination_next_label',
      [
        'label' => esc_html__( 'Next Label', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__( 'Next', 'pro-addons-for-elementor' ),
        'condition' => [
          'show_pagination' => 'show',
        ],
      ]
    );

    $this->end_controls_section();


    $this->start_controls_section(
      'section_layout_style',
      [
        'label' => esc_html__( 'Layout', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );


    $this->add_responsive_control(
      'posts_column_gap',
      [
        'label' => esc_html__( 'Column Gap', 'pro-addons-for-elementor' ),
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
          'size' => 30,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-posts-module' => '--pafe-posts-column-gap: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->add_responsive_control(
      'posts_row_gap',
      [
        'label' => esc_html__( 'Row Gap', 'pro-addons-for-elementor' ),
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
          'size' => 30,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-posts-module' => '--pafe-posts-row-gap: {{SIZE}}{{UNIT}};',
        ],
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
          '{{WRAPPER}} .single-post .featured-image-outer img' => 'width: {{SIZE}}{{UNIT}};',
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
          '{{WRAPPER}} .single-post .featured-image-outer img' => 'height: {{SIZE}}{{UNIT}};',
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
          '{{WRAPPER}} .single-post .featured-image-outer img' => 'object-fit: {{VALUE}};',
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
          '{{WRAPPER}} .single-post .featured-image-outer img' => 'object-position: {{VALUE}};',
        ],
        'condition' => [
          'height[size]!' => '',
          'object-fit' => 'cover',
        ],
      ]
    );


    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
        'name' => 'image_border',
        'selector' => '{{WRAPPER}} .single-post .featured-image-outer img',
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
          '{{WRAPPER}} .single-post .featured-image-outer img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $this->add_responsive_control(
      'margin_bottom',
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
          'size' => 20,
        ],
        'selectors' => [
          '{{WRAPPER}} .single-post .featured-image-outer' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $this->end_controls_section();


    $this->start_controls_section(
      'section_title_style',
      [
        'label' => esc_html__( 'Title', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
          'show_title' => 'show',
        ],
      ]
    );


    $this->add_control(

      'title_color',

      [

        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'global' => [

          'default' => Global_Colors::COLOR_PRIMARY,

        ],

        'selectors' => [

          '{{WRAPPER}} .post-content-outer .post-title' => 'color: {{VALUE}};',

        ],

      ]

    );


    $this->add_group_control(

      \Elementor\Group_Control_Typography::get_type(),

      [

        'name' => 'title_typography',

        'global' => [

          'default' => Global_Typography::TYPOGRAPHY_PRIMARY,

        ],

        'selector' => '{{WRAPPER}} .post-content-outer .post-title',

      ]

    );


    $this->add_responsive_control(
      'title_margin_margin_bottom',
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
          'size' => 30,
        ],
        'selectors' => [
          '{{WRAPPER}} .post-content-outer .post-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_excerpt_style',
      [
        'label' => esc_html__( 'Excerpt', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
          'show_excerpt' => 'show',
        ],
      ]
    );


    $this->add_control(

      'excerpt_color',

      [

        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'global' => [

          'default' => Global_Colors::COLOR_PRIMARY,

        ],

        'selectors' => [

          '{{WRAPPER}} .post-content-outer .post-excerpt' => 'color: {{VALUE}};',

        ],

      ]

    );


    $this->add_group_control(

      \Elementor\Group_Control_Typography::get_type(),

      [

        'name' => 'excerpt_typography',

        'global' => [

          'default' => Global_Typography::TYPOGRAPHY_PRIMARY,

        ],

        'selector' => '{{WRAPPER}} .post-content-outer .post-excerpt',

      ]

    );


    $this->add_responsive_control(
      'excerpt_margin_margin_bottom',
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
          'size' => 30,
        ],
        'selectors' => [
          '{{WRAPPER}} .post-content-outer .post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_post_date_style',
      [
        'label' => esc_html__( 'Post Date', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
          'show_date' => 'show',
        ],
      ]
    );


    $this->add_control(

      'post_date_color',

      [

        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'global' => [

          'default' => Global_Colors::COLOR_PRIMARY,

        ],

        'selectors' => [

          '{{WRAPPER}} .post-content-outer .post-date' => 'color: {{VALUE}};',

        ],

      ]

    );


    $this->add_group_control(

      \Elementor\Group_Control_Typography::get_type(),

      [

        'name' => 'post_date_typography',

        'global' => [

          'default' => Global_Typography::TYPOGRAPHY_PRIMARY,

        ],

        'selector' => '{{WRAPPER}} .post-content-outer .post-date',

      ]

    );


    $this->add_responsive_control(
      'excerpt_post_date_margin_bottom',
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
          'size' => 30,
        ],
        'selectors' => [
          '{{WRAPPER}} .post-content-outer .post-date' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_read_more_style',
      [
        'label' => esc_html__( 'Read More', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
          'show_readmore' => 'show',
        ],
      ]
    );


    $this->add_control(

      'read_more_color',

      [

        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'global' => [

          'default' => Global_Colors::COLOR_PRIMARY,

        ],

        'selectors' => [

          '{{WRAPPER}} .post-content-outer .read-more' => 'color: {{VALUE}};',

        ],

      ]

    );


    $this->add_group_control(

      \Elementor\Group_Control_Typography::get_type(),

      [

        'name' => 'read_more_typography',

        'global' => [

          'default' => Global_Typography::TYPOGRAPHY_PRIMARY,

        ],

        'selector' => '{{WRAPPER}} .post-content-outer .read-more',

      ]

    );


    $this->add_responsive_control(
      'excerpt_read_more_margin_bottom',
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
          'size' => 30,
        ],
        'selectors' => [
          '{{WRAPPER}} .post-content-outer .read-more' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_category_style',
      [
        'label' => esc_html__( 'Category', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
          'show_category' => 'show',
        ],
      ]
    );


    $this->add_control(

      'category_color',

      [

        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'default' => '#fff',

        'selectors' => [

          '{{WRAPPER}} .featured-image-outer .category' => 'color: {{VALUE}};',

        ],

      ]

    );


    $this->add_control(

      'category_bg_color',

      [

        'label' => esc_html__( 'Background Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'default' => '#000',

        'selectors' => [

          '{{WRAPPER}} .featured-image-outer .category' => 'background-color: {{VALUE}};',

        ],

      ]

    );


    $this->add_group_control(

      \Elementor\Group_Control_Typography::get_type(),

      [

        'name' => 'category_typography',

        'global' => [

          'default' => Global_Typography::TYPOGRAPHY_PRIMARY,

        ],

        'selector' => '{{WRAPPER}} .featured-image-outer .category',

      ]

    );

    $this->add_responsive_control(
      'category_border_radius',
      [
        'label' => esc_html__( 'Border Radius', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
        'default' => [
          'top' => 3,
          'right' => 3,
          'bottom' => 3,
          'left' => 3,
          'unit' => 'px',
          'isLinked' => true,
        ],
        'selectors' => [
          '{{WRAPPER}} .featured-image-outer .category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );


    $this->add_responsive_control(
      'category_padding',
      [
        'label' => esc_html__( 'Padding', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
        'default' => [
          'top' => 5,
          'right' => 5,
          'bottom' => 5,
          'left' => 5,
          'unit' => 'px',
          'isLinked' => true,
        ],
        'selectors' => [
          '{{WRAPPER}} .featured-image-outer .category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );


    $this->add_control(
      'category_vertical_position',
      [
        'label' => esc_html__( 'Vertical Orientation', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'top' => [
            'title' => esc_html__( 'Top', 'pro-addons-for-elementor' ),
            'icon' => 'eicon-v-align-top',
          ],
          'bottom' => [
            'title' => esc_html__( 'Bottom', 'pro-addons-for-elementor' ),
            'icon' => 'eicon-v-align-bottom',
          ],
        ],
        'default' => 'top',
      ]
    );


    $this->add_control(
      'category_top',
      [
        'label' => esc_html__( 'Top', 'pro-addons-for-elementor' ),
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
          'size' => 15,
        ],
        'selectors' => [
          '{{WRAPPER}} .featured-image-outer .category' => 'top: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
          'category_vertical_position' => 'top',
        ],
      ]
    );

    $this->add_control(
      'category_bottom',
      [
        'label' => esc_html__( 'Bottom', 'pro-addons-for-elementor' ),
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
          'size' => 15,
        ],
        'selectors' => [
          '{{WRAPPER}} .featured-image-outer .category' => 'bottom: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
          'category_vertical_position' => 'bottom',
        ],
      ]
    );


    $this->add_control(
      'category_horizontal_position',
      [
        'label' => esc_html__( 'Vertical Orientation', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => esc_html__( 'Left', 'pro-addons-for-elementor' ),
            'icon' => 'eicon-h-align-left',
          ],
          'right' => [
            'title' => esc_html__( 'Right', 'pro-addons-for-elementor' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'left',
      ]
    );

    $this->add_control(
      'category_left',
      [
        'label' => esc_html__( 'Left', 'pro-addons-for-elementor' ),
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
          'size' => 15,
        ],
        'selectors' => [
          '{{WRAPPER}} .featured-image-outer .category' => 'left: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
          'category_horizontal_position' => 'left',
        ],
      ]
    );


    $this->add_control(
      'category_right',
      [
        'label' => esc_html__( 'Right', 'pro-addons-for-elementor' ),
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
          'size' => 15,
        ],
        'selectors' => [
          '{{WRAPPER}} .featured-image-outer .category' => 'right: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
          'category_horizontal_position' => 'right',
        ],
      ]
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'section_pagination_style',
      [
        'label' => esc_html__( 'Pagination', 'pro-addons-for-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
          'show_pagination' => 'show',
        ],
      ]
    );


    $this->add_responsive_control(
      'pagination_margin_top',
      [
        'label' => esc_html__( 'Margin Top', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 500,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => 'px',
          'size' => 50,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
        ],
      ]
    );


    $this->add_control(

      'pagination_color',

      [

        'label' => esc_html__( 'Text Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'selectors' => [

          '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination .page-numbers' => 'color: {{VALUE}};',

        ],

      ]

    );


    $this->add_group_control(

      \Elementor\Group_Control_Typography::get_type(),

      [

        'name' => 'pagination_typography',

        'global' => [

          'default' => Global_Typography::TYPOGRAPHY_PRIMARY,

        ],

        'selector' => '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination .page-numbers',

      ]

    );


    $this->add_control(

      'pagination_active_color',

      [

        'label' => esc_html__( 'Active Text Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'default' => '#fff',

        'selectors' => [

          '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination .page-numbers.current' => 'color: {{VALUE}};',

        ],

        'condition' => [

          'pagination_style' => 'style1',

        ],

      ]

    );


    $this->add_control(

      'pagination_active_bg_color',

      [

        'label' => esc_html__( 'Active Background Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'default' => '#000',

        'selectors' => [

          '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination .page-numbers.current' => 'background-color: {{VALUE}};',

        ],

        'condition' => [

          'pagination_style' => 'style1',

        ],

      ]

    );


    $this->add_responsive_control(
      'pagination_active_padding',
      [
        'label' => esc_html__( 'Active Padding', 'pro-addons-for-elementor' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
        'default' => [
          'top' => 2,
          'right' => 5,
          'bottom' => 2,
          'left' => 5,
          'unit' => 'px',
          'isLinked' => false,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination .page-numbers.current' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
          'pagination_style' => 'style1',
        ],
      ]
    );


    $this->add_responsive_control(
      'pagination_active_border_radius',
      [
        'label' => esc_html__( 'Active Border Radius', 'pro-addons-for-elementor' ),
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
          'size' => 3,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination .page-numbers.current' => 'border-radius: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
          'pagination_style' => 'style1',
        ],
      ]
    );

    $this->add_responsive_control(
      'pagination_space_between',
      [
        'label' => esc_html__( 'Space Between', 'pro-addons-for-elementor' ),
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
          'size' => 15,
        ],
        'selectors' => [
          '{{WRAPPER}} .pafe-posts-module .pafe-posts-pagination.style1' => 'column-gap: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
          'pagination_style' => 'style1',
        ],
      ]
    );


    $this->end_controls_section();

  }

  /**
   * Render Posts widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render() {
    
    $settings = $this->get_settings_for_display();


    //posts args
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array( 

      'post_type'      => 'post',

      'post_status'    => 'publish',

      'posts_per_page' => $settings['posts_per_page'],

      'paged'          => $paged,

      'order'          => $settings['order'],

      'orderby'        => $settings['orderby'],

    );


    //current page posts
    if($settings['current_page_posts'] == 'yes'):

      //category page
      if(is_category()):

        $current_category = get_queried_object();
        
        $current_category_id = $current_category->term_id;

        $args['tax_query'] = array(
          
          array(

            'taxonomy' => 'category',

            'field' => 'term_id',

            'terms' => $current_category_id,

          ),

        );

      endif;


      //tag page
      if(is_tag()):

        $current_tag = get_queried_object();
        
        $current_tag_id = $current_tag->term_id;

        $args['tax_query'] = array(
          
          array(

            'taxonomy' => 'post_tag',

            'field' => 'term_id',

            'terms' => $current_tag_id,

          ),

        );

      endif;


      //search
      if(is_search()):

        $args['s'] = $_GET['s'];

      endif;

    endif;


    //create object and call constructor
    $posts = new \WP_Query( $args ); 


    //check if have posts or not
    if( $posts->have_posts() ) :

      ?>

        <div class="pafe-posts-module">

          <div class="pafe-posts">

            <?php

              while ( $posts->have_posts() ) : 

                $posts->the_post();

                $post_id = get_the_ID();

                $categories = get_the_terms( $post_id, 'category' );

                $category = $categories[0];
	  
	  						//get img alt text
	  						$thumbnail_id = get_post_thumbnail_id( $post_id );

								$img_alt = get_post_meta ( $thumbnail_id, '_wp_attachment_image_alt', true );

								if(! $img_alt){

							    $img_alt = strip_tags(get_the_title($post_id));

								}
								

                //get yoast primary category
                if(function_exists('yoast_get_primary_term_id')):

                  $primary_term_id = yoast_get_primary_term_id( 'category', $post_id );

                  if ( $primary_term_id ):

                    $category = get_term( $primary_term_id );

                  endif;

                endif;

                ?>

                  <div class="single-post">

                    <div class="featured-image-outer">

                      <!-- Category -->
                      <?php

                        if($settings['show_category'] == 'show'):

                          ?>

                            <a href="<?php echo esc_url(get_term_link($category->term_id)); ?>" class="category"><?php echo esc_html($category->name); ?></a>

                          <?php

                        endif;

                      ?>

                      <!-- Featured Image -->
                      <a href="<?php the_permalink(); ?>" class="featured-image"> 
                      
                        <?php 

		                    	the_post_thumbnail( 

		              					'full',

		              					array(

		              						'alt' => $img_alt,

		              					)

		              				);

	                     	?>
                        
                      </a>

                    </div>

                    <div class="post-content-outer">

                      <!-- Title -->
                      <?php

                        if($settings['show_title'] == 'show'):

                        	$title_html_tag = \Elementor\Utils::validate_html_tag($settings['title_html_tag']);

                          ?>

                            <<?php echo esc_html($title_html_tag); ?> class="post-title">

                              <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                              </a>

                            </<?php echo esc_html($title_html_tag); ?>>

                          <?php

                        endif;

                      ?>


                      <!-- Post Date Before Excerpt -->
                      <?php

                        if($settings['show_date'] == 'show' && $settings['date_position'] == 'before_excerpt'):

                          ?>

                            <div class="post-date">

                              <?php echo get_the_date($settings['date_format']); ?>

                            </div>

                          <?php

                        endif;

                      ?>


                      <!-- Excerpt -->
                      <?php

                        if($settings['show_excerpt'] == 'show'):

                          ?>

                            <div class="post-excerpt">

                              <?php echo wp_kses_post(substr(get_the_excerpt(), 0, $settings['excerpt_length'])) . '...'; ?>

                            </div>

                          <?php

                        endif;

                      ?>


                      <!-- Post Date After Excerpt -->
                      <?php

                        if($settings['show_date'] == 'show' && $settings['date_position'] == 'after_excerpt'):

                          ?>

                            <div class="post-date">

                              <?php echo get_the_date($settings['date_format']); ?>

                            </div>

                          <?php

                        endif;

                      ?>


                      <!-- Title -->
                      <?php

                        if($settings['show_readmore'] == 'show'):

                          ?>

                            <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html($settings['readmore_label']); ?></a>

                          <?php

                        endif;

                      ?>

                    </div>  

                  </div>

                <?php

              endwhile;

            ?>
              
          </div>

          <?php 

            if($settings['show_pagination'] == 'show' && $posts->max_num_pages > 1): 

              ?>
          
                <div class="pafe-posts-pagination <?php echo esc_html($settings['pagination_style']); ?>">


                  <!-- disabled prev button (show only on first page) -->
                  <?php

                    if($paged == 1):

                      ?>

                        <span class="prev page-numbers disabled"><?php echo esc_html($settings['pagination_prev_label']); ?></span>

                      <?php

                    endif;

                  ?>


                  <!-- main navigation (show based on style selected in the widget) -->
                  <?php

                    //pagination style1
                    if($settings['pagination_style'] == 'style1'):

                      $big = 999999999; // need an unlikely integer

                      $paginate_links = paginate_links( 

                        array(
                          
                          'base'        => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        
                          'format'      => '?paged=%#%',
                        
                          'current'     => max( 1, get_query_var('paged') ),
                        
                          'total'       => esc_html($posts->max_num_pages),

                          'prev_text'   => esc_html($settings['pagination_prev_label']),

                          'next_text'   => esc_html($settings['pagination_next_label']),
                          
                        ) 

                      ); 

                      // PHPCS - the function $paginate_links holds safe data.
                      echo $paginate_links; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                    //pagination style2
                    elseif($settings['pagination_style'] == 'style2'):

                      //show only if not first page
                      if($paged > 1):

                        ?>

                          <a class="prev page-numbers" href="<?php previous_posts(); ?>"><?php echo esc_html($settings['pagination_prev_label']); ?></a>

                        <?php

                      endif;

                      ?>

                        <!-- show current and total pages -->
                        <span class="page-numbers current-and-total"><?php echo esc_html($paged) . ' / ' . esc_html($posts->max_num_pages); ?></span>

                      <?php

                      //show only if not last page
                      if($paged < $posts->max_num_pages):

                        ?>

                          <a class="next page-numbers" href="<?php next_posts($posts->max_num_pages); ?>"><?php echo esc_html($settings['pagination_next_label']); ?></a>

                        <?php

                      endif;

                    endif;

                  ?>



                  <!-- disabled next button (show only on last page) -->
                  <?php

                    if($paged == $posts->max_num_pages):

                      ?>

                        <span class="next page-numbers disabled"><?php echo esc_html($settings['pagination_next_label']); ?></span>

                      <?php

                    endif;

                  ?>

                </div>

              <?php 

            endif; 

          ?>

        </div>

        <style>
          
          .pafe-posts-module .pafe-posts {
            display: flex;
            flex-wrap: wrap;
            gap: var(--pafe-posts-row-gap) var(--pafe-posts-column-gap);
          }
          .pafe-posts-module .pafe-posts .single-post {
            --column-width: calc(100% / var(--pafe-posts-columns));
            --subtracted-width: (((var(--pafe-posts-columns) - 1) * var(--pafe-posts-column-gap)) / var(--pafe-posts-columns));
            width: calc(var(--column-width) - var(--subtracted-width));
          }
          .pafe-posts-module .pafe-posts .single-post .featured-image-outer{
            position: relative;
          }
          .pafe-posts-module .pafe-posts .single-post .featured-image-outer .category{
            position: absolute;
            content: "";
            display: inline-block;
          }
          .pafe-posts-module .pafe-posts .single-post .post-content-outer .post-date, .pafe-posts-module .pafe-posts .single-post .featured-image, .pafe-posts-module .pafe-posts .single-post .featured-image img{
            display: block;
          }
          .pafe-posts-module .pafe-posts-pagination {
            display: flex;
            align-items: center;
          }
          .pafe-posts-module .pafe-posts-pagination.style1 {
            justify-content: center;
          }
          .pafe-posts-module .pafe-posts-pagination.style2 {
            justify-content: space-between;
          }
          .pafe-posts-module .pafe-posts-pagination .page-numbers.disabled {
            opacity: 0.5;
            pointer-events: none;
          }

        </style>

      <?php

    else:

      ?>

        <div class="pafe-posts-notfound">

          not found

        </div>

      <?php

    endif;


    //reset post data
    wp_reset_postdata();


  }


}

?>