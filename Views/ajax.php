<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax</title>
    <link rel="stylesheet" href="public/css/ajax-test.css">
    <script src="public/js/Ajax/ajax.js"></script>
</head>
<body>
    
    <center>
        <div id="button">Ajax test</div>
        <div id="res">
            <center>Result :</center>
        </div>
    </center>

    <script>
    let nbr = 1;
    ajax.add('button', 'click', '<?=route('/test/ajax')?>', 'res', true, {
        'page' : nbr
    }, 'loader', function(){
        nbr++;
        alert('callback');
    });
    </script>


</body>
</html>