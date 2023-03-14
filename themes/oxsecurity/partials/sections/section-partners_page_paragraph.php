<section class="section-content partnership-partners-page-section">
    <div class="content-container">
        <?php if (get_sub_field('title')) { ?>
            <h3 class="partnership-pp-para-title"><?= get_sub_field('title') ?></h3>
        <?php } ?>
        <div class="partners-page-paragraph">
            <?php
            $pp_page = get_sub_field("pp_paragraph");
            foreach ($pp_page as $i) {
                if (isset($i)) {
                    ?>
                    <div class="partnership-pp-para">
                        <?php if ($i['paragraph_title']) { ?>
                            <p class="partnership-pp-title"><?= $i['paragraph_title'] ?></p>
                        <?php } ?>
                        <?php if ($i['paragraph_text']) { ?>
                            <div class="partnership-pp-para-text">
                                <?= $i['paragraph_text'] ?>
                            </div>
                        <?php } ?>
                    </div>

                    <?php
                }
            }
            ?>

        </div>
    </div>
</section>

