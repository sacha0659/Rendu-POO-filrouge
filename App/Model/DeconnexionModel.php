<?php

namespace App\Model;

use Core\Database;

class DeconnexionModel extends Database
{
    public function deconnexion()
    {
        $state = 0;
        $req = $this->pdo->prepare("UPDATE users SET isconnected = :_state WHERE id = {$_SESSION['user']['id']}");
        $req->bindParam(':_state', $state);
        $req->execute();
        unset($_SESSION['user']);
        return $req;

        header('Location: index.php');
    }
}
