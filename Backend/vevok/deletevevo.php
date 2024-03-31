<?php
    $sql = '';

    if (count($urlSzoveg) > 1) {
        
        if (is_int(intval($urlSzoveg[1]))) {
            $sql = 'DELETE FROM vevo WHERE azon=' . $urlSzoveg[1]; 
        }
    } else {
        http_response_code(404);
        return json_encode(array("message" => "Nincs ilyen vevo"));
    }

    require_once './Backend/database.php';

    if ($result = $connection->query($sql)) {
        http_response_code(201);
        return json_encode(array("message" => "A vevo sikeresen törölve!"));
    } else {
        http_response_code(404);
        return json_encode(array("message" => "A vevo törlése sikertelen!"));
    }