<?php
    session_start();
    if(isset($_POST['register'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $url = 'localhost/web-test/api/akses/sign-up.php';

        $ch = curl_init($url);
        $data = array(
            'email' => $email,
            'username' => $username,
            'password' => $password
        );
        $jsonData = json_encode($data);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        $status = $result->hasil;
        if($status == 'berhasil'){

            header('location: ../halaman-login.php');
        }else{
            $_SESSION['regis_msg'] = $result->msg;
            header('location: ../halaman-register.php');
        }
    }    
?>