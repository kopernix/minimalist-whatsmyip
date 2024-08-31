<?php
function ipCheck() {
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    }
    elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    }
    elseif (getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
    }
    elseif (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');
    }
    elseif (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
        // $ip =  $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'; // Debug 
    }    
    return $ip;
}

function main(array $args) : array
{   
    // $ip = $args["ip"] ?? "0.0.0.0"; // Debug
    $ip = ipCheck();

    if (is_null($ip)) {
        $body = "IP: Oops! We couldn't find your IP! The world is ending!";
    } 
    else { 
        $body = "IP: " . $ip; 
    }
  
    return ["body" => $body];
}
