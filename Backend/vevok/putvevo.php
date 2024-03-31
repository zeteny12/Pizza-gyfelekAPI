<?php
    $putdata = fopen("php://input", "r");
    $raw_data = '';

    while ($chunk = fread($putdata, 1024)) {
        $raw_data .= $chunk;
    }

    fclose($putdata);

    $adatJson = json_decode($raw_data);
    $vazon = $adatJson->vazon;
    $vnev = $adatJson->vnev;
    $vcim = $adatJson->vcim;

    require_once './Backend/database.php';

    $sql = "UPDATE vevo SET vnev=?, vcim=? WHERE vazon=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $vnev, $vcim, $vazon);

    if ($stmt->execute()) {
        http_response_code(201);
        return json_encode(array("message" => 'Sikeresen módosítva a vevo!'));
    } else {
        http_response_code(404);
        return json_encode(array("message" => 'Sikertelen az vevo módosítása!'));
    }