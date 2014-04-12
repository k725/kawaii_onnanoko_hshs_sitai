<?php
	require_once(dirname(__FILE__).'/lib/twitteroauth.php');
	require_once(dirname(__FILE__).'/lib/setting.php');
	require_once(dirname(__FILE__).'/lib/function.php');

	$pdo = new PDO(ConnectSQL(), Setting::DB_UserName, Setting::DB_Password);
	foreach ($pdo->query('SELECT * FROM `'.Setting::DB_Table.'` ORDER BY `id`') as $row) {
		$db_user_id[] = $row['id'];
		$db_user_token[] = $row['access_token'];
		$db_user_token_secret[] = $row['access_token_secret'];
	}
	
	for ($i = 0; $i < count($db_user_token); $i++) {
		$twi = new TwitterOAuth(Setting::APIKey, Setting::APISecret, $db_user_token[$i], $db_user_token_secret[$i]);
		$twi->post('statuses/update', array('status' => Setting::SendText));

		// 200 -> 正常
		// 401 -> 認証解除
		// 403 -> 同じツイット
		if ($twi->http_info['http_code'] === 401) {
			$sth = $pdo->prepare('DELETE FROM `'.Setting::DB_Table.'` WHERE id = :id');
			$sth->bindValue(':id', (int) $db_user_id[$i], PDO::PARAM_INT);
			$sth->execute();
		}
	}

	$pdo = null;