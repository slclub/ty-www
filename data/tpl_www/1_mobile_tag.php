<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = "Tag:".$rs['title'];?>
<?php $this->assign("title",$title); ?><?php $this->output("head","file"); ?>
<div class="wrap mb10">
	<div class="page_left">
		<?php $this->output("block_contactus","file"); ?>
	</div>
	<div class="page_right">
		<div class="page_right_title">
			<span class="breadcrumbs">
				您现在的位置：
				<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a>
				<span class="arrow">&nbsp;</span> <a href="<?php echo phpok_url(array('ctrl'=>'tag','title'=>$rs['title']));?>" title="Tag：<?php echo $rs['title'];?>">Tag：<span class="red"><?php echo $rs['title'];?></span></a>
			</span>
			Tag
		</div>
		<ul class="news_list">
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<li>
				<?php if($value['thumb']){ ?>
				<span class="n-img"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" /></a></span>
				<?php } ?>
				<h3><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></h3>
				<div class="n-txt">
					<?php echo $value['note'] ? phpok_cut($value['note'],225,'…') : phpok_cut($value['content'],225,'…');?>
					<span class="more">[<a href="<?php echo $value['url'];?>" title="查看<?php echo $value['title'];?>详细信息">查看更多</a>]</span>
				</div>
			</li>
			<?php } ?>
		</ul>
		<?php $this->output("block_pagelist","file"); ?>
	</div>
	<div class="cl"></div>
</div>
<?php $this->output("foot","file"); ?>