<?php get_header(); ?>
<main class="layout singlePost">
    <h2 class="singlePost__title"><?= get_the_title() ?></h2>
    <figure class="singlePoste__fig">
        <?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singlePost__thumb']); ?>
    </figure>
    <div class="singlePost__content">
        <?php the_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
