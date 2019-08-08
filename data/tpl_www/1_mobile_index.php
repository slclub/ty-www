<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("highlight","1"); ?><?php $this->output("index_head","file"); ?>

<div class="main" id="main" style="">


	<div class="banner-bac">
		<div class="bd">
			<ul>
				
				<li>
    <!--
    <a href="<?php echo $value['link'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['title'];?>"><img src="/tpl/www_mobile/images/n1_bg.jpg" _src="<?php echo $value['pic']['filename'];?>" alt="<?php echo $value['title'];?>"/></a>
    -->
                </li>
				
			</ul>
		</div>
	</div>
	
	<script type="text/javascript">
	$(document).ready(function(){
		jQuery(".banner-bac").slideToggle({'autoPlay':true,'switchLoad':'_src','mainCell':'.bd ul',effect:"fold",delayTime:3000,interTime:6000});
	});
	</script>



	<!-- <img width:1920px;height:1080px; id="main_img"> -->
	<div style="position:absolute;width:100%;text-align:center;height:100%;left:0;top:0;z-index:1;">
		<?php $this->output("banner","file"); ?>
		<!--main-body begin-->
		<div class="main-box"> 
			<!--<div style="margin-top:440px;float:right"><img src="tpl/www_mobile/images/Icon.png" width="300"></div>-->
			<div class="zhuti" >
				<div style="width:100%;height:100%;position:relative;margin:0 auto;">
					<div class = "left">
					  <div id="chinaz">
						<div class="banner-btn">
							<a href="javascript:;" class="prevBtn" rel="nofollow"><i></i></a>
							<a href="javascript:;" class="nextBtn" rel="nofollow"><i></i></a>
						</div>
						<ul class="banner-img">
							<?php $list = phpok('picplayer');?>
							<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
							<!-- <li><a href="<?php echo $value['link'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['title'];?>"><img src="images/blank.gif" _src="<?php echo $value['pic']['filename'];?>" alt="<?php echo $value['title'];?>"/></a></li> -->
							<li>
								<img src="<?php echo $value['pic']['filename'];?>" alt="<?php echo $value['title'];?>">
								<a href="<?php echo $value['link'];?>"><p><?php echo $value['title'];?></p></a><span></span>
							</li>
							<?php } ?>

						</ul>
						<ul class="banner-circle">
							<?php $list = phpok('picplayer');?>
							<?php $banner_select = 'selected';?>
							<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
							<li class="<?php echo $banner_select;?>">
							<?php $banner_select = '';?>
								<a href="javascript:;" rel="nofollow">
								<!-- <img src="<?php echo $value['pic']['filename'];?>"> --> <?php echo $value['title'];?></a>
							</li>
							<?php } ?>
							
						</ul>
						<div class="banner-load"></div>
					  </div>
					</div>
					<div class = "center">
					<?php $this->output("index_100010","file"); ?>
					</div>
<!--
					<div class="right">
						<div><a href="/html/chongzhi.html"><img width = "240" src="res/201805/08/a89834ab9607d37b.png"></a></div>
						<div class="icon-contact"><img src="tpl/www_mobile/images/n1_tel.jpg" alt="contact" style="opacity: 1"></div>
					</div>
-->
				</div>
			</div>

		</div>
		<!--main-body end-->

	</div>
</div>
<?php $this->output("foot","file"); ?>


<script type="text/javascript" src="tpl/www_mobile/js/chinaz.js" ></script>

