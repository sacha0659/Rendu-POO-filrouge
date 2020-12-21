<?php

namespace App\Model;

use Core\Database;

class VoteModel extends Database
{
    public function vote()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            
            
                $_url =  $_GET['url_'];
                $vote =  $_POST['vote'];
                echo $_url;

                $select_sondage = $this->pdo->query("SELECT reponses_sondages.id ,nb_vote FROM sondages INNER JOIN reponses_sondages WHERE (reponses_sondages.sondage_id = sondages.id and _url = $_url ) AND reponses_sondages.name_questions = $vote ");

                // $select_sondage = $db->query("SELECT nb_vote FROM reponses_sondages INNER JOIN reponses_sondages WHERE reponses_sondages.sondage_id = sondages.id and _url = $_url");

                $select_sondage = $select_sondage->fetch();
                $select_sondage['nb_vote']++;
                var_dump($select_sondage['id']);

                $req = $this->pdo->prepare("UPDATE reponses_sondages SET nb_vote = :nb_vote WHERE id = :id");
                $req->bindParam(':nb_vote', $select_sondage['nb_vote']);
                $req->bindParam(':id', $select_sondage['id']);
                $req->execute();
                header('Location:index.php?page=index');
            
        }
    }
}
