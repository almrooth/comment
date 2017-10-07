<h1>Alla användare</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Användarnamn</th>
            <th>Epost</th>
            <th>Redigera</th>
            <th>Inaktivera</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td><a class="btn" href="<?= $app->link('admin/user/update/' . $user->id) ?>">Edit</a></td>
                <?php if (isset($user->deleted)) : ?>
                    <td><?= $user->deleted ?></td>
                <?php else : ?>
                <td><a class="btn" href="<?= $app->link('admin/user/delete/' . $user->id) ?>">Delete</a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
