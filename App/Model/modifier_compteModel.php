<?php

namespace App\Model;

use Core\Database;

class Modifier_CompteModel extends Database
{
    public function modifiercompte()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            // Ici, l'utilisateur est connecté
            $profil = $this->pdo->query("SELECT * FROM users WHERE id = {$_SESSION['user']['id']}");
            //array($_SESSION['user']['id']));

            $profil = $profil->fetch();


            if (!empty($_POST)) {
                extract($_POST);
                $valid = true;

                if (isset($_POST['modification'])) {

                    $pseudo = htmlentities(trim($pseudo));
                    $mail = htmlentities(strtolower(trim($mail)));

                    $req = $this->pdo->prepare("UPDATE users SET pseudo = :pseudo, email = :mail WHERE id = {$_SESSION['user']['id']}");
                    $req->bindParam(':pseudo', $pseudo);
                    $req->bindParam(':mail', $mail);
                    $req->execute();

                    echo ('session pseudo : ' . $_SESSION['user']['pseudo']);

                    $_SESSION['user']['pseudo'] = $pseudo;
                    $_SESSION['user']['email'] = $mail;

                    header('Location:index.php?page=compte');
                    exit;
                }
            }
        }
    }
}
