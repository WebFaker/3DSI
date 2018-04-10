<?php
/**
 * Created by PhpStorm.
 * User: pauleherman
 * Date: 10/04/2018
 * Time: 13:24
 */

try {
    $conn = new PDO('mysql:dbname=SI_3D_WEB;host=localhost', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}