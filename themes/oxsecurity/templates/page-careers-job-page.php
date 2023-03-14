<?php
/* Template Name: Careers job page*/

get_header(); ?>
<section class="section-content job-openings-section">
  <div class="content-container">
    <?php
    $the_content = apply_filters('the_content', $post->post_content);
    if (!empty($the_content)) {
      echo $the_content;
    } ?>
  </div>
</section>
<?php get_footer(); ?>