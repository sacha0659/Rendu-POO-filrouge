<?php

namespace App\Controller;

use App\Model\InscriptionModel;

class InscriptionController
{
    public function __construct()
    {
        $this->model = new InscriptionModel();
    }
    public function inscription()
    {
        $profil = $this->model->inscription();
        require ROOT . "/App/View/InscriptionView.php";
    }
}



// include_once('inc/header.php');
// require "App/Controller/inscriptionController.php";
// require "App/View/inscriptionView.php";
