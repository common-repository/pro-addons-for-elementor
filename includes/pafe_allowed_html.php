<?php

/* return array of allowed html tags */
function pafe_allowed_html() {

	$allowed_tags = array(

		'a' => array(

			'class' => array(),

			'href'  => array(),

			'rel'   => array(),

			'title' => array(),
			
			'target' => array(),

		),

		'abbr' => array(

			'title' => array(),

		),

		'b' => array(),

		'blockquote' => array(

			'cite'  => array(),

		),

		'cite' => array(

			'title' => array(),

		),

		'code' => array(),

		'del' => array(

			'datetime' => array(),

			'title' => array(),

		),

		'dd' => array(),

		'div' => array(

			'class' => array(),

			'title' => array(),

			'style' => array(),

		),

		'dl' => array(),

		'dt' => array(),

		'em' => array(),

		'h1' => array(),

		'h2' => array(),

		'h3' => array(),

		'h4' => array(),

		'h5' => array(),

		'h6' => array(),

		'i' => array(),

		'img' => array(

			'alt'    => array(),

			'class'  => array(),

			'height' => array(),

			'src'    => array(),

			'width'  => array(),

		),

		'li' => array(

			'class' => array(),

		),

		'ol' => array(

			'class' => array(),

		),

		'p' => array(

			'class' => array(),

		),

		'q' => array(

			'cite' => array(),

			'title' => array(),

		),

		'span' => array(

			'class' => array(),

			'title' => array(),

			'style' => array(),

		),

		'strike' => array(),

		'strong' => array(),

		'ul' => array(

			'class' => array(),

		),

		'script' => array(

			'async' => array(),

			'crossorigin' => array(),

			'defer' => array(),

			'integrity' => array(),

			'nomodule' => array(),

			'referrerpolicy' => array(),

			'src' => array(),

			'type' => array(),

		),

		'style' => array(

			'media' => array(),

			'type' => array(),

		),

		'link' => array(

			'crossorigin' => array(),

			'href' => array(),

			'hreflang' => array(),

			'media' => array(),

			'referrerpolicy' => array(),

			'rel' => array(),

			'sizes' => array(),

			'title' => array(),

			'type' => array(),

		),

	);

	return $allowed_tags;

}

?>