<?php 
#Classe controller para a Home do sistema
require_once(__DIR__ . "/Controller.php");

class HomeVisitanteController extends Controller {

    public function __construct() {
       
        $this->handleAction();
    }

    protected function home() {
        $this->loadView("home/homevisitante.php", []);
    }
}


#Criar objeto da classe
new HomeVisitanteController();
