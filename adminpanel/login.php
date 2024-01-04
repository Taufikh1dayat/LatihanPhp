<?php
session_start();
require "../koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    .main {
        height: 100vh;
        background: rgb(147, 222, 223);
        background: linear-gradient(0deg, rgba(147, 222, 223, 1) 0%, rgba(249, 249, 249, 1) 100%);
    }

    .login-box {
        width: 400px;
        height: 260px;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .warna {
        color: blue;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">

        <div class="login-box p-4 shadow">
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3" style="width:400px">
            <?php
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                $query = mysqli_query($con, "SELECT * FROM users WHERE username ='$username'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);


                if ($countdata > 0) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: ../adminpanel');
                    } else {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Password salah!
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Akun tidak tersedia!
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="container">
        Belum PUnya akun?
    </div>
</body>

</html>