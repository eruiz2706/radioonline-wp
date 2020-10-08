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
                <div class="imgstaff">
                <?php
                if ( has_post_thumbnail()) { ?>
                  <?php 
                  $urlface=trim(get_post_meta($post->ID, 'staff-facebook', true)); 
                  $urlinstag=trim(get_post_meta($post->ID, 'staff-instagram', true)); 
                  $urltwit=trim(get_post_meta($post->ID, 'staff-twitter', true)); 
                  
                   ?>
                  <div class="destaca-imgstaff">
                  <?php the_post_thumbnail('staff-img',array('class'=>'img-responsive  polaroid'));?>
                    <ul class="listredes">
                      <?php if($urlface !=''){ ?>
                      <li class="iconredes">
                        <a title="Facebook" target="_blank" href="<?=$urlface;?>"><i class='icon-2x icon-facebook '></i><span class='fa-hidden'>Facebook</span></a>
                      </li>
                      <?php } ?>
                      <?php if($urlinstag !=''){ ?>
                      <li class="iconredes">
                      <a title="Twitter" target="_blank" href="<?=$urlinstag;?>"><i class='icon-2x icon-twitter '></i><span class='fa-hidden'>Twitter</span></a>
                      </li>
                      <?php } ?>
                      <?php if($urltwit !=''){ ?>
                      <li class="iconredes">
                      <a title="Instagram" target="_blank" href="<?=$urltwit;?>"><i class='icon-2x icon-instagram '></i><span class='fa-hidden'>Instagram</span></a>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                  
                <?php } ?>
                
                </div>
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
 
