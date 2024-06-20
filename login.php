<?php
session_start();
include "koneksi.php";

if ( isset($_SESSION["login"]) ) {
    header("location: index.php");
    exit;
  }

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['username']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("location: login.php");

        exit();

    }else if(empty($pass)){

        header("location: login.php");

        exit();

    }else{

        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";

        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $uname && $row['password'] === $pass) {

                $_SESSION["login"] = true;

                header("location: index.php");

                exit();

            }else{

                header("location: login.php");

                exit();

            }

        }else{

            header("location: login.php");

            exit();

        }
    }
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SPK Karyawan Rumah Sakit KORPRI Samarinda </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body>
    <header class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #fff;"> 
        <div class="container">
                <a class="navbar-brand py-3 px-3" style="color:#181D31; font-weight: 700;"> SPK KARYAWAN </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
            </div>
    </header>
    <section>
        <div class="container">
            <div class="row"> 
                <div class="col-lg-7"> 
                    <div class="py-4 px-1 align-self-center">
                        <img src="assets/img/bg.png" class="w-100"> </img>
                        <p class="text-center" style="font-size: 20px;"> Rumah Sakit KORPRI Samarinda </p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-auto py-5 px-5 align-self-center"> 
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label py-2" style="font-size: 18px;">Username</label>
                            <input type="text" name="username" autocomplete="off" class="form-control" id="username" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label py-2" style="font-size: 18px;">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" autocomplete="off" name="login" style="font-size: 18px; background-color: #181D31;">Login</button>
                        </form>
                </div>
            </div> 
        </div>
    </section>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>