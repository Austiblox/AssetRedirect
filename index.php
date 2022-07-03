<?php 
$redirect_link = "$_SERVER[REQUEST_URI]";
//some easier method(put this file in asset folder)//
header("Location: https://assetdelivery.roblox.com/v1/$redirect_link");
exit();
?>
