<?php
    session_start();
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
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
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di toko saya</h4>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
        <small>Copyright &copy; 2023 - R-Shop</small>
    </footer>
</body>
</html>