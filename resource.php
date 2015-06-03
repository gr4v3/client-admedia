<?php
session_start();
function Debug($content, $die = FALSE) {
    echo '<pre>';
    print_r($content);
    echo '</pre>';  
    if ($die) die();
}
function request($params) {
        $cache = cache_exists($params);
        if ($cache) return $cache;
	$result = curl($params);
        if ($result) {
            $result_decoded = json_decode($result);
            cache_save($result_decoded);
            return $result_decoded;
        } else return FALSE;
}
function curl($params){
    // is cURL installed yet?
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }

    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
    // Now set some options (most are optional)
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, 'http://api-dev.admedia.pt');
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    // Include header in result? (0 = yes, 1 = no)
    //Create And Save Cookies
    $tmpfname = dirname(__FILE__).'/cookie.txt';
    curl_setopt($ch, CURLOPT_COOKIEJAR, $tmpfname);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $tmpfname);	
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    // Should cURL return or print out the data? (true = return, false = print)
    
    //$postdata = http_build_query($params);
    //curl_setopt($ch,CURLOPT_POST, count($params));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $params);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
    // Download the given URL, and return output
    $output = curl_exec($ch);
 
    // Close the cURL resource, and free system resources
    curl_close($ch);
 
    return $output;
}
function cache_save($value = NULL) {
	if (!empty($value)) file_put_contents($value->status->cache_id, json_encode($value));
	return TRUE;
}
function cache_exists($params = NULL) {
	$file = md5($params);
	if (is_file($file)) return json_decode(file_get_contents($file));
	else return FALSE;
	
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (empty($_SESSION['client'])) $page = 'login'; else {
    $client = json_decode($_SESSION['client']);
    $page = 'categories';           
}


if (filter_input(INPUT_POST,'login')) {
    $username = filter_input(INPUT_POST,'username');
    $password = filter_input(INPUT_POST,'password');    
    $client = request("tag=login&username=$username&password=$password&domain=tc");
    if ($client && !empty($client->uid)) {
        $_SESSION['client'] = json_encode($client);
        $page = 'categories';
    }
}

