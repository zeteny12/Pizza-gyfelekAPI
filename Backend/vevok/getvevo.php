<?php
    $sql = '';

    if (count($urlSzoveg) > 1) {
        
        if (is_int(intval($urlSzoveg[1]))) {
            
            $sql = 'SELECT * FROM vevo WHERE azon=' . $urlSzoveg[1];
        } else {
            http_response_code(404);
            return json_encode(array("error message" => "Nincs ilyen vevo"));
        }
    } else {
        $sql = 'SELECT * FROM vevo WHERE 1';
    }

    require_once './Backend/database.php';

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $vevok[] = $row;
        }
        http_response_code(200);
        return json_encode($vevok);
    } else {
        http_response_code(404);
        return json_encode(array("message" => "Nincs ilyen vevo!"));
    }