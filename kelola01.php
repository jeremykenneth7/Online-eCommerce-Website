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
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            ::-webkit-scrollbar { 
                 display: none; 
             } 
        </style>
        <title>ADMIN | Mickey Mauze Shop</title>
    </head>
    <body>
        
        <?php 
            $page = 'non';
            include 'navbar.php';
            include 'koneksi.php';
        ?>

        <div class="container kotak">
            <div class="col mt-5">
                <div class="card shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Produk</h5>
                        <form action="kelola02.php" method="GET">
                            <input class="button" name=action type=submit value=ADD>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <?php
                    $query = "SELECT produk.id_produk, produk.nama, produk.pic, produk.deskripsi, produk.harga, pembeli, beli FROM pembelian RIGHT JOIN produk ON pembelian.id_produk = produk.id_produk WHERE beli IS NULL ORDER BY id_produk DESC";
                    $hasil_mysql = mysqli_query($con, $query);
                    while($baris = mysqli_fetch_row($hasil_mysql))
                    {
                        $id_produk = $baris[0];
                        $nama_produk = $baris[1];
                        $pic = $baris[2];
                        $desc = $baris[3]; 
                        $harga = $baris[4];
                        ?>
                            <div class="card shadow-lg mb-3 rounded-3 justify-content-center" style="height: 300px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?php echo"gambar/$pic"?>" class="img-fluid rounded-3" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo"$nama_produk"?></h5>
                                            <p class="card-text"><?php echo"$desc"?></p>
                                            <p class="card-text">Rp <?php echo"$harga"?></p>
                                            <form action="kelola02.php" method="GET">
                                                <input type=hidden name=id_produk value="<?php echo $id_produk?>">
                                                <input class="button" name=action type=submit value=CHANGE>
                                                <input class="button" name=action type=submit value=DELETE>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>