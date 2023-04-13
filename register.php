<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Web Kesehatan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login">REGISTER</p>
        <?php
        if (isset($_POST['username'])) {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $level = $_POST['level'];
            $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
            if (mysqli_num_rows($cek) == 0) {
                $insert = mysqli_query($koneksi, "INSERT INTO user SET nama = '$nama', username = '$username', password = '$password', level = '$level'");
                if ($insert) {
                    echo "<div class='alert-primary'>Register berhasil! Silahkan login.</div>";
                    echo ("<script>location.href= user.php</script>");
                } else {
                    echo "<div class='alert'>Register gagal!</div>";
                }
            } else {
                echo "<div class='alert'>Username sudah terdaftar!</div>";
            }
        }
        ?>
        <form action="" method="post">
            <label>Nama lengkap</label>
            <input type="text" name="nama" class="form_login" placeholder="nama .." required="required">

            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

            <!-- <label>level</label> -->
            <input type="hidden" name="level" class="form_login" value="user">

            <input type="submit" class="tombol_login" value="REGISTER">

            <br />
            <br />
            <center>
                <a class="link" href="index.php">Login</a>
            </center>
        </form>

    </div>


</body>

</html>