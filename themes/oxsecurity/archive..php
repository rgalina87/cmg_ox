<?php
/**
 * Glossary (Careers?) archive
 */

//get_header();
?>

<h1>Glossary (Careers?) archive</h1>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div id="post-wrap">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content' );
				endwhile;

			else :

				get_template_part( 'template-parts/content-none' );

			endif;
			?>
		</div>

		<?php the_posts_pagination(); ?>
	</main><!-- #main -->
		</div><!-- #primary -->
<h1>!Glossary (Careers?) archive</h1>

<?php get_footer(); ?>
