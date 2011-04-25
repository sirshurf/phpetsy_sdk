<?php
define ( 'OAUTH_CONSUMER_KEY', 'u54ngbagfgxpdzu3kq4t5j3f' );
define ( 'OAUTH_CONSUMER_SECRET', 'PwZrcFPPZwZu' );

// instantiate the OAuth object
// OAUTH_CONSUMER_KEY and OAUTH_CONSUMER_SECRET are constants holding your key and secret
// and are always used when instantiating the OAuth object 
$oauth = new OAuth ( OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET );

$oauth->setRequestEngine(OAUTH_REQENGINE_CURL);

try{

// make an API request for your request tokens
//$req_token = $oauth->getRequestToken("http://openapi.etsy.com/v2/oauth/request_token", 'oob');
$req_token = $oauth->getRequestToken ( "http://openapi.etsy.com/v2/sandbox/oauth/request_token", 'oob' );

} catch (Exception $e)
{
var_dump($e);
}

// create the Etsy login url
$login_url = sprintf ( "%s?oauth_consumer_key=%s&oauth_token=%s", $req_token ['login_url'], $req_token ['oauth_consumer_key'], $req_token ['oauth_token'] );
print $login_url . "\n";
