<?php
    session_start();

    if (isset($_SESSION['User']) and $_SESSION['User'] == 'admin') {

        echo '<a href="logout.php?logout"></a>';
    } else {
        header("location:login.php?Admin=  Anda harus login sebagai admin untuk mengakses halaman");
    }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="efek.css">
    <meta http-equiv="refresh" content="1; home.php" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        h2 {
            margin-top: 100px;
        }
    </style>
    <title> | Mickey Mauze Shop</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php 
        $page = 'keranjang';
        include 'navbar.php'; 
    ?>
    <center>
        <h2>Mickey Mauze Shop</h2>
        <hr>
    </center>
    <?php
    include("koneksi.php");
    
    $action = $_POST['action'];
    
    if ($action == 'DELETE') {
        $pic = $_POST['pic'];
    }else {
        $pic = $_FILES['pic']['name'];
        $namaFile = $_FILES['pic']['name'];
        $namaSementara = $_FILES['pic']['tmp_name'];
        $dirUpload = './gambar/';
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
    }
    
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama'];
    $desc = $_POST['desc'];
    $harga = $_POST['harga'];

    switch ($action) {
        case "ADD":
            $query = "INSERT INTO produk(nama, pic, deskripsi, harga)";
            $query .= "VALUES('$nama_produk','$pic','$desc','$harga');";
            $hasil_mysql = mysqli_query($con, $query);
            $pesan = "Data Berhasil Ditambahkan";
            break;
        case "CHANGE":
            $query = "UPDATE produk SET nama='$nama_produk',pic='$pic', ";
            $query .= "deskripsi='$desc', harga='$harga'";
            $query .= "WHERE id_produk like $id_produk;";
            $hasil_mysql = mysqli_query($con, $query);
            $pesan = "Data Berhasil Diubah";
            break;
        case "DELETE":
            unlink($pic);
            $query = "DELETE FROM produk WHERE id_produk like $id_produk;";
            $hasil_mysql = mysqli_query($con, $query);
            $pesan = "Data Berhasil Dihapus";
            break;
    }
    ?>
    <h3 class="text-center"> <?php echo "$pesan"; ?> </h3>

</body>

</html>