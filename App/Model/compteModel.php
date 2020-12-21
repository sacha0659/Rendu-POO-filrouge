<?php

namespace App\Model;

use Core\Database;

class CompteModel extends Database
{
    public function recupere_profil()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            // Ici, l'utilisateur est connecté
            $profil = $this->pdo->query("SELECT * FROM users WHERE id = " . $_SESSION['user']['id']);

            $profils = $profil->fetch();
            return $profils;
        }
    }

    public function recupere_sondage()
    {
        $req = $this->pdo->query("SELECT * FROM sondages WHERE creator_id = " . $_SESSION['user']['id']);

        $sondages = $req->fetchAll();
        return $sondages;
    }

    public function recuperation_resultats()
    {

        $req2 = $this->pdo->query("SELECT * FROM reponses_sondages INNER JOIN sondages ON reponses_sondages.sondage_id = sondages.id WHERE sondages.creator_id = " . $_SESSION['user']['id']);
        // $reponses = $req2->fetchAll();
        return $req2;
    }
}
