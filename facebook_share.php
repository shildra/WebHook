<?php
require_once("Facebook/autoload.php"); // set the right path
echo "1_success".PHP_EOL;
$config = array();
$config['app_id'] = '412508542574689';
$config['app_secret'] = 'edc353a12952786b13da926450f9645d';
$config['default_graph_version'] = 'v3.1';
$config['fileUpload'] = false; // optional
echo "2_success".PHP_EOL;
$fb = new \Facebook\Facebook($config);

echo "3_success".PHP_EOL;
$params = array(
    // this is the main access token (facebook profile)
"message" => "Here is a blog post about auto posting on Facebook using PHP #php #facebook",
"link" => "http://www.pontikis.net/blog/auto_post_on_facebook_with_php",
"picture" => "http://i.imgur.com/lHkOsiH.png",
"name" => "How to Auto Post on Facebook with PHP",
"caption" => "www.pontikis.net",
"description" => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
);
echo "4_success".PHP_EOL;
try {
    $ret = $fb->post('/me/feed', $params, "EAAF3LKEloGEBAIWuQSo2AZCIufvxRSFiZCKSKUAzRopgrxrZAVa9uL4YrbqoKTNcsNFjl8IT8ZCJCNamv4VkhaewOmEJWesW3kZClHswuVYq4hxYWWKAmANnKZCxrOwoGyPukUJMZBDKMtBJQWOMKnZBbu3etNIJcJebsaZBgB9wTVvVCdmHzwTcKjY2HGkpB41u5OI39vCH7AgZDZD");
echo 'Successfully posted to Facebook Personal Profile'.PHP_EOL;
} catch(Exception $e) {
    echo $e->getMessage();
}
?>