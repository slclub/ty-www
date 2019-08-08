ALTER TABLE `qinggan_cart_product` ADD  `thumb` VARCHAR( 255 ) NOT NULL COMMENT  '缩略图';
ALTER TABLE `qinggan_cart_product` ADD  `is_virtual` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT  '0' COMMENT  '0实物1虚拟或服务';
ALTER TABLE `qinggan_cart_product` ADD  `unit` VARCHAR( 50 ) NOT NULL COMMENT  '单位';
ALTER TABLE `qinggan_list_biz` ADD  `is_virtual` TINYINT( 1 ) NOT NULL DEFAULT  '0' COMMENT  '0实物1虚拟产品';
ALTER TABLE `qinggan_order` ADD  `currency_rate` DECIMAL( 13, 8 ) UNSIGNED NOT NULL DEFAULT  '1' COMMENT  '货币汇率' AFTER  `currency_id`;
ALTER TABLE `qinggan_order` ADD  `status_title` VARCHAR( 255 ) NOT NULL COMMENT  '订单状态说明' AFTER  `status`;
ALTER TABLE `qinggan_order` ADD  `mobile` VARCHAR( 50 ) NOT NULL COMMENT  '手机号，用于短信发送';
ALTER TABLE `qinggan_order_address` ADD  `zipcode` VARCHAR( 50 ) NOT NULL COMMENT  '邮编';
ALTER TABLE `qinggan_order_product` ADD  `note` VARCHAR( 255 ) NOT NULL COMMENT  '备注';
ALTER TABLE `qinggan_order_product` ADD  `is_virtual` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT  '0' COMMENT  '0实物1虚拟或服务';
ALTER TABLE `qinggan_wealth` ADD  `min_val` FLOAT UNSIGNED NOT NULL DEFAULT  '0' COMMENT  '最低使用值';
ALTER TABLE `qinggan_wealth_log` ADD  `rule_id` INT UNSIGNED NOT NULL DEFAULT  '0' COMMENT  '规则ID';
ALTER TABLE `qinggan_wealth_rule` DROP `repeat`, DROP `mintime`, DROP `linkid`, DROP `efunc`;
ALTER TABLE `qinggan_wealth_rule` CHANGE `goal`  `goal` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '目标类型';
ALTER TABLE `qinggan_session` CHANGE  `data`  `data` VARCHAR( 20485 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  'session 内容';

DROP TABLE `qinggan_user_address`, `qinggan_user_invoice`;

DROP TABLE IF EXISTS `qinggan_log`;
CREATE TABLE IF NOT EXISTS `qinggan_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `note` varchar(255) NOT NULL COMMENT '日志摘要',
  `url` varchar(255) NOT NULL COMMENT '请求网址',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行时间',
  `appid` varchar(30) NOT NULL DEFAULT 'www' COMMENT '接入APP_ID',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作人',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='日志记录' AUTO_INCREMENT=1 ;
