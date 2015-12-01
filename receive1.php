<?php

    include_once 'import_lib.php';
    include_once 'simple_body_binary.php';

    saveLog("info", "start saving");
    
    /* $dest = dirname(__FILE__) . DIRECTORY_SEPARATOR . "folder1";
*/

    $dest = "/usr/local/rcvdata";
    $f = new BodyBinary($dest);
    $f->save();

    saveLog("info", "end saving");
?>
