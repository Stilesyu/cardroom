<?php

if (is_single()) {
    $article = get_the_content();
    echo article_index($article);
}