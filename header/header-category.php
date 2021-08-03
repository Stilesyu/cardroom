<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<div class="category-area">
    <a href="http://localhost">首页</a>
    <?php $categories = get_categories();
    foreach ($categories as $category) {
        echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
    } ?>
</div>