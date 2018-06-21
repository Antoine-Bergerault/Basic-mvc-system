<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configure the paths</title>
    <link rel="stylesheet" href="<?=root()?>public/css/default.css">
    <link rel="stylesheet" href="<?=root()?>public/css/path.css">
    <link rel="stylesheet" href="<?=root()?>public/css/code.css">    
</head>
<body>
<?php require_once('header.php') ?>
    
    <h1 class="middle">Configure the paths</h1>

    <p>The paths can be configured in <span class="path">Router/web.php</span>. There are several ways to configure paths :</p><br>
    <ul id="ways">
        <li><h3>Router::get()</h3>
        <p>This is used to define paths with the get method</p>
        <pre class="code">
        <code>
<span class="class">Router</span>::<span class="method">get</span>(<span class="string">'/path'</span>,<span class="string">'MainController@path'</span>);
<span class="class">Router</span>::<span class="method">get</span>(<span class="string">'/model'</span>,<span class="function-keyword">function</span>(){
    <span class="return">return</span> <span class="function">view</span>(<span class="string">'model'</span>);
});        </code>
        </pre></li>
        <li><h3>Router::post()</h3>
        <p>This is used to define paths with the post method</p>
        <pre class="code">
        <code>
<span class="class">Router</span>::<span class="method">post</span>(<span class="string">'/login'</span>,<span class="string">'MainController@login'</span>);
<span class="class">Router</span>::<span class="method">post</span>(<span class="string">'/logout'</span>,<span class="function-keyword">function</span>(){
    <span class="return">return</span> <span class="function">view</span>(<span class="string">'model'</span>);
});        </code>
        </pre></li>
        <li><h3>Router::group()</h3>
        <p>This is used to define a group of paths that start the same</p>
        <pre class="code">
        <code>
<span class="class">Router</span>::<span class="method">group</span>(<span class="string">'/user'</span>,[
    <span class="class">Router</span>::<span class="method">get</span>(<span class="string">'/profile'</span>,<span class="string">'UserController@profile'</span>),<span class="comment">//the same as Router::get('/user/profile','UserController@profile');</span>
    <span class="class">Router</span>::<span class="method">post</span>(<span class="string">'/edit'</span>,<span class="string">'UserController@edit'</span>)
]);    </code>
        </pre></li>
        <li><h3>Router::default_path()</h3>
        <p>This is used to define a default path. If there is no default path and no path match the url, we get an error 404.</p>
        <pre class="code">
        <code>
<span class="class">Router</span>::<span class="method">default_path</span>(<span class="string">'/'</span>);</code>
        </pre></li>
        <h2>Parameters :</h2>
        <li><h3>Router::get('.../{param}')</h3>
        <p>This is used to pass one or more parameter(s), which will be used inside the Controller or the function</p>
        <pre class="code">
        <code>
<span class="class">Router</span>::<span class="method">get</span>(<span class="string">'/article/{id}'</span>,<span class="string">'MainController@article'</span>);<span class="comment">//the parameter id will be used in MainController->article()</span>
<span class="class">Router</span>::<span class="method">post</span>(<span class="string">'/user/{id}/{name}'</span>,<span class="function-keyword">function</span>(<span class="param">$id</span>,<span class="param">$name</span>){<span class="comment">//using a function and two parameters</span>
    <span class="return">return</span> <span class="function">view</span>(<span class="string">'user-info'</span>,<span class="function">compact</span>([<span class="string">'id'</span>,<span class="string">'name'</span>]));<span class="comment">//with have to pass the parameters as a second argument for the view function</span>
});</code>
        </pre></li>
        <li><h3>Router::get(...)->with()</h3>
        <p>This method apply a condition to a desired parameter</p>
        <pre class="code">
        <code>
<span class="class">Router</span>::<span class="method">get</span>(<span class="string">'/article/{id}'</span>,<span class="string">'MainController@article'</span>)-><span class="method">with</span>(<span class="string">'id'</span>,<span class="string">'/([0-9]+)/'</span>);<span class="comment">//the parameter id must be an integer</span>
<span class="class">Router</span>::<span class="method">post</span>(<span class="string">'/user/{id}/{name}'</span>,<span class="function-keyword">function</span>(<span class="param">$id</span>,<span class="param">$name</span>){
    <span class="return">return</span> <span class="function">view</span>(<span class="string">'user-info'</span>,<span class="function">compact</span>([<span class="string">'id'</span>,<span class="string">'name'</span>]));
})-><span class="method">with</span>(<span class="string">'id'</span>,<span class="string">'/([0-9]+)/'</span>);</code>
        </pre></li>
        <h2>Condition for the path</h2>
        <li><h3>Router::get(...)->only_if()</h3>
        <p>This method allows the path only if the condition inside it returns true</p>
        <pre class="code">
        <code>
<span class="class">Router</span>::<span class="method">post</span>(<span class="string">'edit/user'</span>,<span class="function-keyword">function</span>(){
    <span class="return">return</span> <span class="function">view</span>(<span class="string">'edit/user'</span>);
})-><span class="method">only_if</span>(<span class="class">App</span>::<span class="method">is_connected</span>());</code>
        </pre></li>
        <h2>How to get the entire absolute path ?</h2>
        <li><h3>route()</h3>
        <p>This function (defined in <span class="path">Tools/function.php</span>) allows you to get the entire absolute url.</p>
        <pre class="code no-margin"><code><span class="function">route</span>(<span class="string">'/path'</span>);</code></pre></li>
        <div class="return-code"><span>return :</span> <?=route('/path')?></div>
    </ul>
    
<?php require_once('footer.php') ?>
</body>
</html>