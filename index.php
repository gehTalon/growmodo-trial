<?php get_header(); ?>

<div class="container mt-5">
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?php the_title(); ?></h2>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
            </div>
        </div>
    <?php endwhile; else : ?>
        <p><?php _e('No posts found.'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
