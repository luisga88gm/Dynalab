<?php
include('connection.php');

$id = $_GET['id'];

//Fetch Info.
$stmt = $conn->prepare("SELECT suppliersprod.product_name, suppliersprod.description FROM suppliersprod WHERE id=$id");
$stmt->execute();
$suppliersprod = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($suppliersprod);