
<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
get_header(); ?>
<section class="container">
    <div class="salt2"></div>
    <div class="row">
        <div class="col-md-9">
            <div class="section-titlecat">
                <?php the_category(); ?>
            </div>
            <?php include(locate_template( 'template-parts/front/content-category.php')); ?>
        </div>
        <div class="col-md-3 nopadding">
            <?php get_template_part( 'template-parts/front/content', 'right' ); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
 