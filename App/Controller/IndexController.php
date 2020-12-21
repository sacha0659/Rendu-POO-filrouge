<?php

namespace App\Controller;

use App\Model\IndexModel;

class IndexController
{
    public function __construct()
    {
        $this->model = new IndexModel();
    }
    public function index()
    {
        $listesondages = $this->model->listesondages();
        require ROOT . "/App/View/IndexView.php";
    }
}
