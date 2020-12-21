<?php

namespace App\Controller;

use App\Model\AmisModel;

class AmisController
{

    public function __construct()
    {
        $this->model = new AmisModel();
    }

    public function amis()
    {

        $data = $this->model->show_friend();
        $add_friend = $this->model->add_friend();
        $delete_friend =  $this->model->delete_friend();
        $search_friend = $this->model->search_friend();
        require ROOT . "/App/View/AmisView.php";
    }
}
