<?php
require "koneksi.php";
$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama = '$nama'");
$produk = mysqli_fetch_array($queryProduk);

$queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id ='$produk[kategori_id]' LIMIT 4");
$produkTerkait = mysqli_fetch_array($queryProdukTerkait);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Produk Detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php require "navbar.php"; ?>
    <!-- detail Produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <img src="image/<?php echo $produk['foto'] ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1>
                        <?php echo $produk['nama'] ?>
                    </h1>
                    <p class="fs-5">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga expedita sunt error in ratione ab
                        molestias temporibus porro, unde ut.
                        <?php echo $produk['detail'] ?>
                    </p>

                    <p class="text-harga">
                        Rp
                        <?php echo $produk['harga'] ?>
                    </p>
                    <p class="fs-5">Status ketersediaan :<strong>
                            <?php echo $produk['ketersediaan_stok'] ?>
                        </strong></p>
                    <div class="col-sm-9 d-flex mb-2">
                        <p class="login-register-text">Untuk pemesanan bisa hubungi kami disini :
                            <br><a href="https://wa.me/+6289661738883"
                                class="fs-5 btn btn-success form-control mt-3 fab fa-whatsapp fs-3">
                            </a>
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- produk terkait -->
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Produk Terkait</h2>

            <div class="row">
                <?php while ($data = mysqli_fetch_array($queryProdukTerkait)) { ?>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                            <img src="image/<?php echo $data['foto']; ?>"
                                class="image-fluid img-thumbnail produk-terkait-image" alt="">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php require "footer.php"; ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/css/all.min.js"></script>
</body>

</html>