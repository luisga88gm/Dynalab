<?php
include('connection.php');

$id = $_GET['id'];

//Fetch Info.
$stmt = $conn->prepare("SELECT products.img, products.description FROM products WHERE id=$id");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);