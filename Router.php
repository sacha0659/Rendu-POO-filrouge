<?php


use App\Controller\AmisController;
use App\Controller\AccueilController;
use App\Controller\IndexController;
use App\Controller\AffichageReponsesController;
use App\Controller\CompteController;
use App\Controller\ConnexionController;
use App\Controller\InscriptionController;
use App\Controller\Modifier_compteController;
use App\Controller\Page_sondageController;
use App\Controller\SondagesController;
use App\Controller\VoteController;
use App\Controller\DeconnexionController;


if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]):
        case 'amis':
            $controller = new AmisController();
            $controller->amis();
            break;

        case 'compte':
            $controller = new CompteController();
            $controller->compte();
            break;
        case 'sondages':
            $controller = new SondagesController();
            $controller->sondages();
            break;
        case 'accueil':
            $controller = new AccueilController();
            $controller->accueil();
            break;
        case 'index':
            $controller = new IndexController();
            $controller->index();
            break;
        case 'connexion':
            $controller = new ConnexionController();
            $controller->connexion();
            break;
        case 'inscription':
            $controller = new InscriptionController();
            $controller->inscription();
            break;
        case 'modifier':
            $controller = new Modifier_CompteController();
            $controller->modifier();
            break;
    
        case 'affichersondage':
            $controller = new AffichageReponsesController();
            $controller->afficherreponses();
            break;
        case 'vote':
            $controller = new VoteController();
            $controller->vote();
            break;
        case 'deconnexion':
            $controller = new DeconnexionController();
            $controller->deconnexion();
            break;
            break;
    endswitch;
} else {
}
