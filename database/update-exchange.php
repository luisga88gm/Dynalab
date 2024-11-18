<?php
    $data = $_POST;
    $exchange_id = (int) $data['exchangeId'];
    $currency_value = $data['c_value'];

    // Adding the record.
    try {
        $sql = "UPDATE exchanges SET currency_value=?, updated_at=? WHERE id=?";
        include('connection.php');
        $conn->prepare($sql)->execute([$currency_value, date('Y-m-d h:i:s'), $exchange_id]);
        echo json_encode([
            'success' => true,
            'message' => ' Valor de cambio actualizado.'
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error en procesar el requerimiento!'
        ]);
    }