<h1>Database test</h1>

<?php foreach($data as $el): ?>

    <h3><?=$el->name?></h3>
    <ul>
    <?php foreach($el as $k => $v): ?>

        <li>

            <h4><strong> <?=$k?> :</strong> <?=$v?></h4>

        </li>

    <?php endforeach ?>
    </ul>

<?php endforeach ?>