<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap Child
 * @since 1.0
 * @version 1.0
 */
 
// VC Mapper
add_action('vc_before_init', 'iron_vc_map');
function iron_vc_map()
{
	/* Sample VC Map
	vc_map( array(
		'name' => __('Iron Posts'),
		'base' => 'iron_post_list',
		'category' => __('Content'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => __('Posts Per Page', 'iron-framework-child'),
				'param_name' => 'posts_per_page',
				'value' => null,
				'description' => __('Number of posts to display per page.', 'iron-framework-child')
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => __('Display Type', 'iron-framework-child'),
				'param_name' => 'wrapper_class',
				'value' => array(
					'List' => 'list',
					'2 Column' => 'col2',
					'4 Column' => 'col4'
				),
				'description' => __('Select Display Type.', 'iron-framework-child')
			),
			array(
				'type' => 'checkbox',
				'holder' => 'div',
				'class' => '',
				'heading' => __('Pagination', 'iron-framework-child'),
				'param_name' => 'paging',
				'value' => '',
				'description' => __('Check to enable pagination.', 'iron-framework-child')
			)
		)
	));
	vc_map( array(
		'name' => __('Sample Shortcode Name'),
		'base' => 'sample_shortcode_base',
		'category' => __('Content')
	));
	*/
}
