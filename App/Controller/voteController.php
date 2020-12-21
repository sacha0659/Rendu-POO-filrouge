<?php

namespace App\Controller;

use App\Model\VoteModel;

class VoteController
{
    public function __construct()
    {
        $this->model = new VoteModel();
    }
    public function vote()
    {
        $profil = $this->model->vote();
        require ROOT . "/App/View/VoteView.php";
    }
}

// require_once('inc/bdd.php');
// include_once('inc/header.php');
// require "App/Controller/voteController.php";
