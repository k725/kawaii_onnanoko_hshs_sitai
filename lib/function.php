<?php
	require_once(dirname(__FILE__).'/setting.php');

	function ConnectSQL () {
		return 'mysql:host='.Setting::DB_HostName.'; dbname='.Setting::DB_DBName.'; charset='.Setting::DB_Charset.';';
	}
