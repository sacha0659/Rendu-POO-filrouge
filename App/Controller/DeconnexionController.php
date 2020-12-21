<?php

namespace App\Controller;

use App\Model\DeconnexionModel;

class DeconnexionController
{

    public function __construct()
    {
        $this->model = new DeconnexionModel();
    }

    public function deconnexion()
    {
        $req = $this->model->deconnexion();
        require ROOT . "/App/View/DeconnexionView.php";
    }
}
