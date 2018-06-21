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
    use Model\Village;

    class AbonnementCtrl extends Controller {

        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){
            $idlaastvillageinclient =Config::get(Config::LAST_ID_VILLAGE_IN_CLIENT);
            $villages = Village::all()->all();
           $abonnees = \Model\Abonnement::join('client','client.idClient','=','abonnement.id_client')
                ->select(['abonnement.*','client.*'])
                ->get();
            return $this->view->load("abonnement/index",compact(['abonnees','idlaastvillageinclient','villages']));
			
        }

        public function create()
        {
            DB::beginTransaction();
            if(Utils::get("idAbonement") == "")
            {
                $cliend = Client::find(Utils::get("idclientabonnee"));
                //create abonnement
                $creditialA['numero'] = Config::get(Config::NUMERO_ABONNEMENT);

                Config::set(Config::NUMERO_ABONNEMENT,(string)((int)Config::get(Config::NUMERO_ABONNEMENT) + 1 ));
                $creditialA['date_creation'] =\DateTime::createFromFormat("Y-m-d",Utils::get("dateAbonement")) ;
                $creditialA['description'] = Utils::get("DescriptionAbon");
                $creditialA['id_client'] = $cliend->idClient;
                $abonnement = Abonnement::create($creditialA);

                //create compteur
                $creditialC['numerocompteur'] = Config::get(Config::NUMERO_COMPTEUR);
                Config::set(Config::NUMERO_COMPTEUR,(string)((int)Config::get(Config::NUMERO_COMPTEUR) + 1));
                $creditialC['consommationl'] = "zero";
                $creditialC['consommationc'] = 0 ;
                $creditialC['id_abonnement'] = $abonnement->idabonnement;
                $compteur = Compteur::create($creditialC);
                $cliend->estabonne= 1;
                $cliend->save();
                DB::commit();
                echo 1 ;
            }
            else
            {
                $cliend = Client::find(Utils::get("idclientabonnee"));
                //create abonnement
                $abonnement = Abonnement::find(Utils::get("idAbonement"));
                $abonnement->date_creation =\DateTime::createFromFormat("Y-m-d",Utils::get("dateAbonement")) ;
                $abonnement->description = Utils::get("DescriptionAbon");
                $abonnement->save();

                DB::commit();
                echo 2 ;
            }

        }
		
    }
?>