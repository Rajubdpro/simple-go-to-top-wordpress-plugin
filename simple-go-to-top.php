<?php

/**
 * Plugin Name:        Simple Go To Top WP
 * Plugin URI:         https://wordpress.org/plugins/simple-go-to-top/
 * Description:        The best WordPress simple go to top  plugin with scroll progress indicator.
 * Version:            1.0.0
 * Requires at least:  5.2
 * Requires PHP:       7.2
 * Author:             Raju Ahmed
 * Author URI:         https://codepopular.com/
 * License:            GPL v2 or later
 * License URI:        http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:        sgtt
 */

class Go_To_Top
{
    function __construct()
    {
        // Color Customize action
        add_action('wp_head', [$this, 'sgtt_theme_color_cus']);
        // Add style Action
        add_action("wp_enqueue_scripts", [$this, 'sgtt_enqueue_style']);
        // Add script Action
        add_action("wp_enqueue_scripts", [$this, 'sgtt_enqueue_scripts']);
        // Add main html Action
        add_action("wp_footer", [$this, 'sgtt_scroll']);
        // plugin customize setting
        add_action('customize_register', [$this, 'sgtt_go_to_top']);
    }


    // Including css
    function sgtt_enqueue_style()
    {
        wp_enqueue_style('sgtt-style', plugins_url('assets/css/sgtt-style.css',  __FILE__));
        wp_enqueue_style('sgtt-fontawesome', plugins_url('assets/css/sgtt-fontawesome.min.css',  __FILE__));
    }

    // Including Javascript

    function sgtt_enqueue_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('sgtt-wow.min', plugins_url('assets/js/sgtt-wow.min.js',  __FILE__));
        wp_enqueue_script('sgtt-plugin', plugins_url('assets/js/sgtt-plugin.js',  __FILE__), array(), '1.0.0', 'true');
    }


    // jquery plugin active

    function sgtt_scroll()
    {
?>
        <div class="go-top">
            <i class="fas fa-chevron-up"></i>
            <i class="fas fa-chevron-up"></i>
        </div>
    <?php
    }

    // Add section
    function sgtt_go_to_top($wp_customize)
    {
        $wp_customize->add_section('sgtt_go_to_top_section', array(
            'title' => __('Simple Go To Top', 'Raju Ahmed'),
            'description' => 'The best WordPress simple go to top  plugin with scroll progress indicator.'
        ));
        //Add color setting
        $wp_customize->add_setting('sgtt_defult_color', array(
            'defult' => '#000000',
        ));
        //Add color control
        $wp_customize->add_control('sgtt_defult_color', array(
            'label' => 'Background Color',
            'section' => 'sgtt_go_to_top_section',
            'type' => 'color',
        ));
        //Adding Hover background color
        $wp_customize->add_setting('sgtt_hover_color', array(
            'defult' => '#333',
            'description' => 'You Can change hover background color.'
        ));

        $wp_customize->add_control('sgtt_hover_color', array(
            'label' => 'Change Hover Color',
            'section' => 'sgtt_go_to_top_section',
            'type' => 'color',
        ));
        //Adding Icon Color
        $wp_customize->add_setting('sgtt_icon_color', array(
            'defult' => '#ffffff',
            'description' => 'You can change defult icon color here.'
        ));

        $wp_customize->add_control('sgtt_icon_color', array(
            'label' => 'Change Icon Color',
            'section' => 'sgtt_go_to_top_section',
            'type' => 'color',
        ));
        //Adding Rounded Corner
        $wp_customize->add_setting('sgtt_rounded_corner', array(
            'defult' => '50%',
            'description' => 'If you need fully rounded or circuler then use 50% here.'
        ));

        $wp_customize->add_control('sgtt_rounded_corner', array(
            'label' => 'Rounded Corner',
            'section' => 'sgtt_go_to_top_section',
            'type' => 'text',
        ));
    }

    // Theme color customize
    function sgtt_theme_color_cus()
    {
    ?>
        <style>
            .go-top {
                color: <?php print get_theme_mod('sgtt_icon_color'); ?>;
                background-color: <?php print get_theme_mod('sgtt_defult_color'); ?>;
                border-radius: <?php print get_theme_mod('sgtt_rounded_corner'); ?>;
            }

            .go-top:hover {
                background-color: <?php print get_theme_mod('sgtt_hover_color'); ?>;
                ;
            }
        </style>

<?php
    }
}

// Class int
new Go_To_Top;

?>