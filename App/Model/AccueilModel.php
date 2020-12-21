<?php

namespace App\Model;

use Core\Database;

class AccueilModel extends Database
{
    public function accueil()
    {
    
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) 
    {
        header('Location: ../public/index.php?page=compte');
    }
}
}
