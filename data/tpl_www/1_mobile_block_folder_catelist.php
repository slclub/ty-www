<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div class="pfw mb10">
	<h3><?php echo $page_rs['title'];?></h3>
	<?php $rslist=phpok('_arclist','pid='.$page_rs['id'].'&psize=10');?>
	<dl class="catelist">
		<?php $rslist_rslist_id["num"] = 0;$rslist['rslist']=is_array($rslist['rslist']) ? $rslist['rslist'] : array();$rslist_rslist_id["total"] = count($rslist['rslist']);$rslist_rslist_id["index"] = -1;foreach($rslist['rslist'] AS $key=>$value){ $rslist_rslist_id["num"]++;$rslist_rslist_id["index"]++; ?>
		<dt<?php if($value['id'] == $rs['id']){ ?> class="on"<?php } ?>><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></dt>
		<?php } ?>
	</dl>
</div>