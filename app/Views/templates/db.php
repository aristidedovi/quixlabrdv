<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - configuration BD</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./plugins/highlightjs/styles/darkula.css">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


    <!--**********************************
        Content body start
    ***********************************-->
        <div class="container-fluid" style="margin-top: 50px">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <p>Assurer vous d'aller dans le dossier config et ouvrez le fichier <code>config.php</code> remplissez les informations de vote base de donnée et actualiser la page</p>
                            <pre>
    <code class="php">
        return array(
            "db_user" => "Utilisateur (EX:root)",
            "db_pass" => "Mot de passe (EX:root)",
            "db_host" => "domaine (EX:localhost)",
            "db_name" => "nom de la base de donnée"
        );
    </code>
</pre>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/styleSwitcher.js"></script>

<script src="./plugins/highlightjs/highlight.pack.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<script>
    (function($) {
        "use strict"

        new quixSettings({
            version: "light", //2 options "light" and "dark"
            layout: "vertical", //2 options, "vertical" and "horizontal"
            navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
            headerBg: "color_1", //have 10 options, "color_1" to "color_10"
            sidebarStyle: "compact", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
            sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
            sidebarPosition: "static", //have two options, "static" and "fixed"
            headerPosition: "static", //have two options, "static" and "fixed"
            containerLayout: "wide",  //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
            direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
        });


    })(jQuery);
</script>

</body>

</html>