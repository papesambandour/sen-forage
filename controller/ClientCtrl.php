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
    use Model\Client;
    use Model\Config;
    use Model\Village;

    class ClientCtrl extends Controller {

        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){
            $villages = Village::all()->all();
            $idlaastvillageinclient =Config::get(Config::LAST_ID_VILLAGE_IN_CLIENT);
            $clients = $idlaastvillageinclient == '' ? Client::all()  : Client::where("id_village","=",$idlaastvillageinclient)->get();
            foreach ($clients as $client)
            {
                $client->village = Village::find($client->id_village);
            }
            return $this->view->load("client/index",compact(['clients','villages','idlaastvillageinclient']));
			
        }
        public function filterClientByVilage(){
            $clients =null;
            Config::set(Config::LAST_ID_VILLAGE_IN_CLIENT,Utils::get("villageInClient"));
            if(Utils::get("villageInClient") == "")
            {
                $clients = Client::all();

            }
            else
            {
                $clients = Client::where("id_village","=",Utils::get("villageInClient"))->get();

            }
            foreach ($clients as $client)
            {
                $client->village = Village::find($client->id_village);
            }
            echo json_encode($clients);
        }
        public function create()
        {
            $client = new Client();
            $village = Village::find(Utils::get("villageClientAdd"));
            $client->nomcomplet = Utils::get("nomclientAdd");
            $client->etat_client = Utils::get("etatclientAdd");
            $client->id_chefvillage = $village->chefdevillage_id;
            $client->id_village = $village->idvillage;
            $client->save();
            echo $client->idClient;
        }
        public function update($id)
        {

            $village = Village::find(Utils::get("villageClientEdit"));
            $client = Client::find($id);
            if($client->id_chefvillage == null && $client->id_village != $village->idvillage)
            {
                echo 2 ;
                return;
            }
            if ($client->id_chefvillage !== null )
            {
                $client->id_chefvillage = $village->chefdevillage_id;
            }
            $client->nomcomplet = Utils::get("nomclientEdit");
            $client->etat_client = Utils::get("etatclientEdit");
            $client->id_village = $village->idvillage;

            $client->save();
            echo 1;
        }
        public function gets()
        {
            $lastidvillageinclient =Config::get(Config::LAST_ID_VILLAGE_IN_CLIENT);
            $clients = $lastidvillageinclient == '' ? Client::all() : Client::where("id_village","=",$lastidvillageinclient)->get();
            foreach ($clients as $client)
            {
                $client->village = Village::find($client->id_village);
            }
            echo json_encode($clients);

        }
        public function search()
        {
            $lastidvillageinclient =Config::get(Config::LAST_ID_VILLAGE_IN_CLIENT);
            $clients = $lastidvillageinclient == '' ?  Client::where("nomcomplet","like","%".Utils::get("item")."%")->get() : Client::where("nomcomplet","like","%".Utils::get("item")."%")->where("id_village","=",$lastidvillageinclient)->get();
            foreach ($clients as $client)
            {
                $client->village = Village::find($client->id_village);
            }
            echo json_encode($clients);

        }
        public function get($id)
        {
            $client = Client::find($id);
            $client->village = Village::where("idvillage","=",$client->id_village)->get()[0];
            $villages = Village::all();

            if(is_object($client))
            {
                echo json_encode(["client"=>$client,"villages"=>$villages]);
            }
            else
            {
                echo  1 ;
            }

        }
        public function delete($id)
        {
            $client = Client::find($id);
            if(is_object($client))
            {
                $client->delete();
                echo  1;
            }
            else
            {
                echo 0;
            }


        }
        public function getsbychef($id)
        {
            $clients = Client::where("id_village","=",$id)->get();
            echo json_encode($clients);

        }
		
    }
?>