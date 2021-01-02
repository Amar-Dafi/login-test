<?php
class Akses{
    private $tabel = 'user';
    private $koneksi;
    private $signUpRes;
    private $signInRes;

    public $email;
    public $username;
    public $password;

    public function __construct($db){
        $this->koneksi = $db;
    }
    public function signUp($email, $user, $pass){
        $this->email = $email;
        $this->username = $user;
        $this->password = $pass;

        $qCekEmail = "SELECT * FROM $this->tabel WHERE email='$this->email'";
        $cekEmail = $this->koneksi->prepare($qCekEmail);
        $cekEmail->execute();
        $jumlahEmail = $cekEmail->rowCount();

        if ($jumlahEmail > 0) {
            $this->signUpRes = json_encode(array(
                'hasil' => 'gagal',
                'msg' => 'email telah digunakan'
            ));
        } else {
            $qCekUser = "SELECT * FROM $this->tabel WHERE username='$this->username'";
            $cekUser = $this->koneksi->prepare($qCekUser);
            $cekUser->execute();
            $jumlahUser = $cekUser->rowCount();
            if ($jumlahUser > 0) {
                $this->signUpRes = json_encode(
                    array(
                    'hasil' => 'gagal',
                    'msg' => 'username telah digunakan'
                )
            );
            } else {
                $qAddNewUser = "INSERT INTO $this->tabel(email, username, password)
                                    VALUE ('$this->email', '$this->username','$this->password')";
                $addNewUser = $this->koneksi->prepare($qAddNewUser);
                if ($addNewUser->execute()) {
                    $this->signUpRes = json_encode(array(
                        'hasil' => 'berhasil',
                        'msg' => 'selamat anda telah terdaftar'
                    ));
                } else {
                    $this->signUpRes = json_encode(array(
                        'hasil' => 'gagal',
                        'msg' => 'kesalahan tidak terduga, mohon coba lagi'
                    ));
                }
            }
        }
        return $this->signUpRes;
    }
    public function signIn($email, $user, $pass){
        $this->email = $email;
        $this->username = $user;
        $this->password = $pass;

        $qCekEmail = "SELECT * FROM $this->tabel WHERE email='$this->email'";
        $cekEmail = $this->koneksi->prepare($qCekEmail);
        $cekEmail->execute();
        $jumlahEmail = $cekEmail->rowCount();
        
        if($jumlahEmail > 0){
            $row = $cekEmail->fetch(PDO::FETCH_ASSOC);
            if($row['password'] == $this->password){
                $this->signInRes = json_encode(array(
                    'hasil' => 'berhasil',
                    'user' => $row['username']
                ));           
            }else{
                $this->signInRes = json_encode(array(
                    'hasil' => 'gagal',
                    'msg' => 'password salah'
                ));
            }
        }else{
            $qCekUser = "SELECT * FROM $this->tabel WHERE username='$this->username'";
            $cekUser = $this->koneksi->prepare($qCekUser);
            $cekUser->execute();
            $jumlahUser = $cekUser->rowCount();
            if ($jumlahUser > 0) {
                $row = $cekUser->fetch(PDO::FETCH_ASSOC);
                if($row['password'] == $this->password){
                    $this->signInRes = json_encode(array(
                        'hasil' => 'berhasil',
                        'user' => $row['username']
                        ));           
                }else{
                    $this->signInRes = json_encode(array(
                        'hasil' => 'gagal',
                        'msg' => 'password salah'
                    ));
                }
            }else{
                $this->signInRes = json_encode(array(
                    'hasil' => 'gagal',
                    'msg' => 'email atau username tidak terdaftar'
                ));
            }          
        }
        return $this->signInRes;
    }
}
