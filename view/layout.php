<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <?php foreach ($stylesheets as $stylesheet) : ?>
    <link rel="stylesheet" type="text/css" href="<?= $this->asset($stylesheet) ?>">
    <?php endforeach; ?>

</head>
<body>

<div class="container">

    <?php if ($this->regionHasContent("header")) : ?>
    <div class="header-wrap">
        <?php $this->renderRegion("header") ?>

        <?php if ($this->regionHasContent("navbar")) : ?>
        
            <?php $this->renderRegion("navbar") ?>
        
        <?php endif; ?>

    </div>
    <?php endif; ?>


    <?php if ($this->regionHasContent("main") && $this->regionHasContent("sidebar")) : ?>
    <div class="sidebar-main">
        
        <?php $this->renderRegion("sidebar") ?>

        <main class="site-main">
            <?php $this->renderRegion("main") ?>
        </main>
    </div>

    <?php elseif ($this->regionHasContent("main")) : ?>
    <div class="no-sidebar-main">
        <main class="site-main">
            <?php $this->renderRegion("main") ?>
        </main>
    </div>

    <?php endif; ?>


    <?php if ($this->regionHasContent("footer")) : ?>
    <div class="footer-wrap">
        <?php $this->renderRegion("footer") ?>
    </div>
    <?php endif; ?>

</div>


</body>
</html>
