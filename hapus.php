<?php

$message = $_GET['message'];

$conn = mysqli_connect("localhost", "root", "", "db_bukawarung");

$sql = "DELETE FROM tb_beli WHERE message = '$message'";

$query = mysqli_query($conn, $sql);

if($query){
    echo "<script> alert('Barang sudah diterima!') </script>";
    header("Location: pesanan.php");
}else {
    echo "error cuy";
}