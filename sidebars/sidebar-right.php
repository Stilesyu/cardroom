<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<?php

    if (is_single()){
        $article = get_the_content();
        echo article_index($article);
    }