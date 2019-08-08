<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file"); ?>
<div class="help">
	<div class="title red">
		<?php echo $rs['title'];?>
		<span class="darkblue i"><?php echo P_Lang("发布时间：");?><?php echo date('Y-m-d H:i:s',$rs['dateline']);?></span>
	</div>
	<?php if($rs['content']){ ?>
	<div class="content"><?php echo phpok_cut($rs['content'],'255','…');?></div>
	<?php } ?>
</div>

<script type="text/javascript">
function comment_reply(id)
{
	if($("#comment_reply_"+id).is(":hidden")){
		$("#comment_reply_"+id).show();
		$("#show_hide_c_"+id).val("隐藏评论的回复");
	}else{
		$("#comment_reply_"+id).hide();
		$("#show_hide_c_"+id).val("显示评论的回复");
	}
}
function to_status(id,status)
{
	var url = get_url("reply","status","id="+id+"&status="+status);
	if(status == 0){
		$.dialog.confirm("确定要关闭这条评论吗，关闭后前台是不会显示的",function(){
			var rs = $.phpok.json(url);
			if(rs.status == "ok"){
				$.phpok.reload();
			}else{
				$.dialog.alert(rs.content);
				return false;
			}
		});
	}else{
		var rs = $.phpok.json(url);
		if(rs.status == "ok"){
			$.phpok.reload();
		}else{
			$.dialog.alert(rs.content);
			return false;
		}
	}
}
function to_delete(id)
{
	$.dialog.confirm("确定要删除ID为：<strong class='red'>"+id+"</strong> 的评论吗?删除后是不能恢复的！<br />如果此评论有回复将一起被删除",function(){
		var url = get_url("reply","delete","id="+id);
		var rs = $.phpok.json(url);
		if(rs.status == "ok"){
			$.phpok.reload();
		}else{
			$.dialog.alert(rs.content);
			return false;
		}
	});
}
function to_edit(id)
{
	var url = get_url("reply","edit","id="+id);
	$.dialog.open(url,{
		title:"<?php echo P_Lang("编辑评论：");?>"+id
		, width:"90%"
		, height:"90%"
		, resize:false
		, lock:true
		, ok:function(){
			var iframe = this.iframe.contentWindow;
			if (!iframe.document.body) {
				alert('iframe还没加载完毕呢');
				return false;
			};
			var status = iframe.save();
			if(status){
				$.dialog.alert('评论信息修改成功',function(){
					$.phpok.reload();
				},'succeed');
			}
			return false;
		},okVal:'<?php echo P_Lang("修改评论");?>'
		,cancel:function(){return true;}
	});
}
function to_reply(id)
{
	var url = get_url("reply","adm","id="+id);
	$.dialog.open(url,{
		title:"<?php echo P_Lang("管理员回复：");?>"+id
		, width:"90%"
		, height:"90%"
		, resize:false
		, lock:true
		, ok:function(){
			var iframe = this.iframe.contentWindow;
			if (!iframe.document.body) {
				alert('<?php echo P_Lang("iframe还没加载完毕呢");?>');
				return false;
			};
			var status = iframe.save();
			if(status){
				$.dialog.alert('<?php echo P_Lang("管理员回复操作成功");?>',function(){
					$.phpok.reload();
				},'succeed');
			}
			return false;
		},okVal:'<?php echo P_Lang("管理员回复");?>'
		,cancel:function(){return true;}
	});
}
</script>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<div class="comment">
	<div class="content" id="tmp_<?php echo $value['id'];?>">
		<span class="red b">ID：<?php echo $value['id'];?> </span><span class="darkblue">评论内容：</span><?php echo $value['content'];?>
		<?php if($value['adm_content']){ ?>
		<fieldset class="adm-reply">
			<legend>管理员回复时间：<?php echo date('Y-m-d',$value['adm_time']);?></legend>
			<?php echo $value['adm_content'];?>
		</fieldset>
		<?php } ?>
	</div>
	<table width="100%">
	<tr>
		<td>
			发布人：
			<?php if($value['uid'] && is_array($value['uid'])){ ?>
			<span class="darkblue b"><?php echo $value['uid']['user'];?></span>
			<?php } else { ?>
			游客
			<?php } ?>
			，IP：<?php echo $value['ip'];?>
			，发布时间：<?php echo date("Y-m-d H:i:s",$value['addtime']);?>
			，星级：<?php echo $value['star'];?>星
		</td>
		<td align="right">
			<div class="button-group">
				<?php if($value['sublist']){ ?>
				<input type="button" value="显示评论的回复" class="phpok-btn" id="show_hide_c_<?php echo $value['id'];?>" onclick="comment_reply(<?php echo $value['id'];?>)" />
				<?php } ?>
				<?php if($value['status']){ ?>
				<input type="button" value="已审核" onclick="to_status(<?php echo $value['id'];?>,0)" class="phpok-btn" />
				<?php } else { ?>
				<input type="button" value="未审核" class="phpok-btn" onclick="to_status(<?php echo $value['id'];?>,1)" style="color:red;" />
				<?php } ?>
				<input type="button" value="管理员回复" onclick="to_reply(<?php echo $value['id'];?>)" class="phpok-btn" />
				<input type="button" value="修改" onclick="to_edit(<?php echo $value['id'];?>)" class="phpok-btn" />
				<input type="button" value="删除" onclick="to_delete(<?php echo $value['id'];?>)" class="phpok-btn" />
			</div>
		</td>
	</tr>
	</table>
