<html>
<head>

</head>
<body>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{block name=title}Accueil{/block}</title>
    <!-- l'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->
    <link type="text/css" rel="stylesheet" href="{$url_base}public/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="{$url_base}public/css/samane.css"/>
    <!-- integration de javascript dans le moteur de rendu de vue Smarty -->
    {literal}
    <script language=javascript>
        function load_design() {
            document.getElementById("design_js").style.color = "#40007d";
        }

    </script>
    {/literal}
</head>
<body onload="load_design()">
<div class="nav navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav">
        <!-- l'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->
        <li><a href="{$url_base}Test/index">Menu page test</a></li>
        <li><a href="{$url_base}Test/getID/1">Menu page test 2</a></li>
        <li><a href="{$url_base}Test/liste">Menu page test liste</a></li>
    </ul>
</div>
<img src="{$url_base}public/image/logo.jpg" class="resize" />

{block name=body}

{/block}

</body>
</html>
