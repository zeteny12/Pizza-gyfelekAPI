<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
/*

    GET http://localhost/pizzaugyfelekapi/index.php?vevo -> minden vevő lekérdezése
    GET http://localhost/pizzaugyfelekapi/index.php?vevo/{id} -> adott vevő lekérdezése
    POST http://localhost/pizzaugyfelekapi/index.php?vevo -> vevő létrehozása
    PUT http://localhost/pizzaugyfelekapi/index.php?vevo/{id} -> adott vevő módosítása
    DELETE http://localhost/pizzaugyfelekapi/index.php?vevo/{id} -> adott vevő törlése

*/

$urlSzoveg = explode('/', $_SERVER['QUERY_STRING']);
if ($urlSzoveg[0] === "ugyfel") {
    require_once 'ugyfel/index.php';
} else {
    http_response_code(405);
    $errorJson = array("error_message" => 'Nincs ilyen API');
    return json_encode($errorJson);
}
