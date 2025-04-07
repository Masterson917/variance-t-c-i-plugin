<?php
/**
 * Plugin Name: Text Click Image Display
 * Plugin URI: https://your-website.com
 * Description: Display an image or GIF when a text is clicked, compatible with Madara theme.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://your-website.com
 * License: GPL2
 */
function tci_display_scripts() {
    wp_enqueue_script('tci-script', plugin_dir_url(__FILE__) . 'js/tci-script.js', array('jquery'), null, true);
    wp_enqueue_style('tci-style', plugin_dir_url(__FILE__) . 'css/tci-style.css');
}
add_action('wp_enqueue_scripts', 'tci_display_scripts');
function tci_display_image_shortcode($atts) {
    // Set default attributes
    $atts = shortcode_atts(
        array(
            'text' => 'Click me', // Default clickable text
            'image' => '',        // Default image (empty)
        ), $atts, 'tci_display_image'
    );

    if (empty($atts['image'])) {
        return 'No image URL provided.';
    }

    // Output the clickable text with a data-image attribute
    return '<span class="tci-clickable-text" data-image="' . esc_url($atts['image']) . '">' . esc_html($atts['text']) . '</span>';
}
add_shortcode('tci_display_image', 'tci_display_image_shortcode');
?>