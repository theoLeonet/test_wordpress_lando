<?php get_header(); ?>

<main class="layout">
    <section class="layout_latest latest">
        <h2 class="latest_title">
            Mes derniers articles
        </h2>
        <div class="latest_container">
            <?php if(have_posts()): while(have_posts()): the_post();?>
                <!-- On est dans la boucle -->
                <article class="post">
                    <a href="<?= get_the_permalink(); ?>" class="post__link">
                        Lire l'article "<?= get_the_title(); ?>"
                    </a>
                    <div class="post__card">
                        <header class="post__head">
                            <h3 class="post__title">
                                <?= get_the_title(); ?>
                            </h3>
                            <p class="post__meta">
                                Publié par <?= get_the_author(); ?> le <time class="post__date" datetime="<?= get_the_date('c'); ?>"><?= get_the_date(); ?></time>
                            </p>
                        </header>
                        <figure class="post__fig">
                            <!--<img src="#" alt="TODO" class="post__thumb">-->
                            <?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'post__thumb']); ?>
                        </figure>
                        <div class="post__excerpt">
                            <p>
                                <?= get_the_excerpt(); ?>
                            </p>
                        </div>
                    </div>
                </article>
            <?php endwhile; else:?>
                <!-- Il n'y a rien à afficher -->
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
