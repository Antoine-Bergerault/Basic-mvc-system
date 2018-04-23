<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>How to use models</title>
    <link rel="stylesheet" href="<?=root()?>public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>public/css/code.css">    
</head>
<body>
<?php require_once('header.php') ?>
    
    <h1 class="middle">How to use models</h1>

    <p>The models can be created in <span class="path">Models</span> and must include <span class="path">Models/default/Model.php</span>.<br>
    <h3>Before starting using a model, we have to include the model and create an instance of it just like that :</h3>
    <pre class="code"><code><span class="function">include_once</span>(<span class="string">'Models/UserModel.php'</span>);
<span class="param">$Model</span> = <span class="new-keyword">new</span> <span class="class">UserModel</span>();</code></pre>
    <br>
    <h3>Then we have a several number of methods which can be used :</h3>
    <br>
    <ul id="ways">
        <li><h3>To select all the elements from the model's table :</h3>
        <pre class="code">
<code><span class="param">$elems</span> = <span class="param">$Model</span>-><span class="method">all</span>()</code></pre>
        </li>
        <li><h3>To select the first element from the model's table :</h3>
        <pre class="code">
<code><span class="param">$elem</span> = <span class="param">$Model</span>-><span class="method">first</span>()</code></pre>
        </li>
        <li><h3>To select a number $n of elements from the model's table :</h3>
        <pre class="code">
<code><span class="param">$elems</span> = <span class="param">$Model</span>-><span class="method">find</span>(<span class="param">$n</span>)</code></pre>
        </li>
        <li><h3>To select all the elements from the model's table which respect the condition (WHERE) :</h3>
        <pre class="code">
<code><span class="param">$elems</span> = <span class="param">$Model</span>-><span class="method">where</span>([<span class="string">'name'</span> => <span class="string">'LIKE A%'</span>])</code></pre>
        </li>
        <br><br>
        <li><h3>You can also put several conditions at the same time :</h3>
        <pre class="code">
<code><span class="param">$elems</span> = <span class="param">$Model</span>-><span class="method">find</span>(<span class="param">5</span>)-><span class="method">where</span>([<span class="string">'name'</span> => <span class="string">'LIKE A%'</span>])</code></pre>
        </li>
    </ul>

    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <div style="display: grid;grid-template-columns: auto auto;grid-gap:8px;margin: 80px 0;">
        <i class="em-svg em-warning" style="height: 95px;width: 95px;"></i>
        <div>
            <h2 style="margin: 0;padding: 0;">Before returning the result of the model, you must execut :</h2>
                <pre class="code" style="margin: 0;"><code><span class="param">$Model</span>-><span class="method">run</span>()</code></pre>
        </div>
    </div>
<?php require_once('footer.php') ?>
</body>
</html>