<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}


function pafe_render_builder_templates(){

	$posts = false;

	$args = array(

		'post_type'			=> 'pafe',

		'numberposts'		=> 1,

		'meta_query' 		=> array(

			'relation' => 'AND',

		)

	);


	//if single post
	if ( is_single()  ) :

		$args['meta_query'][] = array(

			'key'   => 'pafe_template_type',

			'value' => 'type_single_post',

		);

		$args['meta_query'][] = array(

			'key'   => 'pafe_template_post_type',

			'value' => get_post_type(),

		);

		$posts = get_posts($args);

	endif;


	//if single taxonomy
	if(is_tax() || is_category() || is_tag()):

		$term = get_queried_object();

		$args['meta_query'][] = array(

			'key'   => 'pafe_template_type',

			'value' => 'type_single_taxonomy',

		);

		$args['meta_query'][] = array(

			'key'   => 'pafe_template_taxonomy',

			'value' => $term->taxonomy,

		);

		$posts = get_posts($args);

	endif;


	//if 404 page
	if(is_404()):

		$args['meta_query'][] = array(

			'key'   => 'pafe_template_type',

			'value' => 'type_404_page',

		);

		$posts = get_posts($args);

	endif;


	//if search results page
	if(is_search()):

		$args['meta_query'][] = array(

			'key'   => 'pafe_template_type',

			'value' => 'type_search_results',

		);

		$posts = get_posts($args);

	endif;


	//return posts
	return $posts;

}

?>