<?php
add_action('customize_register', 'ss_customize_register');
function ss_customize_register($wp_customize)
{
  $wp_customize->add_section('ss_logo', array(
    'title' => __('Logo', 'ss'),
    'description' => __('Customize your site logo.', 'ss'),
    'priority' => 20,
  ));

  // Logo Image
  $wp_customize->add_setting('ss_logo_image', array('default' => ''));
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ss_logo_image', array(
    'section' => 'ss_logo',
    'label' => __('Image', 'ss'),
    'settings' => 'ss_logo_image'
  )));

  // Logo Alt Text
  $wp_customize->add_setting('ss_logo_alt_text', array('default' => __('Logo Alt Text', 'ss')));
  $wp_customize->add_control('ss_logo_alt_text', array(
    'section' => 'ss_logo',
    'label' => __('Alt Text', 'ss'),
    'type' => 'text'
  ));
}
