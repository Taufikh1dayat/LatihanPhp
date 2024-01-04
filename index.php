<?php
require "koneksi.php";
$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Toko Online Fashion</h1>
            <h3>Mau Cari Apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Barang..."
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn btn-outline-warning warna2 text-white">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-baju-pria d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Baju Pria">Baju
                                Pria</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-baju-wanita d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Baju Wanita">Baju
                                Wanita</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Sepatu">Sepatu</a>
                        </h4>s
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-6 mt-3">
                Toko online tidak hanya memberikan kenyamanan dalam berbelanja, tetapi juga memungkinkan perusahaan
                untuk meningkatkan pengalaman pelanggan secara keseluruhan. Dengan menyediakan antarmuka yang ramah
                pengguna, sistem pembayaran yang mudah, dan dukungan pelanggan yang responsif, perusahaan dapat
                membangun hubungan yang kuat dengan pelanggan dan meningkatkan loyalitas mereka.
            </p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/<?php echo $data['foto'] ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo $data['nama'] ?>
                                    </h5>
                                    <p class="card-text text-truncate">
                                        <?php echo $data['detail'] ?>
                                    </p>
                                    <p class="card-text text-harga">Rp
                                        <?php echo $data['harga'] ?>
                                    </p>
                                    <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>"
                                        class="btn warna2 text-white">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-warning mt-3" href="produk.php">See more</a>
        </div>
    </div>
    <!-- footer -->
    <?php require "footer.php"; ?>




    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/css/all.min.js"></script>
</body>

</html>