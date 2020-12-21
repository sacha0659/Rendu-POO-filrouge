<?php

namespace App\Model;

use Core\Database;

class Page_SondageModel extends Database
{
    public function affichersondage()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            // Ici, l'utilisateur est connecté
            include('../public/inc/nav.php');

            $_url = $_GET['url_'];
            $select_sondage = $this->pdo->query("SELECT * FROM sondages INNER JOIN reponses_sondages WHERE reponses_sondages.sondage_id = sondages.id and _url = $_url");
            $select_sondage = $select_sondage->fetchAll();
            return $select_sondage;
        } else {
            header('Location:index.php');
        };
    }

    public function listesondages()
    {
        $liste = $this->pdo->query("SELECT * FROM sondages WHERE creator_id = " . $_SESSION['user']['id']);
        $listesondages = $liste->fetchAll();
        return $listesondages;
    }
}
// require_once('public/inc/bdd.php');
// include_once('public/inc/header.php');
