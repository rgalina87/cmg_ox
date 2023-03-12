<section class="section-content texts-bullets-lp-section">
    <div class="content-container">
        <?php if (get_sub_field('text_grid_title')) { ?>
            <h2 class="title-texts-bullets"><?= get_sub_field('text_grid_title') ?></h2>
        <?php } ?>
        <?php if (get_sub_field('text_grid_subtitle')) { ?>
            <div class="subtitle-texts-bullets"><?= get_sub_field('text_grid_subtitle') ?></div>
        <?php } ?>

        <div class="items-texts-bullets">
            <?php
            $bullet_item = get_sub_field('item_texts_bullets');
            foreach ($bullet_item as $item) {
            if (isset($item)) {
            ?>
                <div class="text-image-bullet">
                    <?php if ($item['image_item_bullet']) { ?>
                        <img src="<?= $item['image_item_bullet']['url'] ?>" alt="<?= $item['image_item_bullet']['alt'] ?>" class="image-item-bullet" />
                    <?php } ?>
                    <div class="item-text-bullet">
                    <?php if ($item['title_item_bullet']) { ?>
                        <h3 class="title-item-bullet"><?= $item['title_item_bullet'] ?></h3>
                    <?php } ?>
                    <?php if ($item['text_item_bullet']) { ?>
                        <p class="text-item-bullet"><?= $item['text_item_bullet'] ?></p>
                    <?php } ?>
                    </div>
                </div>

            <?php }
            }
            ?>
        </div>

    </div>
</section>