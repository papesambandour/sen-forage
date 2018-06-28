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
    use Libs\system\Controller;
    use Model\Compteur;
    use Model\Facture;

    class CronCtrl extends Controller {

        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){
           // return $this->view->load("/index");
/*
            minute,
    heure,
    jours dans le mois,
    mois.
    jour de la semaine
    La commande à lancer.*/

			
        }//0 0 5 * * * /usr/bin/php /var/www/html/sen-forage/cron.php
		 public function couper(){
            $date = (new \DateTime());//->modify('-1 month');
            echo $date->format('Y-m-d');
            $month = (int)$date->format('m') ;
            $year = (int)$date->format('Y') ;
             $factures = Facture::where('annee','=',$year)->where('mois','=',$month)->get();//si c'est null ca veut dir que on n'a pas encores effectuer de reveler
             foreach ($factures as &$facture)
             {
                 if($facture->payee == 0)
                 {
                     $facture->payeenretart = 0;
                     $facture->save();
                     $compteur = Compteur::find($facture->compteur_id);
                     $compteur->estcoupe = 0 ;
                     $compteur->save();
                 }
             }

         }

    }
?>