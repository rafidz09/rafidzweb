<?php 
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_alamat FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R-Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
   <!-- header -->
   <header>
    <div class="container">
    <h1><a href="index.php">R-Shop</a></h1>
    <ul>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="pesanan.php">Pesanan</a></li>
    </ul>
    </div>
   </header>

   <!-- search -->
   <div class="search">
    <div class="container">
        <form action="produk.php">
            <input type="text" name="search" placeholder="Cari produk">
            <input type="submit" name="Cari" value="Cari produk">
        </form>
    </div>

    <!-- kategori -->

    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
                <div class="box">
                    <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY
                        category_id DESC");

                        if(mysqli_num_rows($kategori) > 0) {
                            while($k = mysqli_fetch_array($kategori)) {

                    ?>

                    <a href="produk.php?kategori=<?php echo $k['category_id'] ?>    ">
                    <div class="col-5">
                        <img src="img/reminders.png" width="45px" style="margin-bottom:5px;">
                        <p><?php echo $k['category_name'] ?></p>
                    </div>  
                    </a>
                    <?php }}else { ?>
                        <p>Kategori tidak ada</p>
                        <?php } ?>
                </div>
            </div>
        </div>
    
        <!-- new produk -->
        <!--     -->
        <div class="section">
            <div class="container">
                <h3>Produk Terbaru</h3>
                <div class="box">
                    <?php 

                        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                        if(mysqli_num_rows($produk) > 0) {
                            while($p = mysqli_fetch_array($produk)) {
                    ?>
                    <a href="form-beli.php?product-name=<?php echo $p['product_name']; ?>">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image'] ?>">
                        <p class="nama" name="name"><?php echo $p['product_name'] ?></p>
                        <p class="harga">Rp. <?php echo $p['product_price'] ?></p>
                        <input class="beli" type="submit" name="Beli sekarang" value="Beli">
                    </div>
                    </a>
                    <?php }}else{ ?>
                        <p>Produk tidak ada</p>
                        <?php } ?>
                </div>
            </div>
        </div>
        </form>
        <!-- footer -->
            <div class="footer">
                <div class="container">
                    <h4>Alamat</h4>
                    <p><?php echo $a->admin_alamat ?></p>

                    <h4>Email</h4>
                    <p><?php echo $a->admin_email ?></p>

                    <h4>Telepon</h4>
                    <p><?php echo $a->admin_telp ?></p>

                    <small>Copyright &copy; 2023 - R-Shop</small>
                </div>
            </div>

</body>
</html>