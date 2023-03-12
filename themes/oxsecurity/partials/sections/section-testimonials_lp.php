<section class="section-content testimonials-lp-section">
    <div class="content-container">
        <?php if (get_sub_field('testimonials_title')) { ?>
            <h2 class="title-testimonials"><?= get_sub_field('testimonials_title') ?></h2>
        <?php } ?>

        <div class="testy-groups">
            <?php
            $testimonials = [
                get_sub_field('testimonials_column_1_testimonial_single'),
                get_sub_field('testimonials_column_2_testimonial_single'),
                get_sub_field('testimonials_column_3_testimonial_single')
            ];

            foreach ($testimonials as $tsCol) { ?>
                <div class="testimonial-column">
                    <?php foreach ($tsCol as $tsItem) { ?>

                        <?php $testy3_box_bg = $tsItem['testimonial_item_bg_color'] ?>
                        <div class="testy-item <?= $testy3_box_bg ?>">
                            <?php if ($tsItem['testy_text']) { ?>
                                <blockquote class="testy-text"><?= $tsItem['testy_text'] ?></blockquote>
                            <?php } ?>

                            <div class="testy-author-block">
                                <div class="author-info">
                                    <?php if ($tsItem['testimonial_author']) { ?>
                                        <p class="testy-author"><?= $tsItem['testimonial_author'] ?></p>
                                    <?php } ?>
                                    <?php if ($tsItem['testy_author_position']) { ?>
                                        <p class="testy-author-position"><?= $tsItem['testy_author_position'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="author-image">
                                    <?php if ($tsItem['testimonial_image']) { ?>
                                        <img src="<?= $tsItem['testimonial_image']['url'] ?>" alt="<?= $tsItem['testimonial_image']['alt'] ?>" class="testy-image" />
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                      
                    <?php } ?>
                </div>

            <?php } ?>





  
        </div>

    </div>
</section>