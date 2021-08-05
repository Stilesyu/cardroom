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
                    <a href="<?php echo cardroom_options("general_slider_url") ?>">
                        <img src="<?php echo wp_get_attachment_image_src(cardroom_options("general_image_1"))[0] ?>">
                    </a>
                </li>
                <!--slider card two-->
                <li class="slider-area-card-swiper-wrapper-item">
                    <a>
                        <img src="https://cdn.sspai.com/article/6c4ba71d-d13c-dc41-bd6a-8633c7f6defc.png?imageMogr2/auto-orient/quality/95/thumbnail/!528x288r/gravity/Center/crop/528x288/interlace/1"
                             alt="Avatar">
                    </a>
                </li>
                <!--slider card three-->
                <li class="slider-area-card-swiper-wrapper-item">
                    <a>
                        <img src="https://cdn.sspai.com/article/2a4ca250-8910-8f32-724c-02aad1eb9914.jpeg?imageMogr2/auto-orient/quality/95/thumbnail/!528x288r/gravity/Center/crop/528x288/interlace/1"
                             alt="Avatar">
                    </a>
                </li>
                <!--slider card four-->
                <li class="slider-area-card-swiper-wrapper-item">
                    <a>
                        <img src="https://cdn.sspai.com/article/648ccd64-5e01-e785-3d1c-e31bc7b6a57e.jpg?imageMogr2/auto-orient/quality/95/thumbnail/!528x288r/gravity/Center/crop/528x288/interlace/1"
                             alt="Avatar">
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php