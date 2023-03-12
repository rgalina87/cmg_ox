<section class="section-content header-section">
    <div class="content-container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="title-header"><?= get_sub_field('title') ?></h2>
        <?php } ?>
        <?php if (get_sub_field('subtitle')) { ?>
            <div class="subtitle-header"><?= get_sub_field('subtitle') ?></div>
        <?php } ?>

        <?php if (get_sub_field('open_positions_link')) { ?>
            <a class="cta-header" href="<?= get_sub_field('open_positions_link') ?>"><?= get_sub_field('open_positions_title') ?></a>
        <?php } ?>
    </div>
</section>

<section class="section-content header-image-section__image">
    <div class="content-container">
        <?php if (get_sub_field('image')) { ?>
            <img class="header-image" src="<?= get_sub_field('image')['url'] ?>" alt="<?= get_sub_field('image')['alt'] ?>"/>
        <?php } ?>
    </div>
</section>