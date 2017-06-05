<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap Child
 * @since 1.0
 * @version 1.0
 */

// Custom Post Types (Enable if Needed)
//add_action( 'init', 'iron_cpt_init' );
function iron_cpt_init()
{
    register_post_type(
        'clients',
        array(
            'labels' => array(
                'name' => __('Clients'),
                'singular_name' => __('Client')
            ),
            'public' => true,
            'menu_position' => 5,
            'rewrite' => array( 'slug' => 'clients', 'with_front' => false ),
            'supports' => array( 'title', 'revisions', 'tags' ),
            'taxonomies' => array('post_tag')
        )
    );
}

// Taxonomies (Enable if Needed)
//add_action( 'init', 'iron_tax_init' );
function iron_tax_init()
{
    // CPT Name Categories
    register_taxonomy(
        'cpt_name_tax',
        'cpt_name',
        array(
            'label' => __('CPT Name Categories'),
            'rewrite' => array( 'slug' => 'cpt-name-category' ),
            'hierarchical' => true,
            'query_var' => true
        )
    );
}
