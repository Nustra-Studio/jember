<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <!-- Favicons -->
  <link href="assets/img/puskesmas1.png" rel="icon">
  <link href="assets/img/puskesmas1.png" rel="logo1-icon">
    <style type="text/css">
        body {
            background-color: #7a58ff;
            font-family: "Segoe UI";
        }
        #wrapper {
            background-color: #fff;
            width: 400px;
            height: 480px;
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border-radius: 4px;
        }
        input[type=text], input[type=password] {
            border: 1px solid #ddd;
            padding: 10px;
            width: 95%;
            border-radius: 2px;
            outline: none;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        label, h1 {
            text-transform: uppercase;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            font-size: 40px;
            color: #7a58ff;
        }
        button {
            border-radius: 2px;
            padding: 10px;
            width: 120px;
            background-color: #7a58ff;
            border: none;
            color: #fff;
            font-weight: bold;
        }
        .error {
            background-color: #f72a68;
            width: 400px;
            height: auto;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border-radius: 4px;
            color: #fff;

        }
    </style>
</head>

<body>
    <h1 align="center">Selamat Datang di Sistem Pemetaan Puskesmas Arjasa</h1>
        <?php
        include "connect.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $u = $_POST['username'];
            $p = $_POST['password'];

            $qCek = mysqli_query($connect, "SELECT * FROM user WHERE username='$u' AND password='$p'");

            if (mysqli_num_rows($qCek) > 0) {
                $d = mysqli_fetch_array($qCek);
                session_start();
                $_SESSION['login'] = 'OK';
                $_SESSION['id'] = $d['id'];
                $_SESSION['username'] = $d['username'];
                $_SESSION['nama'] = $d['nama'];
                $_SESSION['level'] = $d['level'];
                header('Location:admin/beranda');
            } else {
                echo "<center><font color='red'><small>Username / Password Salah!</small></font></center>";
            }
        }
        ?>
        <div id="wrapper">
        <h2 align="center">Selamat Datang di Sistem Pemetaan Arjasa
                <div class="about-img">
              <img src="assets/img/puskesmas1.png" class="img-fluid" alt="" height="90x" width="90x">
            </div>
            <hr>Silahkan Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">&nbsp;</label>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>