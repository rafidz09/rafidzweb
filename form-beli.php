<?php
include 'db.php';
// include 'form-beli.php'
if(isset($_POST['submit'])) {
    // Ambil nilai-nilai dari input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $message = $_POST['message'];

    echo "Nama: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Produk: " . $product . "<br>";
    echo "Jumlah: " . $quantity . "<br>";
    echo "Pesan: " . $message . "<br>";
}

if(isset($_GET['product-name'])) {
    $productName = $_GET['product-name'];

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form Pembelian</title>
  <style>
    .container {
      width: 400px;
      margin: 0 auto;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
    }
    .form-group input[type=text],
    .form-group input[type=email],
    .form-group select {
      width: 100%;
      padding: 5px;
    }
    .form-group textarea {
      width: 100%;
      padding: 5px;
      resize: vertical;
    }
    .form-group button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Form Pembelian</h2>
    <form action="process-purchase.php" method="POST">
      <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
  <label for="product">Produk:</label>
  <select id="product" name="product" required>
    <option value="">Pilih Produk</option>
    <?php
    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
    while($p = mysqli_fetch_array($produk)) {
      echo '<option value="' . $p['product_name'] . '">' . $p['product_name'] . '</option>';
    }
    ?>
  </select>
</div>


      <div class="form-group">
        <label for="quantity">Jumlah:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>
      </div>
      <div class="form-group">
        <label for="message">Pesan:</label>
        <textarea id="message" name="message" rows="4"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Beli</button>
      </div>
    </form>
  </div>
</body>
</html>
