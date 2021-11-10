<?php
    require_once "../class/webstoreclass.php";
    require_once "../includes/config.php";

    if(isset($_GET["code"])){
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET["code"]);
    }else{
        header("Location: ../dist/login.php");
        exit();
    }

    if(isset($token["error"]) != "invalid_grant"){
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    $access = "user";
    echo $store->insertData(array(
        'firstName' => $userData['givenName'],
        'lastName' => $userData['familyName'],
        'email' => $userData['email'],
        'access' => $access
    ));
    
    }else{
        header("Location: ../dist/login.php");
    }
?>