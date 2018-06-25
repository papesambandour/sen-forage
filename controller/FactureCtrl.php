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
    use Libs\system\DB;
    use Model\Abonnement;
    use Model\Client;
    use Model\Compteur;
    use Model\Config;
    use Model\Facture;
    use Model\Village;

    class FactureCtrl extends Controller {

        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){

            $villages = Village::all();
            $annes = Utils::getYear();
            $mois = Utils::getMonth();


            $idlaastvillageinclient =Config::get(Config::LAST_ID_VILLAGE_IN_CLIENT);
            $year = Config::get(Config::YEAR);
            $month = Config::get(Config::MONTH);
            $clients = $idlaastvillageinclient == '' ? Client::where("estabonne","=",1)->get()  : Client::where("id_village","=",$idlaastvillageinclient)->where("estabonne","=",1)->get();
            foreach ($clients as $key => $client)
            {
                $client->abonnement = Abonnement::where("id_client","=",$client->idClient)->get()[0];
                $client->compteur = Compteur::where("id_abonnement","=",$client->abonnement->idabonnement)->get()[0];
                $facture = Facture::where('annee','=',$year)->where('mois','=',$month)->where('compteur_id','=',$client->compteur->idcompteur)->get();//si c'est null ca veut dir que on n'a pas encores effectuer de reveler
                if(count($facture) > 0)
                {
                    $client->facture = $facture[0];
                }else{
                    unset($clients[$key]);
                }
                // die( $client->compteur->estcoupe."");

            }
            return $this->view->load("facture/index",compact(['clients','villages','idlaastvillageinclient','annes','mois','year','month']));
			
        }

        public function filterClientByVilage(){
            $clients =null;
            Config::set(Config::LAST_ID_VILLAGE_IN_CLIENT,Utils::get("villageInClient"));
            $year = Utils::get("year");
            $month = Utils::get("month");
            Config::set(Config::YEAR,Utils::get("year"));
            Config::set(Config::MONTH,Utils::get("month"));
            if(Utils::get("villageInClient") == "")
            {
                $clients =Client::where("estabonne","=",1)->get();
            }
            else
            {
                $clients = Client::where("id_village","=",Utils::get("villageInClient"))->where("estabonne","=",1)->get();

            }

            foreach ($clients as $key => $client)
            {
                $client->abonnement = Abonnement::where("id_client","=",$client->idClient)->get()[0];
                $client->compteur = Compteur::where("id_abonnement","=",$client->abonnement->idabonnement)->get()[0];
                $facture = Facture::where('annee','=',$year)->where('mois','=',$month)->where('compteur_id','=',$client->compteur->idcompteur)->get();//si c'est null ca veut dir que on n'a pas encores effectuer de reveler
                if(count($facture) > 0)
                {
                    $client->facture = $facture[0];
                }else{
                    unset($clients[$key]);
                }
                // die( $client->compteur->estcoupe."");

            }
            echo json_encode($clients);
        }
        public function create()
        {
            $facturExist = Facture::where("mois","=",Utils::get("moisrelever"))->where("annee","=",Utils::get("anneerelever"))->where("compteur_id","=",Utils::get("idCompteur"))->get();
            if(count($facturExist) > 0)
            {
                echo 2;
            }
            else
            {
                if((int)Utils::get("moisrelever") == (int)(new \DateTime())->format('m'))
                {
                DB::beginTransaction();
                $compteur = Compteur::find(Utils::get("idCompteur"));

                $facture = new Facture();
                $facture->mois = Utils::get("moisrelever");
                $facture->annee = Utils::get("anneerelever");
                $facture->consommation = (float)Utils::get("cMensuelcmpt");
                $facture->prixunitaire = (float)Config::get(Config::PRIX_UNITAIRE_LITRE);
                $facture->compteur_id = $compteur->idcompteur ;
                $facture->save();

                    $compteur->consommationc +=  $facture->consommation;
                    $compteur->conso_encours =  $facture->consommation;
                    $compteur->consommationl = Utils::numberToLetterConversion($compteur->consommationc);
                    $compteur->save();


                DB::commit();
                echo 1 ;
                }
            }

        }
		
    }
?>