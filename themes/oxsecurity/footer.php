<footer class="ox-footer">
    <div class="content-container">

        <div class="ox-footer__main">
            <div class="ox-footer__logo-text">
                <?php if (get_field('logo', 'option')) { ?>
                    <img src="<?= get_field('logo', 'option')['url']; ?>"
                         alt="<?= get_field('logo', 'option')['alt']; ?>"
                         class="ox-footer__logo"
                    />
                <?php } ?>
                <?php if (get_field('footer_text', 'option')) { ?>
                    <div class="ox-footer__text">
                        <?= get_field('footer_text', 'option'); ?>
                    </div>
                <?php } ?>
            </div>

            <div class="ox-footer__cta-social">
                <div class="ox-footer__cta">
                    <?php if(get_field('cta_buttons', 'option')) { ?>
                        <?php
                        $cta = get_field('cta_buttons', 'option');
                        foreach ($cta as $i) {
                            if (isset($i)) {
                                ?>
                                <?php
                                $cta_style = $i['cta_style']
                                ?>
                                <div class="ox-footer__cta-item <?= $cta_style ?>">
                                    <?php if($i['cta_title']) { ?>
                                        <a class="ox-footer__cta-url" href="<?= $i['cta_url'] ?>">
                                            <p class="ox-footer__cta-title"><?= $i['cta_title'] ?></p>
                                        </a>
                                    <?php } ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    <?php } ?>
                </div>

                <div class="ox-footer__social">

                    <div class="ox-footer-follow">
                       <?= 'Follow US: ' ?>
                    </div>

                    <?php if(get_field('social', 'option')) { ?>
                        <?php
                        $social = get_field('social', 'option');
                        foreach ($social as $s) {
                            if (isset($s)) {
                                ?>
                                <div class="ox-footer__social-item">
                                    <?php if($s['social_image']) { ?>
                                        <a class="ox-footer__social-url" href="<?= $s['social_url'] ?>">
                                            <img class="ox-footer__social-image"
                                                 src="<?= $s['social_image']['url'] ?>"
                                                 alt="<?= $s['social_image']['alt'] ?>"/>
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
        </div>

        <div class="ox-footer__legal">
            <div class="ox-footer__copyright">
                &copy; <?= date("Y"); ?>
            </div>
                <?php if(get_field('legal', 'option')) { ?>
                    <?php
                    $legal = get_field('legal', 'option');
                    foreach ($legal as $l) {
                        if (isset($l)) {
                            ?>
                            <div class="ox-footer__legal-item">
                                <?php if($l['legal_text']) { ?>
                                    <a class="ox-footer__legal-url" href="<?= $l['legal_url'] ?>">
                                        <p class="ox-footer__legal-title"><?= $l['legal_text'] ?></p>
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
