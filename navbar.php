<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="home.php">Mickey Mauze Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'home') {echo 'active';} ?>" href="home.php"><i class="material-icons">home</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'keranjang') {echo 'active';} ?>" href="keranjang.php"><i class="material-icons">shopping_cart</i></a>
                    </li>
                    <?php
                    if ($_SESSION['User'] == 'admin') {
                        echo '<li class="nav-item"><a class="nav-link " href="kelola01.php"><i class="material-icons">admin_panel_settings</i></a></li>';
                    }
                    ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="./gambar/logo/user.png" class="user-image img-circle elevation-2" alt="User Image">
                                <span class="hidden-xs"> <?php echo ucwords($_SESSION['User'])?></span>
                            </a>
                            <div class="dropdown-menu shadow">
                                <a href="home.php" class="dropdown-item">Beranda</a>
                                <a href="produk.php" class="dropdown-item">Produk</a>
                                <a href="ulasan.php" class="dropdown-item">Ulasan</a>
                                <form action="keranjang.php" method="GET">
                                    <button type="submit"  class="dropdown-item" name="beli">Pembelian</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php?logout" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    <!-- <li class="nav-item">
                        <a class="btn btn-outline-dark" href="logout.php?logout"><i class="material-icons">logout</i></a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if ($page == 'home' or $page == 'produk' or $page == 'ulasan') {
    ?>
        <div class="container kotak">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="shadow p-3 mb-2 bg-white rounded-3" style="max-width: 1300px;">
                        <div class=" row g-0">
                            <div class="col-md-2">
                                <img class="rounded-circle" src="./gambar/logo/mickey.png" width="130" height="130" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="row user-detail">
                                        <h5 class="card-title">Mickey Mauze Shop</h5>
                                        <p class="card-text">Mickey Mauze Shop menjual barang berkualitas dengan harga terjangkau</p>
                                        <p class="card-text"><small class="text-muted">Dibalas ± 8 menit &nbsp; | &nbsp; <i class="fa fa-map-marker"></i> Yogyakarta, Indonesia</small></p>
                                        <span class="border-right"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-body">
                                <h5 class="card-title">Nilai Kualitas Produk</h5>
                                <?php
                                    include 'koneksi.php';
                                    $query = "SELECT AVG(rating) FROM pembelian";
                                    $hasil_mysql = mysqli_query($con, $query);
                                    $baris = mysqli_fetch_row($hasil_mysql);
                                    $rating = $baris[0];
                                ?>
                                            <h5 class="card-text"><?php echo number_format($rating,1) ?><span style="font-size:130%;color:orange;">
                                            <?php
                                                for ($x = 1; $x <= $rating; $x++) { ?>
                                                    <span class="fa fa-star"></span>    
                                                <?php
                                                }
                                                if ($rating != round($rating)) { ?>
                                                    <span class="fa fa-star-half-o"></span>    
                                                <?php
                                                } else if($rating == 5) {
                                                    
                                                } else if($rating < 5) {
                                                    ?> <span class="fa fa-star-o"></span> <?php
                                                } for($x = 4; $x > $rating; $x--) { ?>
                                                    <span class="fa fa-star-o"></span> <?php
                                                }

                                            ?>
                                    <!-- <h5 class="card-title">Nilai Kualitas Produk</h5>
                                    <h5 class="card-text">4.5<span style="font-size:130%;color:orange;">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-half-o"></span>
                                        </span>
                                    </h5> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>