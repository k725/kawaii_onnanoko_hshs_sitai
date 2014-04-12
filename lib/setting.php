<?php
	class Setting {
		const DB_HostName  = 'localhost';
		const DB_UserName  = 'user';
		const DB_Password  = 'password';
		const DB_DBName    = 'testdb';
		const DB_Table     = 'etc_kwhs';
		const DB_Charset   = 'utf8';

		const APIKey       = '';
		const APISecret    = '';
		const CallBack     = 'http://example.com/callback.php';
		const SendText     = 'Hello Twitter #Twitter';

		const jQuery       = '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js';
		const BootStrapCSS = '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css';
		const BootStrapJS  = '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js';

		const CSS          =
<<<'EOT'
	h1, h2, h3, a { font-family: 'Donegal One', serif; }
	body { background-color: #f5f5f5; }
	h4, p { font-family: 'Lucida Grande', Meiryo, sans-serif; }
	.tw-share { margin-top: 10px; }
EOT;
	}