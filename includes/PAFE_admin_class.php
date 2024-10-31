<?php

namespace PAFE_Plugin;

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}


// required functions
require_once( __DIR__ . '/pafe_allowed_html.php' );

require_once( __DIR__ . '/pafe_functions.php' );


/**
 * Plugin class.
 *
 * @since 1.0.0
 */

class PAFE_admin_class {

	// execute when object made of this class
	public function __construct(){

		//register post type
		add_action( 'init', [$this, 'pafe_register_post_type_callback'] );

		// add metaboxes
		add_action( 'add_meta_boxes', [$this, 'pafe_register_meta_boxes'] );

		// save metabox
		add_action( 'save_post', [$this, 'pafe_save_meta_box'] );

		//pafe_load_templates
		add_filter( 'template_include', [$this, 'pafe_load_templates'], 99 );

		// add admin bar
		add_action( 'wp_after_admin_bar_render', [$this, 'pafe_wp_after_admin_bar_render']);

		// add setting link
		add_filter( 'plugin_action_links_' . PAFE_PATH, [$this, 'pafe_settings_link'] );

	}

	
	function pafe_settings_link( array $links ) {

    $url = get_admin_url() . "edit.php?post_type=pafe";

    $settings_link = '<a href="' . $url . '">' . __('Settings', 'pro-addons-for-elementor') . '</a>';

    $links = array_merge(array($settings_link), $links);

    return $links;

  }


	function pafe_wp_after_admin_bar_render(){

		if(is_admin()):

			$screen = get_current_screen();

			if($screen->id == 'edit-pafe'):

				ob_start();

					?>

						<div id="e-admin-top-bar-root" class="e-admin-top-bar--active">
		    			
		    			<div class="e-admin-top-bar">
		        		
		        		<div class="e-admin-top-bar__main-area">

		            	<div class="e-admin-top-bar__heading">

		                <div class="e-logo-wrapper">

		                	<i class="eicon-elementor" aria-hidden="true"></i>

		                </div>

		                <span class="e-admin-top-bar__heading-title">Pro Addons For Elementor</span>

		            	</div>

		            	<?php

		            		if(empty($screen->action) && $screen->base == 'edit'):

		            			?>
		            
					            	<div class="e-admin-top-bar__main-area-buttons">

					            		<a href="<?php echo esc_url(get_site_url(null, '/wp-admin/post-new.php?post_type=pafe')); ?>" class="page-title-action">Add New</a>

					            	</div>

				            	<?php

				            endif;

		          		?>

		        		</div>

		    			</div>

						</div>

						<style>
							
							#wpbody-content .page-title-action {
							  display: none;
							}
							.e-admin-top-bar--active {
							  margin-left: -20px;
							}
							.e-admin-top-bar--active .e-admin-top-bar{
							  padding: 8px 15px;
							  background: #fff;
							  box-shadow: 0 4px 6px rgba(0,0,0,.03);
							}
							.e-admin-top-bar--active .e-admin-top-bar .e-admin-top-bar__main-area{
							  display: flex;
							  align-items: center;
							  gap: 40px;
							}
							.e-admin-top-bar--active .e-admin-top-bar .page-title-action{
							  font-size: 12px;
							  font-weight: 500;
							  line-height: 1.2;
							  padding: 8px 16px;
							  border-radius: var(--e-a-border-radius);
							  background-color: var(--e-a-btn-bg);
							  color: #fff;
							  text-transform: uppercase;
							  text-decoration: none;
							}
							.e-admin-top-bar--active .e-admin-top-bar .e-admin-top-bar__heading{
							  display: flex;
							  align-items: center;
							}
							.e-admin-top-bar--active .e-admin-top-bar .e-admin-top-bar__heading-title{
							  color: var(--e-a-color-txt);
							  font-size: 15px;
							  font-weight: 700;
							  padding: 0 8px;
							  line-height: normal;
							}
							.e-admin-top-bar--active .e-admin-top-bar .e-logo-wrapper{
							  line-height: 11px;
							}

						</style>

					<?php

				echo ob_get_clean(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			endif;

		endif;

	}


	// pafe_load_templates
	public function pafe_load_templates( $template ) {

		$posts = pafe_render_builder_templates();

		if(is_array($posts) && count($posts) > 0):

			//return template
			return __DIR__ . '/pafe-template.php';

		endif;

		return $template;

	}


	//pafe_register_post_type_callback
	public function pafe_register_post_type_callback(){

		$labels =  array(

			'name'							=> 'Elementor Theme Templates',

			'singular_name'			=> 'Elementor Theme Template',

		);

		$args = array(

			'labels'              => $labels,

			'public'              => true,

			'publicly_queryable'  => true,

			'show_ui'             => true,

			'show_in_menu'        => 'themes.php',

			'exclude_from_search' => true,

			'query_var'           => true,

			'capability_type'     => 'post',

			'has_archive'         => false,

			'hierarchical'        => false,

			'menu_position'       => -1,

			'supports'            => array( 'title', 'elementor' ),

		);

		register_post_type( 'pafe', $args );

	}


	/**
	 * Register meta box(es).
	 */
	public function pafe_register_meta_boxes($post_type) {

		// Limit meta box to certain post types.
		$allowed_post_types = array( 'pafe');

		if ( in_array( $post_type, $allowed_post_types ) ):

			add_meta_box( 

				'pafe_posts_metabox', 

				__( 'PAFE Template Options', 'pro-addons-for-elementor' ), 

				array($this, 'pafe_display_meta_boxes'), 

				$post_type,

				'advanced',

				'high'

			);

		endif;

	}


