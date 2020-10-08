<?php get_header(); ?>

<section class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="section-title">
                NOTICIAS
            </div>
            <?php get_template_part( 'template-parts/front/content', 'noticias' ); ?>
            <div class="col-md-12">
                <div class="section-title">
                    EVENTOS
                </div>
                <?php get_template_part( 'template-parts/front/content', 'eventos' ); ?>
            </div>
            <div class="col-md-12">
                <div class="section-title"> 
                    TU GALERIA
                </div>
                <?php get_template_part( 'template-parts/front/content', 'ultimosson' ); ?>
            </div>
            <div class="salto"></div>
            </div>
            <div class="col-md-3 nopadding">
                <?php get_template_part( 'template-parts/front/content', 'right' ); ?>
            </div>
    </div>
    <div class="row">
        
    </div>        
</section>

<?php get_footer(); ?>