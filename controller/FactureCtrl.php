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
    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;

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
        public function tt(){
            $client = Client::find(Utils::get('idc'));
            $facture = Facture::find(Utils::get('idf'));
//            $namefile = $client
            $html = "
                <div style=\"width: 672px;height: 475px;padding: 50px;border: 1px solid black; margin: auto\">
                
                        <table style='width: 100%'>
                        <tr>
                        <td style='width: 75%'>
                        <h3 style=\"text-align: center;color: blue;border: 2px solid black;background: #e7e7e7\">FACTURE</h3><br>
                        <h5 style=\"background: #e7e7e7\">NUMERO : N00". $facture->idfacture ."</h5> 
                        <h5 style=\"background: #e7e7e7\">Date : ".Utils::getMonthByNum($facture->mois)." ".$facture->annee." </h5>
                        <h5 style=\"background: #e7e7e7\">CODE CLIENT : CLIT-".$client->idClient."</h5>
                        <h5 style=\"background: #e7e7e7\">NOM CLIENT : ".$client->nomcomplrt."</h5>
                         </td>
                        <td style='width: 25%'>
                        <h3 style=\"text-align: center;color: blue;border: 2px solid black;background: #e7e7e7\">FACTURE</h3><br>
                        <h5 style=\"background: #e7e7e7\">NUMERO : N00". $facture->idfacture ."</h5> 
                        <h5 style=\"background: #e7e7e7\">Date : ".Utils::getMonthByNum($facture->mois)." ".$facture->annee." </h5>
                        <h5 style=\"background: #e7e7e7\">CODE CLIENT : CLIT-".$client->idClient."</h5>
                        <h5 style=\"background: #e7e7e7\">NOM CLIENT : ".$client->nomcomplrt."</h5>
                        </td>
                        </tr>
                        </table>
                        <table  style=\"border-collapse: collapse;margin-top: 50px\" border=\"1\">
                            <thead>
                            <tr style=\"text-transform: capitalize;height: 80px;text-align: center;background: #e7e7e7\">
                                <th>Consomation(m3)</th>
                                <th>Consomation(m3)</th>
                                <th>Prix unutaire(xof)</th>
                                <th>Taxe retart 5%(xof)</th>
                                <th>Prix Hors taxe(xof)</th>
                                <th>Prix total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style=\"height: 80px;text-align: center;\">
                                <td>Cinq quatre litre</td>
                                <td>50</td>
                                <td>200</td>
                                <td>2500</td>
                                <td>55000</td>
                                <td>552500</td>
                            </tr>
                            </tbody>
                        </table>
                <div style=\"margin: 20px;position: relative\">
                    <span style=\"position: absolute;top: 0;left: 150px;text-decoration: underline\">Le president</span>
                    <span style=\"position: absolute;top: 0;left: 350px;text-decoration: underline\">Le tresorier</span>
                </div>
                
                </div>";
            echo $html;
        }


        public function export(){
          //  header("Content-Disposition: inline; filename=export.pdf");
           // header("Content-type: application/pdf");

            $client = Client::find(Utils::get('idc'));
            $facture = Facture::find(Utils::get('idf'));
//          $namefile = $client
            $html = "
                <div style=\"width: 850px;height: 475px;padding: 50px;border: 1px solid black;margin-top: 90px; margin: auto;font-size: 15px \">
                <h3 style=\"text-align: center;color: blue;border: 2px solid black;font-size: 45px\">FACTURE</h3><br>
                        <table style='width: 100%'>
                        <tr>
                        <td style='width: 75%'>
                          <div style='font-weight: bold;'>SEN-FORAGE</div><br>
                           <div>Dakar ,Scat Urbam</div><br>
                           <div>+221 77 7729 32 82</div><br>
                           <div>serviceclient@senforage.sn</div><br>
                        </td>
                        <td style='width: 25%'>
                        <div style='font-weight: bold'>".$client->nomcomplet."</div>    <br>
                        <div >Le 1 ".Utils::getMonthByNum($facture->mois)." ".$facture->annee." </div><br>
                        <div > Facture-". $facture->idfacture ."</div> <br>
                        <div>Client-".$client->idClient."</div><br>
                          
                        </td>
                        </tr>
                        </table>
                        
                        <table  style=\"border-collapse: collapse;margin-top: 50px;font-size: 13px;margin: auto;width: 100%\" border=\"1\">
                            <thead>
                            <tr style=\"text-transform: capitalize;height: 180px;text-align: center;background: #e7e7e7;\">
                                
                                <th style='padding: 30px 10px'>Consomation(m3)</th>
                                <th style='padding: 30px 10px'>Consomation(m3)</th>
                                <th style='padding: 30px 10px'>Prix unutaire(xof)</th>
                                <th style='padding: 30px 10px'>Taxe retart 5%(xof)</th>
                                <th style='padding: 30px 10px'>Prix Hors taxe(xof)</th>
                                <th style='padding: 30px 10px'>Prix total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style=\"text-align: center;\">
                                <td style='height: 80px'>Cinq quatre litre</td>
                                <td>50</td>
                                <td>200</td>
                                <td>2500</td>
                                <td>55000</td>
                                <td>552500</td>
                            </tr>
                            </tbody>
                        </table>
                <div style=\"margin: 20px;position: relative\">
                    <span style=\"position: absolute;top: 0;left: 150px;text-decoration: underline\">Le president</span>
                    <span style=\"position: absolute;top: 0;left: 350px;text-decoration: underline\">Le tresorier</span>
                </div>
                
                </div>";
            try {
                $html2pdf = new Html2Pdf('L', 'A4', 'fr');
                $html2pdf->setDefaultFont('Arial');
                $html2pdf->pdf->SetDisplayMode('fullpage');
                $html2pdf->writeHTML($html);
                $html2pdf->output('exemple00.pdf');
            } catch (Html2PdfException $e) {
                $html2pdf->clean();
                $formatter = new ExceptionFormatter($e);
                echo $formatter->getHtmlMessage();
            }
        }

        public static function htmlToPdf(){

        }
		
    }
?>