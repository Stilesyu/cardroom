<?php

function ashe_dynamic_css()
{

    $css = '<style id="ashe_dynamic_css">';

    $css .= '
		.featured-header-area-card {
			height: 500px;
			background-image:url(' . esc_url(get_header_image()) . ');
			background-size: ' . esc_html('cover') . ';
		}
	';
    if (esc_html('cover') === 'cover') {
        $css .= '
			.featured-header-area-card {
				background-position: center center;
			}
		';
    }
    $css .= '</style>';

    echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);


}
add_action('wp_head', 'ashe_dynamic_css');