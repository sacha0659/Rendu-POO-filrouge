<?php

namespace App\Controller;

use App\Model\CompteModel;

class CompteController
{
    public function __construct()
    {
        $this->model = new CompteModel();
    }

    public function compte()
    {
        $profil = $this->model->recupere_profil();
        $sondages = $this->model->recupere_sondage();
        $reponses = $this->model->recuperation_resultats();
        require ROOT . "/App/View/CompteView.php";
    }
}
