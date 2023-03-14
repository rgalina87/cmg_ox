<section class="section-content partnership-partners-section">
    <div class="content-container">
        <?php if (get_sub_field('title')) { ?>
            <h2><?= get_sub_field('title') ?></h2>
        <?php } ?>

        <div class="partners-grid">
            <?php
            $partners = get_sub_field("partners");
            foreach ($partners as $i) {
                if (isset($i)) {
                    ?>
                    <div class="partner-single">
                        <?php if ($i['partner_logo']) { ?>
                            <img class="" src="<?= $i['partner_logo']['url'] ?>" alt="<?= $i['partner_logo']['alt'] ?>"/>
                        <?php } ?>
                        <?php if ($i['description']) { ?>
                            <p class="partner-description"><?= $i['description'] ?></p>
                        <?php } ?>
                        <?php if (isset($i['read_more']['url'])) { ?>
                            <a class="partner-read-more" href="<?= $i['read_more']['url'] ?>">Read More</a>
                        <?php } ?>
                    </div>

                    <?php
                }
            }
            ?>

        </div>
    </div>
</section>
