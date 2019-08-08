<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript" src="<?php echo add_js('order.js');?>"></script>
<script type="text/javascript" src="js/laydate/laydate.js"></script>
<script type="text/javascript">
function www_show(sn,passwd)
{
	var url = "<?php echo $sys['url'];?><?php echo $sys['www_file'];?>?<?php echo $sys['ctrl_id'];?>=order&<?php echo $sys['func_id'];?>=info";
	url += "&sn="+sn+"&passwd="+passwd;
	window.open(url);
}
function update_keywords(val){
	if(val == 'time'){
		$("#keywords").bind("focus",function(){
			laydate();
		}).val('');
	}else{
		$("#keywords").unbind('focus').val('');
	}
}
$(document).ready(function(){
	$(".status").each(function(){
		if($(this).text() == '未审核'){
			$(this).addClass('darkblue');
		}
	});
	$(".pay_status").each(function(){
		if($(this).text() == '未付款'){
			$(this).addClass('red');
		}
	});
	top.$.desktop.title('订单管理');
});
</script>
<div class="tips">
	<table width="100%" cellpadding="0" cellspacing="0" height="100%">
	<tr>
		<td>&raquo; <a href="<?php echo phpok_url(array('ctrl'=>'order'));?>" title="">订单列表</a></td>
		<td>
		</td>
		<td align="right">
			<div class="action"><a href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'set'));?>">创建新订单</a></div>
		</div>
	</tr>
	</table>
</div>
<div class="tips">
	<form method="post" action="<?php echo admin_url('order');?>">
	<div style="float:left;width:800px;">
		<div><table>
		<tr>
			
			<td>
				<select name="status">
				<option value="">订单状态…</option>
				<?php $tmpid["num"] = 0;$statuslist=is_array($statuslist) ? $statuslist : array();$tmpid["total"] = count($statuslist);$tmpid["index"] = -1;foreach($statuslist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $key;?>"<?php if($key == $status){ ?> selected<?php } ?>><?php echo $value;?></option>
				<?php } ?>
				</select>
			</td>
			
			<td>&nbsp; &nbsp;<?php echo P_Lang("时间：");?></td>
			<td><input type="text" name="date_start" value="<?php echo $date_start;?>" placeholder="开始时间" onfocus="laydate()" style="width:110px;" /></td>
			<td><?php echo P_Lang("至");?></td>
			<td><input type="text" name="date_stop" value="<?php echo $date_stop;?>" placeholder="结束时间" onfocus="laydate()" style="width:110px;" /></td>
			<td>&nbsp; &nbsp;<?php echo P_Lang("价格：");?></td>
			<td><input type="text" name="price_min" value="<?php echo $price_min;?>" placeholder="最低价格" style="width:110px;" /></td>
			<td><?php echo P_Lang("至");?></td>
			<td><input type="text" name="price_max" value="<?php echo $price_max;?>" placeholder="最高价格" style="width:110px;" /></td>
			
			
		</tr>
		</table></div>
		<table>
		<tr>
			<?php if($paylist){ ?>
			<td>
				<select name="paytype" >
				<option value="">支付方式…</option>
				<optgroup label="PC端">
					<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<?php if(!$value['wap']){ ?>
					<option value="<?php echo $value['id'];?>"<?php if($paytype == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
					<?php } ?>
				</optgroup>
				<optgroup label="手机端">
					<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<?php if($value['wap']){ ?>
					<option value="<?php echo $value['id'];?>"<?php if($paytype == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
					<?php } ?>
				</optgroup>
				</select>
			</td>
			<?php } ?>
			<td>
				<select name="keytype" onchange="update_keywords(this.value)">
				<option value="">检索类型…</option>
				<option value="sn"<?php if($keytype == 'sn'){ ?> selected<?php } ?>><?php echo P_Lang("订单编号");?></option>
				<option value="user"<?php if($keytype == 'user'){ ?> selected<?php } ?>><?php echo P_Lang("会员账号");?></option>
				<option value="email"<?php if($keytype == 'email'){ ?> selected<?php } ?>><?php echo P_Lang("订单邮箱");?></option>
				<option value="protitle"<?php if($keytype == 'protitle'){ ?> selected<?php } ?>><?php echo P_Lang("产品名称");?></option>
				</select>
			</td>
			<td><input type="text" id="keywords" name="keywords" class="default" value="<?php echo $keywords;?>"<?php if($keytype == 'time'){ ?> onfocus="laydate()"<?php } ?> /></td>
		</tr>
		</table>
	</div>
	<div style="float:left;width:20%;margin-top:25px;"><input type="submit" value="提交搜索" class="submit2" /></div>
	</form>
	<div class="clear"></div>
</div>

<table width="100%" class="list" cellpadding="0" cellspacing="0">
<tr>
	<th width="70px">ID</th>
	<th class="lft">&nbsp;编号</th>
	<th class="lft">&nbsp;会员</th>
	<th class="lft">&nbsp;金额</th>
	<th class="lft">&nbsp;实付</th>
	<th>状态</th>
	<th class="lft">&nbsp;支付方式</th>
	<th width="130px">付款时间</th>
	<th width="130px">创建时间</th>
	<th width="198px">操作</th>
</tr>
<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>

<tr>
	<td align="center"<?php if($value['pay_status'] == 'PAID'){ ?> rowspan="2"<?php } ?>><?php echo $value['id'];?></td>
	<td><?php echo $value['sn'];?></td>
	<td><?php echo $value['user'];?></td>
	<td><?php echo price_format($value['price'],$value['currency_id'],$value['currency_id']);?></td>
	<td><?php if($value['pay_price'] && $value['pay_dateline'] && $value['pay_title']){ ?><span class="darkblue"><?php echo price_format($value['pay_price'],$value['currency_id'],$value['currency_id']);?></span><?php } else { ?>-<?php } ?></td>
	<td align="center" class="status"><?php echo $statuslist[$value['status']] ? $statuslist[$value['status']] : $value['status'];?></td>
	<td><?php echo $value['pay_title'] ? $value['pay_title'] : '-';?></td>
	<td align="center"><?php if($value['pay_dateline']){ ?><?php echo date('Y-m-d H:i',$value['pay_dateline']);?><?php } else { ?>-<?php } ?></td>
	<td align="center"><?php echo date('Y-m-d H:i',$value['addtime']);?></td>
	<td align="center">
		<div class="button-group">
			<input type="button" value="<?php echo P_Lang("查看");?>" onclick="www_show('<?php echo $value['sn'];?>','<?php echo $value['passwd'];?>')" class="phpok-btn" />
			<input type="button" value="快递" onclick="order_express(<?php echo $value['id'];?>,'<?php echo $value['sn'];?>')" class="phpok-btn" />
			<?php if($popedom['modify']){ ?>
			<input type="button" value="编辑" onclick="order_edit(<?php echo $value['id'];?>)" class="phpok-btn" />
			<?php } ?>
			<?php if($popedom['delete']){ ?>
			<input type="button" value="<?php echo P_Lang("删除");?>" onclick="order_delete(<?php echo $value['id'];?>,'<?php echo $value['sn'];?>')" class="phpok-btn" />
			<?php } ?>
		</div>
	</td>
</tr>
<?php } ?>
</table>
<?php $this->output("pagelist","file"); ?>

<?php $this->output("foot","file"); ?>