<?php
$accessToken = "EAALIE0kS9xwBAE7uvzQK95LCYG977wVuBk1RyIjZBXg5ZCpKiEWeMIhzrIUdX3NZCSwL45qhbyPPAFZAisVhYPNEHYL4H5ltmZA3L4g1ZBpvZBzwtQek5OS5qh9Y3uyoGmYoR6GYS1ylZAGs9eqQKZAAOjqooHlJvHMxQp79wRHCZAYmGG4qB6Qg7f";
if (isset($_GET["hub_challenge"])) {
    $mode = $_GET["hub_mode"];
    $token = $_GET["hub_verify_token"];
    $challenge = $_GET["hub_challenge"];
} else {
    $mode = null;
    $token = null;
    $challenge = null;
}

if ($mode && $token) {
    if ($mode === "subscribe" && $token === "my_verify_token") {
        http_response_code(200);
        // Respond with the challenge token from the request
        echo $challenge;
    } else {
        http_response_code(403);
    }
} elseif (file_get_contents('php://input')){
    $data = file_get_contents('php://input');
    $sender_id = json_decode($data)->entry[0]->messaging[0]->sender->id;
    $fields = [
        "data" => $data
    ];

    /**
     * NOMBANA FAHENDRENA
     */
    // $url = 'https://trustbotsadmin.herokuapp.com/webhook/TrustBot.php';
    if ($sender_id == 5581177225272044) {
        $url = 'https://trustsbotsadmin.herokuapp.com/webhook/TrustBot.php';
    } 

    /**
     * TOKY
     */

    elseif($sender_id == 5254383124673439){
        $url = 'https://trustbots3.herokuapp.com/webhook/TrustBot.php';
    }

    /**
     * OTHER USERS
     */

    else{
        $url = 'https://trustbot2.herokuapp.com/webhook/TrustBot.php';
    }
    
    $postdata = http_build_query($fields);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_TIMEOUT, 1);
    $result = curl_exec($ch);
    http_response_code(200);
}