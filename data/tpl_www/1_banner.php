<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><style>
.banner-bg{
	width:100%;
	height:118px;
	/*background:url('../tpl/www/images/bg_title.png') right center;*/
	background:url('../tpl/www/images/n1_top.png') repeat-x;
	text-align:center;
	margin: 0 auto;
	overflow:hidden;
	z-index: 1;
	position: absolute;
	/*opacity: .6;*/
}

.banner{
	width:100%;
	height:118px;
	text-align:center;
	margin: 0 auto;
	overflow:unset;
	z-index: 100;
	position: absolute;
}

.banner-blank{
	width: 100%;
	height: 118px;
	background: none;
}
.banner ul li{
	/*background: url('res/201710/04/12d3a59b93795d84.png') bottom no-repeat;*/
	background:none;
	font-size: 14px;
	height: 80px;
	margin-left: 0;
	width: 13%;
}
.banner ul li:hover{
	/*background: url('res/201710/04/11db87d11bef4bf2.png') bottom no-repeat*/;
	background:url('tpl/www/images/n1_top_li_bg.png') bottom no-repeat;
	color:white;
}
.banner .hover{
	/*background: url('res/201710/04/11db87d11bef4bf2.png') bottom no-repeat*/;
	background:url('tpl/www/images/n1_top_li_bg.png') bottom no-repeat;
}
.banner ul .filter{
	width: 1px;
	background-color: #1f50ab;
	height: 40px;
	margin-top:20px;
}

.banner ul li a{display: block; line-height: 30px; color: #fff; height: 60px; margin-top:10px; font-weight: 400; font-family: "微软雅黑";}
.banner ul li a .en{font-size: 12px;color: #bfd8e4;}

</style>
<div class="banner-bg"></div>
<div class="banner">
	<div style="width:1200px;margin:0 auto;" id="banner-zhuti">
		<div style="float: left; width:220px;position: relative; height: 100px;">
			<div style="position: absolute;z-index: 110; height: 160px;">
				<img src="/tpl/www/images/n1_mingyun.png" width="256">
			</div>
			<!-- <img src="<?php echo $config['logo'];?>" alt="<?php echo $config['title'];?>"/> -->
		</div>
		<div style="float: left; width:980px;">
			<ul>
				<?php $list = phpok('menu');?>
				<?php $mindex["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$mindex["total"] = count($list['rslist']);$mindex["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $mindex["num"]++;$mindex["index"]++; ?>
				<li <?php if($highlight== $mindex['num'] || $menutitle==
					$value['title']){ ?> class="hover"<?php } ?>>
					<a <?php if($highlight== $mindex['num'] || $menutitle==
					$value['title']){ ?> style="color: #66b3ff;" <?php } ?> href="<?php echo $value['url'];?>"
					title="<?php echo $menutitle;?>" target="<?php echo $value['target'];?>"><?php echo $value['title'];?> <br><span class="en"><?php echo $value['subtitle'];?></span></a>
				</li>
				<?php if($key != 6){ ?>
				<li class="filter"></li>
				<?php } ?>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="banner-blank">
</div>
