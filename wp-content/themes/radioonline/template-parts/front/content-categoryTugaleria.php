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
    
    $tamtit=strlen(the_title('', '', FALSE));
    $titulo=($tamtit>32) ? substr(the_title('', '', FALSE),0,42).'...' : the_title('', '', FALSE);
    ?>

    <div class="col-md-4 col-xs-12 col-sm-6 nopadding">
        <div class="modimg-ultson">
            <span class="img-ultson">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('ultimosson-img',array('class'=>'img-responsive grow polaroid'));?>
                </a>  
            </span>
            <h3><?= $titulo; ?></h3>
        </div>
    </div>
    <?php endwhile;?>
        
</div>
<?php kriesi_pagination(); ?> 
