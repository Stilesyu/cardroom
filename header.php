<!DOCTYPE html>
<html  class="" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php
    wp_enqueue_script("jquery");
    wp_head(); ?>
</head>
<!--加载page-header模板-->
<body  <?php body_class(); ?>>
<?php
get_template_part('/templates/header/page', 'header');
?>
</body>

</html>