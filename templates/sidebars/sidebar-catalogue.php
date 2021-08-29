<?php
//output classification style
$article = get_the_content();
if (article_catalogue_exist($article)) {
    echo '<div class="sidebar-catalogue"><div><h3>文章目录</h3></div>
            <div class="sidebar-catalogue-content">' . article_index($article) . '</div></div>';
}


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
                $nextHx = $num == sizeof($matches[0]) - 1 ? '' : substr($matches[0][$num + 1], 0, 3);
                if ($hx == "<h2") {
                    $title = preg_replace("/<.+?>/", "", $title); //将h2里面的a链接或者其他标签去除，留下文字
                    if ($nextHx == "<h3") {
                        $ul_li .= "<li class='single-area-post-catalogue-h2'><a href='#" . $title . "'>" . $title . "</a><ol>";
                    } else {
                        $ul_li .= "<li class='single-area-post-catalogue-h2'><a href='#" . $title . "'>" . $title . "</a></li>";
                    }
                } else if ($hx == "<h3") {
                    $title = preg_replace("/<.+?>/", "", $title); //将h3里面的a链接或者其他标签去除，留下文字
                    if ($nextHx == "<h2" || $nextHx == '') {
                        $ul_li .= "<li class='single-area-post-catalogue-h3'><a href='#" . $title . "'>" . $title . "</a></li></ol></li>";
                    } else {
                        $ul_li .= "<li class='single-area-post-catalogue-h3'><a href='#" . $title . "'>" . $title . "</a></li>";
                    }
                }
            }
        }
        // 将目录拼接到文章
        if (!empty($ul_li)) {
            return "<ul class='single-area-post-catalogue-ul'>" . $ul_li . "</ul>";
        }
    }
}

function article_catalogue_exist($content)
{
    $rh = "|<h[^>]+>(.*)</h[^>]+>|iU";
    return preg_match($rh, $content);
}


?>






