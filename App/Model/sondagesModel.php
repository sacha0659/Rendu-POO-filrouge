<?php

namespace App\Model;

use Core\Database;

class SondagesModel extends Database
{
    public function envoie_sondage()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            // Ici, l'utilisateur est connecté
            if (!empty($_POST['question'])) {

                $question = htmlentities($_POST['question']);
                $time = 2;
                $creator_id = htmlentities($_SESSION['user']['id']);
                $url = random_bytes(4);
                $url = bin2hex($url);
                try {
                    $sql = "INSERT INTO sondages (questions, creator_id, _url, date_fin) VALUES (:question, :creator_id, :_url, :_time)";
                    $query = $this->pdo->prepare($sql);
                    $query->bindValue(':question', $question);
                    $query->bindValue(':creator_id', $creator_id);
                    $query->bindValue(':_time', $time);
                    $query->bindValue(':_url', $url);
                    $query->execute();
                    $question = '"' . $question . '"';
                    $select_sondage = $this->pdo->query("SELECT * FROM sondages WHERE questions = $question");
                    $select_sondage = $select_sondage->fetch();
                    foreach ($_POST['reponse'] as $value) {
                        $reponse = $value;
                        $sql2 = "INSERT INTO reponses_sondages (name_questions, sondage_id, nb_vote) VALUES (:reponse, :sondage_id, :nb_vote)";
                        $query = $this->pdo->prepare($sql2);
                        $query->bindValue(':reponse', $reponse);
                        $query->bindValue(':sondage_id', $select_sondage["id"]);
                        $query->bindValue(':nb_vote', 0);
                        $query->execute();
                    };
                } catch (\PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
            }
            $req = $this->pdo->query("SELECT * FROM sondages");
            $results = $req->fetchAll();
            return $results;
        } else {
            header('Location: index.php');
        };
    }
}
