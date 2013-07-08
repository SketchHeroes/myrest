<?php

/**
 * Send a POST requst using cURL
 * @param string $url to request
 * @param array $post values to send
 * @param array $options for cURL
 * @return string
 */
function curl_post($url, array $post = NULL, array $options = array())
{
    $defaults = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_POSTFIELDS => http_build_query($post)
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

/**
 * Send a GET requst using cURL
 * @param string $url to request
 * @param array $get values to send
 * @param array $options for cURL
 * @return string
 */
function curl_get($url, array $get = NULL, array $options = array())
{   
    $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
    );
   
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

/*

//extract data from the post
extract($_POST);

//set POST variables
$url = 'http://domain.com/get-post.php';
$fields = array(
                'lname' => urlencode($last_name),
                'fname' => urlencode($first_name),
                'title' => urlencode($title),
                'company' => urlencode($institution),
                'age' => urlencode($age),
                'email' => urlencode($email),
                'phone' => urlencode($phone)
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
 * 
 */

$ch = curl_init('http://localhost/myrest/user/');

$fields = array(
                'user' => urlencode("Michael"),
                'pass' => urlencode("Chekin"),
                'pass2' => urlencode("Chekin2")
				);
$fields_string='';

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');


curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

//echo $fields_string."<br />";


$response = curl_exec($ch);

$events = json_decode($response,1);

echo $response."<br />";

$ch = curl_init('http://localhost/myrest/user?user=mishak');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);

echo "<br />";
echo $response."<br />";
/*
$url = 'http://localhost/myrest/user/';

echo "<br />";

$response = curl_get($url, $fields);
echo $response."<br />";;
 * 
 */

?>


<form name="input" action="user/" method="post">
Username: <input type="text" name="user" value="Mishka"><br />
Password: <input type="text" name="pass" value="Chekin"><br />
Repeat Password: <input type="text" name="pass2"  value="Chekin2"><br />
<input type="submit" value="Submit"><br />
</form> 


