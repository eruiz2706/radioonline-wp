<?php

add_action('wp_enqueue_scripts','radioonline_styles');

/*para permitir agregar imagenes destacadas*/
add_theme_support('post-thumbnails');

/*navegacion*/
register_nav_menus(array(
'menu_principal'=>__('Menu Principal','RadioOnline')
));

//add_image_size('post-img',750,490,true);

require_once 'wp-bootstrap-navwalker.php';

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
    'redessocial' => __( 'Redes sociales Menu', 'THEMENAME' ),
) );

add_image_size( 'ultimosson-img',270,170,false);
add_image_size( 'subdestacada-img',270,210,false);
add_image_size( 'event-img',210,150,false);
  
add_image_size( 'destacada-img', 492, 278,false );
add_image_size( 'post-img',800,450,false );
add_image_size( 'staff-img',600,300,false );


function radioonline_styles(){
    wp_enqueue_style('normalize',get_stylesheet_directory_uri().'/css/normalize.css');
    //wp_enqueue_style('bootstrap',get_stylesheet_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap',"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
    wp_enqueue_style('fontsgoogle','https://fonts.googleapis.com/css?family=Montserrat%3A400%2C700%7CLato%3A400%2C700%2C400italic%2C700italic&#038;ver=4.9');
    wp_enqueue_style('stylecss',get_stylesheet_uri());
    wp_enqueue_style('larguecss',get_stylesheet_directory_uri().'/css/large.css');
    wp_enqueue_style('smallcss',get_stylesheet_directory_uri().'/css/small.css');

    wp_enqueue_script('jquery');
    //wp_enqueue_script('bootstrapjs',get_stylesheet_directory_uri().'/js/bootstrap.min.js',array('jquery'),'3.3.7',true);
    wp_enqueue_script('bootstrapjs',"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js",array('jquery'),'3.3.7',true);
    wp_enqueue_script('functions',get_stylesheet_directory_uri().'/js/functions.js',array('jquery'));
}



/*funcionts*/
function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category =get_category($cat_id);
	return $category->slug;
}
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".limpiaUrl(get_pagenum_link(1))."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".limpiaUrl(get_pagenum_link($paged - 1))."'>&lsaquo;</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".limpiaUrl(get_pagenum_link($i))."' class='inactive' >".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href='".limpiaUrl(get_pagenum_link($paged + 1))."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".limpiaUrl(get_pagenum_link($pages))."'>&raquo;</a>";
         echo "</div>\n";
     }
}

function limpiaUrl($url){
  $cadena =str_replace('page','?page=',$url);

  $pos      = strripos($cadena,"/");
  if (!($pos === false)) {
    $cadena =substr($cadena,0,$pos+1);
  } 
  return $cadena;
}


if(!function_exists('video_content_filter')) {
    function video_content_filter($content) {
    
           // busca algún iFrame en la página
    $pattern = '/<iframe.*?src=".*?(vimeo|youtu\.?be).*?".*?<\/iframe>/';
    preg_match_all($pattern, $content, $matches);
    
    foreach ($matches[0] as $match) {
    // iFrame encontrado, ahora lo envolvemos en un DIV ...
    $wrappedframe = '<div class="flex-video">' . $match . '</div>';
    
    // Intercambia el original con el video, ahora encerrado
    $content = str_replace($match, $wrappedframe, $content);
    }
    return $content;
    }
}

// Aplicar a areas de contenido de la página o entrada 
add_filter( 'the_content', 'video_content_filter' );


//mi login
function my_login_logo() { ?>
    <style type="text/css">
      #login h1 a, .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/loginlogo.png);
        height: 128px;
        width: 128px;
        background-size: cover;
        background-repeat: no-repeat;
        margin:auto;
      }
    </style>
  <?php }//end my_login_logo()
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
return home_url();
}//end my_login_logo_url()
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
return 'Nelio Software';
}//end my_login_logo_url_title()
add_filter( 'login_headertitle', 'my_login_logo_url_title' );