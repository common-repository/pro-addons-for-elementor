<?php

namespace PAFE_Plugin\PAFE_Widgets;


if ( ! defined( 'ABSPATH' ) ) {

  exit; // Exit if accessed directly.

}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Post Info widget.
 *
 * Elementor widget that displays a post info/meta.
 *
 * @since 1.0.0
 */
class PAFE_Widget_Post_Info extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   *
   * Retrieve Post Info widget name.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'pafe-post-info';
  }

  /**
   * Get widget title.
   *
   * Retrieve Post Info widget title.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {

    return esc_html__( 'Post Info/Meta', 'pro-addons-for-elementor' );

  }

  /**
   * Get widget icon.
   *
   * Retrieve Post Info widget icon.
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {

    return 'pafe eicon-post-info';

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

    return [ 'post', 'post info', 'post meta', 'author', 'categories', 'tags', 'terms', 'post date'];

  }


  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the Post Info widget belongs to.
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
   * Register Post Info widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 3.1.0
   * @access protected
   */
  protected function register_controls() {

    $this->start_controls_section(

      'section_post_info',

      [

        'label' => esc_html__( 'Post Info', 'pro-addons-for-elementor' ),

      ]

    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(

      'info_type',

      [

        'label' => esc_html__( 'Type', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SELECT,

        'options' => [

          'author' => 'Author',

          'categories' => 'Categories',

          'date' => 'Date',

          'comments' => 'Comments',

          'post_meta' => 'Post Meta',

        ],

        'default' => 'author',

      ]

    );


    $repeater->add_control(

      'author_image',

      [

        'label' => esc_html__( 'Author Image', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SWITCHER,

        'return_value' => 'yes',

        'condition' => [

          'info_type' => 'author',

        ],

      ]

    );


    $repeater->add_control(

      'link',

      [

        'label' => esc_html__( 'Link', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SWITCHER,

        'return_value' => 'yes',

        'default' => 'yes',

        'condition' => [

          'info_type' => ['author', 'categories'],

        ],

      ]

    );


    $repeater->add_control(

      'date_format',

      [

        'label' => esc_html__( 'Format', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::TEXT,

        'default' => 'jS F, Y',

        'condition' => [

          'info_type' => 'date',

        ],

      ]

    );


    $repeater->add_control(

      'date_prefix',

      [

        'label' => esc_html__( 'Prefix', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::TEXT,

        'default' => 'Posted on',

        'condition' => [

          'info_type' => 'date',

        ],

      ]

    );


    $repeater->add_control(

      'comments_suffix',

      [

        'label' => esc_html__( 'Suffix', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::TEXT,

        'default' => 'Comments',

        'condition' => [

          'info_type' => 'comments',

        ],

      ]

    );


    $repeater->add_control(

      'selected_icon',

      [

        'label' => esc_html__( 'Icon', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::ICONS,

        'default' => [

          'value' => 'fas fa-user',

          'library' => 'fa-solid',

        ],

      ]

    );


    $repeater->add_control(

      'meta_key',

      [

        'label' => esc_html__( 'Meta Key', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::TEXT,

        'condition' => [

          'info_type' => 'post_meta',

        ],

      ]

    );


    $this->add_control(

      'post_info',

      [

        'label' => esc_html__( 'Repeater List', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::REPEATER,

        'fields' => $repeater->get_controls(),

        'default' => [

          [
            
            'info_type' => esc_html__( 'author', 'pro-addons-for-elementor' ),

            'selected_icon' => [

              'value' => 'fas fa-user',

              'library' => 'fa-solid',

            ],

            'author_image'  => esc_html__( 'no', 'pro-addons-for-elementor' ),

            'link'  => esc_html__( 'yes', 'pro-addons-for-elementor' ),

          ],

          [
            
            'info_type' => esc_html__( 'categories', 'pro-addons-for-elementor' ),

            'selected_icon' => [

              'value' => 'fas fa-tags',

              'library' => 'fa-solid',

            ],

            'link'  => esc_html__( 'yes', 'pro-addons-for-elementor' ),

          ],

          [
            
            'info_type' => esc_html__( 'date', 'pro-addons-for-elementor' ),

            'selected_icon' => [

              'value' => 'fas fa-calendar-alt',

              'library' => 'fa-solid',

            ],

          ],

          [
            
            'info_type' => esc_html__( 'comments', 'pro-addons-for-elementor' ),

            'selected_icon' => [

              'value' => 'fas fa-comments',

              'library' => 'fa-solid',

            ],

          ]

        ],

        'title_field' => '{{{ elementor.helpers.renderIcon( this, selected_icon, {}, "i", "panel" ) }}} {{{ info_type }}}',
      ]

    );


    $this->end_controls_section();


    $this->start_controls_section(

      'section_post_info_style',

      [

        'label' => esc_html__( 'Post Info', 'pro-addons-for-elementor' ),

        'tab' => \Elementor\Controls_Manager::TAB_STYLE,

      ]

    );


    $this->add_responsive_control(

      'space_between',

      [

        'label' => esc_html__( 'Horizontal Space', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'size_units' => [ 'px', 'em', 'rem', 'custom' ],

        'range' => [

          'px' => [

            'max' => 50,

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info' => '--pafe-post-info-column-gap: {{SIZE}}{{UNIT}};'

        ],

      ]

    );


    $this->add_responsive_control(

      'vertical_space_between',

      [

        'label' => esc_html__( 'Vertical Space', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'size_units' => [ 'px', 'em', 'rem', 'custom' ],

        'range' => [

          'px' => [

            'max' => 50,

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info' => '--pafe-post-info-row-gap: {{SIZE}}{{UNIT}};'

        ],

      ]

    );


    $this->add_responsive_control(

      'icon_align',

      [

        'label' => esc_html__( 'Alignment', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::CHOOSE,

        'options' => [

          'flex-start' => [

            'title' => esc_html__( 'Left', 'pro-addons-for-elementor' ),

            'icon' => 'eicon-h-align-left',

          ],

          'center' => [

            'title' => esc_html__( 'Center', 'pro-addons-for-elementor' ),

            'icon' => 'eicon-h-align-center',

          ],

          'flex-end' => [

            'title' => esc_html__( 'Right', 'pro-addons-for-elementor' ),

            'icon' => 'eicon-h-align-right',

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info' => '--pafe-post-info-halign: {{VALUE}};'

        ],

      ]

    );


    $this->end_controls_section();

    $this->start_controls_section(

      'section_post_info_icon_style',

      [

        'label' => esc_html__( 'Icon', 'pro-addons-for-elementor' ),

        'tab' => \Elementor\Controls_Manager::TAB_STYLE,

      ]

    );


    $this->add_control(

      'icon_color',

      [

        'label' => esc_html__( 'Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'default' => '',

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info .post-info-item svg' => 'fill: {{VALUE}};',

        ],

        'global' => [

          'default' => Global_Colors::COLOR_PRIMARY,

        ],

      ]

    );


    $this->add_responsive_control(

      'icon_size',

      [
        'label' => esc_html__( 'Size', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],

        'range' => [

          'px' => [

            'min' => 6,

          ],

          '%' => [

            'min' => 6,

          ],

          'vw' => [

            'min' => 6,

          ],

        ],

        'separator' => 'before',

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info' => '--pafe-post-info-icon-size: {{SIZE}}{{UNIT}};',

        ],

      ]

    );


    $this->add_responsive_control(

      'icon_gap',

      [

        'label' => esc_html__( 'Gap', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],

        'range' => [

          'px' => [

            'max' => 50,

          ],

        ],

        'separator' => 'after',

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info' => '--pafe-post-info-icon-gap: {{SIZE}}{{UNIT}};'

        ],

      ]

    );


    $this->add_responsive_control(

      'icon_self_vertical_align',

      [

        'label' => esc_html__( 'Vertical Alignment', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::CHOOSE,

        'options' => [

          'flex-start' => [

            'title' => esc_html__( 'Start', 'pro-addons-for-elementor' ),

            'icon' => 'eicon-v-align-top',

          ],

          'center' => [

            'title' => esc_html__( 'Center', 'pro-addons-for-elementor' ),

            'icon' => 'eicon-v-align-middle',

          ],

          'flex-end' => [

            'title' => esc_html__( 'End', 'pro-addons-for-elementor' ),

            'icon' => 'eicon-v-align-bottom',

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info' => '--pafe-post-info-icon-valign: {{VALUE}};'

        ],

      ]

    );

    $this->add_responsive_control(

      'icon_vertical_offset',

      [

        'label' => esc_html__( 'Adjust Vertical Position', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'size_units' => [ 'px', 'em', 'rem', 'custom' ],

        'range' => [

          'px' => [

            'min' => -15,

            'max' => 15,

          ],

          'em' => [

            'min' => -1,

            'max' => 1,

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info .post-info-item svg' => 'top: {{SIZE}}{{UNIT}};',

        ],

      ]

    );

    $this->end_controls_section();


    $this->start_controls_section(

      'section_text_style',

      [

        'label' => esc_html__( 'Text', 'pro-addons-for-elementor' ),

        'tab' => \Elementor\Controls_Manager::TAB_STYLE,

      ]

    );

    $this->add_group_control(

      \Elementor\Group_Control_Typography::get_type(),

      [
        'name' => 'icon_typography',

        'selector' => '{{WRAPPER}} .pafe-post-info .info-text, {{WRAPPER}} .pafe-post-info .info-text a',

        'global' => [

          'default' => Global_Typography::TYPOGRAPHY_TEXT,

        ],

      ]

    );

    $this->add_group_control(

      \Elementor\Group_Control_Text_Shadow::get_type(),

      [

        'name' => 'text_shadow',

        'selector' => '{{WRAPPER}} .pafe-post-info .info-text, {{WRAPPER}} .pafe-post-info .info-text a',

      ]

    );

    $this->add_control(

      'text_color',

      [

        'label' => esc_html__( 'Color', 'pro-addons-for-elementor' ),

        'type' => \Elementor\Controls_Manager::COLOR,

        'selectors' => [

          '{{WRAPPER}} .pafe-post-info .info-text, {{WRAPPER}} .pafe-post-info .info-text a' => 'color: {{VALUE}};'

        ],

        'global' => [

          'default' => Global_Colors::COLOR_SECONDARY,

        ],

      ]

    );

    $this->end_controls_section();


  }
    

  /**
   * Render Post Info widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

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

    $author_id = get_post_field( 'post_author', $post_id );

    if($settings['post_info']):
    
      ?>

        <style>
          .pafe-post-info, .pafe-post-info .post-info-item {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
          }
          .pafe-post-info{
            column-gap: var(--pafe-post-info-column-gap, 20px);
            row-gap: var(--pafe-post-info-row-gap, 20px);
            justify-content: var(--pafe-post-info-halign, flex-start);
          }
          .pafe-post-info .post-info-item{
            gap: var(--pafe-post-info-icon-gap, 8px);
            align-items: var(--pafe-post-info-icon-valign, center);
          }
          .pafe-post-info .post-info-item svg{
            width: var(--pafe-post-info-icon-size, 18px);
            height: var(--pafe-post-info-icon-size, 18px);
            position: relative;
          }
          .pafe-post-info .post-info-item .avatar{
            width: 30px;
            border-radius: 100%;
            box-shadow: 0 0 5px rgba(0,0,0,.2);
          }
        </style>
      
        <div class="pafe-post-info">

          <?php

            foreach ($settings['post_info'] as $post_info_item):

              ?>

                <div class="post-info-item <?php echo esc_html($post_info_item['info_type']); ?>">

                  <?php

                  if($post_info_item['info_type'] == 'author' && $post_info_item['author_image'] == 'yes'):

                    echo get_avatar( $author_id, 80 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                  else:

                    \Elementor\Icons_Manager::render_icon( $post_info_item['selected_icon'], [ 'aria-hidden' => 'true' ] );

                  endif;

                  ?>

                  <div class="info-text">

                    <?php

                      //author
                      if($post_info_item['info_type'] == 'author'):

                        $author_name = get_the_author_meta( 'display_name', $author_id );

                        if($post_info_item['link'] == 'yes'):

                          echo '<a href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html($author_name) . '</a>';

                        else:

                          echo esc_html($author_name);

                        endif;


                      //categories
                      elseif($post_info_item['info_type'] == 'categories'):

                        $categories = get_the_category( $post_id );

                        $category_list = '';

                        if ( ! empty( $categories ) ):

                          //with link
                          if($post_info_item['link'] == 'yes'):

                            $category_index = 0;

                            foreach ($categories as $category):

                              $category_index++;

                              if($category_index == count($categories)):

                                $category_list .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';

                              else:

                                $category_list .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>, ';

                              endif;

                            endforeach;

                          //without link
                          else:

                            $category_list = implode(", ", wp_list_pluck($categories, 'name'));

                          endif;

                        endif;

                        //print categories
                        echo $category_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped


                      //date
                      elseif($post_info_item['info_type'] == 'date'):

                        echo esc_html($post_info_item['date_prefix'] . ' ' . get_the_date( $post_info_item['date_format'], $post_id ));


                      //comments
                      elseif($post_info_item['info_type'] == 'comments'):

                        $comments_count = get_comment_count($post_id);

                        echo esc_html( $comments_count['all'] . ' ' . $post_info_item['comments_suffix']);

											//comments
                      elseif($post_info_item['info_type'] == 'post_meta'):

                      $meta_key = $post_info_item['meta_key'];

                      echo esc_html( get_post_meta($post_id, $meta_key, true) );                        

                      endif;


                    ?>
                      
                  </div>

                </div>

              <?php

            endforeach;

          ?>

        </div>

      <?php

    endif;

  }
  
}
