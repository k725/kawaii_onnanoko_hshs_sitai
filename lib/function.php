<?php
	require_once('lib/setting.php');

	function ConnectSQL () {
		return 'mysql:host='.Setting::DB_HostName.'; dbname='.Setting::DB_DBName.'; charset='.Setting::DB_Charset.';';
	}
