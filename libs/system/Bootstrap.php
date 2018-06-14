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
namespace Libs\system;

use Config\Autoloaders;
use Config\DataBase;
use Controller\Village;

class Bootstrap{
    /**
     * Bootstrap constructor.
     * @throws \ReflectionException
     */
    public function __construct(){
        (new DB(DataBase::connexion_params()['database']))->bootEloquent();


			if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                $file = 'controller/' . $url[0] . 'Ctrl.php';
                if(file_exists($file)){
                   // require_once $file;
                    $controllerString = "\\Controller\\".ucfirst($url[0])."Ctrl";
                    $controller = new $controllerString();
                    //si la methode est saisie
                    if(isset($url[1])){
                        if($url[1] == ""){
                            $url[1] = "index";
                        }
                        if(method_exists($controller, $url[1])){

                        	 $m =$url[1];
                            $r = new \ReflectionMethod($controller,$url[1]);
                            $params = $r->getParameters();
                            if(count($params)== 0)
                            {
                                $controller->$m();

                            }else if (count($params) > 0){
                            	if(isset($url[2])){
	                                $controller->{$url[1]}($url[2]);
	                            }
	                            else{
	                                $msg = "la methode<b> ".$url[1]."()</b> a un parameter";
	                                $this->messageError($msg);
	                            }
	                        }
                        }else{
                            $msg = "La méthode <b>".$url[1]."()</b> n'existe pas dans le controller <b>".$controller."</b>!";
							$this->messageError($msg);
                        }
                    }else{
						if(method_exists($controller, "index")){
							$controller->{"index"}();
						}else{
							$msg = "La méthode <b>index()</b> n'existe pas dans le controller <b>".$controller."</b>!";
							$this->messageError($msg);
						}
					}
                }else{
                    $msg = "Le controller <b>" . $controller . "</b> n'existe pas !";
					$this->messageError($msg);
                }

            }else{
                //require_once 'controller/Accueil.class.php';
				$file = 'controller/'.Autoloaders::welcome_params()['welcome_controller'].'.php';
				if(file_exists($file))
				{
					//require_once $file;
					//echo welcome_params()['welcome_controller'];
					$controller = "\\Controller\\".Autoloaders::welcome_params()['welcome_controller'];
					$controller = new $controller();
				
					if(method_exists($controller, "index")){
						$controller->{"index"}();
					}else{
						$msg = "La methode <b>index()</b> n'existe pas dans le controller <b>".Autoloaders::welcome_params()['welcome_controller']."</b>!";
						$this->messageError($msg);
					}
                    
				}else{
					$msg = "Le controller welcome <b>" . Autoloaders::welcome_params()['welcome_controller'] . "</b> n'existe pas !";
					$msg = $msg. "<br/>Merci de bien faire la cofiguration du fichier <b>config/autoloaders.php</b>!";
					$this->messageError($msg);
				}
            }
        }
		private function messageError($message)
		{
			$msg = '<html>
						<head>
							<meta charset="UTF-8">
							<title>Error</title>
							<link type="text/css" rel="stylesheet" href="../public/css/bootstrap.min.css"/>
							<link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css"/>
						</head>
						<body>
							<div class="alert alert-danger" style="font-size:18px; text-align:justify;">
							'.
								$message
							.'</div>
						</body>
					</html>';
					
			die($msg);
		}
    }
?>