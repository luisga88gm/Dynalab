<?php
    $data = $_POST;
    $id = (int) $data['id'];
    $table = $data['table'];

    // Adding the record.
    try {
        include('connection.php');

        //Delete junction table.
        if($table === 'suppliers'){
            $supplier_id = $id;
            $command = "DELETE FROM productsuppliers WHERE supplier={$id}";
            $conn->exec($command);
        }
        if($table === 'products'){
            $supplier_id = $id;
            $command = "DELETE FROM productsuppliers WHERE product={$id}";
            $conn->exec($command);
        }

        //Delete main table.
        $command = "DELETE FROM $table WHERE id={$id}";
        $conn->exec($command);

        echo json_encode([
            'success' => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
        ]);
    }