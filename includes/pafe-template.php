<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}


// required functions
require_once( __DIR__ . '/pafe_functions.php' );

$posts = pafe_render_builder_templates();

//execute if template exists
if(is_array($posts) && count($posts) > 0):

	get_header();
			
		?>

			<div id="pafe-page-content" <?php post_class( 'pafe-page-content' ); ?>>

				<?php


					if(\Elementor\Plugin::$instance->preview->is_preview_mode() || \Elementor\Plugin::$instance->editor->is_edit_mode()):
					
						the_content();

					else:

						$post_id = $posts[0]->ID;

						$frontend = new \Elementor\Frontend();

						echo $frontend->get_builder_content_for_display( $post_id, $with_css = true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					endif;

				?>

			</div>

		<?php

	get_footer();

endif;