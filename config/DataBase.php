<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE DERNIER (GIT).
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/
namespace Config;
class DataBase{
   public static function connexion_params(){
        return $config =  [

            //////////////CONFIGURATION DE LA BASSE DE DONNEE////////////
            "database" =>[
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'gestionforage',
                'username'  => 'root',
                'password'  => '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => ''
            ]
        ];
    }
}

?>