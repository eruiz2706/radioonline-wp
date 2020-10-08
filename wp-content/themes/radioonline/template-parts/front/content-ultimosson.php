<div class="row">
<div class="borde">
<?php 
    $args   =array(
        'category_name'=>'tu-galeria',
        'showposts'=>3
    );
    $datos  =new WP_Query($args);
    while($datos->have_posts()): $datos->the_post();

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
    <?php
    endwhile; wp_reset_postdata();
?>
</div>
</div>
