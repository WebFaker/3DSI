<?php
require_once "conn.php";
$sql = "insert into
`rings`
(
`idMembers`,
`price`,
`name`,
`src`,
`shapeRing`,
`shapeProp`,
`colorRing`,
`colorProp`
)
values
(
:idMembers,
:price,
:name,
:src,
:shapeRing,
:shapeProp,
:colorRing,
:colorProp
)
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':idMembers', $_POST['idMembers'], PDO::PARAM_STR);
$stmt->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue(':src', $_POST['src'], PDO::PARAM_STR);
$stmt->bindValue(':shapeRing', $_POST['shapeRing'], PDO::PARAM_STR);
$stmt->bindValue(':shapeProp', $_POST['shapeProp'], PDO::PARAM_STR);
$stmt->bindValue(':colorRing', $_POST['colorRing'], PDO::PARAM_STR);
$stmt->bindValue(':colorProp', $_POST['colorProp'], PDO::PARAM_STR);
$stmt->execute();
header('Location: basket.php?i='.$conn->lastInsertId());