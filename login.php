<?php
	require_once(dirname(__FILE__).'/lib/twitteroauth.php');
	require_once(dirname(__FILE__).'/lib/setting.php');
	
	session_start();
	$tw = new TwitterOAuth(Setting::APIKey, Setting::APISecret);
	$token = $tw->getRequestToken(Setting::CallBack);
	
	if(!empty($token['oauth_token']) && !empty($token['oauth_token_secret'])) {
		$_SESSION['oauth_token'] = $token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $token['oauth_token_secret'];

		header('Location: '.$tw->getAuthorizeURL($_SESSION['oauth_token']));
		exit;
	}

	session_destroy();
	header('Location: ./message.php');
	exit;