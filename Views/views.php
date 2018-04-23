<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Views</title>
    <link rel="stylesheet" href="<?=root()?>public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>public/css/code.css">
</head>
<body>
<?php require_once('header.php') ?>
    
    <h1 class="middle">Views</h1>

    <p>All the views are stored in <span class="path">Views/</span>.<br> A view is a simple php file which contains the content of a page.</p>

    <h2>How to display a view ?</h2>
    <p>To display a view, we have to use the function view(), which take one mandatory parameter and an optional one.</p>
    <pre class="code no-margin"><code><span class="function">view</span>(<span class="string">'home'</span>);</code></pre>
    <div class="return-code"><span>return :</span> It will return the view <span class="path white">Views/home.php</span>.</div>

    <h2>Parameters for the views</h2>
    <p>The second parameter for the view() function is used to pass parameters to the view. Parameters are include using the compact() php function.</p>
    <div class="name-code">Views/test.php</div>
    <pre class="code"><code>The parameter is : &#60?= <span class="param">$param</span> ?&#62</code></pre>
    <pre class="code no-margin"><code><span class="param">$param</span> = <span class="string">'hello'</span>;
<span class="function">view</span>(<span class="string">'test'</span>,<span class="function">compact</span>(<span class="string">'param'</span>));</code></pre>
    <div class="return-code"><span>return :</span> The parameter is : hello</div>

    <h3>It is really useful to require some others files inside a view.</h3>
    <p>For example, all the pages (views) here have that at the beginning :</p>
    <pre class="code"><code>&#60?php <span class="function">require_once</span>(<span class="string">'header.php'</span>) ?&#62 </code></pre>
    <div class="name-code">Views/header.php</div>
    <pre class="code"><code>&#60?php <span class="function">require_once</span>(<span class="string">'menu.php'</span>) ?&#62
&#60div id="main-container"&#62</code></pre>
    <div class="name-code">Views/menu.php</div>
    <pre class="code"><code>&#60link rel="stylesheet" href="&#60?=<span class="function">root</span>()?&#62public/css/menu.css"&#62
&#60nav&#62
    &#60ul&#62
        &#60li&#62&#60a href="&#60?=<span class="function">route</span>(<span class="string">'/'</span>)?&#62"&#62Home&#60/a&#62&#60/li&#62
        &#60li&#62&#60a href="&#60?=<span class="function">route</span>(<span class="string">'/path'</span>)?&#62"&#62Configure the paths&#60/a&#62&#60/li&#62
        &#60li&#62&#60a href="&#60?=<span class="function">route</span>(<span class="string">'/model'</span>)?&#62"&#62How to use models&#60/a&#62&#60/li&#62
        &#60li&#62&#60a href="&#60?=<span class="function">route</span>(<span class="string">'/controller'</span>)?&#62"&#62How to use controllers&#60/a&#62&#60/li&#62
        &#60li&#62&#60a href="&#60?=<span class="function">route</span>(<span class="string">'/view'</span>)?&#62"&#62Views&#60/a&#62&#60/li&#62
        &#60li&#62&#60a href="&#60?=<span class="function">route</span>(<span class="string">'/structure'</span>)?&#62"&#62Structure&#60/a&#62&#60/li&#62
    &#60/ul&#62
&#60/nav&#62</code></pre>
<?php require_once('footer.php') ?>
</body>
</html>