<?php foreach($comments as $comment): ?>
    <li class="comment">
        <div>
            <h3>
                <a href="<?=route('/profile/'.$comment->user_id.'/'.$comment->author)?>">
                    <?=$comment->author?>
                </a>
            </h3>
            <p><?=$comment->content?></p>
        </div>
    </li>
<?php endforeach ?>