<?php

namespace App\Controller;

use App\Model\ConnexionModel;

class ConnexionController
{
    public function __construct()
    {
        $this->model = new ConnexionModel();
    }
    public function connexion()
    {
        $profil = $this->model->connexionprofil();
        require ROOT . "/App/View/ConnexionView.php";
    }
}
