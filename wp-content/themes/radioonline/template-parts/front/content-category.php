<div class="row">
    <?php 
    
    $namecateg=get_cat_slug(the_category_id('','',false));
    $namecateg=($namecateg=='') ? '-1' : $namecateg;

    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $args   =array(
        'posts_per_page' =>6,
        'category_name' =>$namecateg,
        'paged' => $paged,
    );
    query_posts($args);
    while (have_posts()) : the_post();
    ?>

    <div class="col-md-4 col-xs-12 col-sm-6 nopadding">
    
        <div class="mod-imgsubppal">
        <span class="img-subppal">
            <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('subdestacada-img',array('class'=>'img-responsive grow polaroid'));?>
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
    <?php endwhile;?>
        
</div>
<?php kriesi_pagination(); ?> 
