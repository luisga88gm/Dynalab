<?php

$table_columns_mapping = [
    'users' => [
        'first_name', 'last_name', 'email', 'password', 'created_at', 'updated_at'
    ],
    'products' => [
        'commercial_code', 'internal_code', 'img', 'drawing', 'family', 'description', 'stock', 'price', 'created_at'
    ],
    'suppliers' => [
        'supplier_name', 'contact', 'email', 'telephone', 'address', 'location', 'cuit', 'website', 'raw_product', 'unit', 'stock', 'price', 'created_at'
    ],
    'exchange' => [
        'value', 'created_at'
    ],
    'clients' => [
        'business_name', 'contact', 'email', 'telephone', 'address', 'location', 'cuit', 'website'
    ],
    'transports' => [
        'transport_name', 'address', 'location', 'created_at'
    ],
    'stock' => [
        'internal_code', 'description', 'family', 'setting', 'material', 'quantity', 'weight', 'cost', 'img', 'created_at'
    ],
    'basiccosts' => [
        'specie', 'value', 'currency_value', 'created_at'
    ]
];