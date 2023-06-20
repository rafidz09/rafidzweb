<?php

$conn = mysqli_connect("localhost", "root", "", "db_bukawarung");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $message = $_POST['message'];



    $sql =" INSERT INTO `tb_beli`(`name`, `email`, `product`, `quantity`, `message`) VALUES 
    ('$name','$email','$product','$quantity','$message')";

    if(mysqli_query($conn, $sql)){
        echo "<script> alert('berhasil dibeli!') </script>";
        header("Location: index.php");
    }else {
        echo "error cuy";
    }
}


?>