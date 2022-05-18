<?php
session_start();

if (isset($_SESSION['User'])) {

    echo '<a href="logout.php?logout"></a>';
} else {
    header("location:login.php");
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="efek.css">
    <title>Mickey Mauze Shop </title>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    $page = 'home';
    include 'navbar.php';
    include 'koneksi.php';
    $user = $_SESSION['User'];
    // if ($user != 'admin') {
    //     $querytambahan = 'WHERE pembeli IS NULL';
    // } else {
    //     $querytambahan = ' ';
    // }
    // 
    ?>
    <div class="container">
        <div class="card-header" style=" background-color: #FFFFFF; ">
            <ul class=" nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="ulasan.php">Ulasan</a>
                </li>
            </ul>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <div class="card" style="width: 27rem ;">
                    <img src="./gambar/logo/mc.png" class="card-img-top text" alt="mickeymauze">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="width: 27rem ;">
                    <iframe width="855" height="430" src="https://www.youtube.com/embed/WGsbBCBJKI4">
                    </iframe>

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <h4>Produk Terbaru</h4>
            <?php
            $i = 1;
            $query = "SELECT produk.id_produk, produk.nama, produk.pic, produk.harga, pembeli FROM pembelian RIGHT JOIN produk ON pembelian.id_produk = produk.id_produk WHERE pembeli is NULL ORDER BY id_produk DESC";
            $hasil_mysql = mysqli_query($con, $query);
            while ($baris = mysqli_fetch_row($hasil_mysql)) {
                $id_produk = $baris[0];
                $nama_produk = $baris[1];
                $pic = $baris[2];
                $harga = $baris[3];
                $pembeli = $baris[4];
            ?>
                <div class="col-md-3 mb-3 mt-3">
                    <div class="card shadow bum" style="width: 18rem;">
                        <img src="<?php echo "gambar/$pic" ?>" class="card-img-top" height="170">
                        <div class="card-body" style="height: 210px">
                            <h5 class="card-title"><?php echo "$nama_produk" ?></h5>
                            <p class="card-text">Rp <?php echo number_format("$harga", 2) ?></p>
                        </div>
                    </div>
                </div>
            <?php
                $i++;
                if ($i > 4) {
                    break;
                }
            }
            ?>
        </div>
    </div>

</body>