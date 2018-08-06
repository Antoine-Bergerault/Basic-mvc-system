<?php
/** @var string $url */

ob_start('ob_gzhandler');
register_shutdown_function('ob_end_flush');

$url = '/';
if(isset($_GET['url'])){//set the url
    $url = '/'.$_GET['url'];
}

date_default_timezone_set('UTC');

require('autoload.php');

echo Router::run($url);
App::extra();

?>