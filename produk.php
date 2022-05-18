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
    $page = 'produk';
    include 'navbar.php';
    include 'koneksi.php';
    $user = $_SESSION['User'];
    // if ($user != 'admin') {
    //     $querytambahan = 'WHERE pembeli IS NULL';
    // } else {
    //     $querytambahan = ' ';
    // }

    ?>
    <div class="container">
        <div class="card-header" style=" background-color: #FFFFFF; ">
            <ul class=" nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="home.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="ulasan.php">Ulasan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="dropdown">
                <button class="btn btn-white dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Urutkan
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <form action="transaksi.php" method="GET">
                            <button type="submit"  class="dropdown-item" name="hargaterendah">Harga Terendah</button>
                            <button type="submit"  class="dropdown-item" name="hargatertinggi">Harga Tertinggi</button>
                            <button type="submit"  class="dropdown-item" name="terbaru">Terbaru</button>
                            <button type="submit"  class="dropdown-item" name="terjual">Terjual</button>
                        </form>
                    </li>
                </ul>
            </div>

            <?php
            if (isset($_GET['search'])) {
            ?>
                <div class="row">
                    <div class="col-sm-2">
                        <form action="transaksi.php" method="POST">
                            <input class="form-control" placeholder="Cari Produk" type=text name=search size="20" maxlength="300" value="<?php echo $_GET['search'] ?>">
                        </form>
                    </div>
                </div>
            <?php
                $no_urut = 0;
                $search = $_GET['search'];
                $query = "SELECT produk.id_produk, produk.nama, produk.pic, produk.harga, beli FROM pembelian RIGHT JOIN produk ON pembelian.id_produk = produk.id_produk WHERE nama LIKE '%$search%'";
                $hasil_mysql = mysqli_query($con, $query);
                while ($baris = mysqli_fetch_row($hasil_mysql)) {
                    $id_produk = $baris[0];
                    $nama_produk = $baris[1];
                    $pic = $baris[2];
                    $harga = $baris[3];
                    $beli = $baris[4];
                ?>
                    <div class=" col-md-3 mt-3 mb-3">
                        <div class="card shadow bum" style="width: 18rem;">
                            <img src="<?php echo "gambar/$pic" ?>" class="card-img-top " height="170">
                            <div class="card-body" style="height: 210px">
                                <h5 class="card-title"><?php echo "$nama_produk" ?></h5>
                                <p class="card-text">Rp <?php echo number_format("$harga", 2) ?></p>
                                <?php
                                if ($beli != NULL) {
                                ?> <h5 class="card-title text-secondary">SOLD</h5> <?php
                                } else {
                                    ?> <a href="detail.php?id_produk=<?php echo $id_produk; ?>" class="button">Detail</a> <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }

            if (empty($_GET['search'])){
                if (isset($_GET['hargatertinggi'])) {
                    $querytambahan = "ORDER BY harga DESC";
                } else if (isset($_GET['hargaterendah'])) {
                    $querytambahan = "ORDER BY harga ASC";
                } else if (isset($_GET['terjual'])) {
                    $querytambahan = "WHERE beli = 'true'";
                } else  {
                    $querytambahan = "ORDER BY id_produk DESC";
                }
            ?> 
                <div class="row">
                    <div class="col-sm-2">
                        <form action="transaksi.php" method="POST">
                            <input class="form-control" placeholder="Cari Produk" type=text name=search size="20" maxlength="300">
                        </form>
                    </div>
                </div>
            <?php 
                $query = "SELECT produk.id_produk, produk.nama, produk.pic, produk.harga, beli, pembeli FROM pembelian RIGHT JOIN produk ON pembelian.id_produk = produk.id_produk $querytambahan";
                $hasil_mysql = mysqli_query($con, $query);
                while ($baris = mysqli_fetch_row($hasil_mysql)) {
                    $id_produk = $baris[0];
                    $nama_produk = $baris[1];
                    $pic = $baris[2];
                    $harga = $baris[3];
                    $beli = $baris[4];
                    $pembeli = $baris[5];
                ?>
                    <div class="col-md-3 mt-3 mb-3">
                        <div class="card shadow bum" style="width: 18rem;">
                            <img src="<?php echo "gambar/$pic" ?>" class="card-img-top " height="170">
                            <div class="card-body" style="height: 210px">
                                <h5 class="card-title"><?php echo "$nama_produk" ?></h5>
                                <p class="card-text">Rp <?php echo number_format("$harga", 2) ?></p>
                                <?php
                                if ($beli != NULL) {
                                    ?> <h5 class="card-title text-secondary">SOLD</h5> <?php
                                }else if ($pembeli !=NULL) {
                                    ?> <h5 class="card-title text-secondary">CHECKED</h5> <?php
                                } else {
                                    ?> <a href="detail.php?id_produk=<?php echo $id_produk; ?>" class="button">Detail</a> <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>