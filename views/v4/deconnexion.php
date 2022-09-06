<?php

session_start();
session_unset();
session_destroy();

if($_SESSION['lang'] == "fr"){
    header('location: /espace-client');
} else {
    header('location: /client-area');
}
exit;