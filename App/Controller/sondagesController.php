<?php

namespace App\Controller;

use App\Model\SondagesModel;

class SondagesController
{
    public function __construct()
    {
        $this->model = new SondagesModel();
    }

    public function sondages()
    {
        $results = $this->model->envoie_sondage();
        require ROOT . "/App/View/sondagesView.php";
    }
}
