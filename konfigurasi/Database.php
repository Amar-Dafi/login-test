<?php
class Database{
    private $host = 'localhost';
    private $db = 'myweb';
    private $user = 'root';
    private $pass = '';
    private $dsn;
    private $koneksi;

    public function kaitkan(){
        $this->koneksi = null;
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';
        try{
            $this->koneksi = new PDO($this->dsn, $this->user, $this->pass);
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'koneksi gagal' . $e->getMessage();
        }
        return $this->koneksi;
    }
}
?>