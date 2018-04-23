<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/default.css">
    <link rel="stylesheet" href="public/css/form.css">
</head>
<body>
    <form action="" method="post" class="center-absolute">
        <h3>Login</h3>
        <hr>
        <?php if(isset($errors)): ?>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li class="error-item"><?=$error?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
        <label for="name">Name or email :</label>
        <input type="text" name="name" id="name" required>
        <label for="pass">Password :</label>
        <input type="password" name="pass" id="pass" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>