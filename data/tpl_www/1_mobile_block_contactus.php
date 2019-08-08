<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><dl class="page_contact">
	<dt>联系我们</dt>
	<?php $contactus = phpok('contactus');?>
	<dd>
		<b><?php echo $contactus['company'];?></b>
		<div>地址：<?php echo $contactus['address'];?></div>
		<div>Email：<?php echo $contactus['email'];?></div>
		<div>邮编：<?php echo $contactus['zipcode'];?></div>
		<div>电话：<?php echo $contactus['tel'];?></div>
		<div>联系人：<?php echo $contactus['fullname'];?></div>
	</dd>
</dl>