<?php
/**
 * 定义常量，所有PHP文件仅允许从这里入口
 */
define("PHPOK_SET",true);
/**
 * 定义APP_ID，不同APP_ID调用不同的文件
 */
define("APP_ID","www");

/**
 * 定义根目录，如果此项出错，请将定义改成
 *     define("ROOT","./");
 */
define("ROOT",str_replace("\\","/",dirname(__FILE__))."/");

/**
 * 定义框架目录
 */

define("FRAMEWORK",ROOT."framework/");


/**
 * 引入初始化文件
 */
require(FRAMEWORK.'init.php');

?>
