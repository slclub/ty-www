<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript" src="<?php echo add_js('module.js');?>"></script>
<div class="tips">
	<?php if($popedom['set']){ ?>
	<div class="action"><a href="<?php echo admin_url('module','set');?>">添加模块</a></div>
	<?php } ?>
	您当前的位置：
	<a href="<?php echo admin_url('module');?>">模块管理</a>
	&raquo; 模块列表<?php if($rslist){ ?><span class="red">(<?php echo count($rslist);?>)</span><?php } ?>
</div>
<div class="list">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<th class="id">&nbsp;</th>
	<th width="30px">&nbsp;</th>
	<th width="50px">ID</th>
	<th class="lft">名称</th>
	<th>排序</th>
	<th>操作</th>
</tr>
<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
<tr>
	<td class="id"><input type="checkbox" value="<?php echo $value['id'];?>" id="tid_<?php echo $value['id'];?>" checked /></td>
	<td><span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['set']){ ?>onclick="set_status(<?php echo $value['id'];?>)"<?php } else { ?> style="cursor:default"<?php } ?> value="<?php echo $value['status'];?>"></span></td>
	<td align="center"><?php echo $value['id'];?></td>
	<td><label for="tid_<?php echo $value['id'];?>"><?php echo $value['title'];?><?php if($value['note']){ ?><span class="gray i">（<?php echo $value['note'];?>）</span><?php } ?></label></td>
	<td class="center"><input type="text" id="taxis_<?php echo $value['id'];?>" class="short center" value="<?php echo $value['taxis'];?>" tabindex="<?php echo $tmpid['num'];?>" /></td>
	<td>
		<?php if($popedom['set']){ ?>
		<div class="button-group">
			<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'module','func'=>'set','id'=>$value['id']));?>')" class="phpok-btn" />
			<input type="button" value="<?php echo P_Lang("删除");?>" onclick="module_del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="phpok-btn" />
			<input type="button" value="<?php echo P_Lang("字段管理");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'module','func'=>'fields','id'=>$value['id']));?>')" class="phpok-btn" />
			<input type="button" value="<?php echo P_Lang("复制模块");?>" onclick="module_copy('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="phpok-btn" />
			<input type="button" value="<?php echo P_Lang("字段显示");?>" onclick="module_layout('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="phpok-btn" />
		</div>
		<?php } ?>
	</td>
</tr>
<?php } ?>
</table>
</div>
<?php if($rslist){ ?>
<div class="button-group" style="margin:5px 0;">
	<input type="button" value="全选" class="phpok-btn" onclick="$.input.checkbox_all()" />
	<input type="button" value="全不选" class="phpok-btn" onclick="$.input.checkbox_none()" />
	<input type="button" value="反选" class="phpok-btn" onclick="$.input.checkbox_anti()" />
	<input type="button" value="更新排序" class="phpok-btn" onclick="taxis('<?php echo admin_url('module','taxis');?>','255')" />
</div>
<?php } ?>
<?php $this->output("foot","file"); ?>