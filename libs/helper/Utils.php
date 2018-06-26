<?php
/**
 * Created by PhpStorm.
 * User: macintosh
 * Date: 11/06/2018
 * Time: 00:57
 */

namespace Libs\helper;


class Utils
{
    public static function get($key)
    {
        if(isset($_POST[$key]))
        {
            return $_POST[$key];
        }
        elseif ($_GET[$key])
        {
            return $_GET[$key];
        }
        else{
            return "";
        }
    }
    public static function getMonth(){
        return [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Aout',
            'Septembre',
            'Octobre',
            'Novenmbre',
            'Décembre',
        ];
    }
    public static function getMonthByNum($num)
    {
       return self::getMonth()[$num -1];
    }
    public static function getYear($limite = 2016){
        $annes= array();
        for($i = (int)(new \DateTime())->format('Y') ; $i > $limite;$i-- )
        {
            $annes[] = $i ;
        }
        return $annes ;
    }
    private static function dizaine( $nombre ){
        $dizaine = '';
        switch( $nombre ){
            case 10: $dizaine = "dix"; break;
            case 11: $dizaine = "onze"; break;
            case 12: $dizaine = "douze"; break;
            case 13: $dizaine = "treize"; break;
            case 14: $dizaine = "quatorze"; break;
            case 15: $dizaine = "quinze"; break;
            case 16: $dizaine = "seize"; break;
            case 17: $dizaine = "dix-sept"; break;
            case 18: $dizaine = "dix-huit"; break;
            case 19: $dizaine = "dix-neuf"; break;
            case 20: $dizaine = "vingt"; break;
            case 30: $dizaine = "trente"; break;
            case 40: $dizaine = "quarante"; break;
            case 50: $dizaine = "cinquante"; break;
            case 60: $dizaine = "soixante"; break;
            case 70: $dizaine = "soixante-dix"; break;
            case 80: $dizaine = "quatre-vingt"; break;
            case 90: $dizaine = "quatre-vingt-dix"; break;
        }//fin switch
        return $dizaine;
    }
    private static function unite( $nombre ){
        $unite = '';

        switch( $nombre ){
            case 0: $unite = "zéro";		break;
            case 1: $unite = "un";		break;
            case 2: $unite = "deux";		break;
            case 3: $unite = "trois"; 	break;
            case 4: $unite = "quatre"; 	break;
            case 5: $unite = "cinq"; 	break;
            case 6: $unite = "six"; 		break;
            case 7: $unite = "sept"; 	break;
            case 8: $unite = "huit"; 	break;
            case 9: $unite = "neuf"; 	break;
        }//fin switch
        return $unite;
    }

