<?php
/***********************************************************
	Filename: api.php
	Note	: API接口统一返回JSON数据
	Version : 4.0
	Web		: www.phpok.com
	Author  : qinggan <qinggan@188.com>
	Update  : 2013年10月30日
***********************************************************/
define("PHPOK_SET",true);

define("APP_ID","api");

//定义应用的根目录！（这个不是系统的根目录）本程序将应用目录限制在独立应用下
define("ROOT",str_replace("\\","/",dirname(__FILE__))."/");
//如果程序出程，请将ROOT改为下面这一行
//define("ROOT","./");

//定义框架
define("FRAMEWORK",ROOT."framework/");

require(FRAMEWORK.'init.php');
?>