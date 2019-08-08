<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title= $rs['title'].' - '.$cate_rs['title'].' - '.$page_rs['title'];?>
<?php $this->assign("title",$title); ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->assign("css","tpl/www/css/product.css"); ?><?php $this->assign("js","tpl/www/js/jquery.zoombie.js"); ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
function attr_select(id,aid)
{
	$("#attr_"+aid).val(id);
	$("div[name=attr"+aid+"]").each(function(i){
		var tid = $(this).attr('data');
		if(tid == id){
			$(this).addClass("selected");
			//判断价格
			var new_price = $(this).attr("price");
			if(new_price && parseFloat(new_price)>0){
				price = parseFloat(price) + parseFloat(new_price);
				$("#showprice").html(price);
			}
		}else{
			$(this).removeClass('selected');
		}
	});
	var price = '<?php echo $rs['price'];?>';
	$("input[name=attr]").each(function(i){
		var val = $(this).val();
		var newprice = $("div[data="+val+"]").attr("price");
		if(newprice && parseFloat(newprice)>0){
			price = parseFloat(price) + parseFloat(newprice);
		}
	});
	var url = api_url('cart','price_format','price='+$.str.encode(price));
	$.phpok.json(url,function(rs){
		if(rs.status == 'ok'){
			$("#showprice").html(rs.content);
		}
	});
}
$(document).ready(function(){
	//按住鼠标可以查看大图
	$('#product_img .big li').zoombie({on:'grab'});
	$("#product_img").slide({
		'titCell':'.hd li',
		'mainCell':'.big',
		'effect':"fold",
		'autoPlay':true
	});
	$("#minus").click(function(){
		var o = $("#buycount").val();
		if(o<2){
			$.dialog.alert('要购买的数量不能少于1');
			return false;
		}
		o = parseInt(o) - 1;
		$("#buycount").val(o);
	});
	$("#plus").click(function(){
		var o = $("#buycount").val();
		o = parseInt(o) + 1;
		$("#buycount").val(o);
	});
});
</script>
<div class="main product">
	<?php if($page_rs['banner']){ ?>
	<div class="banner"><img src="<?php echo $page_rs['banner']['filename'];?>" alt="<?php echo $page_rs['title'];?>" /></div>
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
		<?php $this->output("block/catelist","file"); ?>
		<?php $this->output("block/contact","file"); ?>
		<?php $this->output("block/hot_article","file"); ?>
	</div>
	<div class="right">
		<div class="pro_left">
			<div class="proimg">
				<div class="product_img" id="product_img">
					<ul class="big">
						<?php if(!$rs['pictures'] && $rs['thumb']){ ?>
						<li><img src="<?php echo $rs['thumb']['gd']['thumb'];?>" _src="<?php echo $rs['thumb']['gd']['auto'];?>" border="0" alt="<?php echo $value['title'];?>" /></li>
						<?php } ?>
					</ul>
					<ul class="hd">
						<?php if(!$rs['pictures'] && $rs['thumb']){ ?>
						<li href="<?php echo $rs['thumb']['gd']['auto'];?>" thumb="<?php echo $rs['thumb']['gd']['thumb'];?>"></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div style="text-align:center;line-height:170%;"><img src="tpl/www/images/zoom.png" /> 鼠标按住图片可看放大效果</div>
			<?php if($config['share']['baidu']){ ?>
			<div style="margin-top:5px;"><?php echo $config['share']['baidu'];?></div>
			<?php } ?>
		</div>
		<div class="info">
			<h1><?php echo $rs['title'];?></h1>
			<ul class="alist">
				<li><em>游戏类型：</em><?php echo $rs['entitle'];?></li>
				<li><em>运营状态：</em><?php echo $rs['fullname'];?></li>
				<li><em>游戏平台：</em><?php echo $rs['note'];?></li>
				<li><em>查看次数：</em><?php echo $rs['hits'];?></li>
				<li><em>添加时间：</em><?php echo date('Y-m-d',$rs['dateline']);?></li>
				
			</ul>
		</div>
		<div class="clear"></div>
		<div class="pro_detail">
			<ul class="pro_title">
				<?php if($rs['content']){ ?><li>商品介绍</li><?php } ?>
			</ul>
			<div class="pro_txt">
				<?php if($rs['content']){ ?><div class="content"><?php echo $rs['content'];?></div><?php } ?>
				
				
			</div>
		</div>
		
	</div>

</div>

<?php $this->output("foot","file"); ?>
