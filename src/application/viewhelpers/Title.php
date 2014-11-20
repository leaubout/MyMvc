<?php

class Viewhelper_Title{

    private static $title;
    
    public function title($title = null){
        if ($title != null){
            self::$title = $title;
        }
        return self::$title;
    }
    
}
