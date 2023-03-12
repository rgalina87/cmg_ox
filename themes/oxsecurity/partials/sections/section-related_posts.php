<style>

</style>


<section class="section-content related-posts-lp-section">
    <div class="content-container">
        <?php if (get_sub_field('related_posts_title')) { ?>
            <h2 class="title-related-posts"><?= get_sub_field('related_posts_title') ?></h2>
        <?php } ?>

        <div class="related-posts-grid">
            <?php
            $post_item = get_sub_field('the_posts');
            foreach ($post_item as $itm) {
                if (isset($itm)) {
                    // print_r($itm);
            ?>
                    <div class="related-post-item">
                        <?php if ($itm->post_title) { ?>
                            <div>
                                <div class="rl-post-img" style="background-image: url(<?php echo get_the_post_thumbnail_url($itm->ID) ?>)">
                                </div>

                                <div class="date-read-time">
                                    <h4><?php echo get_the_date('F d, Y', $itm->ID) ?></h4>
                                    <?php if(get_field( "read_time", $itm->ID)){ ?> 
                                        <h4 class="related-post-read-time"><?php echo get_field( "read_time", $itm->ID) ?> min read</h4>
                                        <?php } ?>
                                    
                                </div>

                                <h3 class="related-post-title"><?php echo $itm->post_title ?></h3>
                            </div>
                            <div class="related-post-bottom">
                                <div class="related-post-author">
                                    <?php
                                    $p = get_post($itm->ID);
                                    // print_r($p)
                                    $author_id = $p->post_author;
                                    // echo ($author_id);
                                    ?>
                                    <div class="related-post-author-image"><?php echo get_avatar($author_id); ?></div>
                                    <h5 class="related-post-author-name"><?php echo the_author_meta('user_firstname', $author_id) . " " . the_author_meta('user_lastname', $author_id); ?></h5>
                                </div>

                                <a class="related-post-read-more" href="<?php echo get_permalink($itm->ID) ?>">Read more</a>
                            </div>
                    </div>
        <?php }
                    }
                }
        ?>

        </div>

    </div>
</section>

<style>
    .date-readtime {
        display: flex;
        justify-content: space-between;
    }
</style>