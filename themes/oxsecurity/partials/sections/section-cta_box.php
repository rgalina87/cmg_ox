<section class="section-content cta-box-section">
    <div class="content-container">
        <?php if (get_sub_field('title_cta_box')) { ?>
            <h2 class="title-cta-box"><?= get_sub_field('title_cta_box') ?></h2>
        <?php } ?>
        <?php if (get_sub_field('text_cta_box')) { ?>
            <p class="text-cta-box"><?= get_sub_field('text_cta_box') ?></p>
        <?php } ?>

        <div class="lp-cta">
            <?php
            $ctas = get_sub_field('cta');
            foreach ($ctas as $cta) {
                if (isset($cta)) {
                    ?>
                    <?php
                    $cta_style = $cta['cta_style']
                    ?>
                    <?php if ($cta['cta_title']) { ?>
                        <div class="cta-lp-title">
                            <a id="" href="<?= $cta['cta_url'] ?>" class="lp-cta-button <?= $cta_style ?>">
                                <span><?= $cta['cta_title'] ?></span>
                            </a>
                        </div>
                    <?php } ?>
                    <?php
                }
            } //end for each
            ?>
        </div>

    </div>
</section>
