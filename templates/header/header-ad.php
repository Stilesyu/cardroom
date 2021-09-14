<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>
    <div class="header-ad-container">
        <div class="header-ad-container-card">
            <ul class="header-ad-container-card-swiper">
                <!--slider card one-->
                <li class="header-ad-container-card-swiper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_1") ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_1"))[0] ?>">
                    </a>
                </li>
                <!--slider card two-->
                <li class="header-ad-container-card-swiper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_2") ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_2"))[0] ?>">
                    </a>
                </li>
                <!--slider card three-->
                <li class="header-ad-container-card-swiper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_3") ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_3"))[0] ?>">
                    </a>
                </li>
                <!--slider card four-->
                <li class="header-ad-container-card-swiper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_4") ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_4"))[0] ?>">
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php