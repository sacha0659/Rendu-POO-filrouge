<?php

namespace App\Model;

use Core\Database;

class InscriptionModel extends Database
{
    public function inscription()
    {
        if (isset($_POST) && !empty($_POST)) {
            // On vérifie que tous les champs sont existants et remplis
            if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
                // Ici le formulaire est complet
                // On récupère les valeurs des champs
                $pseudo = strip_tags($_POST['pseudo']);
                $email = strip_tags($_POST['email']);

                // On récupère le mot de passe et on le chiffre
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                // On se connecte à la base
                require_once('inc/bdd.php');

                // On écrit la requête
                $sql = 'INSERT INTO `users`(`email`, `password`, `pseudo`) VALUES (:email, :password, :pseudo);';

                // On prépare la requête
                $query = $this->pdo->prepare($sql);

                // On injecte les valeurs
                $query->bindValue(':email', $email, \PDO::PARAM_STR);
                $query->bindValue(':password', $pass, \PDO::PARAM_STR);
                $query->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);

                // On exécute la requête
                $query->execute();

                // On redirige vers la page d'accueil
                header('Location: sondages.php');
            } else {
                echo 'Tous les champs sont obligatoires';
            }
        }
    }
}
