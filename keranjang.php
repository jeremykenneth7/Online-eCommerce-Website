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

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="efek.css">
        <title>Produk | Mickey Mauze Shop</title>
        <style>
            ::-webkit-scrollbar {
                display: none;
            }
        </style>
    </head>
    <body>
        <?php 
            if (isset($_POST['beli'])) {
                $page = 'non';
            }else{
                $page = 'keranjang';
            }
            
            include 'navbar.php';
            include 'koneksi.php';
            $user = $_SESSION['User'];
            if ($user != 'admin') {
                if (isset($_GET['beli'])){
                    $querytambahan = "WHERE pembeli LIKE '$user' and beli = 'true'";
                }else
                    $querytambahan = "WHERE pembeli LIKE '$user' and beli IS NULL";
            }else if ($user == 'admin'){
                $querytambahan = "WHERE beli = 'true'";
            }
        ?>

        <div class="container kotak">
            <?php 
                if ($user != 'admin') { 
                    if (isset($_GET['beli'])) {
                        ?> <h2 class="text-center">Purchase</h2> <?php
                    }else {
                        ?> <h2 class="text-center"><?php echo ucwords($user)?>'s Cart</h2> <?php 
                    }
                }else {
                   ?> <h2 class="text-center">Purchase</h2> <?php
                }
            ?>
            
           
            <div class="row mt-5">
                <?php
                    $query = "SELECT produk.id_produk, produk.nama, produk.pic, produk.harga, pembeli, ulasan FROM pembelian JOIN produk ON pembelian.id_produk = produk.id_produk $querytambahan";
                    $hasil_mysql = mysqli_query($con, $query);
                    while($baris = mysqli_fetch_row($hasil_mysql))
                    {
                        $id_produk = $baris[0];
                        $nama_produk = $baris[1];
                        $pic = $baris[2];
                        $harga = $baris[3];
                        $pembeli = $baris[4]; 
                        $ulasan = $baris[5]; 
                        ?>
                            <div class="col-sm-3 mb-3">
                                <div class="card shadow" style="width: 18rem;">
                                    <img src="<?php echo"gambar/$pic" ?>" class="card-img-top" height="170">
                                    <div class="card-body" style="height: 350;">
                                        <h5 class="card-title"><?php echo"$nama_produk" ?></h5>
                                        <p class="card-text">Rp <?php echo number_format("$harga",2) ?></p>
                                        <?php
                                            if ($user == 'admin') { ?>
                                                <p class="card-text">Pembeli : <?php echo ucfirst("$pembeli") ?></p>
                                                <?php
                                            } else if ($user != 'admin') {
                                                if (isset($_GET['beli'])){ 
                                                    ?>
                                                        <form action="transaksi.php" method="POST">
                                                            <input type=hidden name=id_produk value="<?php echo $id_produk?>">
                                                            <textarea class="form-control" rows=2 placeholder="Review" type=text name=review size="20"maxlength="255"><?php echo $ulasan?></textarea><br>
                                                            <select class="form-select" aria-label="Default select example" name=rating>
                                                                <option selected>RATING</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                                <option value="4">Four</option>
                                                                <option value="5">Five</option>
                                                            </select>
                                                            <button class="button mt-2" name="Review" type="submit">Submit</button>
                                                        </form>   
                                                    <?php
                                                }else {
                                                ?>
                                                    <form action="transaksi.php" method="POST">
                                                        <input type=hidden name=id_produk value="<?php echo $id_produk?>">
                                                        <button class="button" name="Buy" type="submit">Buy</button>
                                                        <button class="button" name="Delete" type="submit">Delete</button>
                                                    </form>     
                                                <?php
                                                }
                                            }
                                        ?>
                                        
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