</div>
<?php if($value['sublist']){ ?>
<fieldset class="sub_comment hide" id="comment_reply_<?php echo $value['id'];?>">
	<legend>针对该评论的回复</legend>
	<?php $value_sublist_id["num"] = 0;$value['sublist']=is_array($value['sublist']) ? $value['sublist'] : array();$value_sublist_id["total"] = count($value['sublist']);$value_sublist_id["index"] = -1;foreach($value['sublist'] AS $kk=>$vv){ $value_sublist_id["num"]++;$value_sublist_id["index"]++; ?>
		<div class="comment">
			<div class="content cate_<?php echo $value_sublist_id['index']%9;?>" id="tmp_<?php echo $vv['id'];?>">
				<span class="darkblue b">ID：<?php echo $vv['id'];?> 内容：</span><?php echo nl2br($vv['content']);?>
				<?php if($vv['adm_content']){ ?>
				<fieldset class="adm-reply">
					<legend>管理员回复时间：<?php echo date('Y-m-d',$vv['adm_time']);?></legend>
					<?php echo $vv['adm_content'];?>
				</fieldset>
				<?php } ?>
			</div>
			<table width="100%">
			<tr>
				<td>
					发布人：
					<?php if($vv['uid'] && is_array($vv['uid'])){ ?>
					<span class="darkblue b"><?php echo $vv['user'];?></span>
					<?php } else { ?>
					游客
					<?php } ?>
					，IP：<?php echo $vv['ip'];?>
					，发布时间：<?php echo date("Y-m-d H:i:s",$vv['addtime']);?>
					，星级：<?php echo $vv['star'];?>星
				</td>
				<td align="right">
					<div class="button-group">
						<?php if($popedom['status']){ ?>
							<?php if($vv['status']){ ?>
							<input type="button" value="已审核" onclick="to_status(<?php echo $vv['id'];?>,0)" class="phpok-btn" />
							<?php } else { ?>
							<input type="button" value="未审核" class="phpok-btn" onclick="to_status(<?php echo $vv['id'];?>,1)" style="color:red;" />
							<?php } ?>
						<?php } ?>
						<?php if($popedom['reply']){ ?>
						<input type="button" value="管理员回复" onclick="to_reply(<?php echo $vv['id'];?>)" class="phpok-btn" />
						<?php } ?>
						<?php if($popedom['modify']){ ?>
						<input type="button" value="修改" onclick="to_edit(<?php echo $vv['id'];?>)" class="phpok-btn" />
						<?php } ?>
						<?php if($popedom['delete']){ ?>
						<input type="button" value="删除" onclick="to_delete(<?php echo $vv['id'];?>)" class="phpok-btn" />
						<?php } ?>
					</div>
				</td>
			</tr>
			</table>
		</div>
	<?php } ?>
</fieldset>
<?php } ?>
<?php } ?>
<?php $this->output("pagelist","file"); ?>
<?php $this->output("foot_open","file"); ?>