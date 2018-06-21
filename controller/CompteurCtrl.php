<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE MODELE.
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/
    //class
namespace Controller ;
    use Libs\helper\Utils;
    use Libs\system\Controller;
    use Model\Abonnement;
    use Model\Client;
    use Model\Compteur;
    use Model\Config;
    use Model\Village;

    class CompteurCtrl extends Controller {

        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){
            $villages = Village::all();
            $idlaastvillageinclient =Config::get(Config::LAST_ID_VILLAGE_IN_CLIENT);
            $clients = $idlaastvillageinclient == '' ? Client::where("estabonne","=",1)->get()  : Client::where("id_village","=",$idlaastvillageinclient)->where("estabonne","=",1)->get();
            foreach ($clients as $client)
            {
                $client->village = Village::find($client->id_village);
                $client->abonnement = Abonnement::where("id_client","=",$client->idClient)->get()[0];
                $client->compteur = Compteur::where("id_abonnement","=",$client->abonnement->idabonnement)->get()[0];
               // die( $client->compteur->estcoupe."");

            }
            return $this->view->load("compteur/index",compact(['clients','villages','idlaastvillageinclient']));
			
        }
        public function get($idCompteur)
        {
            $compteur = Compteur::find($idCompteur);
            echo json_encode($compteur);
        }
		
    }
?>