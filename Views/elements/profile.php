<?php foreach($data as $el): ?>

<div class="element">

    <h3><?=$el->name?></h3>
    <?php foreach($el as $p => $o): ?>
        <?php if($p != $name): ?>
            <h4><?=$p?> : <?=$o?></h4>
        <?php endif ?>
    <?php endforeach ?>

</div>

<?php endforeach ?>