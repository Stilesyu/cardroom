<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<?php
function cardroom_customize_register($wp_customize)
{
    /*
     * sanitization callbacks
     */
    // checkbox
    function cardroom_sanitize_checkbox( $input ) {
        return $input ? true : false;
    }

    //add card slider area setting
    $wp_customize->add_section('cardroom_general', array(
        'title' => esc_html__('卡片滑动栏'),
        'priority' => 3,
        'capability' => 'edit_theme_options'
    ));
    checkbox_control('general', "show_up_in_the_post", esc_html__('是否显示在文章中'), 'refresh', 3);
    url_control('general',"slider_url",esc_html__('跳转链接'),'refresh',4);
    mage_crop_control('general', 'image_1', esc_html__( 'Image', 'ashe' ), 264, 144, 'refresh', 13);
}

/**
 * reusable functions
 * @param string $section name
 * @param string $id id
 * @param string $name control label name
 * @param string $transport perform action if selected
 * @param number $priority control priority
 */
function checkbox_control($section, $id, $name, $transport, $priority)
{
    global $wp_customize;

    $section_id = 'cardroom_'.$section;

    $wp_customize->add_setting('cardroom_options[' . $section . '_' . $id . ']', array(
        'default' => cardroom_options($section . '_' . $id),
        'type' => 'option',
        'transport' => $transport,
        'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cardroom_sanitize_checkbox'
    ));
    $wp_customize->add_control('cardroom_options[' . $section . '_' . $id . ']', array(
        'label' => $name,
        'section' => $section_id,
        'type' => 'checkbox',
        'input_attrs' => array('step' => '1'),
        'priority' => $priority
    ));
}

/**
 * url functions
 *
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/8/3
 */
function url_control( $section, $id, $name, $transport, $priority ) {
    global $wp_customize;
    $wp_customize->add_setting( 'cardroom_options['. $section .'_'. $id .']', array(
        'default'	 => cardroom_options( $section .'_'. $id),
        'type'		 => 'option',
        'transport'	 => $transport,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( 'cardroom_options['. $section .'_'. $id .']', array(
        'label'		=> $name,
        'section'	=> 'cardroom_'. $section,
        'type'		=> 'text',
        'priority'	=> $priority
    ) );
}


// image crop
function mage_crop_control( $section, $id, $name, $width, $height, $transport, $priority ) {
    global $wp_customize;
    $wp_customize->add_setting( 'cardroom_options['. $section .'_'. $id .']', array(
        'default' 	=> '',
        'type' 		=> 'option',
        'transport' => $transport
    ) );
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control( $wp_customize, 'cardroom_options['. $section .'_'. $id .']', array(
                'label'    		=> $name,
                'section'  		=> 'cardroom_'. $section,
                'flex_width'  	=> true,
                'flex_height' 	=> true,
                'width'       	=> $width,
                'height'      	=> $height,
                'priority' 		=> $priority
            )
        ) );
}


add_action('customize_register', 'cardroom_customize_register');