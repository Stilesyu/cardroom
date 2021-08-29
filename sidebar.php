<?php
if (!empty(cardroom_options('sidebar_show_up_donate_image'))) {
    get_template_part('templates/sidebars/sidebar', 'official-accounts');
}
if (is_single()) {
    get_template_part('templates/sidebars/sidebar', 'catalogue');
}
?>
<div id="temp" style="background: #0c88b4;width: 500px;height: 500px ;margin-top: 30px" class="animate__animated">

</div>

<script>
    window.addEventListener("scroll", function () {
        const catalogue = document.getElementsByClassName('sidebar-catalogue');
        const temp = document.getElementById('temp');
        const distance = catalogue.item(0).getBoundingClientRect().y - temp.getBoundingClientRect().y;
        console.log(distance);
        if (distance > -400) {
            temp.classList.add('animate__fadeOutRight')
        }
    })


</script>
