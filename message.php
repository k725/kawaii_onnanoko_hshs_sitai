<?php
	require_once(dirname(__FILE__).'/lib/setting.php');

	if (!empty($_GET['m'])) {
		switch ($_GET['m']){
		case 'done':
			$title = '登録完了';
			$message = 'Registration is complete!!';
			break;
		case 'double':
			$title = '再登録しました';
			$message = 're-Registration is complete!!';
			break;
		default:
			$title = 'エラー';
			$message = 'Error!! Return to MainPage.';
		}
	} else {
		$title = 'エラー';
		$message = 'Error!! Return to MainPage.';
	}
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="robots" content="noindex,nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php echo $title; ?></title>
		
		<link rel="icon" href="./favicon.ico">
		<link rel="stylesheet" href="<?php echo Setting::BootStrapCSS; ?>">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Donegal+One">
		<style>
			<?php echo Setting::CSS; ?>
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>#kawaii_onnanoko_hshs_sitai</h1>
					<h2>I want to Kunka Kunka a cute girl.</h2>
					<h3><?php echo $message; ?></h3>
					<a href="./" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Return</a>
				</div>
			</div>
		</div>
		<script src="<?php echo Setting::jQuery; ?>"></script>
		<script src="<?php echo Setting::BootStrapJS; ?>"></script>
	</body>
</html>