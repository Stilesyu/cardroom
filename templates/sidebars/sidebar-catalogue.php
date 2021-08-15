<div class="sidebar-catalogue">
    <div>
        <h3>文章目录</h3>
    </div>
    <div class="sidebar-catalogue-content">
        <!--        <ol>-->
        <!--            <li>A-->
        <!--                <ol>-->
        <!--                    -->
        <!--                </ol>-->
        <!--            </li>-->
        <!--            <li>B</li>-->
        <!--            <li>-->
        <!--                CC-->
        <!--                <ol style="padding-left: 10px">-->
        <!--                    <li>AA</li>-->
        <!--                    <li>BB</li>-->
        <!--                </ol>-->
        <!--            </li>-->
        <!--        </ol>-->
        <!--        --><?php
        $article = get_the_content();
        echo article_index($article);
        ?>
    </div>
</div>


<?php

/**
 * extract heading content(h1,h2 etc) from an HTML string using regex
 *
 * @param $content string posts content
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/7/20
 */
function article_index($content)
{
    $matches = array();
    $ul_li = '';
    //regex:extract heading content
    $rh = "|<h[^>]+>(.*)</h[^>]+>|iU";
    if (is_single()) {
        if (preg_match_all($rh, $content, $matches)) {
            foreach ($matches[1] as $num => $title) {
                //matches[0] <h2 id=xx>yyy</h2>
                //matches[1] yyy
                //extract header type
                $hx = substr($matches[0][$num], 0, 3);
                $nextHx = substr($matches[0][$num + 1], 0, 3);
                $start = stripos($content, $matches[0][$num]);
                $end = strlen($matches[0][$num]);
                if ($hx == "<h2") {
                    $content = substr_replace($content, '<h2 id="h2-' . $num . '">' . $title . '</h2>', $start, $end);
                    $title = preg_replace('/<.+?>/', "", $title); //将h2里面的a链接或者其他标签去除，留下文字
                    if ($nextHx == "<h3") {
                        $ul_li .= '<li class="single-area-post-catalogue-h2">\n';
                    }else{
                        $ul_li .= '<li class="single-area-post-catalogue-h2"></li>\n';
                    }
                } else if ($hx == "<h3") {
                    $content = substr_replace($content, '<h3 id="h3-' . $num . '">' . $title . '</h3>', $start, $end);
                    $title = preg_replace('/<.+?>/', "", $title); //将h3里面的a链接或者其他标签去除，留下文字
                    if ($nextHx == "<h2") {
                        $ul_li .= '<li><a href="#h3-' . $num . '" class="tooltip" title="' . $title . '">' . $title . "</a><i class=\"post_nav_dot\"></i></li>\n";
                    } else {
                        $ul_li .= '<ol class="single-area-post-catalogue-h3"><a href="#h3-' . $num . '" class="tooltip" title="' . $title . '">' . $title . "</a><i class=\"post_nav_dot\"></i></ol>\n";
                        $flag = true;
                    }
                }
            }
        }
        // 将目录拼接到文章
        if (!empty($ul_li)) {
            return "<ol class=\"single-area-post-catalogue-ul\">\n" . $ul_li . "</ol>\n";
        }
    }
}


?>