<?php
    session_start();
    if(isset($_POST['masuk'])){
        $EoU = $_POST['email_or_username'];
        $password = $_POST['password'];

        $url = 'localhost/web-test/api/akses/sign-in.php';

        $ch = curl_init($url);
        $data = array(
            'email_or_username' => $EoU,
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
            $username = $result->user;
            $_SESSION['username'] = $username;
            header('location: ../halaman-utama.php');
        }else{
            $_SESSION['login_msg'] = ucwords($result->msg);
            header('location: ../halaman-login.php');
        }
    }
?>