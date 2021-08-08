<?php
if (is_single()) {
    get_template_part('templates/sidebars/sidebar-catalogue', 'sidebars');
}
if (!empty(cardroom_options('sidebar_show_up_donate_image'))) {
    get_template_part('templates/sidebars/sidebar-donate', 'sidebars');
}
?>