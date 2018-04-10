<?php
/**
 * Created by PhpStorm.
 * User: pauleherman
 * Date: 10/04/2018
 * Time: 13:55
 */


require_once ('./conn.php');

function testmail($mail, $conn, $pseudo)
{
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $requeteMail = "SELECT
                            `mail`
                          FROM
                            `members`
                          WHERE
                            `mail` = :mail
                            ;";
        $stmt = $conn->prepare($requeteMail);
        $stmt->bindValue(':mail', $_POST['mail']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //get number of rows to check if mail exists
        $mailExist = $stmt->rowCount();
        //var_dump($pseudo);
        //echo "tamere";

        if ($mailExist !== 0) {
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_POST['formok'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pseudolen = strlen($pseudo);

    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);

    /*$password1 = password_hash($_POST["password1"],
        PASSWORD_BCRYPT, ["cost" => 12]);
    $password2 = password_hash($_POST["password2"],
        PASSWORD_BCRYPT, ["cost" => 12]);*/

    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];


    if (empty($_POST['pseudo']) && empty($_POST['mail']) && empty($_POST['mail2']) && empty($_POST['password1']) && empty($_POST['password2'])) {
        $msg = "Veuillez remplir tous les champs";
        var_dump($pseudo);
        echo "world";

    } elseif ($pseudolen >= 45) {
        $msg = "Votre pseudo doit faire moins de 45 caractères";
        var_dump($pseudo);
        echo "salut";

    } elseif ($mail !== $mail2) {
        $msg = "Vos adresses mails ne correspondent pas";
        var_dump($pseudo);
        echo "chut";

    } elseif(testmail($mail, $conn, $pseudo)) {
        $msg = "Votre adresse mail est déjà utilisée";
        var_dump($pseudo);
        echo "lol";

    } elseif ($password1 !== $password2) {
        $msg = "Vos mots de passe ne correspondent pas";
        var_dump($pseudo);
        echo "mdr";

    } else {
        $requete = "INSERT INTO
                                  `members`
                                  (`pseudo`, `mail`, `mdp`, `privilege`)
                                  VALUES
                                  (:pseudo, :mail, :mdp, 1)
                                  ;";

        $stmt = $conn->prepare($requete);
        $stmt->bindValue(':pseudo', $_POST['pseudo']);
        $stmt->bindValue(':mail', $_POST['mail']);
        $stmt->bindValue(':mdp', $_POST['password1']);
        $stmt->execute();
        //header("Location: connexion.php");
        var_dump($pseudo);
        echo "mdlolll";
        exit;

    }
}

?>

<!doctype html>
<html>
 <body>
    <div class = "center">
     <form class="form" method="post" action="">
         <table class="table">
             <tr>
                 <td>
                     <input class="input" id="pseudo" type="text" placeholder="Pseudo" name="pseudo" value="<?php if (isset($pseudo)) {echo $pseudo;}?>">
                 </td>
             </tr>
             <tr>
                 <td>
                     <input class="input" id="mail" type="email" placeholder="Mail" name="mail" value="<?php if (isset($mail)) {echo $mail;}?>">
                 </td>
             </tr>
             <tr>
                 <td>
                     <input class="input" id="mail2" type="email" placeholder="Confirmer votre mail" name="mail2" value="<?php if (isset($mail2)) {echo $mail2;}?>">
                 </td>
             </tr>
             <tr>
                 <td>
                     <input class="input" id="password1" type="password" placeholder="Mot de passe" name="password1">
                 </td>
             </tr>
             <tr>
                 <td>
                     <input class="input" id="password2" type="password" placeholder="Confirmer le mot de passe" name="password2">
                 </td>
             </tr>
         </table>
         <input class="input" type="submit" value="Valider" name="formok">
     </form>
     <a class="connectLink" href="#">J'ai déjà un compte</a>

     <?php
     if (isset($msg)) {
         echo '<p class = "message">' . $msg . '</p>';
         var_dump($msg);
     }
     ?>

    </div>
 </body>
</html>