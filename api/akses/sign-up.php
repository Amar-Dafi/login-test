<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: Application/JSON');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Method');

    include_once '../../konfigurasi/Database.php';
    include_once '../../model/Akses.php';

    $db = new Database();
    $akses = new Akses($db->kaitkan());

    $data = json_decode(file_get_contents("php://input"));
    $email = $data->email;
    $user = $data->username;
    $pass = $data->password;
    print_r($akses->signUp($email, $user, $pass));
?>