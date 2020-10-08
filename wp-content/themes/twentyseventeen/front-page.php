<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php 

  $paged = (get_query_var('page')) ? get_query_var('page') : 1;
  //global $paged;
  //if(empty($paged)) $paged = 1;

  echo "paginaasfasfasfasd=>$paged<br>";
  $args = array(
  'posts_per_page' =>2,
  'orderby' => 'menu_order',
  'category_id' => the_category_id(),
  'paged' => $paged,
  );
  query_posts($args); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <?php global $more; $more = false; ?>
  <?php the_content('Continue Reading'); ?>
  <?php $more = true; ?>

  <?php endwhile; else: ?>

  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>

  <?php previous_posts_link(); ?> &nbsp; &nbsp;
  <?php next_posts_link(); ?>


    <?php //	kriesi_pagination(); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
