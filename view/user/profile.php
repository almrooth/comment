<h1><?= $user->username ?>'s profil</h1>

<table>
    <tr>
        <td>Användarnamn: </td>
        <td><?= $user->username ?></td>
    </tr>

    <tr>
        <td>Användartyp: </td>
        <td><?= $user->role ?></td>
    </tr>

    <tr>
        <td>Epost: </td>
        <td><?= $user->email ?></td>
    </tr>
</table>

<?php if ($this->di->get("session")->get("user_id") === $user->id || $this->di->get("session")->get("user_role") === "admin") : ?>
    <a href="<?= $app->link('user/update') ?>" class="btn">Redigera profil</a>
<?php endif; ?>
