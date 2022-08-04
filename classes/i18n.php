<?php

class i18n {
    public static $lang;
}

function __($fr,$en){
    switch(i18n::$lang){
        default:
        case "en" : return $en;
        case "fr" : return $fr;
    }
}
