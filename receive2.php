<?php

    include_once 'import_lib.php';
    include_once 'simple_body_binary.php';
    
    saveLog("info", "start saving");
    
    $dest = dirname(__FILE__) . DIRECTORY_SEPARATOR . "folder2";
    $f = new BodyBinary($dest);
    $f->save();

    saveLog("info", "end saving");    
?>
