<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Acces-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data["name"];
    $ip = $data["ip"];
    $price = $data["price"];
    $startdata = $data["startdata"];
    $enddata = $data["enddata"];
    $specification = $data["specification"];
    $comment = $data["comment"];

    require_once "./config/database.php";

    $query = "INSERT INTO host(name, ip, price, startdata, enddata, specification, comment)
            VALUES ('".$name."', '".$ip."', '".$price."', '".$startdata."', '".$enddata."', '".$specification."', '".$comment."')";

    if(mysqli_query($conn, $query) or die("Insert Query Failed")){
        echo json_encode(array("message" => "Host Inserted Successfully", "status" => true));
    } else {
        echo json_encode(array("message" => "Failed Host Not Inserted", "status" => false));
    }

   
?>