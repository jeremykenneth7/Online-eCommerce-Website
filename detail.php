<?php
    session_start();

    if (isset($_SESSION['User'])) {

        echo '<a href="logout.php?logout"></a>';
    } else {
        header("location:login.php");
    }

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="efek.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Detail Product | Mickey Mauze Shop</title>
    </head>
    <body>
        <?php 
            $page = 'non';
            include 'koneksi.php';
            include 'navbar.php';
            $id_produk = $_GET['id_produk'];
            $user = $_SESSION['User'];
            $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
            $hasil_mysql = mysqli_query($con, $query);
            $baris = mysqli_fetch_row($hasil_mysql);
            $nama_produk = $baris[1];
            $pic = $baris[2];
            $desc = $baris[3]; 
            $harga = $baris[4];
                
        ?>
        <div class="container kotak">
            <h2 class="text-center mb-5">Detail of Product</h2>
            <div class="card shadow-lg mb-3 rounded-3 justify-content-center" style="height: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo"gambar/$pic"?>" class="img-fluid rounded-start" height="100">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo"$nama_produk"?></h5>
                            <p class="card-text"><?php echo"$desc"?></p>
                            <p class="card-text">Rp <?php echo number_format("$harga",2)?></p>
                            <?php 
                                if ($user != 'admin') { ?>
                                    <form action="transaksi.php" method="POST">
                                        <input type=hidden name=id_produk value="<?php echo $id_produk?>">
                                        <button class="button" name="Add" type="submit">Add to Cart</button>
                                    </form>
                                    <?php
                                } else if ($user == 'admin'){ ?>
                                    <!-- <form action="kelola02.php" method="GET">
                                        <input type=hidden name=id_produk value="<?php echo $id_produk?>">
                                        <input class="btn btn-primary" name=action type=submit value=CHANGE>
                                        <input class="btn btn-primary" name=action type=submit value=DELETE>
                                    </form> -->
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>