<?php session_start();
$_SESSION['user']=1;
require_once "conn.php";
if(isset($_GET['i'])):
    $requete = "insert into
    `orders`
    (
    `idMembers`,
    `idRings`
    )
    values
    (
    :idMembers,
    :idRings
    )
    ;";
    $stm = $conn->prepare($requete);
    $stm->bindValue(':idMembers', $_SESSION['user'], PDO::PARAM_STR);
    $stm->bindValue(':idRings', $_GET['i'], PDO::PARAM_STR);
    $stm->execute();
endif;
$requet = "select
    `idOrders`,
    `idMembers`,
    `idRings`
    from
    `orders`
    ;";
$stmtt = $conn->prepare($requet);
$stmtt->execute();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/favicon.d62eb6fb.png">
    <title>Ringu | Panier</title>
    <link rel="stylesheet" href="/src.5d8eb1a6.css">
</head>

<body>
<!-- content -->
<header class="Header">
    <div class="container">
        <div class="row middle-xs">
            <a class="Header-logo" title="R" href="/index.php"><img src="https://cdn.discordapp.com/attachments/432918149218828290/433589887887736832/ringLogo-white.png" class="Header-img" alt="Ringu"></a>
            <a class="Header-link-white" href="/market.php">BOUTIQUE</a>
            <a class="Header-link" href="/events.php">EVENEMENTS</a>
            <a class="Header-link" href="/player.php">GENERATEUR</a>
            <a class="Header-link-right" href="/connexion.php">COMPTE</a>
            <a class="Header-link-basket" href="/basket.php">PANIER</a>
        </div>
    </div>
</header>

<div class="containt">
    <section class="Texture">
    </section>

    <section class="Basket">
        <div class="Basket-Container">
            <div class="Basket-Whitebox">
                <span><p class="Basket-Title">MON PANIER</p></span>
                <?php while(false !== $roww = $stmtt->fetch(PDO::FETCH_ASSOC)):
                $sql = "select
    `idMembers`,
    `price`,
    `name`,
    `src`,
    `shapeRing`,
    `shapeProp`,
    `colorRing`,
    `colorProp`
    from
    `rings`
    WHERE
    `idRings`=:idRings
    ;";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':idRings', $roww['idRings'], PDO::PARAM_STR);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="Basket-Box">
                        <img class="Basket-Img" src="<?= $row['src'] ?>"/>
                        <div class="Basket-Content">
                            <div class="Basket-Info">
                                <span><p class="Basket-Name"><?= $row['name'] ?></p></span>
                                <span><a class="Basket-Qte" href="dodelete.php?i=<?=$roww['idOrders']?>">Supprimer</a></span>
                            </div>
                            <div class="Basket-Info2">
                                <span><p class="Basket-Txt"><?=$row['shapeRing']?></p></span>
                                <span><p class="Basket-Txt"><?=$row['shapeProp']?></p></span>
                            </div>
                            <div class="Basket-Info3">
                                <span><p class="Basket-Txt"><?=$row['colorRing']?> - <?=$row['colorProp']?></p></span>
                                <span><p class="Basket-Price"><?=$row['price']?>€</p></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="Basket-Paidbox">
            <a href="connexion.php">
              <span><p class="Basket-Paid">
                Payer
              </p></span>
            </a>
        </div>
    </section>
</div>

<!-- end content -->
<script src="/src.5d8eb1a6.js"></script>
</body>

</html>
