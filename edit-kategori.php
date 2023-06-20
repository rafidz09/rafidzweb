<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."'");
    $k = mysqli_fetch_object($kategori);
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
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="post">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k-> category_name ?>" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $nama = ucwords($_POST['nama']);

                $update = mysqli_query($conn, "UPDATE tb_category SET
                                        category_name = '".$nama."'
                                        WHERE category_id = '".$k->category_id."' ");
                if($update) {
                    echo '<script>alert("Edit data berhasil")</script>';
                    echo '<script>window.location="data-kategori.php"</script>';
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