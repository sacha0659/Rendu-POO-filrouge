<?php

namespace App\Model;

use Core\Database;

class ConnexionModel extends Database
{
    public function connexionprofil()
    {
        if (isset($_POST['connexion'])) {

            // On vérifie que tous les champs sont remplis
            if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
                // On récupère les valeurs saisies
                $mail = strip_tags($_POST['email']);
                $pass = $_POST['pass'];
                
                // On écrit la requête
                $sql = 'SELECT * FROM `users` WHERE `email` = :email';

                // On prépare la requête
                $query = $this->pdo->prepare($sql);

                // On injecte (terme scientifique) les valeurs
                $query->bindValue(':email', $mail, \PDO::PARAM_STR);

                // On exécute la requête
                $query->execute();

                // On récupère les données
                $user = $query->fetch(\PDO::FETCH_ASSOC);

                // Soit on a une réponse dans $user, soit non
                // On vérifie si on a une réponse
                if ($user == 0) {
                    echo 'Email et/ou mot de passe invalide';
                } else {
                    // On vérifie que le mot de passe saisi correspond à celui en base
                    // password_verify($passEnClairSaisi, $passBaseDeDonnees)
                    if (password_verify($pass, $user['password'])) {
                        // On crée la session "user"
                        // On ne stocke JAMAIS de données dont on ne maîtrise pas le contenu
                        $_SESSION['user'] = [
                            'id'    => $user['id'],
                            'email' => $user['email'],
                            'pseudo'  => $user['pseudo']
                        ];
                        $state = 1;
                        $req = $this->pdo->prepare("UPDATE users SET isconnected = :_state WHERE id = {$_SESSION['user']['id']}");
                        $req->bindParam(':_state', $state);
                        $req->execute();

                        header('Location: ../public/index.php?page=compte');
                    } else {
                        $err = '<p class="phpAlert"> Mot de pase et/ou identifiant incorrect</p>';
                        echo $err;
                        return$err;
                    }
                }
            } else {
                echo "Veuillez remplir tous les champs...";
            }
        }
    }
}
