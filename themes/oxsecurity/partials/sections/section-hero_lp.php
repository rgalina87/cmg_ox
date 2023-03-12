<section class="section-content hero-lp-section">
    <div class="content-container">
        <div class="hero-lp-content">
            <div class="hero-lp-text">
                <?php if (get_sub_field('title_hero_lp')) { ?>
                    <h1 class="title-hero-lp"><?= get_sub_field('title_hero_lp') ?></h1>
                <?php } ?>
                <?php if (get_sub_field('text_hero_lp')) { ?>
                    <p class="title-hero-lp"><?= get_sub_field('text_hero_lp') ?></p>
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
            <div class="hero-lp-image">
                <?php if (get_sub_field('image_hero_lp')) { ?>
                    <img src="<?= get_sub_field('image_hero_lp')['url'] ?>" alt="<?= get_sub_field('image_hero_lp')['alt'] ?>">
                <?php } ?>
            </div>
        </div>
    </div>
</section>
