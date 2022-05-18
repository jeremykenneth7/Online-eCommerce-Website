<?php 
require_once('koneksi.php');
session_start();
    if(isset($_POST['Login']))
    {  
          
        if(empty($_POST['username']) || empty($_POST['password']))
        {
                header("location:login.php?Empty= Isi data dibawah ini");
        }
        else
        {    
                $username = $_POST['username'];
                $pass = $_POST['password'];
                
                $query = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($con,$query);
                $baris = mysqli_fetch_row($result);
                $hash = $baris[2];
                $verify = password_verify($pass, $hash);
                if($verify)
                {
                    $_SESSION['User']=$_POST['username'];
                    if(!empty($_POST["remember"])) {
                        setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
                    } else {
                        if(isset($_COOKIE["member_login"])) {
                            setcookie ("member_login","");
                        }
                    }
                    header("location:home.php");
                }
                else
                {
                    header("location:login.php?Invalid= Nama atau Password yang dimasukkan salah ");
                }
        }
    }   
    else
    {
        echo 'Error';
    }
    if(isset($_POST['Signup']))
    {
        if(empty($_POST['username']) || empty($_POST['password']))
        {
            header("location:register.php?Empty= Isi data dibawah ini");
        }
        else if(isset($_POST['username'])) {
            $username = $_POST['username'];
            $query = "SELECT * FROM users WHERE username='$username'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['username'];
                header("location:register.php?Used= Username sudah digunakan");
            } else
            {
                $username = $_POST['username'];
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $query = "INSERT INTO users(username, pass)";
                $query .= "VALUES('$username','$pass')";
                $hasil_mysql = mysqli_query($con, $query);
                header("location:login.php");
            }
        }
    }   
    else
    {
        echo 'Error';
    }

