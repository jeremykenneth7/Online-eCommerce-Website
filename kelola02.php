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
        <title>| Mickey Mauze Shop</title>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
        <?php
            $page = 'non';
            $action = $_GET['action']; 
            include "navbar.php";
        ?>
        <center>
            <div class="container kotak">
                <h3><?php echo"$action";?> DATA</h3><br>
                <div class="home">
                        <div class="col-sm-3">
                            <form method=post action=proses.php enctype="multipart/form-data">
                                <?php
                                    include("koneksi.php");
                                    if($action == "ADD")
                                    {
                                        $id_produk = "";
                                        $nama_produk = "";
                                        $pic = "";
                                        $desc = ""; 
                                        $harga = "";
                                    }
                                    else
                                    {
                                        $id_produk = $_GET['id_produk'];
                                        $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
                                        $hasil_mysql = mysqli_query($con, $query);
                                        $baris = mysqli_fetch_row($hasil_mysql);
                                        // $id_film = $baris[0];
                                        $nama_produk = $baris[1];
                                        $pic = $baris[2];
                                        $desc = $baris[3];
                                        $harga = $baris[4];
                                    }
                                    echo "<input type=hidden name=id_produk value=$id_produk><input type=hidden name=action value=$action>";
                                    
                                ?>
                                    <input class="form-control" placeholder="Nama Produk" type=text name=nama size="20" maxlength="300"value="<?php echo "$nama_produk";?>"><br>

                                <?php 
                                    if ($action == "DELETE") {
                                        ?>
                                            <input class="form-control" placeholder="Nama File Gambar" type=text name=pic size="20" maxlength="20"value="<?php echo "gambar/$pic";?>"><br>
                                        <?php
                                    } else {
                                        ?>
                                            <input class="form-control" placeholder="Nama File Gambar" type=file name=pic size="20" maxlength="20"value="<?php echo "gambar/$pic";?>"><br>
                                        <?php
                                    }
                                ?>
                                    <textarea class="form-control" rows=4 placeholder="Deskripsi Produk" type=text name=desc size="20"maxlength="255"><?php echo "$desc";?></textarea><br>
                                    <input class="form-control" placeholder="Harga" type=text name=harga size="30"maxlength="30"value="<?php echo "$harga";?>"><br>
                                    
                                <input class="button" type=submit value="PROSES" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </body>
</html>