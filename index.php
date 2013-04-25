<!doctype html>
<?
if(file_exists('../local.settings.php'))
    include '../local.settings.php'; 
?>
<!doctype html>

<html ng-app="AngularSFDemo">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }

        .button {
            text-align: center;
        }
    </style>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.js"></script>
    <script type="text/javascript">
        var app = angular.module('AngularSFDemo', ['AngularForce', 'AngularForceObjectFactory', 'Contact']);

        app.config(function($compileProvider){
            $compileProvider.urlSanitizationWhitelist(/^\s*(https?|ftp|mailto|file|tel):/);
        });

        <?
            $appUrl = $_ENV['app_url'];
            if (substr($appUrl,-1) === '/') {
                $appUrl = substr($appUrl, 0, -1);
            }
        ?>

        app.constant('SFConfig', {'sfLoginURL': 'https://login.salesforce.com/',
            'consumerKey': '<?= $_ENV['client_id'] ?>',
            'oAuthCallbackURL': '<?= $appUrl ?>/#/callback',
            'proxyUrl': '<?= $appUrl ?>/proxy.php?mode=native'
            });  

    </script>
<script src="js/app.js"></script>
<script src="js/angular-force.js"></script>

<script src="js/forcetk.js"></script>
<script src="js/forcetk.ui.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#">Salesforce Contacts</a>
        </div>
    </div>
</div>
<div class="container">
    <div ng-view></div>
</div>




</body>
</html>
