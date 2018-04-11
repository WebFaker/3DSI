<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once "conn.php";
$sql = "SELECT
`price`,
`name`,
`src`,
`id`
FROM
`rings`
;";
$stmt = $conn->prepare($sql);
$stmt->execute();
while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):
    $requete = "SELECT
    `pseudo`
    FROM
    `members`
    WHERE
    `id` = :id
    ;";
    $stmtt = $conn->prepare($requete);
    $stmtt->bindValue(':id', $row['id'], PDO::PARAM_STR);
    $stmtt->execute();
    $roww = $stmtt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="ringContainer">
        <div style="background-image: url(<?=$row['src']?>);" class="ringContent">
            <h2 class="ringPrice"><?=$row['price']?></h2>
            <h2 class="ringAuthor"><?=$roww['pseudo']?></h2>
        </div>
        <div class="ringNameContainer">
            <h2 class="ringName"><?=$row['name']?></h2>
            <img src="" alt="cart icon" class="cartIcon">
        </div>
    </div>
<?php endwhile;
?>
</body>
</html>
