<div class="row">
<div class="col-md-12 col-xs-12 col-sm-12">
<div class="salto"></div>

<div class="center-text"><div class="section-titlepost">AL AIRE</div></div>

<a href="javascript: alaire();" target="_blank">
<img class="img-alaire" src="<?php echo get_stylesheet_directory_uri();?>/img/alaire.png" >
</a>

<div class="center-text"><div class="section-titlepost">TOP 10</div></div>
<?php echo do_shortcode("[ai_playlist id='110']"); ?>

<div class="center-text"><div class="section-titlepost">SIGUENOS</div></div>

<?php
/*wp_nav_menu( array(
    'theme_location'    => 'redessocial',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse',
    'container_id'      => 'bs-example-navbar-collapse-1',
    'menu_class'        => '',
    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
    'walker'            => new WP_Bootstrap_Navwalker())
);*/
?>

<div class="center-listred">
    <ul class="listredes">
    <?php
        $menu_name = 'redessocial';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[ $menu_name ]);
        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

        foreach ( $menuitems as $item ):
    ?>
        <li class="iconredes">
            <a title="<?= $item->post_title; ?>" target="<?= $item->target; ?>" href="<?=$item->url;?>"><i class="icon-2x icon-<?=$item->post_name?>"></i><span class='fa-hidden'><?= $item->post_title; ?></span></a>
        </li>

    <?php endforeach; ?>
    </ul>
</div>

<div class="center-text"><div class="section-titlepost">TU MARCA AQUI</div></div>
<?php echo do_shortcode("[easingslider id='396']");?>
</div>
</div>