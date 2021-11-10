<?php
    require_once "../google_api/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("260363476361-1ruq880arjih1jp273jk76crn1js16o4.apps.googleusercontent.com");
    $gClient->setClientSecret("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");
    $gClient->setApplicationName("INVI Clothing Co. Login");
    $gClient->setRedirectUri("http://localhost/invi-clothing-co-web-store/includes/controller.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

    $login_url = $gClient->createAuthUrl();
?>