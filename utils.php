<?php
// ログ保存
function saveLog($log_level, $log_msg){
	$logfilename = LOG_EXPORT_DIR . "/" . date('Ymd') . ".log";
	$chmod_flg = false;
	if(!(file_exists($logfilename))){
		$chmod_flg = true;
	}
	$exporttime = date('Y-m-d H:i:s');
	$msgtxt = $exporttime . " \t [ " . $log_level . " ] \t " . $log_msg . "\n";
	error_log($msgtxt, 3, $logfilename);
	if($chmod_flg){
		chmod($logfilename,0666);
	}
}


?>