    public static function numberToLetter( $nombre ){
        $n = $quotient = $reste = $nb = null;
        $numberToLetter='';
        $rightPortion = @(explode(".", strval($nombre))[1]) ?: '';
        //__________________________________
        $nombre = intval($nombre);
        if(  strlen(str_replace(" ", "", strval($nombre))) > 15  )	return "depassement de capacité";

        if(  !is_numeric(str_replace(" ", "", $nombre)))		return "nombre non valide";

        $nb = floatval(str_replace(" ", "", strval($nombre)));

        $n = strlen($nb);
        switch( $n ){
            case 1: $numberToLetter = self::unite($nb); break;
            case 2: if(  $nb > 19  ){
                $quotient = floor($nb / 10);
                $reste = $nb % 10;
                if(  $nb < 71 || ($nb > 79 && $nb < 91)  ){

                    if(  $reste == 0  ) $numberToLetter = self::dizaine($quotient * 10);
                    if(  $reste == 1  ) $numberToLetter = self::dizaine($quotient * 10) . "-et-" . self::unite($reste);
                    if(  $reste > 1   ) $numberToLetter = self::dizaine($quotient * 10) . "-" . self::unite($reste);
                }else {
                    $numberToLetter = self::dizaine(($quotient - 1) * 10) . "-" . self::dizaine(10 + $reste);
                }
            }else $numberToLetter = self::dizaine($nb);
                break;
            case 3: $quotient = floor($nb / 100);
                $reste = $nb % 100;
                if(  $quotient == 1 && $reste == 0   ) $numberToLetter = "cent";
                if(  $quotient == 1 && $reste != 0   ) $numberToLetter = "cent" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0    ) $numberToLetter = self::unite($quotient) . " cents";
                if(  $quotient > 1 && $reste != 0    ) $numberToLetter = self::unite($quotient) . " cent " . self::numberToLetter($reste);
                break;
            case 4 :  $quotient = floor($nb / 1000);
                $reste = $nb - $quotient * 1000;
                if(  $quotient == 1 && $reste == 0   ) $numberToLetter = "mille";
                if(  $quotient == 1 && $reste != 0   ) $numberToLetter = "mille" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0    ) $numberToLetter = self::numberToLetter($quotient) . " mille";
                if(  $quotient > 1 && $reste != 0    ) $numberToLetter = self::numberToLetter($quotient) . " mille " . self::numberToLetter($reste);
                break;
            case 5 :  $quotient = floor($nb / 1000);
                $reste = $nb - $quotient * 1000;
                if(  $quotient == 1 && $reste == 0   ) $numberToLetter = "mille";
                if(  $quotient == 1 && $reste != 0   ) $numberToLetter = "mille" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0    ) $numberToLetter = self::numberToLetter($quotient) . " mille";
                if(  $quotient > 1 && $reste != 0    ) $numberToLetter = self::numberToLetter($quotient) . " mille " . self::numberToLetter($reste);
                break;
            case 6 :  $quotient = floor($nb / 1000);
                $reste = $nb - $quotient * 1000;
                if(  $quotient == 1 && $reste == 0   ) $numberToLetter = "mille";
                if(  $quotient == 1 && $reste != 0   ) $numberToLetter = "mille" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0    ) $numberToLetter = self::vnumberToLetter($quotient) . " mille";
                if(  $quotient > 1 && $reste != 0    ) $numberToLetter = self::numberToLetter($quotient) . " mille " . self::numberToLetter($reste);
                break;
            case 7: $quotient = floor($nb / 1000000);
                $reste = $nb % 1000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un million";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un million" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " millions";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " millions " . self::numberToLetter($reste);
                break;
            case 8: $quotient = floor($nb / 1000000);
                $reste = $nb % 1000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un million";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un million" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " millions";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " millions " . self::numberToLetter($reste);
                break;
            case 9: $quotient = floor($nb / 1000000);
                $reste = $nb % 1000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un million";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un million" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " millions";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " millions " . self::numberToLetter($reste);
                break;
            case 10: $quotient = floor($nb / 1000000000);
                $reste = $nb - $quotient * 1000000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un milliard";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un milliard" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " milliards";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " milliards " . self::numberToLetter($reste);
                break;
            case 11: $quotient = floor($nb / 1000000000);
                $reste = $nb - $quotient * 1000000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un milliard";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un milliard" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " milliards";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " milliards " . self::numberToLetter($reste);
                break;
            case 12: $quotient = floor($nb / 1000000000);
                $reste = $nb - $quotient * 1000000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un milliard";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un milliard" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " milliards";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " milliards " . self::numberToLetter($reste);
                break;
            case 13: $quotient = floor($nb / 1000000000000);
                $reste = $nb - $quotient * 1000000000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un billion";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un billion" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter =self::numberToLetter($quotient) . " billions";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " billions " . self::numberToLetter($reste);
                break;
            case 14: $quotient = floor($nb / 1000000000000);
                $reste = $nb - $quotient * 1000000000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un billion";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un billion" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " billions";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " billions " . self::numberToLetter($reste);
                break;
            case 15: $quotient = floor($nb / 1000000000000);
                $reste = $nb - $quotient * 1000000000000;
                if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un billion";
                if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un billion" . " " . self::numberToLetter($reste);
                if(  $quotient > 1 && $reste == 0   ) $numberToLetter = self::numberToLetter($quotient) . " billions";
                if(  $quotient > 1 && $reste != 0   ) $numberToLetter = self::numberToLetter($quotient) . " billions " . self::numberToLetter($reste);
                break;
        }//fin switch
        /*respect de l'accord de quatre-vingt*/
        if(  substr($numberToLetter, strlen($numberToLetter) - strlen("quatre-vingt"),strlen("quatre-vingt")) == "quatre-vingt"  ) $numberToLetter = $numberToLetter . "s";

        return $numberToLetter . ($rightPortion ? ' virgule ' . self::numberToLetter(floatval($rightPortion))  : '');
    }

    public static function numberToLetterConversion($nombre = 0) {






        return ucfirst(strtolower(self::numberToLetter(floatval($nombre ?: 0))) ?: '');
    }
}
