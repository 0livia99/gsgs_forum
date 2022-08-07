<?php
if(!defined('IN_DISCUZ')) {
	exit('Access denied');
}

$table = DB::table('plugin_tx_diylogo');

$sql = <<<EOT
CREATE TABLE IF NOT EXISTS `{$table}` (
`id` SMALLINT( 6 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`url` VARCHAR( 225 ) NOT NULL ,
`dateline` INT( 10 ) NOT NULL
) ENGINE = MYISAM ;
EOT;

runquery($sql);
$finish = true;

?>
