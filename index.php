<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    
    require_once "./config/database.php";

    $query = 'SELECT * FROM host';

    $result = mysqli_query($conn, $query) or die("Select Query Failed.");

    $count = mysqli_num_rows($result);

    if($count > 0){
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($row);
    } else {
        // echo json_encode(array("message" => "No Product Found.", "status" => false));
    }
    
    $text = 'vova privet';
    $token = "5200988206:AAGCzpwnt-XER8DFpQ4Ddxjmf3MjFzwrxOQ";
    // bot_send(803988456, $text, $token);


    function bot_send($chat_id, $mess, $token)
    {
     $url = "https://api.telegram.org/bot$token/sendmessage?&parse_mode=Markdown&chat_id=$chat_id&text=".urlencode($mess);
     return file_get_contents($url,0);
    }
?>