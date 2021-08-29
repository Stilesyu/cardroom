

<?php
if (!empty(cardroom_options('sidebar_show_up_donate_image'))) {
    get_template_part('templates/sidebars/sidebar', 'official-accounts');
}
if (is_single()){
    get_template_part('templates/sidebars/sidebar', 'catalogue');
}
?>
<div style="background: #0c88b4;width: 500px;height: 500px ;margin-top: 30px" >

</div>
