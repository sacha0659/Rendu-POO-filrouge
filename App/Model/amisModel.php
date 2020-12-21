<?php

namespace App\Model;

use Core\Database;

class AmisModel extends Database
{
    public function show_friend()
    {
        $query = $this->pdo->prepare("SELECT * FROM friends WHERE iduser_1 = :iduser_1 OR iduser_2 = :iduser_2");

        $query->execute([
            "iduser_1" => $_SESSION['user']['pseudo'],
            "iduser_2" => $_SESSION['user']['pseudo']
        ]);
        $data = $query->fetchAll();
        return $data;
    }

    public function delete_friend()
    {
        $query = $this->pdo->prepare("SELECT * FROM friends WHERE iduser_1 = :iduser_1 OR iduser_2 = :iduser_2");

        $query->execute([
            "iduser_1" => $_SESSION['user']['pseudo'],
            "iduser_2" => $_SESSION['user']['pseudo']
        ]);
        $data = $query->fetchAll();
        if (!empty($_POST)) {
            extract($_POST);

            if (isset($_POST['deletefriend']) != NULL) {
                $delete_friend = $this->pdo->prepare("DELETE FROM friends WHERE (iduser_1 = :iduser_1) AND (iduser_2 = :iduser_2)");
                $delete_friend->bindParam(':iduser_1', $_SESSION['user']['pseudo'], \PDO::PARAM_STR);
                $delete_friend->bindParam(':iduser_2', $_POST['deletefriend'], \PDO::PARAM_STR);
                $delete_friend->execute();
                header('Location: index.php?page=amis');
                return $delete_friend;
            }
        }
    }

    public function add_friend()
    {
        $query = $this->pdo->prepare("SELECT * FROM friends WHERE iduser_1 = :iduser_1 OR iduser_2 = :iduser_2");

        $query->execute([
            "iduser_1" => $_SESSION['user']['pseudo'],
            "iduser_2" => $_SESSION['user']['pseudo']
        ]);
        $data = $query->fetchAll();
        if (!empty($_POST)) {
            extract($_POST);
            if (isset($_POST['addfriend']) != NULL) {
                $add_friend = $this->pdo->prepare("INSERT INTO friends (iduser_1,iduser_2) VALUES(:iduser_1,:iduser_2)");
                $add_friend->bindValue(':iduser_1', $_SESSION['user']['pseudo']);
                $add_friend->bindValue(':iduser_2', $_POST['addfriend']);
                $add_friend->execute();
                header('Location: index.php?page=amis');
                return $add_friend;
            }
        }
    }


    public function search_friend()
    {
        if (!empty($_POST)) {
            if (isset($_POST['search']) != NULL) {
                $search = '"' . $_POST['search'] . '"';

                $search_friend = $this->pdo->query("SELECT pseudo, email FROM users WHERE pseudo = " . $search);
                $search_friend = $search_friend->fetchAll();
                return $search_friend;

                if ($search_friend == null) {
                    echo ('Erreur : aucun résultat !');
                } else {
                }
            }
        }
    }
}
