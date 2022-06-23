<?php
// epic get assets from files because i'm tired of getting it from db

try {
if (isset($_GET['version'])) {
$version = $_GET['version'];
}

$id = $_GET['id'];
$ua = $_SERVER['HTTP_USER_AGENT'];

// check client version by UA. NovetusBut2013 = 2013 client and so on

if ($ua == "NovetusBut2013") { // he's using 2013 boys
 $asset = @file_get_contents ('corescripts/' . $id . '.lua');
}else {
 $asset = @file_get_contents ('corescripts/' . $id . '.lua');
}

// gets the asset from the files, if it's not found, then it will 
// redirect to roblox's asset server. (if a version variable is defined on the unexistent file, then it also redirects the version to roblox. ex: packages)
if ($asset === false) {
 if (!isset($version)) {
	 header("Location: https://assetdelivery.roblox.com/v1/asset/?id=$id");
	 exit; 
 }

} if ($asset === false and isset($version)) {
    header("Location: https://assetdelivery.roblox.com/v1/asset/?id=$id&version=$version");
	exit;
 } 

} catch (exception $e) {
	$asset = '';
}
header("content-type: text/plain");
ob_start();

?>
<?php
if ($id == "125749145") {
	$asset = @file_get_contents ('corescripts/' . $id . '.rbxm');
	echo $asset;
} elseif ($id == "125750544") {
	$asset = @file_get_contents ('corescripts/' . $id . '.rbxm');
	echo $asset;
} else {
$data = @file_get_contents ('corescripts/' . $id . '.lua');
$signature;
$key = file_get_contents("3434543254562457.pem");
openssl_sign($data, $signature, $key, OPENSSL_ALGO_SHA1);
echo sprintf("--rbxsig%%%s%%%s", base64_encode($signature), $data);
}
?>