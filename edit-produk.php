<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
    $p = mysqli_fetch_object($produk);
?>
<html lang="en">
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
    <h1><a href="dashboard.php">R-Shop</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">profil</a></li>
        <li><a href="data-kategori.php">kategori</a></li>
        <li><a href="data-produk.php">Data produk</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
   </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Data Produk</h3>
            <div class="box">
                <form action="" method="post" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--pilih--</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($r = mysqli_fetch_array($kategori)) {
                        ?>
                        <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected' : ""; ?>><?php echo $r['category_name']?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price ?>" required>

                    <img src="produk/<?php echo $p->product_image?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->product_image?>">
                    <input type="file" name="gambar" class="input-control">
                    <select class="input-control" name="status">
                        <option value="">--pilih--</option>
                        <option value="1" <?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
                        <option value="0" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                 </form>
            <?php
            if(isset($_POST['submit'])) {
                 
                $kategori   = $_POST['kategori'];
                $nama       = $_POST['nama'];
                $harga      = $_POST['harga'];
                $status     = $_POST['status'];
                $foto       = $_POST['foto'];

                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $type1 = explode('.', $filename);
                $type2 = $type1[1];

                $newname = 'produk' .time().'.'.$type2;
                $type_valid = array('jpg', 'jpeg', 'png');

                if($filename != '') {
                    
                    if(!in_array($type2, $type_valid)) {

                        echo '<script>alert("Format file tidak diizinkan")</script>';
                }else{
                    unlink('./produk/' .$foto);
                    move_uploaded_file($tmp_name, './produk/'.$newname);
                    $namagambar = $newname;
                }
            }else{
                $namagambar = $foto;
            }

            $update = mysqli_query($conn, "UPDATE tb_product SET
                                category_id = '".$kategori."',
                                product_name = '".$nama."',
                                product_price = '".$harga."',
                                product_image = '".$namagambar."',
                                product_status = '".$status."'
                                WHERE product_id = '".$p->product_id."' ");

                if($update) {
                    echo '<script>alert("Ubah data berhasil")</script>';
                    echo '<script>window.location="data-produk.php"</script>';
                }else{
                    echo 'gagal' .mysqli_error($conn);
            }
        }


        ?>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
        <small>Copyright &copy; 2023 - R-Shop</small>
    </footer>
</body>
</html>