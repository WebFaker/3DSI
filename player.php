<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="/favicon.d62eb6fb.png">
  <title>Ringu | Social</title>
  <link rel="stylesheet" href="/src.5d8eb1a6.css">
  <link rel="stylesheet" href="./TemplateData/style.css">
</head>

<body>
  <!-- content -->
  <header class="Header">
    <div class="container">
      <div class="row middle-xs">
        <a class="Header-logo" title="R" href="/index.php"><img src="https://cdn.discordapp.com/attachments/432918149218828290/433589887887736832/ringLogo-white.png" class="Header-img" alt="Ringu"></a>
        <a class="Header-link-white" href="/market.php">BOUTIQUE</a>
        <a class="Header-link" href="/events.php">ÉVÈNEMENTS</a>
        <a class="Header-link" href="/player.php">GÉNÉRATEUR</a>
        <a class="Header-link-right" href="/connexion.php">COMPTE</a>
        <a class="Header-link-basket" href="/basket.php">PANIER</a>
      </div>
    </div>
  </header>

  <div class="containt">
    <section class="Texture">
    </section>
  </div>
  <div class="webgl-content">
    <div id="gameContainer" class="Social-Player" style="width: 853px; height: 480px;"></div>
  </div>
  <section class="Social">
    <div class="Social-Container">
      <span><p class="Social-Title">VOUS AIMEZ VOTRE RENDU ?</p></span>
      <span><p class="Social-Title">PARTAGEZ-LE AVEC D'AUTRES UTILISATEURS</p></span>
      <div class="Social-Icons">
        <a class="Social-Insta" href="#"><img src="/instagram.bc56fa3a.png" alt="Instagram"></a>
        <a class="Social-FB" href="#"><img src="/facebook.4eed6040.png" alt="Facebook"></a>
        <a class="Social-Flickr" href="#"><img src="/flickr.8691f9c2.png" alt="Flickr" style="padding-bottom: 10px;"></a>
      </div>
    </div>
  </section>

  <form action="/doadd.php" class="form" method="POST">
      <input type="text">
  </form>

  <script src="./TemplateData/UnityProgress.js"></script>
  <script src="./Build/UnityLoader.js"></script>
  <script src="%UNITY_WEBGL_LOADER_URL%"></script>
  <script>
    var gameInstance = UnityLoader.instantiate("gameContainer", "./Build/Build_Final_2.json", {onProgress: UnityProgress});
  </script>
  <!-- end content -->
  <script src="/src.5d8eb1a6.js"></script>
  <script src="GetInfo.js"></script>
</body>

</html>
