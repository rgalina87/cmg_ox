<section class="section-content partnership-partners-intro-section">
    <div class="content-container">
        <?php if (get_sub_field('case_study')) { ?>
            <p class="partners-page-case-study"><?= get_sub_field('case_study') ?></p>
        <?php } ?>
        <?php if (get_sub_field('intro_title')) { ?>
            <h3 class="partners-page-intro-title"><?= get_sub_field('intro_title') ?></h3>
        <?php } ?>
        <?php if (get_sub_field('intro_text')) { ?>
            <div class="partners-page-intro-text">
                <?= get_sub_field('intro_text') ?>
            </div>
        <?php } ?>

    </div>
</section>
