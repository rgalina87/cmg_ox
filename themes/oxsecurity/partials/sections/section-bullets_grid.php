<style>

</style>

<section class="section-content bullets-grid-lp-section">
    <div class="content-container">
        <?php if (get_sub_field('title_bullet_grid')) { ?>
            <h2 class="title-bullets-grid"><?= get_sub_field('title_bullet_grid') ?></h2>
        <?php } ?>

        <div class="items-bullets-grid">
            <?php
            $bul_grid_item = get_sub_field('items_bullet_grid');
            foreach ($bul_grid_item as $i) {
                if (isset($i)) {
                    ?>
                    <div class="bullet-item">
                        <?php if ($i['item_bullet_image']) { ?>
                            <img src="<?= $i['item_bullet_image']['url'] ?>" alt="<?= $i['item_bullet_image']['alt'] ?>" class="image-bullet-grid" />
                        <?php } ?>
                        <div class="item-text-number">
                            <?php if ($i['item_bullet_number']) { ?>
                                <p class="number-item-bullet"><?= $i['item_bullet_number'] ?></p>
                            <?php } ?>
                            <?php if ($i['item_bullet_number_img']) { ?>
                                <img src="<?= $i['item_bullet_number_img']['url'] ?>" alt="<?= $i['item_bullet_number_img']['alt'] ?>" class="number-bullet-grid" />
                            <?php } ?>
                            <?php if ($i['item_bullet_text']) { ?>
                                <p class="item-text-grid"><?= $i['item_bullet_text'] ?></p>
                            <?php } ?>
                        </div>
                    </div>

                <?php }
            }
            ?>
        </div>

    </div>
</section>

