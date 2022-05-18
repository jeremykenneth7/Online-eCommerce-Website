<?php 
require_once('koneksi.php');
session_start();
    $id_produk = $_POST['id_produk'];
    $ulasan = $_POST['review'];
    $rating = $_POST['rating'];
    $user = $_SESSION['User'];
    if (isset($_POST['Add'])) {
        $query = "INSERT INTO pembelian(id_produk , pembeli)";
        $query .= "VALUES('$id_produk','$user')";
        $hasil_mysql = mysqli_query($con, $query);
        header("location:keranjang.php");
    }  
    else if (isset($_POST['Delete'])) {
        $query = "DELETE FROM pembelian WHERE id_produk like $id_produk;";
        $hasil_mysql = mysqli_query($con, $query);
        header("location:keranjang.php");
    }
    else if (isset($_POST['Buy'])) {
        $query = "UPDATE pembelian SET beli='true' WHERE id_produk like $id_produk;";
        $hasil_mysql = mysqli_query($con, $query);
        header("location:keranjang.php?beli");
    }
    else if (isset($_POST['Review'])) {
        
        $query = "UPDATE pembelian SET ulasan = '$ulasan', rating = '$rating' WHERE id_produk = $id_produk;";
        $hasil_mysql = mysqli_query($con, $query);
        header("location:ulasan.php");
    }
    else if (isset($_POST['search'])) {
        $search = $_POST['search'];
        if ($search == NULL) {
            header("location:produk.php");
        } else
            header("location:produk.php?search=$search");
    }
    else if (isset($_GET['hargaterendah'])) {
        header("location:produk.php?hargaterendah");
    }
    else if (isset($_GET['hargatertinggi'])) {
        header("location:produk.php?hargatertinggi");
    }
    else if (isset($_GET['terjual'])) {
        header("location:produk.php?terjual");
    }
    else if (isset($_GET['terbaru'])) {
        header("location:produk.php?terbaru");
    }
    else
    {
        echo 'Error';
    }

    
?> 
