<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><style type="text/css">
.foot{ width:100%;
	color:purple;margin-top:2px; 
	background: url('/tpl/www_mobile/images/n1_bg_down.jpg');
	padding: 0;
	min-height: 150px;
	
}
.foot .box{
	background:-webkit-gradient(linear, 0 0, 0 bottom, from(#fff), to(rgba(255, 255, 255, 0.1)));
	min-height: 160px; margin: 0;padding: 0;
	filter:alpha(opacity=100 finishopacity=0 style=1 startx=0,starty=0,finishx=0,finishy=150) progid:DXImageTransform.Microsoft.gradient(startcolorstr=white,endcolorstr=white,gradientType=0);
  	-ms-filter:alpha(opacity=100 finishopacity=0 style=1 startx=0,starty=0,finishx=0,finishy=150) progid:DXImageTransform.Microsoft.gradient(startcolorstr=white,endcolorstr=white,gradientType=0);

}

.foot div{color: #666; line-height: 25px; font-size: 12px;}
.foot .f-left{float: left; width: 450px; height: 120px;}
.foot .f-right{float: left; width:545px; height: 120px;}

.foot a{color:#555;cursor: pointer;}
.foot a:hover{color:#f38b20;}	

.foot .warm-alert{font-weight: bold; line-height: 30px;font-size: 14px;}
.foot .f-right ul{margin: 0;padding: 0;}
.foot .f-right ul li{float: left;}
.foot .f-right ul li a{}
.foot .f-right .filter{width: 12px; text-align: center;}

.copyright{ width:100%; margin:0 auto; color:#402467; line-height:20px;}
</style>
<div class="foot">
    <div class="box">
    <div style="width: 100%; margin: 0 auto; padding-top: 15px;">
    	<div class="f-left">
    		<div class="warm-alert">温馨提示：本游戏适合16（含）以上玩家娱乐</div>
    		<div>抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防上当受骗 适度游戏益脑 <br/> 沉迷伤身 合理安排时间 享受健康生活
    			<span class="filter">|</span>
    			全国文化市场统一举报电话：12318
    		</div>
    	</div>
    	<div class="f-right">
    		<ul>
    			<li><a href="">天娱在线</a></li>
    			<li class="filter">|</li>
    			<li><a href="/serviceiterms.html">服务条款</a></li>
    			<li class="filter">|</li>
    			<li><a href="/familysafety.html">家长监护</a></li>
    			<li class="filter">|</li>
    			<li><a href="/1778.html">游戏招聘</a></li>
    			<li class="filter">|</li>
    			<li><a href="">游戏地图</a></li>
    			<li class="filter">|</li>
    			<li><a href="">游戏活动</a></li>
    			<li class="filter">|</li>
    			<li><a href="/1816.html">纠纷处理</a></li>
    			<li class="filter">|</li>
    			<li><a href="/contactus.html">游戏客服</a></li>
    		</ul>
    		<div style="clear: both;"></div>
			<div class="copyright">
				<?php echo $config['copyright']['content'];?>
				<!-- <div class="debug"><?php echo debug_time('1','1','1','1');?></div> -->
			</div>
			<div>
    			<!--<a href="">文网游备字[2017]M-CSG xxxx 批准文号：新广出审[2017] xxxx号</a>-->
    		</div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>
</div>
<?php echo $app->plugin_html_ap("phpokbody");?></body>
</html>
