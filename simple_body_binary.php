<?php

    include_once 'import_lib.php';
    
    class BodyBinary {
         
        public $dest_path;
        public $file_name;
               
        function __construct($dest_path, $filename = "") {
            // 書き出し先ディレクトリ
            $this->dest_path = $dest_path;
            $this->file_name = $filename;
        }
        
        function save() {
            $str = file_get_contents("php://input");
            //saveLog("debug", $str);
            
            $fname = $this->dest_path. DIRECTORY_SEPARATOR .date('YmdHis').".zip";
            saveLog("debug", "temp name : $fname");
            
            $fh = fopen($fname, "wb");
            fwrite($fh, $str);
            fclose($fh);
            chmod($fname, 0666);    

            $zip = new ZipArchive();
            $zip->open($fname);
            $unzipedFile = $zip->getNameIndex(0);
            saveLog("debug", "unzip : $unzipedFile");
            
            if(!($zip->extractTo($this->dest_path))){
                saveLog("error", "fail to unzip");
                return false;
            }
            saveLog("debug", "unzip successfull");
            $zip->close();

            $p = pathinfo($unzipedFile);
            $kmz_file = $this->dest_path. DIRECTORY_SEPARATOR .$p['filename'].'.kmz';
            saveLog("debug", "KMZ : $kmz_file");
            $res = $zip->open($kmz_file, ZipArchive::CREATE);
            // zipファイルのオープンに成功した場合
            if ($res === true) {
                $zip->addFile($this->dest_path. DIRECTORY_SEPARATOR .$unzipedFile);
                $zip->close();
                saveLog("info", "zip successful");
            } else {
                saveLog("error", "zip failure");
            }
            
            //ファイル削除
            unlink($fname);
            unlink($this->dest_path."/".$unzipedFile);
        }
    }
?>
