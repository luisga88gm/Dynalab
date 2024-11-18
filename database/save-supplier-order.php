<?php
session_start();

$post_data = $_POST;
$products = $post_data['products'];
$qty = array_values($post_data['quantity']);

$post_data_arr = [];

foreach ($products as $key => $pid) {
    if(isset($qty[$key])) $post_data_arr[$pid] = $qty[$key];
}

//Include connection.
include('connection.php');

//Store data.
$batch = time();

$success = false;
try {
    foreach($post_data_arr as $pid => $supplier_qty){
        foreach($supplier_qty as $sid => $qty){
    
            $values= [
                'supplier' => $sid,
                'product' => $pid,
                'quantity_ordered' => $qty,
                'status' => 'pending',
                'work' => $batch,
                'created_by' => $_SESSION['user']['last_name'],
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            ];
    
            $sql = "INSERT INTO buyorders
                            (supplier, product, quantity_ordered, status, work, created_by, updated_at, created_at)
                        VALUES
                            (:supplier, :product, :quantity_ordered, :status, :work, :created_by, :updated_at, :created_at)";
            $stmt = $conn->prepare($sql);
            $stmt->execute($values);
        }
    }
    $success = true;
    $message = 'Orden de compra generada exitosamente!';
} catch (\Exception $e) {

    $message = $e->getMessage();
}

$_SESSION['response'] = [
    'message' => $message,
    'success' => $success
];

header('location: ../buyorders-add.php');