<?php session_start(); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/favicon.d62eb6fb.png">
    <title>Ringu | Boutique</title>
    <link rel="stylesheet" href="/src.5d8eb1a6.css">
</head>

<body>
<!-- <img class="imgBackground" src="./img/Texture01.jpg" alt=""> -->
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
    <section class="TextureM">
        <div class="MarketG">
            <div class="MarketG-container">
                <span><p class="MarketG-Title">BOUTIQUE</p></span>
                <span><p class="MarketG-Filter">TRIER PAR :</p></span>
                <ul>
                    <li class="MarketG-Item"><a class="MarketG-Link" href="#">Prix Croissant</a></li>
                    <li class="MarketG-Item"><a class="MarketG-Link" href="#">Prix Décroissant</a></li>
                    <li class="MarketG-Item"><a class="MarketG-Link" href="#">Matériaux</a></li>
                    <li class="MarketG-Item"><a class="MarketG-Link" href="#">Popularité</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="MarketD">
        <div class="MarketD-Container">

            <?php
            require_once "conn.php";
            $sql = "SELECT
`idRings`,
`price`,
`name`,
`src`,
`idMembers`
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
    `idMembers` = :idMembers
    ;";
                $stmtt = $conn->prepare($requete);
                $stmtt->bindValue(':idMembers', $row['idMembers'], PDO::PARAM_STR);
                $stmtt->execute();
                $roww = $stmtt->fetch(PDO::FETCH_ASSOC);
                ?>


                <div class="MarketD-Item">
                    <div class="MarketD-Imgcontainer">
                        <img class="MarketD-Img" src="<?=$row['src']?>" alt="C'est une bague">
                    </div>
                    <div class="MarketD-Carotte">
                        <span><p class="MarketD-Price"><?=$row['price']?>€</p></span>
                        <a href="basket.php?i=<?=$row['idRings']?>"><img src="https://cdn.discordapp.com/attachments/433666461605691403/433668209330356225/shopping-cart-with-horizontal-lines-design.png" alt="Panier"></a>
                    </div>
                    <div class="MarketD-Title">
                        <span><p class="MarketD-Name"><?=$row['name']?></p></span>
                    </div>
                    <div class="MarketD-Author">
                        <span><p class="MarketD-Creator">Une création de <?=$roww['pseudo']?></p></span>
                    </div>
                </div>

            <?php endwhile;
            ?>



        </div>
    </section>

</div>
<!-- end content -->
<script src="/src.5d8eb1a6.js"></script>
</body>

</html>
