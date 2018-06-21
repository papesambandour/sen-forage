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
    use Model\Compteur;
    use Model\Config;
    use Model\Facture;

    class FactureCtrl extends Controller {

        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){
            return $this->view->load("accueil/index");
			
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
?>