<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Structure</title>
    <link rel="stylesheet" href="<?=root()?>public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>public/css/structure.css">
</head>
<body>
<?php require_once('header.php') ?>
    
    <h1 class="middle">Structure</h1>

    <h2>Structure of the source code :</h2>
    <ul id="structure">
        <li><h4>App</h4>
            <ul>
                <li><h5>App.php</h5></li>
            </ul>
        </li>
        <li><h4>Controllers (all of the controllers are here)</h4>
            <ul>
                <li><h5>MainController.php</h5></li>
            </ul>
        </li>
        <li><h4>Models (all of the models are here)</h4>
            <ul>
                <li><h4>default</h4>
                    <ul>
                        <li><h5>Model.php</h5></li>
                    </ul>
                </li>
                <li><h5>UserModel.php</h5></li>
            </ul>
        </li>
        <li><h4>public (all of the css and javascript ressources are here)</h4>
            <ul>
                <li><h4>css (all the css)</h4>
                    <ul>
                        <li><h5>code.css</h5></li>
                        <li><h5>default.css</h5></li>
                        <li><h5>footer.css</h5></li>
                        <li><h5>home.css</h5></li>
                        <li><h5>menu.css</h5></li>
                        <li><h5>path.css</h5></li>
                    </ul>
                </li>
                <li><h4>js (all the javascript)</h4></li>
            </ul>
        </li>
        <li><h4>Router (files for the router)</h4>
            <ul>
                <li><h4>Class</h4>
                    <ul>
                        <li><h5>Route.php</h5></li>
                        <li><h5>Router.php</h5></li>
                    </ul>
                </li>
                <li><h5>web.php (really important, define the path)</h5></li>
            </ul>
        </li>
        <li><h4>Tools</h4>
            <ul>
                <li><h5>config.php (this file contain the password for the database)</h5></li>
                <li><h5>db.php</h5></li>
                <li><h5>function.php</h5></li>
            </ul>
        </li>
        <li><h4>Views (all of the views are here)</h4>
            <ul>
                <li><h4>Components</h4>
                    <ul>
                        <li><h5>comment.php</h5></li>
                    </ul>
                </li>
                <li><h4>errors (all of the errors pages)</h4>
                    <ul>
                        <li><h5>error404.php</h5></li>
                    </ul>
                </li>
                <li><h5>controller.php</h5></li>
                <li><h5>footer.php</h5></li>
                <li><h5>header.php</h5></li>
                <li><h5>home.php</h5></li>
                <li><h5>menu.php</h5></li>
                <li><h5>model.php</h5></li>
                <li><h5>path.php</h5></li>
                <li><h5>structure.php</h5></li>
            </ul>
        </li>
        <li><h5>.htaccess</h5></li>
        <li><h5>autoload.php</h5></li>
        <li><h5>config.php</h5></li>
        <li><h5>index.php</h5></li>
    </ul>
    
<?php require_once('footer.php') ?>
</body>
</html>