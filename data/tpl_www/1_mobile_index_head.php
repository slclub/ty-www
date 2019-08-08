<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $cssfile = $css ? "tpl/www_mobile/css/index_style.css,artdialog.css,chinaz.css".$css : "tpl/www_mobile/css/index_style.css,artdialog.css,chinaz.css";?>
<?php $jsfile = $js ? "tpl/www_mobile/js/global.js".$js : "tpl/www_mobile/js/global.js";?>
<?php echo tpl_head(array('title'=>$title,'css'=>$cssfile,'extjs'=>"jquery.artdialog.js",'js'=>$jsfile,'html5'=>"true"));?>
