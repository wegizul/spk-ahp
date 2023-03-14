<?php
error_reporting(1);

ob_start();
session_start();

$koneksi = new mysqli("localhost", "root", "", "bappeda_ahp");

if ($_SESSION['admin'] || $_SESSION['user']) {

  header("location:?page=index");
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="img/logo1.png" />
    <title>BAPPEDA | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Bootstrap -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/plugins/nprogress/nprogress.css">
    <link rel="stylesheet" href="assets/plugins/build/css/custom.min.css">
    <style type="text/css">
      body {
        background-image: url('img/alog1.jpg');
        background-size: 100%;
      }

      .login-page {
        width: 400px;
        margin: 45px auto;
        border-radius: 10px;
      }

      .form {
        z-index: 1;
        background: rgba(255, 255, 255);
        max-width: 400px;
        padding: 35px;
        text-align: center;
        border-radius: 10px;
      }

      h1,
      a,
      p {
        color: #000;
      }
    </style>
  </head>

  <body>
    <div>
      <div class="login-page">
        <div class="form">
          <img src="img/logo1.png" width="80px">
          <h3 style="color: #555; font-weight: bold; padding-top: 50px;">Silahkan Login
          </h3>
          <section class="login_content" style="padding-top: 0px;">
            <form action="login.php" method="post">
              <div class="col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="username" name="username" placeholder="Username" style="margin-bottom: 5px;">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-xs-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="password" name="password" placeholder="Password" required>
                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div>
                <button class="btn btn-primary" style="width: 94%; margin-bottom: 30px; margin-left: 5px; background-color: #0033aa; border-radius: 20px; height: 40px; font-size: 15px;" type="submit" name="Login">Login</button>
              </div>
              <div class="separator">
                <br />

                <div>
                  <p>Sistem Pendukung Keputusan Penentuan Prioritas Proyek Pembangunan Daerah</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

  </html>
  <?php
  if (isset($_POST['Login'])) {

    $username = $_POST['username'];
    $password = ($_POST['password']);

    $sql = $koneksi->query("SELECT * from user where username='$username' and password='$password'");

    $data = $sql->fetch_assoc();

    $ketemu = $sql->num_rows;

    if ($ketemu >= 1) {

      session_start();

      if ($data['tipe'] == "admin") {

        $_SESSION['admin'] = $data['tipe'];

        header("location:index.php");
      } else if ($data['tipe'] == "user") {

        $_SESSION['user'] = $data['nama'];

        header("location:index.php");
      } else if ($data['tipe'] == "pimpinan") {

        $_SESSION['pimpinan'] = $data['nama'];

        header("location:indexpimpinan.php");
      }
    } else {

  ?>
      <script type="text/javascript">
        alert("Login Gagal !! Username atau Password Salah, Silahkan Ulangi Lagi");
      </script>
<?php
    }
  }
}
?>