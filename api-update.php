<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Acces-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);
    
    $id = $data['id'];
    $name = $data["name"];
    $ip = $data["ip"];

    require_once "./config/database.php";

    echo $query = "UPDATE host SET name = '".$name."',
                    ip = '".$ip."'
                    WHERE id='".$id."' ";

    if(mysqli_query($conn, $query) or die("Update Query Failed")){
        echo json_encode(array("message" => "Host Update Successfully", "status" => true));
    } else {
        echo json_encode(array("message" => "Failed Host Not Update", "status" => false));
    }

   
?>