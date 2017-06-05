<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap Child
 * @since 1.0
 * @version 1.0
 */

$prefix = 'ironstrap_';

// Sample Shortcode
//add_shortcode($prefix.'shorcode', 'iron_shortcode_sc');
function iron_shortcode_sc($atts)
{
    extract(shortcode_atts(array(
    ), $atts));

    $output = '';

    return $output;
}
