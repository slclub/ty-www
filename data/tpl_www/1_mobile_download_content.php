<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$cate_rs['title'].' - '.$page_rs['title'];?>
<?php $this->assign("title",$title); ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div class="main">
	<?php if($page_rs['banner']){ ?>
	<div class="banner"><img src="<?php echo $page_rs['banner']['filename'];?>" width="980" alt="<?php echo $title;?>" /></div>
	<?php } ?>
	<ol class="breadcrumb">
		<li>您现在的位置：<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a></li>
		<li><a href="<?php echo $page_rs['url'];?>" title="<?php echo $page_rs['title'];?>"><?php echo $page_rs['title'];?></a></li>
		<?php if($cate_parent_rs){ ?>
		<li><a href="<?php echo $cate_parent_rs['url'];?>" title="<?php echo $cate_parent_rs['title'];?>"><?php echo $cate_parent_rs['title'];?></a></li>
		<?php } ?>
		<?php if($cate_rs){ ?>
		<li><a href="<?php echo $cate_rs['url'];?>" title="<?php echo $cate_rs['title'];?>"><?php echo $cate_rs['title'];?></a></li>
		<?php } ?>
		<li><?php echo $rs['title'];?></li>
	</ol>
	<div class="left">
		<?php $this->assign("pid",$page_rs['id']); ?><?php $this->assign("cid",$cate_rs['id']); ?><?php $this->assign("title",$page_rs['title']); ?><?php $this->output("block/catelist","file"); ?>
		<?php $this->output("block/contact","file"); ?>
		<?php $this->output("block/hot_article","file"); ?>
	</div>
	<div class="right">
		<div class="softAbs">
			<div class="soft_img"><img src="<?php echo $rs['thumb']['gd']['auto'];?>" alt="<?php echo $rs['title'];?>" width="100%" /></div>
			<div class="info">
				<div class="title"><?php echo $rs['title'];?></div>
				<?php if($rs['fsize']){ ?>
				<div class="attr"><span>软件大小：</span><?php echo $rs['fsize'];?></div>
				<?php } ?>
				<?php if($rs['version']){ ?>
				<div class="attr"><span>软件版本：</span><?php echo $rs['version'];?></div>
				<?php } ?>
				<?php if($rs['platform']){ ?>
				<div class="attr"><span>支持平台：</span><?php echo $rs['platform'];?></div>
				<?php } ?>
				<?php if($rs['devlang']){ ?>
				<div class="attr"><span>运行环境：</span><?php echo $rs['devlang'];?></div>
				<?php } ?>
				<?php if($rs['copyright']){ ?>
				<div class="attr"><span>授权方式：</span><?php echo $rs['copyright'];?></div>
				<?php } ?>
				<?php if($rs['author']){ ?>
				<div class="attr"><span>开发作者：</span><?php echo $rs['author'];?><?php if($rs['website']){ ?> <a href="<?php echo $rs['website'];?>" target="_blank" class="red" title="访问<?php echo $rs['author'];?>">访问官网</a><?php } ?></div>
				<?php } ?>
				<p>
					<input type="button" class="downbtn" value="点击下载" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'download','id'=>$rs['dfile']['id']));?>')" />
				</p>
			</div>
			<div class="cl"></div>
		</div>
		<div class="pfw mt10">
			<h3>内容介绍</h3>
			<div class="content"><?php echo $rs['content'];?></div>
		</div>
	</div>
</div>
<?php $this->output("foot","file"); ?>