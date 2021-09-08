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
        const catalogue = document.getElementById('catalogue');
        for (let i = 0; i < 2; i++) {
            const ad = document.getElementById("ad-" + (i + 1));
            const distance = ad.getBoundingClientRect().top - catalogue.getBoundingClientRect().bottom;
            if (i === 0) {
                console.log("------------------------------------------")
                console.log('距离：' + distance);
                console.log('AD高度：' + ad.getBoundingClientRect().top);
                // console.log("目录高度" + catalogue.getBoundingClientRect().bottom)
            }
            if (distance <= 30) {
                if (ad.classList.contains('animate__fadeOutRightBig')) {
                    continue;
                }
                ad.classList.remove('animate__fadeInRightBig');
                ad.classList.add('animate__fadeOutRightBig');
            }
            if (distance > 30) {
                if (ad.classList.contains('animate__fadeInRightBig')) {
                    continue;
                }
                ad.classList.replace('animate__fadeOutRightBig', 'animate__fadeInRightBig');
            }

        }
    })
</script>
