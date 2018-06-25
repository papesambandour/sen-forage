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

    class Config extends Model {

        protected $table = "config"; //par defaut il prent le nom de la classe qu'il met au pluriel et au au minuscule
        protected $guarded = [];
        //protected $primaryKey = 'idcompteur';
        public $timestamps = false;//pour igonrer les
        const LAST_ID_VILLAGE_IN_CLIENT ="LAST_ID_VILLAGE_IN_CLIENT";
        const NUMERO_COMPTEUR ="NUMERO_COMPTEUR";
        const NUMERO_FACTURE ="NUMERO_FACTURE";
        const NUMERO_ABONNEMENT ="NUMERO_ABONNEMENT";
        const PRIX_UNITAIRE_LITRE ="PRIX_UNITAIRE_LITRE";
        const MONTH = "MONTH";
        const YEAR = "YEAR";
        public static function get($label)
        {
            $conf = Config::where("label","=",$label)->get()[0];
            if(is_object($conf))
            {
                return $conf->value ;
            }
            else
                return null;
        }

        public static function set($label,$value)
        {
            //if(!empty($label) && !empty($value && strlen($value) > 0) )
           // {
                if(self::get($label) !== null)
                {
                    $conf = Config::where("label","=",$label)->get()[0];
                    $conf->value = $value ;
                    $conf->save();
                }
                else
                {
                   Config::create(["label"=>$label,"value"=>$value]);
                }
           // }
        }
	}