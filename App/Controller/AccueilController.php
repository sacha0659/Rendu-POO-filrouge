<?php

namespace App\Controller;

use App\Model\AccueilModel;

class AccueilController
{
    public function __construct()
    {
        $this->model = new AccueilModel();
    }
    public function accueil()
    {
        $profil = $this->model->accueil();
        require ROOT . "/App/View/AccueilView.php";
    }
}
