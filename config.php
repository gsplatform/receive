<?php
/************************************************************
 * System Configuration
 * 		for ITS Japan Road Probe Information System
 * 				作成：2012/11/01　Shindo@CI(ryu@compin.jp)
 * 				更新：
 *
************************************************************/

date_default_timezone_set('Asia/Tokyo');

// mbstring設定
//ob_end_clean();
mb_language('ja');
mb_http_input('auto');
mb_http_output('UTF-8');
mb_internal_encoding('UTF-8');
mb_regex_encoding("UTF-8");

// debug用
 define('DEBUGMODE',true);
//define('DEBUGMODE',false);

// DB設定
define('DBHOSTNAME','localhost');
define('DBNAME','ITSRoadProbe');
define('DBUSERID','ITSRoadProbe');
define('DBPASSWORD','3X5RF26eFVf5Z6hu');

// ログ出力先パス
define('LOG_EXPORT_DIR',__DIR__);

//送信先設定JSON
define('SENDING_URLS_JSON', __DIR__ . DIRECTORY_SEPARATOR . "sending_urls.json");

