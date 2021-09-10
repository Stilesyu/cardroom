<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<nav class="header-navigation-container">
    <ul class="header-navigation-container-ul">
        <?php
        if (has_nav_menu('main_menu')) {

            wp_nav_menu(
                array(
                    'container' => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'main_menu',
                )
            );
        }
        ?>
    </ul>
</nav>