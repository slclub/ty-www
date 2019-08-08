<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $cssfile = $css ? "tpl/www/css/style.css,artdialog.css,".$css : "tpl/www/css/style.css,artdialog.css";?>
<?php $jsfile = $js ? "tpl/www/js/global.js,".$js : "tpl/www/js/global.js";?>
<?php echo tpl_head(array('title'=>$title,'css'=>$cssfile,'extjs'=>"jquery.artdialog.js",'js'=>$jsfile,'html5'=>"true"));?>
<body>
<?php $this->output("banner","file"); ?>
<!-- <header> -->
	
	<!-- <div class="top">
		<div class="logo"><a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>"><img src="<?php echo $config['logo'];?>" alt="<?php echo $config['title'];?>" /></a></div>
		<div class="right">
			<nav class="top">
				<a href="<?php echo phpok_url(array('ctrl'=>'cart'));?>" title="购物车">购物车 <span class="red">(<span id="head_cart_num">0</span>)</span></a> | 
				if $session.user_id
				<a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>">个人中心</a> | <a href="javascript:$.user.logout('<?php echo $session['user_name'];?>');void(0)">退出</a>
				else
				<a href="<?php echo phpok_url(array('ctrl'=>'login'));?>">登录</a> | <a href="<?php echo phpok_url(array('ctrl'=>'register'));?>">注册</a>
				/if
				<span id="top_html_user_login"></span>
			</nav>
			<form method="post" action="<?php echo phpok_url(array('ctrl'=>'search'));?>" onsubmit="return top_search();">
				<input name="keywords" value="<?php echo $keywords;?>" id="top-keywords" type="text" class="input" placeholder="请输入关键字" />
				<input name="" type="submit" class="btn" value="" />
			</form>
		</div>
	</div> -->
	<!-- <nav class="menu">
	<ul>
		php:$list = phpok('menu')
		loop from=$list.rslist key=$key value=$value id=mindex
		<li<?php if($highlight == $mindex['num'] || $menutitle == $value['title']){ ?> class="current"<?php } ?>>
			<dl>
				<dt<?php if($value['sonlist']){ ?> class="arrow"<?php } ?>><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" target="<?php echo $value['target'];?>"><?php echo $value['title'];?></a></dt>
				loop from=$value.sonlist key=$k value=$v
				<dd><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="<?php echo $v['target'];?>"><?php echo $v['title'];?></a></dd>
				/loop
			</dl>
		</li>
		/loop
	</ul>
	</nav> -->
<!-- </header> -->
