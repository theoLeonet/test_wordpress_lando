<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <h1 class="header__title">
            <?= get_bloginfo('name'); ?>
        </h1>
        <p class="header__tagline">
            <?= get_bloginfo('description'); ?>
        </p>

        <nav class="header__nav nav">
            <h2 class="nav__title">
                Navigation principale
            </h2>
            /* <?php wp_nav_menu([
                'menu' => 'primary',
                'container_class' => 'nav__container',
                'menu_class' => 'nav__links',
                'walker' => new PrimaryMenuWalker(),
            ]);?> */

            <ul class="nav__container">
                <?php foreach (testdw_get_menu_items('primary') as $link): ?>
                <li class="<?= $link->getBemClasses ?>">
                    <a href="<?= $link->url ?>"
                       <?= $link->title ? ' title="' . $link->title . '"' : ''; ?>
                       class="nav__link"><?= $link->label ?>>
                    </a>
                    <?php if($link->hasSubItems()): ?>
                    <ul class="nav__subcontainer">
                        <?php foreach ($link->subitem as $sub): ?>
                        <li class="nav__item">
                            <a href="<?= $sub->url ?>"
                                <?= $sub->title ? ' title="' . $sub->title . '"' : ''; ?>
                               class="nav__link"><?= $sub->label ?>>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
</body>
</html>
