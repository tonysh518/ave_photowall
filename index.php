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
		<div class="symj_box1 symj_home_banner">
			<div class="symj_nav">
				<ul>
					<li class="symj_nav1 active"><a href="./">首页</a></li>
					<li class="symj_nav2"><a href="rule.html">活动规则</a></li>
					<li class="symj_nav3"><a href="winner.html">中奖名单</a></li>
				</ul>
			</div>
			<a class="symj_home_btn1 symj_btn sysj_display_pc" target="_blank" href="http://huati.weibo.com/794066"></a>
			<a class="symj_home_btn1 symj_btn sysj_display_mobile" target="_blank" href="http://m.weibo.cn/p/10080821e315462659948c83fa1e48f45b8c1a?from=523&containerid=10080821e315462659948c83fa1e48f45b8c1a&vt=4"></a>
			<a class="symj_home_btn2 symj_btn" href="winner.html"></a>
		</div>
		<div class="symj_box2 symj_list_box">
			<div class="symj_box2_border">
				<div id="symj_list">

				</div>
				<div class="clear"></div>
				<div class="symj_box2_loading"></div>
			</div>
			<div class="symj_box2_shadow"></div>
			<div class="symj_list_more symj_btn" data-a="load_more"></div>
		</div>
		<!-- /PHOTOWALL-->
	</div>
</div>

<?php print $region_bottomlogo; ?>
<?php print $footer_wrapper; ?>
<?php print $region_bottom; ?>
<!--
<div id="bg_parallax"></div>
-->



<img id="imgload" style="display: none;" />



<!-- node-item-tpl -->
<script type="text/tpl" id="node-item-template">
	<div data-a="node" data-d="nid={{pid}}" class="photo_item photo_item_{{pid}}">
		<img src="./api{{thumb}}" width="190" />
		<div class="node-item-overlay">
			<div class="node-item-desc">{{shortcontent}}</div>
		</div>
		<a href="http://v.t.sina.com.cn/share/share.php?title={{sharecontent}}&pic=http://www.eau-thermale-avene.cn/photowall/test/api{{image}}" target="_blank" class="symj_share_link"></a>
	</div>
</script>

<!-- node-item-tpl -->
<script type="text/tpl" id="node-zoom-template">
	<div class="symj_popup_wrap">
		<div class="symj_overlay" data-a="close_pop"></div>
		<div class="symj_popup_loading"></div>
		<div class="symj_popup">
			<div class="symj_popup_left" data-a="prev"></div>
			<div class="symj_popup_right" data-a="next"></div>
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
<script type="text/javascript" src="./js/lp.base.js?<?php echo time();?>"></script>

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
