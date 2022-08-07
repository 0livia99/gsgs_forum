<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$table = DB::table('plugin_tx_diylogo');

$sql = <<<EOT
DROP TABLE IF EXISTS `{$table}`;
EOT;

runquery($sql);
$finish = true;
?>
