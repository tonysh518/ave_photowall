<?php
include('simple_html_dom/simple_html_dom.php');

$request_headers = '';
$headers_arr = getallheaders();
$host = $headers_arr['Host'];

unset($headers_arr['Host']);
unset($headers_arr["Accept-Encoding"]);

foreach ($headers_arr as $name => $value) {
	$request_headers .= "$name: $value\n";
}

$opts = array(
	'http'=>array(
		'method'=>"GET",
		'header'=> $request_headers,
	)
);

$context = stream_context_create($opts);

$html = file_get_html('http://' . $host, false, $context);

$body_class = $html->find('body',0)->class;
$head = $html->find('head',0)->innertext;
$region_top = $html->find('div[class=region-pagetop]',0)->outertext;
$header_html = $html->find('header[id=header]',0)->outertext;
$region_bottomlogo = $html->find('div[class=region-bottomlogo]',0)->outertext;
$footer_wrapper = $html->find('div[id=footer_wrap]',0)->outertext;
$region_bottom = $html->find('div[class=region-bottom]',0)->outertext;
?>
<!DOCTYPE html>
<!--[if IEMobile 7]>
<html class="iem7" lang="zh-hans" dir="ltr"><![endif]-->
<!--[if lte IE 6]>
<html class="lt-ie9 lt-ie8 lt-ie7" lang="zh-hans" dir="ltr"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]>
<html class="lt-ie9 lt-ie8" lang="zh-hans" dir="ltr"><![endif]-->
<!--[if IE 8]>
<html class="lt-ie9" lang="zh-hans" dir="ltr"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!-->
<html lang="zh-hans" dir="ltr"
	  prefix="content: http://purl.org/rss/1.0/modules/content/ dc: http://purl.org/dc/terms/ foaf: http://xmlns.com/foaf/0.1/ og: http://ogp.me/ns# rdfs: http://www.w3.org/2000/01/rdf-schema# sioc: http://rdfs.org/sioc/ns# sioct: http://rdfs.org/sioc/types# skos: http://www.w3.org/2004/02/skos/core# xsd: http://www.w3.org/2001/XMLSchema#">
<!--<![endif]-->

<head>
	<?php print $head; ?>
	<link type="text/css" rel="stylesheet" href="css/style.css" media="all"/>
</head>
<body class="<?php print $body_class;?>">
<p id="skip-link">
	<a href="#main-menu" class="element-invisible element-focusable">Jump to navigation</a>
</p>

<div id="page">

<?php print $region_top; ?>
<?php print $header_html;?>


<div id="main">
    <div id="content" class="symj_wrap" role="main">
    <!-- #PHOTOWALL-->
        <div class="symj_breadcrumb"><a href="">首页</a> &gt; 水漾美肌</div>
        <div class="symj_box2">
            <div class="symj_box2_border symj_winner">
                <div class="symj_nav">
                    <ul>
                        <li class="symj_nav1"><a href="./">首页</a></li>
                        <li class="symj_nav2"><a href="rule.php">活动规则</a></li>
                        <li class="symj_nav3 active"><a href="winner.php">中奖名单</a></li>
                    </ul>
                </div>
                <div class="symj_winner_banner"></div>
                <div class="symj_winner_title"></div>
                <div class="symj_winner_this_month">

                </div>
                <div class="clear"></div>
                <div class="symj_winner_list">
                    <table>

                    </table>
                </div>
            </div>
            <div class="symj_box2_shadow"></div>
        </div>


    <!-- /PHOTOWALL-->
    </div>
</div>

<?php print $region_bottomlogo; ?>
<?php print $footer_wrapper; ?>
<?php print $region_bottom; ?>

<img id="imgload" style="display: none;" />

