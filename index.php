<?php
	require_once(dirname(__FILE__).'/lib/setting.php');
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="k725">
		
		<title>かぁいいおにゃのこはすはすしたい</title>
		
		<link rel="icon" href="favicon.ico">
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
					<a href="#login" class="btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-ok"></i> Login</a>
					<a href="//twitter.com/settings/applications" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Unregist</a>
					<div class="tw-share">
						<a href="//twitter.com/share" class="twitter-share-button">Tweet</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="login" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Login</h4>
					</div>
					<div class="modal-body">
						<h4>使用上の注意</h4>
						<p>このアプリはあなたのTwitterの読み込み/書き込み権限を利用します。<br>
						はすはすしたい方向けです。<br>
						サーバーの不調とかでつぶやけない場合もあります。<br>
						午前2時頃に呟きます。(このアプリの承認時にも呟きます)<br>
						お問い合せは <a href="//twitter.com/_k725">@_k725</a> までどうぞ</p>

						<h4>再登録について</h4>
						<p>以前登録していたデータが残っていた場合はそのデータを変更し再登録します。</p>

						<h4>元ネタ</h4>
						<blockquote class="twitter-tweet" lang="en"><p>かぁいいおにゃのこはすはすしたい <a href="https://twitter.com/search?q=%23kawaii_onnanoko_hshs_sitai&amp;src=hash">#kawaii_onnanoko_hshs_sitai</a></p>&mdash; まく (@maku693) <a href="https://twitter.com/maku693/statuses/339216635175002113">May 28, 2013</a></blockquote>
					</div>
					<div class="modal-footer">
						<a class="btn btn-primary" href="./login.php"><span class="glyphicon glyphicon-ok"></span> Login</a>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo Setting::jQuery; ?>"></script>
		<script src="<?php echo Setting::BootStrapJS; ?>"></script>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</body>
</html>