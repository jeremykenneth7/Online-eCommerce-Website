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
    $page = 'ulasan';
    include 'navbar.php';
    include 'koneksi.php';


    ?>
    <div class="container">
        <div class="card-header" style=" background-color: #FFFFFF; ">
            <ul class=" nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="home.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="ulasan.php">Ulasan</a>
                </li>
            </ul>
        </div>
        <div class="dropdown ">
            <button class="btn btn-white dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Urutkan
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="ulasan.php">Ulasan Terbaru</a></li>
                <li><a class="dropdown-item" href="ulasantertinggi.php">Ulasan Tertinggi</a></li>
                <li><a class="dropdown-item" href="ulasanterendah.php">Ulasan Terendah</a></li>
            </ul>
        </div>
        <?php
        $query = "SELECT produk.id_produk, produk.pic, produk.nama, pembeli, ulasan, rating, beli FROM pembelian JOIN produk ON pembelian.id_produk = produk.id_produk ORDER BY rating DESC";
        $hasil_mysql = mysqli_query($con, $query);
        if (!$hasil_mysql = mysqli_query($con, $query)) {
        }
        if ($hasil_mysql = mysqli_query($con, $query)) {
            while ($baris = mysqli_fetch_row($hasil_mysql)) {
                $id_produk = $baris[0];
                $pic = $baris[1];
                $nama_produk = $baris[2];
                $pembeli = $baris[3];
                $ulasan = $baris[4];
                $rating = $baris[5];
        ?>
                <div class="row mt-3">
                    <div class="col d-flex justify-content-center">
                        <div class="shadow p-3 mb-2 rounded-3 bum" style="width: 1200px;">
                            <div class=" row g-0">
                                <div class="col-md-3">
                                    <img class="rounded" src=<?php echo "gambar/$pic" ?> height="130" width="250">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="row user-detail">
                                            <h5 class="card-title"><?php echo ucwords($pembeli) ?></h5>
                                            <p class="card-text"><?php echo ucfirst($ulasan) ?></p>
                                            <span class="border-right"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Nilai Kualitas Produk</h5>
                                        <h5 class="card-text"><?php echo $rating ?>.0<span style="font-size:130%;color:orange;">
                                                <?php
                                                for ($x = 1; $x <= $rating; $x++) { ?>
                                                    <span class="fa fa-star"></span>
                                                <?php
                                                }
                                                for ($x = 5; $x > $rating; $x--) { ?>
                                                    <span class="fa fa-star-o"></span> <?php
                                                                                    }

                                                                                        ?>
                                            </span>
                                        </h5>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            }
        }
            ?>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>