	/**
	 * Meta box display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public function pafe_display_meta_boxes( $post ) {

		$post_id = $post->ID;

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'pafe_template_meta_box', 'pafe_template_meta_box_nonce' );

		$template_types = array(

			'type_single_post'			=> 'Single Post',

			'type_single_taxonomy'	=> 'Single Taxonomy',

			'type_search_results'		=> 'Search Results',

			'type_404_page'					=> '404 Page',

		);

		// post types
		$post_types = get_post_types(

			array(

				'public'	=> 'true',

			),

			'objects',

		);


		// taxonomies
		$taxonomies = get_taxonomies(

			array(

				'public'	=> 'true',

			),

			'objects',

		);


		//echo "<pre>", print_r($taxonomies), "</pre>";


		//meta fields
		$pafe_template_type = get_post_meta( $post_id, 'pafe_template_type', true );

		$pafe_template_post_type = get_post_meta( $post_id, 'pafe_template_post_type', true );

		$pafe_template_taxonomy = get_post_meta( $post_id, 'pafe_template_taxonomy', true );

		?>

			<div class="pafe-metaboxes">

				<table width="100%" cellspacing="0">

					<tbody>

						<tr class="pafe_template_type">
							
							<td>
								
								<label class="pafe-meta-field-label" for="pafe_template_type">Type of Template</label>

							</td>

							<td>
								
								<select class="pafe-meta-field" name="pafe_template_type" id="pafe_template_type">
									
									<option value="">Select Option</option>

									<?php

										foreach ($template_types as $key => $title):

											?>

												<option value="<?php echo esc_html($key); ?>" <?php echo (($key == $pafe_template_type) ? 'selected' : ''); ?>>

													<?php echo esc_html($title); ?>

												</option>

											<?php

										endforeach;

									?>

								</select>

							</td>

						</tr>

						<tr class="pafe_template_post_type hidden-row" data-row="type_single_post">
							
							<td>
								
								<label class="pafe-meta-field-label" for="pafe_template_post_type">Post Type</label>

							</td>

							<td>
								
								<select class="pafe-meta-field" name="pafe_template_post_type" id="pafe_template_post_type">
									
									<option value="">Select Option</option>

									<?php

										foreach ($post_types as $post_type):

											?>

												<option value="<?php echo esc_html($post_type->name); ?>" <?php echo (($post_type->name == $pafe_template_post_type) ? 'selected' : ''); ?>>

													<?php echo esc_html($post_type->name); ?>

												</option>

											<?php

										endforeach;

									?>

								</select>

							</td>

						</tr>

						<tr class="pafe_template_taxonomy hidden-row" data-row="type_single_taxonomy">
							
							<td>
								
								<label class="pafe-meta-field-label" for="pafe_template_taxonomy">Taxonomy</label>

							</td>

							<td>
								
								<select class="pafe-meta-field" name="pafe_template_taxonomy" id="pafe_template_taxonomy">
									
									<option value="">Select Option</option>

									<?php

										foreach ($taxonomies as $taxonomy):

											?>

												<option value="<?php echo esc_html($taxonomy->name); ?>" <?php echo (($taxonomy->name == $pafe_template_taxonomy) ? 'selected' : ''); ?>>

													<?php echo esc_html($taxonomy->name); ?>
														
												</option>

											<?php

										endforeach;

									?>

								</select>

							</td>

						</tr>

					</tbody>

				</table>

			</div>

			<style>
			
				.pafe-metaboxes .pafe-meta-field-label {
				  font-weight: 700;
				}
				.pafe-metaboxes .pafe-meta-field{
				  width: 100%;
				  padding: 4px 10px;
				}
				.pafe-metaboxes tr td{
				  padding: 25px 0;
				  border-bottom: 1px solid #ccc;
				}
				.pafe-metaboxes tr.hidden-row{
					display: none;
				}

			</style>

			<script>

				jQuery(document).ready(function($){

					function change_template_type(){

						var selected_val = $('#pafe_template_type').val();

						if(selected_val == ""){

							$(".pafe-metaboxes tr.hidden-row").hide();

						}

						else{

							$(".pafe-metaboxes tr.hidden-row").hide();

							$(`[data-row="${selected_val}"]`).show();

						}

					}


					//execute on page load
					change_template_type();

					//execute on change
					$("#pafe_template_type").change(function(){

						change_template_type();

					});

				});

			</script>

		<?php

	}


	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID
	 */
	public function pafe_save_meta_box( $post_id ) {
		
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['pafe_template_meta_box_nonce'] ) ) {
			
			return $post_id;

		}

		$nonce = $_POST['pafe_template_meta_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'pafe_template_meta_box' ) ) {

			return $post_id;

		}

		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

			return $post_id;

		}

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) ) {

				return $post_id;

			}

		} 

		else {

			if ( ! current_user_can( 'edit_post', $post_id ) ) {

				return $post_id;

			}

		}

		/* OK, it's safe for us to save the data now. */


		// Sanitize the user input.

		$meta_fields = array(

			'pafe_template_type' => sanitize_text_field( $_POST['pafe_template_type'] ),

			'pafe_template_post_type' => sanitize_text_field( $_POST['pafe_template_post_type'] ),

			'pafe_template_taxonomy' => sanitize_text_field( $_POST['pafe_template_taxonomy'] ),

		);

		
		// Update the meta field.
		foreach($meta_fields as $meta_key => $meta_value):

			if ( metadata_exists( 'post', $post_id, $meta_key ) ) {
			
				update_post_meta( $post_id, $meta_key, $meta_value );

			}

			else{

				add_post_meta( $post_id, $meta_key, $meta_value );

			}

		endforeach;


	}

}

?>