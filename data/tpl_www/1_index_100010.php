<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><style type="text/css">
.clear{clear:both;}
.main-100010{margin:0 auto 0 auto;width:100%;height:300px;}
.main-100010 .left, .main-100010 .right{clear: both; }
.main-100010 .left{height: 35px; width: 100%;}
.main-100010 .nav-back{width:100%;height:35px;}
.main-100010 .nav{position:relative;width:90%;text-align:center;font-size:14px;font-family:"微软雅黑";color:#fff; margin: -35px auto 0 auto;}
.main-100010 .nav div{height:32px;line-height:36px; float: left; width: 54px; border-bottom: 3px solid #333;cursor: Default;}
.main-100010 .nav .on{border-bottom: 3px solid #256cef;}
.main-100010 .right{width:100%;height:300px;}
.main-100010 .content-back{width:100%;height:265px;}
.main-100010 .content{position:relative;width:95%;height:260px;margin-top:-265px;padding:10px;overflow:hidden;}
.main-100010 .content .box{width:100%;height:270px;margin-bottom:10px; color: #ddd; overflow: hidden;position: relative;}
.main-100010 .opacity{background:#051623;opacity:.8;filter:alpha(opacity=30);}
.main-100010 .content .box .title{ color: #eee; width: 95%; text-align: left; display: block; margin: 0 auto; line-height: 25px;}

.main-100010 .content .box .title span{float: right;}
.main-100010 .content .box .title:hover{background-color: #ddd; color: #f38b20;opacity: .3}

.main-100010 .nav a{color:#f38b20;}
.main-100010 .content a{color: #ddd; width: 100%; display: block;}
.main-100010 .content a:hover{color: #f38b20; font-weight: 900;}

.main-100010 .box .alert{color: #e88407;font-weight: 900; height: 35px; line-height: 35px;position: absolute;z-index: 121; width: 100%;}
.main-100010 .box .alert-bg{width: 95%; height: 35px; margin: 0 0 0 8px; 
	background:url('tpl/www/images/n1_tuijian.jpg') no-repeat center left;

	filter:alpha(opacity=20); color: #cc6a06; position: absolute;}
.main-100010 .box .alert-blank{height: 35px; width: 100%;}

</style>
<div class="main-100010">
	<div class="left">
		<div class="nav-back opacity"></div>
		<div class="nav">
			<div class="on">全部</div>
			<div>新闻</div>
			<div>公告</div>
			<div>活动</div>
			<div>更新</div>
			<div><a href="/news.html">...</a></div>
		</div>
	</div>
	<div class="right">
		<div class="content-back opacity"></div>
		<div class="content">
			<!-- 全部新闻 -->
			<div class="box">
				<div class="alert-bg"></div>
				<?php $allList = phpok('news', 'psize=8');?>
                
                <?php $value = current($allList['rslist']);?>
				<div class="alert">
                    <a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> 
                </div>
				<div class="alert-blank"></div>

				<?php $allList_rslist_id["num"] = 0;$allList['rslist']=is_array($allList['rslist']) ? $allList['rslist'] : array();$allList_rslist_id["total"] = count($allList['rslist']);$allList_rslist_id["index"] = -1;foreach($allList['rslist'] AS $key=>$value){ $allList_rslist_id["num"]++;$allList_rslist_id["index"]++; ?>
				
				<div class="title"><a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> </div>
				<?php } ?>
			</div>

			<!-- 新闻分类中的新闻 -->
			<div class="box">
				<div class="alert-bg"></div>
				<?php $rtn = phpok('news','cateid=8&psize=8');?>
                <?php $value = current($rtn['rslist']);?>
				<div class="alert">
                    <a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo date('Y/m',$value['dateline']);?></span></a> 
                </div>
				<div class="alert-blank"></div>
				<?php $rtn_rslist_id["num"] = 0;$rtn['rslist']=is_array($rtn['rslist']) ? $rtn['rslist'] : array();$rtn_rslist_id["total"] = count($rtn['rslist']);$rtn_rslist_id["index"] = -1;foreach($rtn['rslist'] AS $key=>$value){ $rtn_rslist_id["num"]++;$rtn_rslist_id["index"]++; ?>
				
				<div class="title"><a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> </div>
				<?php } ?>
			</div>

			<!-- 公告 -->
			<div class="box">
				<div class="alert-bg"></div>
				<?php $rtn = phpok('news','cateid=68&psize=8');?>
                <?php $value = current($rtn['rslist']);?>
				<div class="alert">
                    <a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> 
                </div>
				<div class="alert-blank"></div>
				<?php $rtn_rslist_id["num"] = 0;$rtn['rslist']=is_array($rtn['rslist']) ? $rtn['rslist'] : array();$rtn_rslist_id["total"] = count($rtn['rslist']);$rtn_rslist_id["index"] = -1;foreach($rtn['rslist'] AS $key=>$value){ $rtn_rslist_id["num"]++;$rtn_rslist_id["index"]++; ?>
				
				<div class="title"><a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> </div>
				<?php } ?>
			</div>

			<!-- 活动 -->
			<div class="box">
				<div class="alert-bg"></div>
				<?php $rtn = phpok('news','cateid=586&psize=8');?>
                <?php $value = current($rtn['rslist']);?>
				<div class="alert">
                    <a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> 
                </div>
				<div class="alert-blank"></div>
				<?php $rtn_rslist_id["num"] = 0;$rtn['rslist']=is_array($rtn['rslist']) ? $rtn['rslist'] : array();$rtn_rslist_id["total"] = count($rtn['rslist']);$rtn_rslist_id["index"] = -1;foreach($rtn['rslist'] AS $key=>$value){ $rtn_rslist_id["num"]++;$rtn_rslist_id["index"]++; ?>
				
				<div class="title"><a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> </div>
				<?php } ?>
			</div>

			<!-- 更新 -->
			<div class="box">
				<div class="alert-bg"></div>
				<?php $rtn = phpok('news','cateid=588&psize=8');?>
                <?php $value = current($rtn['rslist']);?>
				<div class="alert">
                    <a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> 
                </div>
				<div class="alert-blank"></div>
				<?php $rtn_rslist_id["num"] = 0;$rtn['rslist']=is_array($rtn['rslist']) ? $rtn['rslist'] : array();$rtn_rslist_id["total"] = count($rtn['rslist']);$rtn_rslist_id["index"] = -1;foreach($rtn['rslist'] AS $key=>$value){ $rtn_rslist_id["num"]++;$rtn_rslist_id["index"]++; ?>
				
				<div class="title"><a href="/<?php echo $value['id'];?>.html"><?php echo phpok_cut($value['title'],'15','…');?> <span><?php echo lastest_date('Y/m',$value['dateline']);?></span></a> </div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(".main-100010 .nav div").mouseenter(function () {
	var $this = $(this);
	var index = $this.index();
}).mouseleave(function () {
	var $this = $(this);
	var index = $this.index();
}).click(function () {
	var $this = $(this);
	var index = $this.index();
	var l = -(index * 280);
	$(".main-100010 .nav div").removeClass("on");
	$(".main-100010 .nav div").eq(index).addClass("on");
	$(".main-100010 .content div:eq(0)").stop().animate({ "margin-top": l }, 500);
});
</script>
