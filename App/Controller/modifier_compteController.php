<?php

namespace App\Controller;

use App\Model\Modifier_CompteModel;

class Modifier_CompteController
{
    public function __construct()
    {
        $this->model = new Modifier_compteModel();
    }
    public function modifier()
    {
        $profil = $this->model->modifiercompte();
        require ROOT . "/App/View/Modifier_compteView.php";
    }
}


// include_once('inc/header.php');
// require_once('inc/bdd.php');
// require "App/Controller/modifier_compteController.php";
// require "App/View/modifier_compteView.php";
