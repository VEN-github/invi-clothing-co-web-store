<?php
    require_once "../facebook_api/autoload.php";

    if (!session_id()) {
        session_start();
    }

    $FBObject = new \Facebook\Facebook([
        'app_id' => "1434862156916414",
        'app_secret' => "2c31725bf069ab6cd587407a3c12b521",
        'default_graph_version' => "v2.10"
    ]);

    $handler = $FBObject->getRedirectLoginHelper();
    
    $redirectTo = "http://localhost/invi-clothing-co-web-store/includes/fb_controller.php";
    $data = ["email"];
    $fb_url = $handler->getLoginUrl($redirectTo, $data);
?>