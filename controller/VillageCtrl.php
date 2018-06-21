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
    use Illuminate\Support\Facades\Request;
    use Libs\helper\Utils;
    use Libs\system\Controller;
    use Libs\system\DB;
    use Model\Client;
    use Model\Village;

    class VillageCtrl extends Controller {
        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){
            $villages = Village::all();
            foreach ($villages as $village)
            {
                $village->population = Client::where("id_village","=",$village->idvillage)->count();
            }
            return $this->view->load("village/index",compact('villages'));
			
        }

        public function create()
        {
           /* DB::transaction(function () {
                DB::rollBack();
              DB::commit();
            });*/
            DB::beginTransaction();
            $creditialV["nomvillage"] = Utils::get("nomvillageAdd") ;
            $creditialV["etat_village"] = Utils::get("etatvillageAdd") ;
            $village =  Village::create($creditialV);
            $creditialC["nomcomplet"] = Utils::get("nomchefVillageAdd");
            $creditialC["etat_client"] = Utils::get("etatchefVillageAdd");
            $creditialC["id_village"] = $village->idvillage;
            $creditialC["tel"] = Utils::get("telchefVillageAdd");
            $creditialC["adresse"] = Utils::get("addresschefVillageAdd");
            $client = Client::create($creditialC);
            $village->chefdevillage_id = $client->idClient ;
            $village->save();
            echo $village->idvillage ;
            DB::commit();



        }

        public function get($id)
        {
           $village = Village::find($id);
           $chefActuel = Client::where("id_village","=",$id)->where("id_chefvillage","=",null)->get()[0];
            $village->chef = $chefActuel ;
            $clients = Client::where("id_village","=",$id)->get();
           if(is_object($village) && $village != null)
           {
               echo json_encode(["village"=>$village,"clients"=>$clients],JSON_PRETTY_PRINT);
           }
           else{
               echo 0;
           }

        }
        public function gets()
        {
           $villages = Village::all();
            foreach ($villages as $village)
            {
                $village->population = Client::where("id_village","=",$village->idvillage)->count();
            }
           if($villages != null)
           {
               echo json_encode($villages,JSON_PRETTY_PRINT);
           }
           else{
               echo 0;
           }

        }
        public function update($id)
        {
            DB::beginTransaction  () ;
                $village = Village::find($id);
                $ancienChef = Client::find(Utils::get("ancienChefId"));
                $nouveauChel = Client::find(Utils::get("chefdevillageEdit"));
                $ancienChef->id_chefvillage = $nouveauChel->idClient ;
                $village->chefdevillage_id = $nouveauChel->idClient ;
                $village->nomvillage =  Utils::get("nomvillageEdit");
                $village->etat_village = Utils::get("etatvillageEdit") ;
               // $village->idvillage = Utils::get("idvillageEdit") ;
              $village->save();
                 if($nouveauChel->idClient !== $ancienChef->idClient)
                 {
                     $ancienChef->save();
                     $nouveauChel->id_chefvillage = null ;
                     $nouveauChel->save();//IL FAUT ENREGISTRER ANCIEN AVANT NOUVEAU
                 }

                DB::update("update client set id_chefvillage = ? WHERE idClient <> ? AND id_village = ?",[$nouveauChel->idClient,$nouveauChel->idClient,$id]);
            //var_dump($village);
                echo 1 ;
            DB::commit();

        }
        public function delete($id)
        {
            $village = Village::find($id);
            $village->delete();
            echo 1 ;
        }
        public function showChef($id)
        {
            $chefVillage = DB::select("SELECT c.* FROM village v join client c on v.idvillage = c.id_village WHERE c.id_chefvillage IS NULL AND v.idvillage = ?",[$id]);
            if(count($chefVillage) > 0)
            {
                echo json_encode($chefVillage[0]) ;
            }

        }

        public function search()
        {
            $villages = Village::where("nomvillage","like","%".Utils::get("item")."%")->get();
            foreach ($villages as $village)
            {
                $village->population = Client::where("id_village","=",$village->idvillage)->count();
            }
            echo json_encode($villages);
        }


    }
?>