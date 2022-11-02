<?php

namespace app\controllers;

abstract class AbstractController
{
    
    public static function redirectTo(string $url)
    {
        if (!headers_sent()){
            header("Location: $url");
            exit;
        }else{
            echo "<script>location.href='". $url ."'</script>";
        }
    }

    public static function exceptionHandlerForController()
    {
        echo "Handles exception";
    }

}