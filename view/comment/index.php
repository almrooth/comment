<h1>Kommentarer</h1> 

<?php foreach ($comments as $comment) : ?>

    <article class="comment">
        <header>
            <a href="<?= $app->link("comment/" . $comment->id) ?>"># <?= $comment->id ?></a>

            <?php if ($this->di->get("session")->get("user_id") === $comment->user_id || $this->di->get("session")->get("user_role") === "admin") : ?>
                <div>
                    <a class="btn" href="<?= $app->link("comment/update/" . $comment->id) ?>">Edit</a>
                    <a class="btn" href="<?= $app->link("comment/delete/" . $comment->id) ?>">Delete</a>
                </div>
            <?php endif; ?>

        </header>

            <p> <?= $comment->content ?></p>

        <footer>
            <img src="<?php echo $comment->gravatar ?>" alt="">
            <p>by <?= $comment->username ?></p>
        </footer>
    </article>

<?php endforeach; ?>



<?= $form ?>
