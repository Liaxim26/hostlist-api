<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Acces-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data["name"];
    $ip = $data["ip"];

    require_once "./config/database.php";

    $query = "INSERT INTO host(name, ip)
            VALUES ('".$name."', '".$ip."')";

    if(mysqli_query($conn, $query) or die("Insert Query Failed")){
        echo json_encode(array("message" => "Host Inserted Successfully", "status" => true));
    } else {
        echo json_encode(array("message" => "Failed Host Not Inserted", "status" => false));
    }

   
?>