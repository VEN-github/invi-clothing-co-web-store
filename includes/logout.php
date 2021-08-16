<?php
require_once "../class/webstoreclass.php";
$store->logout();
header("Location: ../dist/index.php");
?>
