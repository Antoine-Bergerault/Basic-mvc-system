<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=root()?>/public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>/public/css/user/profile.css">
</head>
<body>
<?php require_once('/../header.php') ?>

    <h1><?=$user->name?> profile page</h1>
    <?php if(App::is_connected() && App::getid() === $user->id): ?>
    <?php if(App::is_role('admin')): ?>
            <a href="<?=route('/cokpit/main')?>" class="link">Go to the admin Page</a>
    <?php endif ?>
    <button id="create-wallpaper">
        <a href="<?=route('/create')?>">
            <h2>Add new wallpapers</h2>
        </a>
    </button>
    <?php endif ?>
    <br>
    <h2>Wallpapers :</h2>
    <ul id="backgrounds">
        <?php foreach($backgrounds as $w): ?>
            <li class="background">
                <a href="<?=route("/wallpaper/$w->id")?>"><img src="<?=App::calcpath($w->id,$w->extension)?>" alt="background"></a>
            </li>
        <?php endforeach ?>
        <?php if(empty($backgrounds)): ?>
            <li class="background">No backgrounds uploaded</li>
        <?php endif ?>
    </ul>
    
<?php require_once('/../footer.php') ?>
</body>
</html>