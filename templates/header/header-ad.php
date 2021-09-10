<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>
    <div class="slider-area">
        <div class="slider-area-card">
            <ul class="slider-area-card-swiper-wrapper">
                <!--slider card one-->
                <li class="slider-area-card-swiper-wrapper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_1") ?>">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_1"))[0] ?>">
                    </a>
                </li>
                <!--slider card two-->
                <li class="slider-area-card-swiper-wrapper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_2") ?>">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_2"))[0] ?>">
                    </a>
                </li>
                <!--slider card three-->
                <li class="slider-area-card-swiper-wrapper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_3") ?>">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_3"))[0] ?>">
                    </a>
                </li>
                <!--slider card four-->
                <li class="slider-area-card-swiper-wrapper-item">
                    <a href="<?php echo cardroom_options("general_slider_url_4") ?>">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_4"))[0] ?>">
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php