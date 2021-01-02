<?php
$page_title = 'Halaman Registrasi'; 
include_once 'includes/login-register-header.php' 
?>
    <div class="container">
        <div class="border rounded px-0 mt-3 mx-auto" style="width:400px">
            <p class="h3 p-2 text-center">Sign-Up<p>
            <form action="proses/proses-register.php" method="post">
                <div class="form-group mx-3">
                    <?php echo !empty($_SESSION['regis_msg']) ? '<p class="bg-danger text-white text-center">' . $_SESSION['regis_msg'] . '</p>' : '<p class="bg-white text-white">:v</p>'; ?>
                    <br><label>EMAIL : </label>
                    <input class="form-control" type="email" name="email">
                    <br><label>USERNAME : </label>
                    <input class="form-control" type="text" name="username">
                    <br><label>PASSWORD : </label>
                    <input class="form-control" type="password" name="password">
                    <br><input class="form-control btn btn-dark" type="submit" name="register" value="Sign-Up">
                    <p class="m-2 text-center">Sudah Punya Akun? <a href="halaman-login.php">Masuk</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>