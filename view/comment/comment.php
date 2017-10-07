<h1>Comment # <?= $comment->id ?></h1>

<article class="comment">
    
    <p> <?= $comment->content ?></p>

    <footer>
        <img src="<?= $comment->gravatar ?>" alt="">
        <p>by <?= $comment->username ?></p>
    </footer>
</article>