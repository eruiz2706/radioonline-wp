<?php 
get_header(); ?>
<section class="container">
    <div class="salt2"></div>
    <div class="row">
        <div class="col-md-9">
            <div class="section-titlepost">
                <?php the_title(); ?>
            </div>
            <?php include(locate_template( 'template-parts/front/content-tuprogramacion.php')); ?>
        </div>
        <div class="col-md-3 nopadding">
            <?php get_template_part( 'template-parts/front/content', 'right' ); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>




