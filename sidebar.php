<?php
if (!empty(cardroom_options('sidebar_show_up_donate_image'))) {
    get_template_part('templates/sidebars/sidebar', 'official-accounts');
}
if (is_single()) {
    get_template_part('templates/sidebars/sidebar', 'catalogue');
    get_template_part('templates/sidebars/sidebar', 'ad');
}
?>


<script>
    window.addEventListener("scroll", function () {
        const catalogue = document.getElementsByClassName('sidebar-catalogue');
        const adOne = document.getElementById('ad-1');
        const adTwo = document.getElementById('ad-2');
        const distance = adOne.getBoundingClientRect().top - catalogue.item(0).getBoundingClientRect().bottom;
        const adTwoDistance = adTwo.getBoundingClientRect().top - catalogue.item(0).getBoundingClientRect().bottom;
        console.log(distance);
        if (distance < 10) {
            adOne.classList.remove('animate__zoomOutRight');
            adOne.classList.add('animate__zoomOutRight')
        }
        if (distance > 10) {
            adOne.classList.replace('animate__zoomOutRight', 'animate__zoomInRight');
        }
        if (adTwoDistance < 10) {
            adTwo.classList.remove('animate__zoomOutRight');
            adTwo.classList.add('animate__zoomOutRight')
        }
        if (adTwoDistance > 10) {
            adTwo.classList.replace('animate__zoomOutRight', 'animate__zoomInRight');
        }
    })
</script>
