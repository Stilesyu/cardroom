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
    function cardroom_sanitize_checkbox($input)
    {
        return $input ? true : false;
    }

    /*
     ** advertise
     */
    /*AD one*/
    checkbox_control('general', "show_up_in_the_post", esc_html__('是否显示在文章中'), 'refresh', 1);
    url_control('general', "slider_url_1", esc_html__('广告1跳转链接'), 'refresh', 2);
    mage_crop_control('general', 'image_1', esc_html__('广告1图片', 'cardroom'), 264, 144, 'refresh', 3);
    /*AD two*/
    url_control('general', "slider_url_2", esc_html__('广告2跳转链接'), 'refresh', 2);
    mage_crop_control('general', 'image_2', esc_html__('广告2图片', 'cardroom'), 264, 144, 'refresh', 3);
    /*AD three*/
    url_control('general', "slider_url_3", esc_html__('广告3跳转链接'), 'refresh', 2);
    mage_crop_control('general', 'image_3', esc_html__('广告3图片', 'cardroom'), 264, 144, 'refresh', 3);
    /*AD four*/
    url_control('general', "slider_url_4", esc_html__('广告4跳转链接'), 'refresh', 2);
    mage_crop_control('general', 'image_4', esc_html__('广告4图片', 'cardroom'), 264, 144, 'refresh', 3);



    //add card slider area setting
    $wp_customize->add_section('cardroom_general', array(
        'title' => esc_html__('广告栏'),
        'priority' => 1,
        'capability' => 'edit_theme_options'
    ));

    /*
    ** sidebar
    */
    mage_crop_control('sidebar', 'show_up_donate_image', esc_html__('捐赠二维码', 'cardroom'), 344, 344, 'refresh', 1);
    //sidebar area setting
    $wp_customize->add_section('cardroom_sidebar', array(
        'title' => esc_html__('侧边栏'),
        'priority' => 2,
        'capability' => 'edit_theme_options'
    ));


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

    $section_id = 'cardroom_' . $section;

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
function url_control($section, $id, $name, $transport, $priority)
{
    global $wp_customize;
    $wp_customize->add_setting('cardroom_options[' . $section . '_' . $id . ']', array(
        'default' => cardroom_options($section . '_' . $id),
        'type' => 'option',
        'transport' => $transport,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('cardroom_options[' . $section . '_' . $id . ']', array(
        'label' => $name,
        'section' => 'cardroom_' . $section,
        'type' => 'text',
        'priority' => $priority
    ));
}


// image crop
function mage_crop_control($section, $id, $name, $width, $height, $transport, $priority)
{
    global $wp_customize;
    $wp_customize->add_setting('cardroom_options[' . $section . '_' . $id . ']', array(
        'default' => '',
        'type' => 'option',
        'transport' => $transport
    ));
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control($wp_customize, 'cardroom_options[' . $section . '_' . $id . ']', array(
                'label' => $name,
                'section' => 'cardroom_' . $section,
                'flex_width' => true,
                'flex_height' => true,
                'width' => $width,
                'height' => $height,
                'priority' => $priority
            )
        ));
}


add_action('customize_register', 'cardroom_customize_register');