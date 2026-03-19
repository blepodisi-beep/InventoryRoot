<?php

$directory = "inventory";
if(@$_REQUEST['dir']){
        $directory = @$_REQUEST['dir'];
}else{
        @$_SESSION['dir'] = $directory;
}


# finding position in the directory tree
        function curPageURL() {
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            }
         return $pageURL;
        }

        $url            = explode("/", @curPageURL());
        $url_length     = count($url) - 1;
                $path   = "./" ;
                for($i=1; $i < $url_length-1; $i++){
                        $path .= "../";
                }
                $_SESSION['path']=$path;

                $sourcedir=$url[$url_length-1];
                $group=$url[$url_length-2];

?>
