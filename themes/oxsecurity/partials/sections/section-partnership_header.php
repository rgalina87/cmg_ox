<section class="section-content partnership-header-section">
    <div class="content-container">
        <?php if (get_sub_field('header_image')) { ?>
            <img class="partnership-header-image" src="<?= get_sub_field('header_image')['url'] ?>" alt="<?= get_sub_field('header_image')['alt'] ?>"/>
        <?php } ?>

        <?php if (get_sub_field('partners_page_logo')) { ?>
            <img class="partnership-header-logo" src="<?= get_sub_field('partners_page_logo')['url'] ?>" alt="<?= get_sub_field('partners_page_logo')['alt'] ?>"/>
        <?php } ?>
</section>