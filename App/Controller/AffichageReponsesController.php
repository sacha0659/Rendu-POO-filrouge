<?php

namespace App\Controller;

use App\Model\AffichageReponsesModel;

class AffichageReponsesController
{
    public function __construct()
    {
        $this->model = new AffichageReponsesModel();
    }
    public function afficherreponses()
    {
        $select_sondage = $this->model->affichersondage();
        require ROOT . "/App/View/AffichageReponsesView.php";
    }
}
