<?php

// FRAMEWORK
ini_set("display_errors",is_file('DEV'));
error_reporting(E_ALL);

define("DOCUMENT_ROOT",dirname(__FILE__));
define("CONTROLLERS_PATH",DOCUMENT_ROOT."/controllers");
define("ASSETS_PATH",DOCUMENT_ROOT."/assets");
define("LIBS_PATH",DOCUMENT_ROOT."/libs");
define("VIEWS_PATH",DOCUMENT_ROOT."/views");
define("MODELS_PATH",DOCUMENT_ROOT."/models");
define("CLASSES_PATH",DOCUMENT_ROOT."/classes");
define("MBPHP_PATH",DOCUMENT_ROOT."/mbphp");
define("CONFIG_PATH",DOCUMENT_ROOT."/config");
define("UPLOADS_PATH",DOCUMENT_ROOT."/uploads");

// **************** //

// SITE WEB

define("PROMO50",false);

define("STRIPE_SK","sk_live_QBrLZC5gjy9LOzF25V060wOU");
define("STRIPE_PK","pk_live_So8oE7ktG4ArUTrtDKxzhfkn");

//define("STRIPE_SK","sk_test_LIVFB9gFTxiNIdBVA1Yjz0bM");
//define("STRIPE_PK","pk_test_nbbxaDKTdpkTiJJ3wFVHrF1R");

define("ACCOUNT_SID", "ACc179be2d2d59cdda0e2d593ed7f2a615");
define("AUTH_TOKEN", "9cd77ec8a367605be9fad31137afed86");

define("SENDGRID_API", "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");

define("DATAFORSEO_LOGIN", "info@lesreseauxmb.ca");
define("DATAFORSEO_PASSWORD", "53810785c4cd0b43");

define("RESELLER_ID_RESELLERCLUB","585590");
define("API_KEY_RESELLERCLUB","LXAqt8u3cCCd9dQUWWaISbiww1Pj0jZH");

define("WEBSITE_NAME"," - Les Réseaux MB - Quebec");
define("DEFAULT_INDEX_VIEW","index");

// **************** //

require_once MBPHP_PATH.'/init.php';

$user = User::getCurrentUser();
// DÉTECTION DE LA LANGUE DANS URL
if($user){
    i18n::$lang = "fr";
} else {
    if(!empty($ROUTER->prefix)){
        i18n::$lang = $_SESSION['lang'] = $ROUTER->prefix;
    } elseif(!empty($_SESSION['lang'])){
        i18n::$lang = $_SESSION['lang'];
    } else {
        i18n::$lang = "fr";
    }
}

if(strpos($ROUTER->view,"v4/") === 0){
    if(!$user){
        header('location: /espace-client');
        exit;
    }
}

if(strpos($ROUTER->view,"/admin/") === 0){
    if(!$user || $user->email != "admin@votrecrm.com"){
        header('location: /espace-client');
        exit;
    }
}

VIEW([
    "USER" => @$user,
    "ROUTER" => @$ROUTER,
]);
