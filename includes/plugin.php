<?php

namespace PAFE_Plugin;

use PAFE_Plugin\PAFE_Widgets as PAFE_Widgets;

if ( ! defined( 'ABSPATH' ) ) {

  exit; // Exit if accessed directly.

}


// Load plugin file
require_once( __DIR__ . '/PAFE_admin_class.php' );

require_once( __DIR__ . '/pafe_allowed_html.php' );


/**
 * Plugin class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */

final class Plugin {

  /**
   * Addon Version
   *
   * @since 1.0.0
   * @var string The addon version.
   */

  const VERSION = '1.0.0';



  /**
   * Minimum Elementor Version
   *
   * @since 1.0.0
   * @var string Minimum Elementor version required to run the addon.
   */

  const MINIMUM_ELEMENTOR_VERSION = '3.16.0';



  /**
   * Minimum PHP Version
   *
   * @since 1.0.0
   * @var string Minimum PHP version required to run the addon.
   */

  const MINIMUM_PHP_VERSION = '7.4';



  /**
   * Instance
   *
   * @since 1.0.0
   * @access private
   * @static
   * @var \PAFE_Plugin_Init\Plugin The single instance of the class.
   */

  private static $_instance = null;



  /**
   * Instance
   *
   * Ensures only one instance of the class is loaded or can be loaded.
   *
   * @since 1.0.0
   * @access public
   * @static
   * @return \PAFE_Plugin_Init\Plugin An instance of the class.
   */

  public static function instance() {

    if ( is_null( self::$_instance ) ) {

      //create object of current class
      self::$_instance = new self();

      //create object of admin class
      new PAFE_admin_class();

    }

    return self::$_instance;

  }



  /**
   * Constructor
   *
   * Perform some compatibility checks to make sure basic requirements are meet.
   * If all compatibility checks pass, initialize the functionality.
   *
   * @since 1.0.0
   * @access public
   */

  public function __construct() {

    if ( $this->is_compatible() ) {

      add_action( 'elementor/init', [ $this, 'init' ] );

    }

  }


  /**
   * Compatibility Checks
   *
   * Checks whether the site meets the addon requirement.
   *
   * @since 1.0.0
   * @access public
   */

  public function is_compatible() {

    // Check if Elementor installed and activated
    if ( ! did_action( 'elementor/loaded' ) ) {

      add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );

      return false;

    }

    // Check for required Elementor version
    if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {

      add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );

