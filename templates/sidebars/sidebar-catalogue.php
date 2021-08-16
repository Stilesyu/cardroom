<div class="sidebar-catalogue">
    <div>
        <h3>文章目录</h3>
    </div>
    <div class="sidebar-catalogue-content">
        <?php
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
                $nextHx = $num == sizeof($matches[0]) - 1 ? '' : substr($matches[0][$num + 1], 0, 3);
                if ($hx == "<h2") {
                    $title = preg_replace("/<.+?>/", "", $title); //将h2里面的a链接或者其他标签去除，留下文字
                    if ($nextHx == "<h3") {
                        $ul_li .= "<li class=\"single-area-post-catalogue-h2\">\n" . $title . "<ol>";
                    } else {
                        $ul_li .= "<li class=\"single-area-post-catalogue-h2\"><a>" . $title . "</a></li>\n";
                    }
                } else if ($hx == "<h3") {
                    $title = preg_replace("/<.+?>/", "", $title); //将h3里面的a链接或者其他标签去除，留下文字
                    if ($nextHx == "<h2" || $nextHx == '') {
                        $ul_li .= "<li class=\"single-area-post-catalogue-h3\">" . $title . "</li> \n</ol> \n</li>";
                    } else {
                        $ul_li .= "<li class=\"single-area-post-catalogue-h3\">" . $title . "</li>";
                    }
                }
            }
        }
        // 将目录拼接到文章
        if (!empty($ul_li)) {
            return "<ul class=\"single-area-post-catalogue-ul\">\n" . $ul_li . "</ul>\n";
        }
    }
}
?>