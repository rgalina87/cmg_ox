<section class="section-content job-openings-section" id="job-openings">
    <div class="content-container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="title-job-openings"><?= get_sub_field('title') ?></h2>
        <?php } ?>
        <?php if (get_sub_field('subtitle')) { ?>
            <div class="subtitle-job-openings"><?= get_sub_field('subtitle') ?></div>
        <?php } ?>

        <?php if (get_sub_field('job_openings_shortcode')) { ?>
            <div class="list-job-openings"><?= get_sub_field('job_openings_shortcode') ?></div>
        <?php } ?>
    </div>
</section>
