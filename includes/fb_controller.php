<?php
require_once "../class/webstoreclass.php";
require_once "./fb_config.php";

if (!session_id()) {
  session_start();
}

try {
  $accessToken = $handler->getAccessToken();
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
  echo "Response Exception: " . $e->getMessage();
  exit();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
  echo "SDK Exception: " . $e->getMessage();
  exit();
}

if (!$accessToken) {
  header("Location: login.php");
  exit();
}

$oAuth2Client = $FBObject->getOAuth2Client();
if (!$accessToken->isLongLived()) {
  $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
}

$response = $FBObject->get(
  "/me?fields=first_name, last_name, email",
  $accessToken
);
$userData = $response->getGraphNode()->asArray();
$access = "user";
echo $store->insertData([
  "firstName" => $userData["first_name"],
  "lastName" => $userData["last_name"],
  "email" => $userData["email"],
  "access" => $access,
]);

?>
