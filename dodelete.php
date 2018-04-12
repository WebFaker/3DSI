<?php
if (!isset($_GET['i'])) {
    header('Location: basket.php');
    exit;
}
require_once "conn.php";
$sql = "delete from
`orders`
where
idOrders = :idOrders
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':idOrders', $_GET['i'], PDO::PARAM_STR);
$stmt->execute();
header('Location: basket.php');