<pre>
<?php
	require_once(dirname(__FILE__).'/lib/twitteroauth.php');
	require_once(dirname(__FILE__).'/lib/setting.php');
	require_once(dirname(__FILE__).'/lib/function.php');
	session_start();

	if (!empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret']) && !empty($_REQUEST['oauth_token']) && !empty($_REQUEST['oauth_verifier'])) {
		$pdo = new PDO(ConnectSQL(), Setting::DB_UserName, Setting::DB_Password);
		$twi = new TwitterOAuth(Setting::APIKey, Setting::APISecret, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

		$access_token = $twi->getAccessToken($_REQUEST['oauth_verifier']);

		$user_id = $access_token['user_id'];
		$user_name = $access_token['screen_name'];
		$user_token = $access_token['oauth_token'];
		$user_token_secret = $access_token['oauth_token_secret'];

		$sth = $pdo->prepare('SELECT * FROM `'.Setting::DB_Table.'` WHERE id = :id');
		$sth->bindValue(':id', (int) $user_id, PDO::PARAM_INT);
		$sth->execute();
		while ($row = $sth->fetch()) {
			$db_user_id	= $row['id'];
		}

		if (empty($db_user_id)) {
			$sth = $pdo->prepare('INSERT INTO `'.Setting::DB_Table.'` (id, name, date, access_token, access_token_secret) VALUES (:id, :sn, NULL, :token, :secret)');
			$sth->bindValue(':id', $user_id, PDO::PARAM_INT);
			$sth->bindValue(':sn', $user_name, PDO::PARAM_STR);
			$sth->bindValue(':token', $user_token, PDO::PARAM_STR);
			$sth->bindValue(':secret', $user_token_secret, PDO::PARAM_STR);
			$sth->execute();

			$twi->post('statuses/update', array('status' => Setting::SendText));

			$pdo = null;
			session_destroy();
			header('Location: ./message.php?m=done');
			exit;
		} else {
			$sth = $pdo->prepare('UPDATE `'.Setting::DB_Table.'` SET id = :id, name = :sn, date = NULL, access_token = :token, access_token_secret = :secret WHERE id = :id_s');
			$sth->bindValue(':id', $user_id, PDO::PARAM_INT);
			$sth->bindValue(':sn', $user_name, PDO::PARAM_STR);
			$sth->bindValue(':token', $user_token, PDO::PARAM_STR);
			$sth->bindValue(':secret', $user_token_secret, PDO::PARAM_STR);
			$sth->bindValue(':id_s', $user_id, PDO::PARAM_INT);
			$sth->execute();

			$twi->post('statuses/update', array('status' => Setting::SendText));
			
			$pdo = null;
			session_destroy();
			header('Location: ./message.php?m=double');
			exit;
		}
	} else {
		session_destroy();
		header('Location: ./message.php');
		exit;
	}