<!-- winner-thismonth-tpl -->
<script type="text/tpl" id="winner-thismonth-template">
    <div class="sysj_display_mobile">
        <div class="symj_winner_this_month_right">
            <div class="sysj_this_month_tit"><img src="img/winner_{{month}}.gif" /></div>
            <div class="symj_user_info">
                <div class="symj_avatar"><img src="{{avatar}}" width="165" height="165" /></div>
                <div class="symj_name">{{name}}<br/>{{tel}}</div>
            </div>
            <div class="clear"></div>
            <div class="symj_info">
                <div class="symj_prize">获得奖品：<br />{{prize}}</div>
                <div class="symj_prize_img"><img src="api{{prize_img}}" width="121" /></div>
            </div>
        </div>
    </div>
    <div class="symj_winner_photo" data-a="node_winner">
        <img src="api{{photo}}" />
        <div class="symj_winner_photo_overlay">
            <div class="symj_winner_photo_overlay_desc">
                {{detail.content}}
            </div>
        </div>
        <a target="_blank" href="http://v.t.sina.com.cn/share/share.php?title={{detail.sharecontent}}&pic=http://www.eau-thermale-avene.cn/photowall/test/api{{detail.image}}" class="symj_winner_repost_count"></a>
    </div>
    <div class="sysj_display_pc">
        <div class="symj_winner_this_month_right">
            <div class="sysj_this_month_tit"><img src="img/winner_{{month}}.gif" /></div>
            <div class="symj_avatar"><img src="{{avatar}}" width="115" height="115" /></div>
            <div class="symj_info">
                <div class="symj_name">{{name}}</div>
                <div class="symj_prize">获得奖品：{{prize}}</div>
            </div>
            <div class="symj_prize_img"><img src="api{{prize_img}}" width="121" /></div>
        </div>
    </div>
</script>


<!-- winner-othermonth-tpl -->
<script type="text/tpl" id="winner-othermonth-template">
    <div class="sysj_display_pc">
        <table>
            {{#each winners}}
            <tr>
                <td width="110"><div class="sysj_month_tit"><img src="img/winner_{{month}}s.gif" /></div></td>
                <td width="110"><img src="{{avatar}}" width="65" height="65" /></td>
                <td width="140">{{name}}</td>
                <td width="230">获得奖品：<br />{{prize}}</td>
                <td><img src="api{{prize_img}}" height="80" /></td>
            </tr>
            {{/each}}
        </table>
    </div>
    <div class="sysj_display_mobile">
        {{#each winners}}
        <div class="sysj_winner_item">
            <div class="sysj_month"><img src="img/winner_{{month}}s.gif" /></div>
            <div class="sysj_avatar"><img src="{{avatar}}" width="65" height="65" /></div>
            <div class="sysj_name">{{name}}</div>
            <div class="clear"></div>
            <div class="sysj_prize">
                <div class="sysj_prize_img"><img src="api{{prize_img}}" height="80" /></div>
                <div class="sysj_prize_tit">获得奖品：<br />{{prize}}</div>
            </div>
            <div class="clear"></div>
        </div>
        {{/each}}
    </div>
</script>

<!-- node-item-tpl -->
<script type="text/tpl" id="node-zoom-template">
    <div class="symj_popup_wrap">
        <div class="symj_overlay" data-a="close_pop"></div>
        <div class="symj_popup_loading"></div>
        <div class="symj_popup">
            <div class="symj_popup_close symj_btn" data-a="close_pop"></div>
            <div class="symj_img"><img src="./api{{image}}" /></div>
            <a href="http://v.t.sina.com.cn/share/share.php?title={{sharecontent}}&pic=http://www.eau-thermale-avene.cn/photowall/test/api{{image}}" target="_blank" class="symj_inner_share_link"></a>
            <div class="symj_description">
                {{content}}
            </div>
        </div>
    </div>
</script>

<!--//all tpls end -->
<script type="text/javascript" src="./js/sea/sea-debug.js" data-config="../config"></script>
<script type="text/javascript" src="./js/sea/plugin-shim.js"></script>
<script type="text/javascript" src="./js/lp.core.js"></script>
<script type="text/javascript" src="./js/lp.base.js?12"></script>



<script>   (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-20215586-3', 'eau-thermale-avene.cn', {'siteSpeedSampleRate': 100});
ga('send', 'pageview');
</script>
<script>  jQuery('#block-menu-block-4 li.first a.user_center').click(function (e) {
    e.preventDefault();
    jQuery("#block-avene-user-avene-user-space-down").addClass('open_on');
    jQuery('.region-pagetop').stop().animate({'margin-top': '0'}, 500, 'swing');
})</script>
</body>
</html>
