<nav class="site-navbar">
    <ul>
        <li><a href="<?= $app->link("report") ?>">Redovisningar</a></li>

        <li class="navbar-dropdown">
            Blandat
            <ul>
                <li><a href="<?= $app->link("comment") ?>">Kommentarsystem</a></li>
                <li><a href="<?= $app->link("book") ?>">Bokhyllan</a></li>
                <li><a href="<?= $app->link("remserver") ?>">REM-server</a></li>
            </ul>
        </li>

        <li><a href="<?= $app->link("about") ?>">Om sidan</a></li>
        
        <!-- If user logged in -->
        <?php if ($this->di->get("session")->get("username")) : ?>
            <li class="navbar-dropdown">
                <?= $this->di->get("session")->get("username"); ?>
                <ul>
                    <li><a href="<?= $app->link("user/profile/") ."/". $this->di->get("session")->get("user_id") ?>">Min profil</a></li>

                    <!-- If logged in as admin -->
                    <?php if ($this->di->get("session")->get("user_role") === "admin") : ?>
                        <li><a href="<?= $app->link('admin/users')?>">Users</a></li>
                        <li><a href="<?= $app->link('admin/comments')?>">Comments</a></li>
                    <?php endif; ?>

                    <li><a href="<?= $app->link("user/logout") ?>">Logga ut</a></li>
                </ul>
            </li>

        <?php else : ?>
            <li><a href="<?= $app->link("user/login") ?>">Logga in</a></li>

        <?php endif; ?>
    </ul>
</nav>
