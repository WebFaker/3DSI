<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=SI_3D_WEB', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}