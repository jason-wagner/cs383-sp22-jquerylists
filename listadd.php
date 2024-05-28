<?php

// $conn created in this file is a PDO object
require_once 'mysql.php';

$query = $conn->prepare("INSERT INTO list (item) VALUES (:item)");
$query->execute(["item" => $_POST['item']]);

echo $conn->lastInsertId();
