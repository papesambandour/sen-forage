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
namespace Model;
    use Libs\system\Model;

    class Compteur extends Model {

        protected $table = "compteur"; //par defaut il prent le nom de la classe qu'il met au pluriel et au au minuscule
        protected $guarded = [];
        protected $primaryKey = 'idcompteur';
        public $timestamps = false;//pour igonrer les
	}