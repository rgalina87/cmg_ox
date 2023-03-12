<?php get_header();?>

<h1><?= get_field('test') ?> </h1>
<div class="glossary-main-content">
<section class="section-content content-glossary">
    <div class="content-container">
        <?php the_content(); ?>
    </div>
</section>
<section class="section-content related-links-glossary">
    <div class="content-container">
        <h2><?php echo get_field('related_links_title'); ?></h2>
        <div class="related-links-list">
            <?php if(get_field('related_links_item')) { ?>
                <?php
                $faq = get_field('related_links_item');
                foreach ($faq as $i) {
                    if (isset($i)) {
                        ?>
                        <div class="related-links-item">
                            <?php if($i['link_url']) { ?>
                                <a class="related-link" href="<?= $i['link_url'] ?>" <?= $i['open_in_new_tab'] ? 'target="_blank"' : '' ?>><?= $i['link_title'] ?></a>
                            <?php } ?>
                        </div>
                        <?php
                    }
                }
                ?>
            <?php } ?>
        </div>
    </div>
</section>
</div>

<section class="section-content faq-glossary">
    <div class="content-container">
        <h2 class="faq-title"><?php echo get_field('faq_title'); ?></h2>
        <div class="faq-list">
            <?php if(get_field('faq_content')) { ?>
                <?php
                $faq = get_field('faq_content');
                foreach ($faq as $i) {
                    if (isset($i)) {
                        ?>
                        <div class="faq-item">
                            <?php if($i['faq_question']) { ?>
                                <p class="question"><?= $i['faq_question'] ?></p>
                            <?php } ?>
                            <?php if($i['faq_answer']) { ?>
                                <p class="answer"><?= $i['faq_answer'] ?></p>
                            <?php } ?>
                        </div>
                        <?php
                    }
                }
                ?>
            <?php } ?>
        </div>
    </div>
</section>

<script>
    let answers=document.querySelectorAll(".faq-item");
    answers.forEach((event)=>{
        event.addEventListener('click',()=>{
            if(event.classList.contains("active")){
                event.classList.remove("active");
            }
            else{
                event.classList.add("active");
            }
        })
    })
</script>

<section class="section-content related-articles-glossary">
    <div class="content-container">
        <div class="related-articles">
            <?php if (get_field('title')) { ?>
                <h2 class="related-articles-title"><?= get_field('title') ?></h2>
            <?php } ?>
            <?php
            $featured_posts = get_field('related_articles'); ?>
            <!--                        <pre>--><? //= print_r($featured_posts);
            ?>
            <!--</pre>-->
            <?php
            if ($featured_posts) : ?>
            <div class="box-border">
                <?php foreach ($featured_posts as $featured_post) :
                    $permalink = get_permalink($featured_post->ID);
                    $title = get_the_title($featured_post->ID);
                    $post_date = get_the_date('F j,  Y', $featured_post->ID);
                    $author = get_the_author_meta('display_name', $featured_post->post_author);


                    $custom_field = get_field('field_name', $featured_post->ID);
                    $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($featured_post->ID), 'single-post-thumbnail');
                    $img_alt = get_post_meta ( get_post_thumbnail_id($featured_post->ID), '_wp_attachment_image_alt', TRUE );


                    ?>

                    <li class="blog-box-content">
                        <div class="blog-texts">
                            <?php if (get_field('reading_time')) { ?>
                            <div class="reading-time"><?= get_field('reading_time')?></div>
                            <?php } ?>
                            <a href="<?php echo esc_url($permalink); ?>">
                                <h3><?php echo esc_html($title); ?></h3>
                            </a>
                            <div class="blog-box-bottom">
                                <div class="box-blog-txt"><?= wp_trim_words($featured_post->post_content, 20, "") ?></div>
                                <div class="blog-box-author-meta">
                                    <a href="<?php echo esc_url($permalink); ?>" class="box-post-read">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



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
