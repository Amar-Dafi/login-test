<?php
$page_title = 'Halaman Login';
include_once 'includes/login-register-header.php';
?>
<div class="container" style="width:400px;">
    <div class="border rounded px-0 mt-3">
        <p class="h3 p-2 text-center">Sign-In</p>
        <form action="proses/proses-login.php" method="post">
            <div class="form-group mx-3">
                <?php echo !empty($_SESSION['login_msg']) ? '<p class="bg-danger text-white text-center">' . $_SESSION['login_msg'] . '</p>' : '<p class="bg-white text-white">:v</p>'; ?>
                <label>EMAIL ATAU USERNAME :</label>
                <input class="form-control" type="text" name="email_or_username"><br>
                <label>PASSWORD :</label><br>
                <input class="form-control" type="password" name="password"><br>
                <input class="form-control btn-dark rounded" type="submit" name="masuk" value="Sign-In">
                <p class="text-right"><a href="halaman-forgot-password.php">Lupa Password?</a></p>
                <p class="m-2 text-center">Belum punya akun? <a href="halaman-register.php">Daftar</a></p>
            </div>
        </form>
    </div>
</div>