<?php

/** @var string $url */
$url = '/';
if(isset($_GET['url'])){//set the url
    $url = '/'.$_GET['url'];
}


require('autoload.php');


?>

<script>
    let root = "<?=root()?>";
</script>

<?php


echo Router::run($url);

?>