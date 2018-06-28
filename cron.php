<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';
(new \Libs\system\DB(\Config\DataBase::connexion_params()['database']))->bootEloquent();

////0 0 5 * * * /usr/bin/php /var/www/html/sen-forage/cron.php
 function couper(){
    $date = (new \DateTime())->modify('-1 month');
    $month = (int)$date->format('m') ;
    $year = (int)$date->format('Y') ;
    $factures = \Model\Facture::where('annee','=',$year)->where('mois','=',$month)->get();//si c'est null ca veut dir que on n'a pas encores effectuer de reveler
    foreach ($factures as &$facture)
    {
        if($facture->payee == 0)
        {
            $facture->payeenretart = 1;
            $facture->save();
            $compteur = \Model\Compteur::find($facture->compteur_id);
            $compteur->estcoupe = 1 ;
            $compteur->save();
            echo 1;
        }
    }

}
couper();