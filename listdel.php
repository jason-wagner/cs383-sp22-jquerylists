<?php

// $conn created in this file is a PDO object
require_once 'mysql.php';

$query = $conn->prepare("DELETE FROM list WHERE id = :id");
$query->execute(["id" => $_POST['id']]);

echo " ";
