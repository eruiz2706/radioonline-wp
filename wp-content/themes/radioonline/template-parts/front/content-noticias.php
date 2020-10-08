
<div class="row">
<?php 
    $cats=array('deportes','entretenimiento','musica','tu-red','judicial','politica');
    foreach($cats as $cat){

        $args   =array(
            'category_name'=>$cat,
            'showposts'=>1
        );
        $datos  =new WP_Query($args);
        while($datos->have_posts()): $datos->the_post();
        ?>

        <div class="col-md-4 col-xs-12 col-sm-6 nopadding">
        
            <div class="mod-imgsubppal">
            <span class="img-subppal">
                <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('subdestacada-img',array('class'=>'img-responsive grow polaroid'));?>
                </a>  
            </span>
            </div>
            <div class="mod-cat-subppal">     
                <span class="cat-subppal">
                    <a href="<?php echo get_category_link( get_cat_ID(the_category_id()) ); ?>">
                    <?php the_category() ?>
                    </a>
                </span>
            </div>
            <div class="mod-fecha-subppal">
            <span class="fecha-subppal">
                <?php the_time('F j, Y '); ?>
            </span>
            </div>
            <div class="mod-tit-subppal">
            <span class="tit-subppal">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title('<h5>','</h5>'); ?>
                </a>
            </span>
            </div>
        </div>
        <?php
        endwhile; wp_reset_postdata();
    }
?>
</div>


