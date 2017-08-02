<?php

$requiredFields = ['email', 'name'];

$data = json_decode($_POST['data']);

foreach ($requiredFields as $field) {
    if (!isset($data->$field) || empty($data->$field)) {
        echo json_encode(['status' => 'error', 'message' => 'Please, fill required fields']);
        exit;
    }
}

if (!strstr($_POST['email'], '@')) {
    echo json_encode(['status' => 'error', 'message' => 'Incorrect email']);
    exit;
}
