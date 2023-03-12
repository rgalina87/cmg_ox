<?php
    $font_size = get_sub_field('font_size');
    $line_height = get_sub_field('line_height');
?>

<section class="section-content lp-paragraph-section">
    <div class="content-container">
        <?php if (get_sub_field('paragraph')) { ?>
            <div class="lp-paragraph" style="font-size: <?= $font_size ?>; line-height: <?= $line_height ?>;">
                <?= get_sub_field('paragraph') ?>
            </div>
        <?php } ?>
    </div>
</section>
