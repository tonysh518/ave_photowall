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
            <div class="symj_box2_border">
                <div class="symj_nav">
                    <ul>
                        <li class="symj_nav1"><a href="./">首页</a></li>
                        <li class="symj_nav2 active"><a href="rule.html">活动规则</a></li>
                        <li class="symj_nav3"><a href="winner.html">中奖名单</a></li>
                    </ul>
                </div>
                <div class="symj_rule1"></div>
                <div class="symj_rule3_tit"></div>
                <div class="symj_preview">
                    <div id="symj_list">

                    </div>
                    <div class="symj_box2_loading"></div>
                    <div class="clear"></div>
                </div>
                <a href="http://weibo.com" target="_blank" class="symj_rule_join_btn symj_btn sysj_display_pc"></a>
                <a href="http://weibo.com" target="_blank" class="symj_rule_join_btn symj_btn sysj_display_mobile"></a>

            </div>
            <div class="symj_box2_shadow"></div>
        </div>

        <div class="symj_box2">
            <div class="symj_box2_border symj_rule4">
                <div class="symj_rule4_tit">
                    <div class="symj_rule_tit_icon"></div>
                </div>
                <ul class="symj_rule_list">
                    <li>每月将有一位幸运者获得雅漾指定大奖。</li>
                    <li>奖品内容将于当月1日公布在本网站上  </li>
                    <li>中奖名单将公布于@雅漾 新浪官方微博与本网站，从2014年3月起，每月第一周公布上月的中奖名单。</li>
                    <li>中奖者需在中奖名单公布后7天内联系@雅漾 新浪官方微博领奖，若7天结束仍未联系，将视为自动放弃领奖资格。</li>
                    <li>奖品将于中奖名单公布的次月内，以快递形式寄出。</li>
                </ul>
            </div>
            <div class="symj_box2_shadow"></div>
        </div>

        <div class="symj_box2">
            <div class="symj_box2_border symj_rule5">
                <div class="symj_rule5_tit">
                    <div class="symj_rule_tit_icon"></div>
                </div>
                <ul class="symj_rule_list">
                    <li>活动时间：<span>2014年2月14日 -  2014年12月31日</span></li>
                    <li>参与者必须关注@雅漾 新浪官方微博，并成功授权本次活动新浪企业应用。</li>
                    <li>删除相关活动微博，则视为自动放弃获奖资格。</li>
                    <li>中奖者参加本次活动即视为授权活动主办方与本次活动相关的广告和宣传中无偿使用中奖者的名字、肖像以及任何其他由其本人提供的个人信息，而无需再另行征求确认，中奖者提供的个人信息，活动主办方以及运营方承诺将采取合理的步骤进行保护，除非根据法律或政府的强制性规定，在未得到中奖者的许可之前，活动主办方及运营方承诺不将中奖者的个人信息提供给无关的第三方。</li>
                    <li>中奖者一经确认领取奖品，不得自行撤销、更改或转让，如遇意外，无法提供制定奖品，活动主办方有权以价值相仿的奖品替代，所有奖品不得兑换现金或作价销售。</li>
                    <li>如因中奖者个人原因不能履行奖项，视为自动放弃，活动主办方将不做任何形式赔偿。</li>
                    <li>如果发现有参加者在本次活动中使用不正当的手段参加活动，活动主办方有权在不事先通知的前提下取消其参加活动的资格。</li>
                    <li>活动主办方不对因网络传输原因而导致参加者提交的信息错误或延误担任何责任。</li>
                    <li>活动主办方、关联公司、广告公司、网络合作伙伴的员工及其家属不可参加此次活动，以示公允。</li>
                    <li>如遇不可抗力因素，活动主办方有权取消本次活动。</li>
                </ul>
            </div>
            <div class="symj_box2_shadow"></div>
        </div>

    <!-- /PHOTOWALL-->
    </div>
</div>

	<?php print $region_bottomlogo; ?>
	<?php print $footer_wrapper; ?>
	<?php print $region_bottom; ?>





<!-- node-item-tpl -->
<script type="text/tpl" id="node-item-template">
    <div data-a="node" data-d="nid={{pid}}" class="photo_item photo_item_{{pid}}">
        <img src="./api{{thumb}}" width="145" />
    </div>
</script>







<!--//all tpls end -->
<script type="text/javascript" src="./js/sea/sea-debug.js" data-config="../config"></script>
<script type="text/javascript" src="./js/sea/plugin-shim.js"></script>
<script type="text/javascript" src="./js/lp.core.js"></script>
<script type="text/javascript" src="./js/lp.base.js"></script>

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
