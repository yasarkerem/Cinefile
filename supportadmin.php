<?php
include "config.php";
    $URL = "https://cinefile-cs306-default-rtdb.firebaseio.com/Chats.json";

    header("refresh: 60");
   
    
    $go_back = "./admin.php";
    $myname = "";
    session_start();



    if (isset($_POST['Name'])){
    // Store data in session variables
    $_SESSION["Name"] = $_POST['Name'];
    header("refresh: 0");
    
    }

    else{ 
        $myname = $_SESSION["Name"];
    }
   
    
    function get_messages() { 
        global $URL;
        $ch = curl_init();
        curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                                CURLOPT_POST => FALSE, // It will be a get request 
                                CURLOPT_RETURNTRANSFER => true, ]);
        $response = curl_exec($ch); 
        if(curl_errno($ch))
    {
        echo 'Curl error: ' . curl_error($ch);
    }
        curl_close($ch);
        return json_decode($response, true); 
    }
    
    function send_msg($msg, $name) { 
        global $URL;
        $ch = curl_init();
        $msg_json = new stdClass();
        $msg_json->msg = $msg;
        $msg_json->name = $name;
        $msg_json->time = date('H:i');
        $encoded_json_obj = json_encode($msg_json); 
        curl_setopt_array($ch, array(CURLOPT_URL => $URL,
                                    CURLOPT_POST => TRUE,
                                    CURLOPT_RETURNTRANSFER => TRUE,
                                    CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                    CURLOPT_POSTFIELDS => $encoded_json_obj ));
        $response = curl_exec($ch); 
        if(curl_errno($ch))
        {
            echo 'Curl error: ' . curl_error($ch);
        }
        return $response;
    }

    $msg_res_json = get_messages();
    
  
    if (isset($_POST['usermsg'])) {
        $user_msg = $_POST['usermsg'];
        send_msg($user_msg, "admin");
        header("refresh: 0");
        //echo $user_msg;
    }

?>


<!DOCTYPE html>
<html>
<head>
    
  <link rel="stylesheet" href="styles2.css">
  <title>Support</title>
</head>

<div class="menu">




<?php

echo "
<div class=\"back\"><i class=\"fa fa-chevron-left\"></i> <a href=$go_back><img src=\"https://i.imgur.com/DY6gND0.png\" draggable=\"false\"/></a></div>
<div class=\"name\">Support</div>
<div class=\"last\">18:09</div></div><ol class=\"chat\">";
    $keys = array_keys($msg_res_json);
    for ($i = 0; $i < count($keys); $i++){
        $mychat = false;
        $chat_msg = $msg_res_json[$keys[$i]];
        $name = $chat_msg['name'];
        $msg = $chat_msg['msg'];
        $time = $chat_msg['time'];
        if ($name == 'admin') {
            $from = 'self';
            $mychat = true;
        } else if($name == $myname){
            $from = 'other';
            $mychat = true;

        }
        if($mychat){
       echo  '
       <li class="'.$from.'">
       <div class="avatar">
                <img src="https://i.imgur.com/DY6gND0.png" draggable="false"/>
            </div>
                <div class="msg">
                    <p><b>'.$name.'</b></p>
                    <p>'.$msg.'</p>
                    <time>'.$time.'</time>
                </div>
            </li>';
        }
    }
?>
</ol>
<form name="form" action = "supportadmin.php" method="POST">
    <input name="usermsg" class="textarea" type="text" placeholder="Type here!"/>
    <input type="submit" style="display: none" />
</form>