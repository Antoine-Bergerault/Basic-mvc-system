<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>How to use controllers</title>
    <link rel="stylesheet" href="<?=root()?>public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>public/css/code.css">
</head>
<body>
<?php require_once('header.php') ?>

    <h1 class="middle">How to use controllers</h1>

    <p>The controllers can be created in <span class="path">Controllers</span><br>
    Controllers are used to enable more complex conditions for pages. Controllers have to return the content of the page.<br>
    If you want to create a new controller (symbolize by a new class), you must save the file as <span class="path">Controllers/YourControllerName.php</span>.
    </p>
    <br><br>
    <p>For example, when there is that in </span class="path">Router/web.php</span> :</p>
    <pre class="code no-margin"><code><span class="class">Router</span>::<span class="method">get</span>(<span class="string">'/'</span>, <span class="string">'MainController@home'</span>);</code></pre>
    <p>we will appeal the method home of the controller MainController.</p>

    <h2>What the controller look like ?</h2>
    <div class="name-code">Controllers/MainController.php</div>
    <pre class="code"><code>&#60?php

<span class="function">require_once</span> <span class="string">'Models/UserModel.php'</span>;<span class="comment">//import the User Model to interact with the users</span>

<span class="class-keyword">class</span> <span class="class">MainController</span> {

    <span class="comment">//You can add methods</span>
    <span class="method-accessible-keyword">public</span> <span class="function-keyword">function</span> <span class="method">home</span>(){
        <span class="return">return</span> <span class="function">view</span>(<span class="string">'home'</span>);
    }

}

?&#62</code></pre>
    <h2>How to receive parameters as a controller</h2>
    <div class="name-code">Router/web.php</div>
    <pre class="code"><code><span class="class">Router</span>::<span class="method">get</span>(<span class="string">'/{id}/{name}'</span>, <span class="string">'UserController@login'</span>);</code></pre>
    <div class="name-code">Controllers/UserController.php</div>
    <pre class="code"><code>&#60?php

<span class="function">require_once</span> <span class="string">'Models/UserModel.php'</span>;<span class="comment">//import the User Model to interact with the users</span>

<span class="class-keyword">class</span> <span class="class">UserController</span> {

    <span class="method-accessible-keyword">public</span> <span class="function-keyword">function</span> <span class="method">login</span>(<span class="param">$id</span>,<span class="param">$name</span>){<span class="comment">//you have recovered the two parameters received by the url</span>
        <span class="param">$UserModel</span> = <span class="new-keyword">new</span> <span class="class">UserModel</span>();
        <span class="param">$user</span> = <span class="param">$UserModel</span>-><span class="method">first</span>()-><span class="method">where</span>([<span class="string">'id'</span> => <span class="string">"= <span class="param">$id</span>"</span>])-><span class="method">run</span>();
        ...
        <span class="if-keyword">if</span>(<span class="param">$user</span> != <span class="boolean">false</span>){
            <span class="return">return</span> <span class="function">view</span>(<span class="string">'home'</span>);
        }<span class="else-keyword">else</span>{
            <span class="return">return</span> <span class="function">view</span>(<span class="string">'user/login'</span>, <span class="function">compact</span>(<span class="string">errors</span>));
        }
    }

}

?&#62</code></pre>
    <?php require_once('footer.php') ?>
</body>
</html>
