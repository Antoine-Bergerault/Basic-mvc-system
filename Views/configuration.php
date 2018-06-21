<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuration</title>
    <link rel="stylesheet" href="<?=root()?>public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>public/css/code.css">
</head>
<body>
<?php require_once('header.php') ?>

    <h1 class="middle">Configuration</h1>

    <p>The configuration file is <span class="path">Tools/config.php</span> .<br>

    <h3>It looks like that :</h3>
    
    <pre class="code">
<code>&#60?php

<span class="class-keyword">class</span> <span class="class">Config</span>{

    <span class="method-accessible-keyword">static</span> <span class="param">$host</span> = <span class="string">"localhost"</span>;<span class="comment">//host name</span>
    <span class="method-accessible-keyword">static</span> <span class="param">$username</span> = <span class="string">"root"</span>;<span class="comment">//username</span>
    <span class="method-accessible-keyword">static</span> <span class="param">$password</span> = <span class="string">""</span>;<span class="comment">//password</span>
    <span class="method-accessible-keyword">static</span> <span class="param">$database</span> = <span class="string">"database_name"</span>;<span class="comment">//name of the database</span>

    <span class="method-accessible-keyword">static</span> <span class="param">$CacheDirectory</span> = <span class="string">"/temp"</span>;
    
    <span class="method-accessible-keyword">static</span> <span class="param">$page_oncache</span> = <span class="number">3</span>;<span class="comment">//3 pages are loaded using cache</span>

}

?&#62</code></pre>
    
    
<?php require_once('footer.php') ?>
</body>
</html>