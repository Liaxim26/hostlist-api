<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Acces-Control-Allow-Methods, Authorization");

    echo (file_get_contents("php://input"));

    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data["name"];
    $ip = $data["ip"];
    $price = $data["price"];
    $lastPaymentDate = $data["lastPaymentDate"] ?? 'NULL';
    $nextPaymentDate = $data["nextPaymentDate"] ?? 'NULL';
    $specification = $data["specification"];
    $comment = $data["comment"];

    require_once "./config/database.php";

    $query = "INSERT INTO host(name, ip, price, lastPaymentDate, nextPaymentDate, specification, comment)
            VALUES ('".$name."', '".$ip."', ".$price.", '".$lastPaymentDate."', '".$nextPaymentDate."', '".$specification."', '".$comment."')";
    echo ($data);
    if(mysqli_query($conn, $query) or die("Delete Query Failed")){
        echo json_encode(array("message" => "Host Inserted Successfully", "status" => true));
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Failed Host Not Inserted", "status" => false));
    }

   
?>