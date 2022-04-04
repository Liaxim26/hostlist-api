<?php 
    $text = 'test cron';
    $token = "5200988206:AAGCzpwnt-XER8DFpQ4Ddxjmf3MjFzwrxOQ";
    
    //bot_send(803988456, $text, $token);


    function bot_send($chat_id, $mess, $token)
    {
     $url = "https://api.telegram.org/bot$token/sendmessage?&parse_mode=Markdown&chat_id=$chat_id&text=".urlencode($mess);
     return file_get_contents($url,0);
    }
?>