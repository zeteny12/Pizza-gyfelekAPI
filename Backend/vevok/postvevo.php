<?php
    $vazon = $_POST['vazon'];
    $vnev = $_POST['vnev'];
    $vcim = $_POST['vcim'];

    require_once './Backend/database.php';

    $sql = "INSERT INTO pizza (vazon, vnev, vcim) VALUES (NULL, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $vnev, $vcim);   

    if ($stmt->execute()) {
        http_response_code(201);
        return json_encode(array("message" => "Vevo sikeresen hozzáadva"));
    } else {
        http_response_code(404);
        return json_encode(array("message" => "Vevo hozzáadása sikertelen"));
    }