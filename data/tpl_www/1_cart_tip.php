<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","购物车"); ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
function checkout()
{
	var url = "<?php echo phpok_url(array('ctrl'=>'cart','func'=>'checkout'));?>";
	direct(url);
}
</script>
<div class="main">
    <div style="height:330px;line-height:330px;font-size:14px;text-align:center;color:#666">您的购物车里没有任何产品！<a href="<?php echo phpok_url(array('id'=>'product'));?>" target="_blank">现在去购买？</a></div>
</div>
<?php $this->output("foot","file"); ?>