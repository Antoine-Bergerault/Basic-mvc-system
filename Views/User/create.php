<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=root()?>/public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>/public/css/user/create.css">
</head>
<body>
<?php require_once('/../header.php') ?>

    <h1>Upload a new background as <?=App::getname()?></h1>
    <form action="" method="post" enctype="multipart/form-data">
    
        <div id="main">
            <div id="btn-add">
                <label for="file">+</label>
                <input type="file" id="file" name="file">
            </div>
        </div>
        <input type="text" name="tags[]">
        <input type="text" name="tags[]">
        <input type="text" name="tags[]">
        <button>Submit</button>
    </form>
    <br><br><br>

<?php require_once('/../footer.php') ?>
</body>
</html>