      return false;

    }

    // Check for required PHP version
    if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {

      add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );

      return false;

    }

    return true;

  }


  /**
   * Admin notice
   *
   * Warning when the site doesn't have Elementor installed or activated.
   *
   * @since 1.0.0
   * @access public
   */
  public function admin_notice_missing_main_plugin() {

    if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

    $message = sprintf(
      /* translators: 1: Plugin name 2: Elementor */
      esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'pro-addons-for-elementor' ),
      '<strong>' . esc_html__( 'Pro Addons For Elementor', 'pro-addons-for-elementor' ) . '</strong>',
      '<strong>' . esc_html__( 'Elementor', 'pro-addons-for-elementor' ) . '</strong>'
    );

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message, pafe_allowed_html()) );

  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required Elementor version.
   *
   * @since 1.0.0
   * @access public
   */
  public function admin_notice_minimum_elementor_version() {

    if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

    $message = sprintf(
      /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
      esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pro-addons-for-elementor' ),
      '<strong>' . esc_html__( 'Pro Addons For Elementor', 'pro-addons-for-elementor' ) . '</strong>',
      '<strong>' . esc_html__( 'Elementor', 'pro-addons-for-elementor' ) . '</strong>',
       self::MINIMUM_ELEMENTOR_VERSION
    );

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message,pafe_allowed_html()) );

  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required PHP version.
   *
   * @since 1.0.0
   * @access public
   */
  public function admin_notice_minimum_php_version() {

    if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

    $message = sprintf(
      /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
      esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pro-addons-for-elementor' ),
      '<strong>' . esc_html__( 'Pro Addons For Elementor', 'pro-addons-for-elementor' ) . '</strong>',
      '<strong>' . esc_html__( 'PHP', 'pro-addons-for-elementor' ) . '</strong>',
       self::MINIMUM_PHP_VERSION
    );

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message,pafe_allowed_html()) );

  }



  /**
   * Initialize
   *
   * Load the addons functionality only after Elementor is initialized.
   *
   * Fired by `elementor/init` action hook.
   *
   * @since 1.0.0
   * @access public
   */
  public function init() {

    //register rest route
    add_action('rest_api_init', [$this, 'pafe_register_rest_router']);

    // register document control
    add_action( 'elementor/documents/register_controls', [ $this, 'pafe_register_document_controls' ] );

    //register widgets
    add_action( 'elementor/widgets/register', [$this, 'pafe_register_widgets'] );

    //register scripts and style dependencies
    add_action( 'wp_enqueue_scripts', [$this, 'pafe_scripts_and_styles_dependencies'] );

    // add css
    add_action('elementor/editor/after_enqueue_styles', [$this, 'pafe_inject_elementor_css']);


    // add document control data to header
    add_action('wp_head', [$this, 'pafe_inject_template_custom_css_and_header_code_callback']);

    // add document control data to header
    add_action('wp_head', [$this, 'pafe_inject_custom_css_and_header_code_callback']);

    // add document control data to footer
    add_action('wp_footer', [$this, 'pafe_inject_template_footer_code_callback'], 100);

    // add document control data to footer
    add_action('wp_footer', [$this, 'pafe_inject_footer_code_callback'], 100);

    // script loader filter
    add_filter( 'script_loader_tag', [$this, 'pafe_script_loader_tag_callback'], 10, 3 );

  }


  //register rest route
  function pafe_register_rest_router(){

    register_rest_route(

      'pafe/v1',

      'get_post_meta/(?P<id>[\d]+)/(?P<key>[\a-zA-Z0-9-]+)',

      array(

        'methods'   => 'GET',

        'callback'  => [$this, 'pafe_get_post_meta_callback'],

        'args'      => array(

          'id' => array(

            'description' => 'Unique identifier for the post.',

            'type' => 'integer',

            'required' => true,

          ),

          'key' => array(

            'description' => 'Meta key of the post',

            'type' => 'string',

            'required' => true,

          )

        ),

      ),

    );

  }


  //register rest route callback
  function pafe_get_post_meta_callback($data){

    $params = $data->get_url_params();

    $response = array(

      'meta_value' => get_post_meta($params['id'], $params['key'], true),

    );


    //return
    return $response;

  }


  /**
   * 
   * pafe_script_loader_tag_callback
   * 
   * */
  function pafe_script_loader_tag_callback( $tag, $handle, $src ) {

    if ( $handle === 'pafe-dotlottie-player' ) {

      $tag = '<script src="' . esc_url( $src ) . '" id="pafe-dotlottie-player-js" type="module"></script>';

    }

    return $tag;

  }


  /**
   * Register Widgets.
   *
   * Include widget file and register widget class.
   *
   * @since 1.0.0
   * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
   * @return void
   */
  function pafe_register_widgets( $widgets_manager ) {

    //include code
    require_once( __DIR__ . '/widgets/pafe-widget-page-title.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-post-title.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-post-content.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-term-title.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-term-description.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-post-meta-text.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-featured-image.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-post-meta-image.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-post-navigation.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-post-info.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-lottie.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-posts.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-flip-box.php' );
    
    require_once( __DIR__ . '/widgets/pafe-widget-contact-form-7.php' );
    

    //register widgets
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Page_Title() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Post_Title() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Post_Content() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Term_Title() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Term_Description() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Post_Meta_Text() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Featured_Image() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Post_Meta_Image() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Post_Navigation() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Post_Info() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Lotttie() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Posts() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Flip_Box() );
    
    $widgets_manager->register( new PAFE_Widgets\PAFE_Widget_Contact_Form_7() );

  }



  /**
   * 
   * register scripts and style dependencies
   * 
   * */
  public function pafe_scripts_and_styles_dependencies(){


    /* Scripts */
    wp_register_script( 'pafe-dotlottie-player', 'https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs', '', '', false );


  }

  

  /**
   * Register additional document controls.
   *
   * @param \Elementor\Core\DocumentTypes\PageBase $document The PageBase document instance.
   */

  public function pafe_register_document_controls( $document ) {

    if ( ! $document instanceof \Elementor\Core\DocumentTypes\PageBase || ! $document::get_property( 'has_elements' ) ) {

      return;

    }

    //Retrieve custom css control code
    require_once( __DIR__ . '/controls/PAFE_custom_css_control.php' );

    //Retrieve header control code
    require_once( __DIR__ . '/controls/PAFE_header_code_control.php' );

    //Retrieve footer control code
    require_once( __DIR__ . '/controls/PAFE_footer_code_control.php' );

    //Retrieve footer control code
    require_once( __DIR__ . '/controls/PAFE_preview_settings_control.php' );

  }


  //inject template custom code to page head
  public function pafe_inject_template_custom_css_and_header_code_callback() {

    // required functions
    require_once( __DIR__ . '/pafe_functions.php' );

    $template_posts = pafe_render_builder_templates();

    if(is_array($template_posts) && count($template_posts) > 0):

      // Retrieve the page id
      $template_id = $template_posts[0]->ID;

      // Retrieve the page settings manager
      $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

      // Retrieve the settings model for the current page
      $page_settings_model = $page_settings_manager->get_model( $template_id );

      // Retrieve custom css from a custom control
      $custom_css = $page_settings_model->get_settings( 'pafe_custom_css_code' );

      // Retrieve header code from a custom control
      $header_code = $page_settings_model->get_settings( 'pafe_header_code_control' );

      // print header code
      echo wp_kses($header_code, pafe_allowed_html());

      ?>

        <style id="pafe-custom-css">

          <?php echo wp_strip_all_tags($custom_css); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

        </style>

      <?php

    endif;

  }


  //inject custom code to page head
  public function pafe_inject_custom_css_and_header_code_callback() {

    // Retrieve the page id
    $page_id = get_the_ID();

    // Retrieve the page settings manager
    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

    // Retrieve the settings model for the current page
    $page_settings_model = $page_settings_manager->get_model( $page_id );

    // Retrieve custom css from a custom control
    $custom_css = $page_settings_model->get_settings( 'pafe_custom_css_code' );

    // Retrieve header code from a custom control
    $header_code = $page_settings_model->get_settings( 'pafe_header_code_control' );

    // print header code
    echo wp_kses($header_code, pafe_allowed_html());

    ?>

      <style id="pafe-custom-css">

        <?php echo wp_strip_all_tags($custom_css); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

      </style>

    <?php

  }


  //inject template custom code to page footer
  public function pafe_inject_template_footer_code_callback() {

    // required functions
    require_once( __DIR__ . '/pafe_functions.php' );

    $template_posts = pafe_render_builder_templates();

    if(is_array($template_posts) && count($template_posts) > 0):

      // Retrieve the page id
      $template_id = $template_posts[0]->ID;

      // Retrieve the page settings manager
      $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

      // Retrieve the settings model for the current page
      $page_settings_model = $page_settings_manager->get_model( $template_id );

      // Retrieve footer code from a custom control
      $footer_code = $page_settings_model->get_settings( 'pafe_footer_code_control' );

      // print header code
      echo wp_kses($footer_code, pafe_allowed_html());

    endif;

  }


  //inject custom code to page footer
  public function pafe_inject_footer_code_callback() {

    // Retrieve the page id
    $page_id = get_the_ID();

    // Retrieve the page settings manager
    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

    // Retrieve the settings model for the current page
    $page_settings_model = $page_settings_manager->get_model( $page_id );

    // Retrieve footer code from a custom control
    $footer_code = $page_settings_model->get_settings( 'pafe_footer_code_control' );

    // print header code
    echo wp_kses($footer_code, pafe_allowed_html());

  }
  
  
  //inject custom code to page footer
  public function pafe_inject_elementor_css() {

    wp_enqueue_style( 'pafe-elementor-style', plugins_url( '/assets/css/elementor-style.css', __DIR__ ), false, '1.0', 'all' );

  }


}


?>