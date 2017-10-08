<h1>Alla kommentarer</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Användarnamn</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?= $comment->id ?></td>
                <td><?= $comment->username ?></td>
                <td><a class="btn" href="<?= $this->di->get('url')->create('comment/update/' . $comment->id) ?>">Edit</a><a class="btn" href="<?= $this->url->create('comment/delete/' . $comment->id) ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
