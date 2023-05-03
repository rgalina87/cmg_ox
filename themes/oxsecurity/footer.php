<footer class="ox-footer">
    <div class="content-container">

        <div class="footer__main">
            <div class="footer__logo-text">
                <?php if (get_field('logo', 'option')) { ?>
                    <img src="<?= get_field('logo', 'option')['url']; ?>"
                         alt="<?= get_field('logo', 'option')['alt']; ?>"
                         class="footer__logo"
                    />
                <?php } ?>
                <?php if (get_field('footer_text', 'option')) { ?>
                    <div class="ox-footer__text">
                        <?= get_field('footer_text', 'option'); ?>
                    </div>
                <?php } ?>
            </div>

            <div class="footer__cta">
                <?php if(get_field('cta_buttons', 'option')) { ?>
                    <?php
                    $cta = get_field('cta_buttons', 'option');
                    foreach ($cta as $i) {
                        if (isset($i)) {
                            ?>
                            <div class="footer__cta-item">
                                <?php if($i['cta_title']) { ?>
                                    <a class="footer__cta-url" href="<?= $i['cta_url'] ?>">
                                        <p class="footer__cta-title"><?= $i['cta_title'] ?></p>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <?php } ?>
            </div>
        </div>

        <div class="footer__legal">
                <?php if(get_field('legal', 'option')) { ?>
                    <?php
                    $legal = get_field('legal', 'option');
                    foreach ($legal as $l) {
                        if (isset($l)) {
                            ?>
                            <div class="footer__legal-item">
                                <?php if($l['legal_text']) { ?>
                                    <a class="footer__legal-url" href="<?= $l['legal_url'] ?>">
                                        <p class="footer__legal-title"><?= $l['legal_text'] ?></p>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <?php } ?>
        </div>

    </div>

<?php wp_footer(); ?>

</footer>
</body>
</html>
