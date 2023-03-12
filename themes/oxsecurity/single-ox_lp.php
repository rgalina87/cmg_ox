<?php get_header();?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php if (have_rows('sections')) : ?>
            <?php while (have_rows('sections')) : the_row(); ?>
                <?php get_template_part('partials/sections/section', get_row_layout()); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
