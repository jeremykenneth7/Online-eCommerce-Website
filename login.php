<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="efek.css">
    <style>
        .container {
            padding-top: 50px;
            padding-bottom: 50px;
            margin-top: 100px;
            
            border-radius: 20px;
            backdrop-filter: blur(20px);
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 1px 12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        body {
            background-image: url(./gambar/background/shop.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <title>Login | Mickey Mauze Shop</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container col-sm-6">
        <div class="row justify-content-center">
            <div class="col text-center text-dark">
                <h2 class="judul">Login Mickey Mauze Shop</h2>
                <!-- cek pesan notifikasi -->
                <?php
                if (@$_GET['Empty'] == true) {
                ?>
                    <?php echo $_GET['Empty'] ?>
                <?php
                }
                ?>
                <?php
                if (@$_GET['Invalid'] == true) {
                ?>
                    <?php echo $_GET['Invalid'] ?>
                <?php
                }
                ?>
                <?php
                if (@$_GET['Admin'] == true) {
                ?>
                    <?php echo $_GET['Admin'] ?>
                <?php
                }
                ?>

                <br><br>
                <form method="POST" action="cek_login.php">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-sm-6">
                            <input type="text" name="username" class="form-control" placeholder="Username" id="inputUser" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control" placeholder="Password" id="inputPassword3">
                        </div>
                    </div>

                    <div class="option_div justify-content-center">
                        <div class="check_box me-5">
                            <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> >
                            <span>Remember me</span>
                        </div>
                        <div class="forget_div">
                            <a href="#">Forget Password?</a>
                        </div>
                    </div>
                    <br>

                    <button type="submit" name="Login" class="btn button btn-lg btn-block ">Sign In</button>
                    <br>
                    <br>
                    <div class="text sign-up-text">Belum mempunyai akun? <a href="register.php">Sign Up Disini</a></div>
                </form>
                <br>
                <div class="icons-wrapper">
                    <i class="ri-instagram-line icon"></i>
                    <i class="ri-facebook-circle-line icon"></i>
                    <i class="ri-whatsapp-line icon"></i>
                </div>
            </div>
        </div>
    </div>


</body>

</html>