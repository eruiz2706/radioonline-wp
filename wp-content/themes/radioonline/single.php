<?php get_header(); ?>
<section class="container">
    <div class="salt2"></div>
    <div class="row">
        <div class="col-md-9">
          
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <article >
                <?php $namecateg=get_cat_slug(the_category_id('','',false)); ?>
                <header>
                  <div class="section-titlepost"><?php the_title(); ?></div>
                </header>
                <?php
                if($namecateg=='tu-galeria'){
                }else if ( has_post_thumbnail()) { ?>
                  <div class="destaca-imgpost">
                  <?php the_post_thumbnail('post-img',array('class'=>'img-responsive  polaroid'));?>
                  </div>
                <?php } ?>

                <!-- para eventos -->
                <?php
                  $eventofecha    =trim(get_post_meta($post->ID, 'evento-fecha', true)); 
                  $eventohora     =trim(get_post_meta($post->ID, 'evento-hora', true)); 
                  $eventolugar    =trim(get_post_meta($post->ID, 'evento-lugar', true)); 
                  $eventodireccion=trim(get_post_meta($post->ID, 'evento-direccion', true)); 
                  $eventotelefono =trim(get_post_meta($post->ID, 'evento-telefono', true)); 
                ?>
                <?php if($eventofecha !=''){ ?>
                <table class="table bordered striped">
                  <tbody>
                    <tr>
                      <th scope="row">Fecha</th>
                      <td><?=$eventofecha;?></td>
                    </tr>
                    <tr>
                      <th scope="row">Hora</th>
                      <td><?=$eventohora;?></td>
                    </tr>
                    <tr>
                      <th scope="row">Lugar</th>
                      <td><?=$eventolugar;?></td>
                    </tr>
                    <tr>
                      <th scope="row">Direccion</th>
                      <td><?=$eventodireccion;?></td>
                    </tr>
                    <tr>
                      <th scope="row">Telefono</th>
                      <td><?=$eventotelefono;?></td>
                    </tr>
                  </tbody>
                </table>
                <?php } ?>
                
                <?php the_content(); ?>
              </article>
          <?php endwhile; else : ?>
              <article>
                <p>No se encontro el articulo solicitado</p>
              </article>
          <?php endif; ?>
            
        </div>
        <div class="col-md-3 nopadding">
            <?php get_template_part( 'template-parts/front/content', 'right' ); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
 

