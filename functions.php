<?php
/*
Archivo de funciones del tema
*/

if( !is_admin()){
   wp_deregister_script('jquery');
   wp_register_script('jquery', (get_bloginfo('template_directory').'/js/jquery.min.js'), false, '');
   wp_enqueue_script('jquery');
	wp_enqueue_script('mycode', get_bloginfo('template_directory').'/js/mycode.js'); 
	
}


/*
 *Adding theme support fot HTML5
 */
 add_theme_support('html5');

/*
 *Adding theme support for thumbnails
 */
add_theme_support('post-thumbnails');

/**
 *Telling wordpress to add editor style support
 */
add_editor_style();

/**
 *Adding feeds links to the header
 */
add_theme_support('automatic-feed-links');

/**
 *MENU AREAS
 *Defining a top menu, main menu and bottom menu
 */
register_nav_menus(array(
	'top-menu' => __('Top menu','veracruz2013')
));

include_once 'metaboxes/setup.php';
include_once 'metaboxes/functions-meta.php';

/**
 *WIDGETS AREAS
 */
function veracruz2013_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Home y Single', 'veracruz2013' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'Sidebar widgets on the right column of the page', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'veracruz2013_widgets_init' );
/** Register sidebars by running steady_widgets_init() on the widgets_init hook. */

// Register Custom Taxonomy
function cets_media_tags_init()  {
    $labels = array(
        'name'                       => _x( 'Media Tags', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Media Tag', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Media Tags', 'text_domain' ),
        'all_items'                  => __( 'All Media Tags', 'text_domain' ),
        'parent_item'                => __( 'Parent Media Tag', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Media Tag:', 'text_domain' ),
        'new_item_name'              => __( 'New Media Tag', 'text_domain' ),
        'add_new_item'               => __( 'Add New Media Tag', 'text_domain' ),
        'edit_item'                  => __( 'Edit Media Tag', 'text_domain' ),
        'update_item'                => __( 'Update Media Tag', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Media Tags with commas', 'text_domain' ),
        'search_items'               => __( 'Search Media Tags', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Media Tags', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used Media Tags', 'text_domain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'update_count_callback'      => '_update_generic_term_count',
        'query_var'                  => false,
        'rewrite'                    => false,
    );

    register_taxonomy( 'media-tags', 'attachment', $args );
}

// Hook into the 'init' action
add_action( 'init', 'cets_media_tags_init', 0 );

//next child page
function siblings($link) {
    global $post;
    $siblings = get_pages('child_of='.$post->post_parent.'&parent='.$post->post_parent.'&sort_column=post_date&sort_order=DESC');
    foreach ($siblings as $key=>$sibling){
        if ($post->ID == $sibling->ID){
            $ID = $key;
        }
    }
    $closest = array('before'=>get_permalink($siblings[$ID-1]->ID),'after'=>get_permalink($siblings[$ID+1]->ID));
	$title_after = get_the_title($siblings[$ID+1]->ID);
	$title_before = get_the_title($siblings[$ID-1]->ID);
    $data_link=array();
	
	if ($link == 'after' && $siblings[$ID+1]->ID != '') { 
		$data_link['after'] = $closest[$link];
		$data_link['title_after'] = $title_after;
		//$data_link['text_aft'] = "<img src='".get_bloginfo('template_url')."/images/flecha-left.png'>";
		return $data_link;
	} elseif($link == 'before' && $siblings[$ID-1]->ID != '') { 
		$data_link['before'] = " ".$closest[$link];
		$data_link['title_before'] = $title_before;
		//$data_link['text_bef'] = "<img src='".get_bloginfo('template_url')."/images/flecha-right.png'>";
		return $data_link;
	}else{
		return $closest;
	}
}

function guias(){
	$img_custom=wp_get_attachment_image_src( $_POST['id_attachment'], 'img-sidebar' );
	$img_full=wp_get_attachment_image_src( $_POST['id_attachment'], 'full' );
	echo $img_custom[0];
	die(); 
}
add_action('wp_ajax_guias', 'guias');
add_action('wp_ajax_nopriv_guias', 'guias');  

function get_video_ajax(){
	$query = new WP_Query( 'p='.$_POST['post_id'] );
	if ( $query->have_posts() ) :
		while ($query->have_posts()):$query->the_post(); 
				$link = get_post_meta($query->post->ID, 'youtube-link' , true); 
				echo "<div class='col-md-12 video-container'>";
					//$pieces=explode('=',$link);
					echo "<iframe width='598' height='360' src='http://www.youtube.com/embed/".$link."??rel=0&amp;wmode=transparent&?modestbranding=1&controls=0&autoplay=1&showinfo=0' frameborder='0' allowfullscreen></iframe>";
				echo "</div>";
				/*echo "<div class='col-md-4 padding-30'>";
					echo "<h6 class='date'>";
						echo "<span id='fecha-variable' class='text'>". get_the_time( 'j M' ) ."</span>";
						echo "<span class='border'></span>";
					echo "</h6>";
					echo "<h3 class='titulo'>". get_the_title() ."</h3>";
					echo "<div id='contenido'>";
						 the_excerpt();
					echo "</div>";
				echo "</div>";*/
	endwhile; endif; 
	wp_reset_query(); 
	die(); 
}
add_action('wp_ajax_get_video_ajax', 'get_video_ajax');
add_action('wp_ajax_nopriv_get_video_ajax', 'get_video_ajax');

function get_images_gallery(){
	$query = new WP_Query( 'p='.$_POST['post_id'] );
	$cont=0;
	if ( $query->have_posts() ) :
		while ($query->have_posts()):$query->the_post(); 
			$args=array('post_type'=>'attachment','post_parent'=>get_the_ID(),'order' => 'ASC', 'orderby' => 'menu_order ID', 'posts_per_page'=>99);
			$attachments=get_posts($args);
			$data_images=array();
			$data_title=array();
			if($attachments){
				foreach($attachments as $attachment){
					$img_full=wp_get_attachment_image_src( $attachment->ID, 'full' );
					$img_data_lightbox = get_bloginfo('template_url')."/timthumb.php?src=".urlencode($img_full[0])."&a=cc&w=900";
					$data_images[$cont] = $img_data_lightbox;
					$data_title[$cont] = get_the_title();
				$cont++;}
			}
	endwhile; endif; 
	$arr_return = array(
	  'images' => $data_images,
	  'title' => $data_title
	);
	echo json_encode($arr_return);
	wp_reset_query(); 
	die(); 
}
add_action('wp_ajax_get_images_gallery', 'get_images_gallery');
add_action('wp_ajax_nopriv_get_images_gallery', 'get_images_gallery');

/*get_load_more*/
function get_load_more(){
	$args = array(
		'post_type' => 'post',
		'category_name' => 'fotos',
		'posts_per_page'=> 3,
		'paged' => $_POST['page']
	);
	$notas = new WP_Query($args);
	if ($notas->have_posts()) :
		while ($notas->have_posts()):$notas->the_post(); 
			the_title();
		endwhile; 
	endif; 
	wp_reset_query(); 
	die(); 
}
add_action('wp_ajax_get_load_more', 'get_load_more');
add_action('wp_ajax_nopriv_get_load_more', 'get_load_more');

/*get_sitio_orgin*/
function get_sitio_origin(){
	$sitio=$_POST['name_sitio'];
	$link=$_POST['link_des'];
	
	if(!isset($sitio) || empty($sitio)){
		$sitio = "comsocial";	
	}
	if(!isset($link) || empty($link)){
		$link = site_url( '/blog/category/multimedia' );
	}
	
	setcookie("sitio", $sitio, time()+3600, "/");
	echo $link;
	die();
}
add_action('wp_ajax_get_sitio_origin', 'get_sitio_origin');
add_action('wp_ajax_nopriv_get_sitio_origin', 'get_sitio_origin');


function get_ajax_wpmenu(){ ?>
	 <div class="buscador_menu">
		<?php get_search_form(); ?>
	 </div>
     <?php
		wp_nav_menu(array('menu'=> ($_POST['menu_name']=='veracruz') ? 'Top menu' : 'Menu Sala de Prensa',
						'container'=>'',
						'items_wrap' => '<ul class="nav navbar-nav navbar-ver bck-logo-menu">%3$s</ul>',
						'theme-location'=> ($_POST['menu_name']=='veracruz') ? 'top-menu' : 'top-menu-cs'));
		get_template_part( 'content', 'navbar-menuiphone' );
			
	die();
}
add_action('wp_ajax_get_ajax_wpmenu', 'get_ajax_wpmenu');
add_action('wp_ajax_nopriv_get_ajax_wpmenu', 'get_ajax_wpmenu');

//-----Función para limitar caracteres-----//
function cutString($string,$charlength,$key) {
	switch($string){
		case 'title':
			$string=wpautop(get_the_title(), 1 );
		break;
		case 'excerpt':
			$string=get_the_excerpt();
		break;
		case 'content':
			$string=wpautop(get_the_content(), 1 );
		break;
		case 'meta':
			$string=wpautop(get_option(''.$key.''), 1 );
		break;
		case 'var':
			$string= esc_html($key, 'veracruz2013');
		break;
	}
    if(strlen($string)>$charlength) {
		$subex=substr($string,0,$charlength);
        echo $subex.'...';
    }else{
		echo $string;
    }
}
//------fin limitar caracteres----//
function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}
function myTruncate($string, $limit, $break=".", $pad="…") { 
	if(strlen($string) <= $limit) 
	return $string; 
		if(false !== ($breakpoint = strpos($string, $break, $limit))) { 
			if($breakpoint < strlen($string) - 1) { 
				$string = substr($string, 0, $breakpoint) . $pad; 
			} 
		} 
	return $string; 
}

function cortar_caracter($cadena, $caracter) { 
  $cadena_cortada='';  
  for ($i=0;$i<strlen($cadena);$i++) { 
    if ($caracter==$cadena{$i}) { 
      break;   
    } 
    $cadena_cortada=$cadena_cortada.$cadena{$i}; 
  } 
  return $cadena_cortada.$caracter; 
} 

function get_post_destacado($category_slug){
	global $wpdb;
	$query = $wpdb->prepare("
	SELECT SUBQ.ID FROM (      
		SELECT ID,
			    (SELECT COUNT(object_id) FROM gev_term_relationships WHERE object_id = POST.ID AND term_taxonomy_id IN ((SELECT term_taxonomy_id FROM gev_term_taxonomy WHERE term_id IN ( SELECT term_id FROM `gev_terms` WHERE slug = '$category_slug')))) AS BLOG,
			    (SELECT COUNT(object_id) FROM gev_term_relationships WHERE object_id = POST.ID AND term_taxonomy_id = 64) AS DESTACADOS
				FROM gev_posts AS POST
				WHERE id IN (
						SELECT DISTINCT object_id 
						FROM gev_term_relationships 
						WHERE term_taxonomy_id IN 
							(SELECT term_taxonomy_id FROM gev_term_taxonomy
							 WHERE term_id IN ( SELECT term_id FROM 
									  `gev_terms`
									  WHERE slug = 'destacados' OR slug = '$category_slug'
									  )
							 )
						) AND POST.post_type = 'post'
					) AS SUBQ
					WHERE SUBQ.BLOG = 1 AND SUBQ.DESTACADOS = 1 ORDER BY ID DESC LIMIT 1;",array($category_slug));
	
	 $result_query = $wpdb->get_var($query);
	 //print_r($wpdb->last_query);
	 return $result_query;
}

function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}	
function get_cat_slug_by_id($id) {
	$cat_test = get_the_category( $id );
	$count=0;
	foreach($cat_test as $cat_index){
		if($cat_index->slug == 'fotos'){
			return "foto";
			break;
		}else if($cat_index->slug == 'videos'){
			return "video";
			break;
		}else{
			return "nota";
			break;
		}
		$count++;	
	}
}

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	 add_post_type_support( 'page', 'excerpt' );
}

function autolink($string){
	$content_array = explode(" ", $string);
	$output = '';
	foreach( $content_array as $content ) {
		//starts with http://
		if( substr($content, 0, 7) == "http://" ) {
			$content = '<a href="' . $content . '" target="_blank">' . $content . '</a>';
		}
		//starts with www.
		if( substr($content, 0, 4) == "www." ) {
			$content = '<a href="http://' . $content . '" target="_blank">' . $content . '</a>';
		}
		$output .= " " . $content;
	}
	$output = trim($output);
	return $output;
}

function get_tweet($account) {
	$guardoCuenta = $account;
	// get tokens
	global $wpdb;
	$tmhOAuth = new tmhOAuth(
		array(
			'consumer_key' => 'IkzT52PXpo8H5Reslogtw',
			'consumer_secret' => 'LHycM7rUpDbTDN2ERvc6bgPzYjPt1KEq0lKtrYdvYo',
			'user_token' => '1270543368-8z1t7dZVrnTTzMpVrapyfAkUy2SkAX6fJevz1pp',
			'user_secret' => 'htPTKN51WVjM0slI0luO2JYeZtNme1oyFgunWXtLmRJJQ',
			'curl_ssl_verifypeer' => false
		)
	);
	$data_twitter = array(
		'screen_name' => $account,
		'count' => '15'
	);
	$code = $tmhOAuth->request( 'GET', $tmhOAuth->url('1.1/statuses/user_timeline'), $data_twitter );
	$response = $tmhOAuth->response['response'];
	//print_r($response);
	$tweets = json_decode( $response, true );
	$isFirst=true;
	
	$obtieneTweets = $wpdb->get_results( 
				"
				SELECT text , id
				FROM gev_twitter
				WHERE screen_name = '$guardoCuenta'
				ORDER BY id DESC
				LIMIT 15
				"
			);
			foreach( $obtieneTweets as $obtieneTweet ) {
				if($isFirst){
					echo "<li>".autolink( $obtieneTweet->text )."</li>";
				}else{
					echo "<li>.".autolink( c )."</li>";
				}
			}
		$isFirst=false;
}
remove_filter( 'the_excerpt', 'wpautop' ); 

/*functions comunicacion social*/

function get_ngg_gallery($post_id){
	global $wpdb;
	$get_gallery_id = $wpdb->get_var( $wpdb->prepare( 
		"
			select
			substring(substring(post_content,INSTR(post_content,'[nggallery id=')), INSTR(  substring(post_content,INSTR(post_content,'[nggallery id=')), '='  ) + 1, ((INSTR(  substring(post_content,INSTR(post_content,'[nggallery id=')), ']'  ))-(INSTR(  substring(post_content,INSTR(post_content,'[nggallery id=')), '='  ) )) -1) s
			FROM wp_veracruz.gev_posts
			where post_type='post'
			and ID = %d;
		", 
		$post_id
	));	
	$get_fotonota_array = $wpdb->get_results( 
		"select concat(ngg.path,'/',ngp.filename) file from gev_ngg_gallery ngg, gev_ngg_pictures ngp where gid = $get_gallery_id and ngg.gid = ngp.galleryid;",ARRAY_A  
	);
	return $get_fotonota_array;	
}

/*-----------------------------------*/
/*-------------Home cs---------------*/
/*-----------------------------------*/

/*fotonota*/
function get_fotonotas_cs(){
	wp_reset_postdata();
	global $wpdb;
	$get_fotonota = $wpdb->get_results( 
	"
		select post_title, post_id, post_date from gev_postmeta inner join gev_posts on (gev_postmeta.`post_id`=gev_posts.`ID`) where meta_key='comunicado' and meta_value='fotonota' order by `post_id`  desc limit 1;
	"
	);
	foreach($get_fotonota as $get_foto){
		$post_id=$get_foto->post_id;
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full');
		$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&w=425&h=205";
	    $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=345&h=165";
	    $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=638&h=305";
	    $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=499&h=239";
	    $img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=454&h=205";
		echo "<div class='sidebar-fotonota-cs top-7'>";	
			echo "<a href='".get_permalink("$post_id")."' class='over-foto overlay-responsive' data-id='$post_id'>
						<div class='overlay-fotonota'></div>
						<div class='overlay-icon-fotonota'></div> "; ?>
						<span data-picture data-alt="<?php echo $get_foto->post_title ?>" class="img img-responsive img-change">
							<span data-src="<?php echo $img_data_min ?>"></span>
							<span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
							<span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
							<span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
							<span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
						</span>
				<?php echo "</a>";
				echo "<p>".cortar_caracter( $get_foto->post_title , '.')."</p>";?>
				<div class="cinta-ver-mas-style1">
					<a class="" href="/fotonotas">VER FOTONOTAS</a>
				</div>
        <?php        
		echo "</div>";
	}

	wp_reset_postdata();
}
add_action('get_fotonotas_dia','get_fotonotas_cs');

/*foto del dia*/
function get_galery_cs(){
	wp_reset_query(); 
	$sticky = get_option( 'sticky_posts' );
	$args = array(
		'posts_per_page' => 1,
		'post__in'  => $sticky,
		'ignore_sticky_posts' => 1,
		'category_name' => 'fotos'
	);
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) {
		$query->the_post();
		$my_metaAling = get_post_meta($query->ID,'_img_alinear',true);
		$nuestroAlinear = "";
		if($my_metaAling['alinear']!=""){			
			$nuestroAlinear = $my_metaAling['alinear'];
		}else{
			$nuestroAlinear = "cc";
		}
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full');
		if(!empty($large_image_url)){ ?>
			<div class='galery-sidebar-cs'>
				<?php
					$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=293&h=140";
					$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=293&h=140";
					$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=750&h=359";
					$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=570&h=273";
					$img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=293&h=140";
				?>
				<div class='item'>	
					<a href='<?php the_permalink(); ?>' class='over-foto overlay-responsive sitio' data-sitio='comsocial'>
                        <div class='overlay-fotodia'></div>
                        <div class='overlay-icon-fotodia'></div>
                        <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                            <span data-src="<?php echo $img_data_min ?>"></span>
                            <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                            <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                            <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                            <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
                        </span>
					</a>
                    <a href='<?php the_permalink(); ?>'>
                    	<h3><?php the_title();?></h3>
					</a>
				</div>
			</div>
        <?php
		}wp_reset_query(); 
	}
}
add_action('get_galery_dia','get_galery_cs');

/*video del dia*/
function get_video_cs(){
	$args = array(
		'post_type' => 'post',
		'category_name' => 'videos',
		'posts_per_page'=> 1
	);
	wp_reset_query(); 
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) {
		$query->the_post();
		$my_metaAling = get_post_meta($query->post->ID,'_img_alinear',true);
		$nuestroAlinear = "";
		if($my_metaAling['alinear']!=""){			
			$nuestroAlinear = $my_metaAling['alinear'];
		}else{
			$nuestroAlinear = "cc";
		}
		$video_url = get_post_meta($query->post->ID, 'youtube-link', true);
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $query->post->ID ), 'full');
			$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=425&h=205";
			$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=345&h=165";
			$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=638&h=305";
			$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=499&h=239";
			$img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=454&h=205";
			?>
			<div class='galery-video-cs top-7'>	
            	<iframe class="hidden-more-600 video-hw" src="//www.youtube.com/embed/<?php echo $video_url; ?>?controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
				<a href='http://www.youtube.com/watch?v=<?php echo $video_url ?>'  data-toggle="lightbox" data-title="<?php the_title(); ?>" class='over-foto overlay-responsive responsive-video hidden-less-600'>
                    <div class='overlay-videodia'></div>
                    <div class='overlay-icon-videodia'></div>
                    <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                        <span data-src="<?php echo $img_data_min ?>"></span>
                        <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                        <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                        <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                        <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
                    </span>
                </a>
                <h3><?php the_title();?></h3>
				<div class='cinta-ver-mas-style1' style='margin-top:0px;'>
                    <a class='sitio' href='/blog/category/multimedia#videos' data-sitio='comsocial'>VER TODOS</a>
                </div>
			</div>
    <?php 
	} wp_reset_query(); 
}
add_action('get_video_dia','get_video_cs');

/*-----------------------------------*/
/*-----------Home veracruz-----------*/
/*-----------------------------------*/

/*galeria del dia de veracruz*/
function get_galery_ver_red(){
	wp_reset_query(); 
	$sticky = get_option( 'sticky_posts' );
	$args = array(
		'posts_per_page' => 1,
		'post__in'  => $sticky,
		'ignore_sticky_posts' => 1,
		'category_name' => 'fotos'
	);
	
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) {
		$query->the_post();
		
		$imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($query->post->ID), 'full');
		$image_proporcional = get_post_meta($query->post->ID, 'image_proporcional', true);
		
		$alinear = get_post_meta($post->ID,'_img_alinear',true);
		if($alinear['alinear']!=""){			
			$alinear_img = $my_metaAling['alinear'];
		}else{
			$alinear_img = "cc";
		}
		
		if (!empty($image_proporcional) && isset($image_proporcional)) {
			$thumbnailsrc = $image_proporcional;
		}else{
			$thumbnailsrc = $imagen_destacada[0];
		}
		
		if(!empty($thumbnailsrc)){ ?>
			<div class='galery-sidebar-cs'>
            	
            	<?php
				$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=293&h=140";
				$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=293&h=140";
				$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=500&h=240";
				$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=507&h=243";
				$img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=526&h=252";
				?>
				<div class='item'>	
					<a href='<?php the_permalink(); ?>' class='over-foto overlay-responsive sitio' data-sitio='veracruz'>
                        <div class='overlay-fotodia'></div>
                        <div class='overlay-icon-fotodia'></div>
                        <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                            <span data-src="<?php echo $img_data_min ?>"></span>
                            <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                            <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                            <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                            <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>	
                        </span>
					</a>
                    <a href="<?php the_permalink(); ?>">
                    	<h3><?php the_title();?></h3>
					</a>
                    <!--
                    <div class='cinta-ver-mas-style1' style='margin-top:0px;'>
                    	<a class='sitio' href='/blog/category/multimedia#fotos' data-sitio='veracruz'>VER TODAS</a>
                    </div>-->
				</div>
			</div>
        <?php
		}wp_reset_query(); 
	}
}
add_action('get_galery_dia_red','get_galery_ver_red');

/*video del dia de veracruz*/
function get_video_ver_red(){
	wp_reset_query(); 
	$sticky = get_option( 'sticky_posts' );
	$args = array(
		'posts_per_page' => 1,
		'post__in'  => $sticky,
		'ignore_sticky_posts' => 1,
		'category_name' => 'videos'
	);
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) {
		$query->the_post();
		
		$imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($query->post->ID), 'full');
		$image_proporcional = get_post_meta($query->post->ID, 'image_proporcional', true);
		$video_url = get_post_meta($query->post->ID, 'youtube-link', true);
		
		$alinear = get_post_meta($post->ID,'_img_alinear',true);
		if($alinear['alinear']!=""){			
			$alinear_img = $my_metaAling['alinear'];
		}else{
			$alinear_img = "cc";
		}
		
		if(!empty($image_proporcional)) {
			$thumbnailsrc = $image_proporcional;
		} else {
			$thumbnailsrc = $imagen_destacada[0];
		}
		
		$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=293&h=140";
		$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=293&h=140";
		$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=500&h=240";
		$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=507&h=243";
		$img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=526&h=252";
		?>	
			<div class='galery-video-cs'>
            	<div class='item'>
                <iframe class="hidden-more-600" width="100%" height="127px" src="//www.youtube.com/embed/<?php echo $video_url; ?>?controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                    <a href='http://www.youtube.com/watch?v=<?php echo $video_url; ?>'  data-toggle="lightbox" data-title="<?php the_title(); ?>" class='over-foto overlay-responsive responsive-video hidden-less-600'>
                        <div class='overlay-videodia'></div>
                        <div class='overlay-icon-videodia'></div> 
                        <span data-picture data-alt="<?php the_title(); ?>" class="img img-responsive img-change">
                            <span data-src="<?php echo $img_data_min ?>"></span>
                            <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                            <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                            <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                            <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
                        </span>
                    </a>	
                    <h3><?php the_title();?></h3>
                    <!--
                    <div class='cinta-ver-mas-style1' style='margin-top:0px;'>
                    	<a class=' sitio' href='/blog/category/multimedia#videos' data-sitio='veracruz'>VER TODOS</a>
                    </div>-->
				</div>
      	  </div>
    <?php 
	} wp_reset_query(); 
}

add_action('get_video_dia_red','get_video_ver_red');

/*Infografia del dia de veracruz*/
function get_infografia_ver_red(){
	wp_reset_query(); 
	$sticky = get_option( 'sticky_posts' );
	$args = array(
		'posts_per_page' => 1,
		'post__in'  => $sticky,
		'ignore_sticky_posts' => 1,
		'category_name' => 'infografias'
	);
	
	$query = new WP_Query( $args );
	while ( $query->have_posts() ){
		$query->the_post(); 
		
		$imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($query->post->ID), 'full');
		$image_proporcional = get_post_meta($query->post->ID, 'image_proporcional', true);
		
		$alinear = get_post_meta($post->ID,'_img_alinear',true);
		if($alinear['alinear']!=""){			
			$alinear_img = $my_metaAling['alinear'];
		}else{
			$alinear_img = "cc";
		}
		
		if (!empty($image_proporcional)){
			$thumbnailsrc = $image_proporcional;
		} else {
			$thumbnailsrc = $imagen_destacada[0];
		}
	  ?>
	  	<div class='galery-video-cs'>
	    <?php
			$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=293&h=140";
			$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=293&h=140";
			$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=500&h=240";
			$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=507&h=243";
			$img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=526&h=252";
			?>
			<div class='item'>	
                <a href='<?php echo $thumbnailsrc; ?>' class='over-foto overlay-responsive responsive-gallery' data-toggle="lightbox" data-title="<?php the_title(); ?>" data-id='<?php echo get_the_ID(); ?>'>
                    <div class='overlay-infografia'></div>
                    <div class='overlay-icon-infografia'></div>
                    <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-full">
                        <span data-src="<?php echo $img_data_min ?>"></span>
                        <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                        <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                        <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>	
                    </span>
                </a>
                <h3><?php the_title();?></h3>
                <!--
                <div class='cinta-ver-mas-style1' style='margin-top:0px;'>
                	<a class='sitio' href='/blog/category/multimedia#infografias' data-sitio='veracruz'>VER TODAS</a>
                </div>-->
	        </div>
	  </div>
     <?php 
	 } wp_reset_query(); 
}
add_action('get_infografia_red','get_infografia_ver_red');

//---code for single-cs---//
function get_post_related_cs(){
	 wp_reset_query(); 
    $orig_post = $post;  
    global $post;  
	$tags = wp_get_post_tags($post->ID);  
    if ($tags) {  
		$tag_ids = array();  
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
		$args=array(  
			'tag__in' => $tag_ids,  
			'post__not_in' => array($post->ID),
			'tag__not_in' => array( 158, 214, 832 ),  
			'posts_per_page'=>4, // Number of related posts to display.  
			'caller_get_posts'=>1, 
			'category_name'	=> 'blog' 
		);  
		$my_query = new wp_query( $args );
		
		?>
       <?php
	    if( $my_query->post_count != 0 ){ 
		echo "<div id='content-post-related' class='post-related-cs padding-no'>";
		echo  "<h3 class='title-sidebar-red'>NOTICIAS RELACIONADAS</h3>";
		echo "<ul>";
			while( $my_query->have_posts() ) {  
				$my_query->the_post();  
				?>
                	<a href="<?php the_permalink(); ?>">
                        <li>
                            <div class="item-related-cs">
                                <span><?php echo ucfirst (get_the_time('F j, Y')); ?></span>
                                <?php the_title(); ?>
                            </div>
                        </li>
                    </a>
				<?php
			} 
			echo "</ul>";
			echo "<a href='#'>VER TODAS</a>";
		echo "</div>"; ?>  

	<?php
		}
    }  
    $post = $orig_post;  
    wp_reset_query();  
}
add_action('do_get_post_related_sigle_cs','get_post_related_cs');

function get_post_attachment_related_cs(){
	wp_reset_query();
    global $post; 
	$orig_post = $post;  
	$tags = wp_get_post_tags($post->ID);  
    if ($tags) {  
		$tag_ids = array();  
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
		$args=array(  
			'tag__in' => $tag_ids,  
			'post__not_in' => array($post->ID),  
			'posts_per_page'=>1, // Number of related posts to display.  
			'caller_get_posts'=>1,
			'category_name' =>'fotos' 
		);  
		$my_query = new wp_query( $args );
		$number_img = $my_query->post_count;
		if( $my_query->post_count != 0 ){
		echo "<div class='galery-sidebar-cs'>";
			while( $my_query->have_posts() ) {  
				$my_query->the_post();
				$args=array('post_type'=>'attachment','post_parent'=>get_the_ID(),'order' => 'ASC', 'orderby' => 'menu_order ID', 'posts_per_page'=>99);
				$attachments=get_posts($args);
				if($attachments){  
					foreach($attachments as $attachment){
						$img_full=wp_get_attachment_image_src( $attachment->ID, 'full' );
						
						$img_data_1200   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img_full[0] . "&a=" . $nuestroAlinear . "&w=293&h=139";
						$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img_full[0] . "&a=" . $nuestroAlinear . "&w=500&h=237";
						$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img_full[0] . "&a=" . $nuestroAlinear . "&w=638&h=305";
						$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img_full[0] . "&a=" . $nuestroAlinear . "&w=499&h=239";
						$img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img_full[0] . "&a=" . $nuestroAlinear . "&w=454&h=205";
						?>
						<div class='item'>	
							<a href='<?php the_permalink() ?>'  class='over-foto overlay-responsive sitio' data-sitio='veracruz'>
                                <div class='overlay-fotonota'></div>
                                <div class='overlay-icon-fotonota'></div>
                                <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                    <span data-src="<?php echo $img_data_min ?>"></span>
                                    <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                    <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                    <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                    <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>	
                                </span>				
							</a>
                            <a href='<?php the_permalink() ?>'>
                            	<h3><?php the_title();?></h3>
							</a>
                            <div class="cinta-ver-mas-style1">
                            	<a href='/blog/category/multimedia#fotos'>VER TODAS</a>
							</div>
                        </div>
                  	<?php
					}
				}
			}
		echo "</div>";
		}
	}  
    wp_reset_query();  
}
add_action('do_get_post_attachment_related_cs','get_post_attachment_related_cs');

function get_post_video_related_cs(){
	wp_reset_query(); 
    $orig_post = $post;  
    global $post;  
	$tags = wp_get_post_tags($post->ID);  
    if ($tags) {  
		$tag_ids = array();  
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
		$args=array(  
			'tag__in' => $tag_ids,  
			'post__not_in' => array($post->ID),  
			'posts_per_page'=>1, // Number of related posts to display.  
			'caller_get_posts'=>1,
			'category_name' =>'videos'  
		);
		$query = new WP_Query( $args );
		$number_video = $query->post_count;
		if( $query->post_count != 0 ){   
			echo "<div class='galery-video-cs top-7'>";
			while ( $query->have_posts() ) {
				$query->the_post();
				
				$imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
				$image_proporcional = get_post_meta(get_the_ID(), 'image_proporcional', true);
				$video_url = get_post_meta(get_the_ID(), 'youtube-link', true);
				
				$alinear = get_post_meta($post->ID,'_img_alinear',true);
				if($alinear['alinear']!=""){			
					$alinear_img = $my_metaAling['alinear'];
				}else{
					$alinear_img = "cc";
				}
				
				if (!empty($image_proporcional)){
					$thumbnailsrc = $image_proporcional;
				} else {
					$thumbnailsrc = $imagen_destacada[0];
				}
				
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full');
				$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img ."&w=297&h=142";
				$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=297&h=142";
				$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=345&h=165";
				$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=579&h=277";
				$img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=570&h=273";
				?>
				<div class="item">
                	
                    <a href='http://www.youtube.com/watch?v=<?php echo $video_url ?>' data-toggle="lightbox" data-title="<?php the_title(); ?>" class='over-foto overlay-responsive responsive-video'>
                        <div class='overlay-videodia'></div>
                        <div class='overlay-icon-videodia'></div>
                        <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                            <span data-src="<?php echo $img_data_min ?>"></span>
                            <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                            <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                            <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                            <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>
                        </span>
                    </a>
                    <h3><?php the_title();?></h3>
                    <div class="cinta-ver-mas-style1">
                    	<a href='/blog/category/multimedia#videos'>VER TODOS</a>
                    </div>
				</div>
            <?php    
			} wp_reset_query();
			echo "</div>";
			//echo "<div class='dotted-border margin-33 margin-bottom-27'></div>"; 
		}
	}
    $post = $orig_post;  
    wp_reset_query();  
}
add_action('do_get_post_video_related_cs','get_post_video_related_cs');

/*Multimedia*/

//Galeria Relacionada
function get_post_attachment_related_cs_media(){
	wp_reset_query();
    global $post; 
	$orig_post = $post;  
	$tags = wp_get_post_tags($post->ID);  
    if ($tags) {  
		$tag_ids = array();  
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
		$args=array(  
			'tag__in' => $tag_ids,  
			'post__not_in' => array($post->ID),  
			'posts_per_page'=>1, // Number of related posts to display.  
			'caller_get_posts'=>1,
			'category_name' =>'fotos' 
		);  
		$my_query = new wp_query( $args );
		$number_img = $my_query->post_count;
		if( $my_query->post_count != 0 ){
			while( $my_query->have_posts() ) {  
				$my_query->the_post();
				$args=array('post_type'=>'attachment','post_parent'=>get_the_ID(),'order' => 'ASC', 'orderby' => 'menu_order ID', 'posts_per_page'=>1);
				$attachments=get_posts($args);
				if($attachments){  
					foreach($attachments as $attachment){
					$img        = wp_get_attachment_image_src( $attachments[0]->ID, 'full' );
    				$img_1000   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=cc&w=340&h=157";
                    $img_989    = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=cc&w=660&h=388";
                    $img_768    = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=cc&w=670";
                    $img_550    = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=cc&w=650";
                    $img_310    = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=cc&w=310&h=163"; 
						?>
						<div class='col-md-4'>
							<div class='galery-sidebar-cs'>
								<div class='item'>	
									<a href='<?php the_permalink() ?>'  class='over-foto overlay-responsive sitio' data-sitio='veracruz'>
		                                <div class='overlay-fotodia'></div>
		                                <div class='overlay-icon-fotodia'></div>
		                                <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
			                                <span data-src="<?php echo $img_310 ?>"></span>
		                                    <span data-src="<?php echo $img_550 ?>" data-media="(min-width: 550px)"></span>
		                                    <span data-src="<?php echo $img_768 ?>" data-media="(min-width: 768px)"></span>
		                                    <span data-src="<?php echo $img_989 ?>" data-media="(min-width: 800px)"></span>
		                                    <span data-src="<?php echo $img_1000 ?>" data-media="(min-width: 990px)"></span>
		                                </span>				
									</a>
		                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		                            	<h3><?php the_title(); ?></h3>
		                            </a>
	                        	</div>
                        	</div>
                        </div>
                  	<?php
					}
				}
			}
		}
	}  
    wp_reset_query();  
}
add_action('do_get_post_attachment_related_cs_media','get_post_attachment_related_cs_media');

//Video Relacionado
function get_post_video_related_cs_media(){
wp_reset_query(); 
$orig_post = $post;  
global $post;  
$tags = wp_get_post_tags($post->ID);  
if ($tags) {  
	$tag_ids = array();  
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
	$args=array(  
		'tag__in' => $tag_ids,  
		'post__not_in' => array($post->ID),  
		'posts_per_page'=>1, // Number of related posts to display.  
		'caller_get_posts'=>1,
		'category_name' =>'videos'  
	);
	$query = new WP_Query( $args );
	$number_video = $query->post_count;
	if( $query->post_count != 0 ){ 
		while ( $query->have_posts() ) {
			$query->the_post();
			$imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
			$image_proporcional = get_post_meta(get_the_ID(), 'image_proporcional', true);
			$video_url = get_post_meta(get_the_ID(), 'youtube-link', true);
			
			$alinear = get_post_meta($post->ID,'_img_alinear',true);
			if($alinear['alinear']!=""){			
				$alinear_img = $my_metaAling['alinear'];
			}else{
				$alinear_img = "cc";
			}
			
			if (!empty($image_proporcional)){
				$thumbnailsrc = $image_proporcional;
			} else {
				$thumbnailsrc = $imagen_destacada[0];
			}

			$img = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full');
			$img_1000  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img ."&w=340&h=157";
			$img_989   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=660&h=388";
			$img_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=670";
			$img_550   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=650";
			$img_310   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=310&h=163";
			?>
			<div class='col-md-4'>
				<div class="galery-sidebar-cs">
					<div class="item">
		                <a href='http://www.youtube.com/watch?v=<?php echo $video_url ?>' data-toggle="lightbox" data-title="<?php the_title(); ?>" class='over-foto overlay-responsive responsive-video'>
		                    <div class='overlay-videodia'></div>
		                    <div class='overlay-icon-videodia'></div>
		                    <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
		                        <span data-src="<?php echo $img_310 ?>"></span>
	                            <span data-src="<?php echo $img_550 ?>" data-media="(min-width: 550px)"></span>
	                            <span data-src="<?php echo $img_768 ?>" data-media="(min-width: 768px)"></span>
	                            <span data-src="<?php echo $img_989 ?>" data-media="(min-width: 800px)"></span>
	                            <span data-src="<?php echo $img_1000 ?>" data-media="(min-width: 990px)"></span>
		                    </span>
		                </a>
	                    <a href="http://www.youtube.com/watch?v=<?php echo $video_url ?>" class='responsive-video' title="<?php the_title(); ?>">
                        	<h3><?php the_title(); ?></h3>
                        </a>
	                </div>
				</div>
			</div>
        <?php    
		} wp_reset_query();
	}
}
$post = $orig_post;  
wp_reset_query();  
}
add_action('do_get_post_video_related_cs_media','get_post_video_related_cs_media');

//Infografia Relacionada
function get_post_attachment_related_cs_info_media(){
	wp_reset_query();
    global $post; 
	$orig_post = $post;  
	$tags = wp_get_post_tags($post->ID);  
    if ($tags) {  
		$tag_ids = array();  
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
		$args=array(  
			'tag__in' => $tag_ids,  
			'post__not_in' => array($post->ID),  
			'posts_per_page'=>1, // Number of related posts to display.  
			'caller_get_posts'=>1,
			'category_name' =>'infografias' 
		);  
		$my_query = new wp_query( $args );
		$number_img = $my_query->post_count;
		if( $my_query->post_count != 0 ){
			while( $my_query->have_posts() ) {  
				$my_query->the_post();
				$imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($my_query->post->ID), 'full');
				$image_proporcional = get_post_meta($my_query->post->ID, 'image_proporcional', true);
				$alinear = get_post_meta($post->ID,'_img_alinear',true);
				if($alinear['alinear']!=""){			
					$alinear_img = $my_metaAling['alinear'];
				}else{
					$alinear_img = "cc";
				}
				if (!empty($image_proporcional)){
					$thumbnailsrc = $image_proporcional;
				} else {
					$thumbnailsrc = $imagen_destacada[0];
				}
				$img = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full');
				$img_1000  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img ."&w=340&h=157";
				$img_989   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=660&h=388";
				$img_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=670";
				$img_550   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=650";
				$img_310   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=310&h=163";
				?>
				<div class='col-md-4'>
					<div class='galery-sidebar-cs'>
						<div class='item'>	
							<a href='<?php echo $thumbnailsrc; ?>'  class='over-foto overlay-responsive responsive-gallery' data-toggle="lightbox" data-title="<?php the_title(); ?>" data-sitio='veracruz'>
	                            <div class='overlay-infografia'></div>
	                            <div class='overlay-icon-infografia'></div>
	                            <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-full">
	                				<span data-src="<?php echo $img_310 ?>"></span>
		                            <span data-src="<?php echo $img_550 ?>" data-media="(min-width: 550px)"></span>
		                            <span data-src="<?php echo $img_768 ?>" data-media="(min-width: 768px)"></span>
		                            <span data-src="<?php echo $img_989 ?>" data-media="(min-width: 800px)"></span>
		                            <span data-src="<?php echo $img_1000 ?>" data-media="(min-width: 990px)"></span>
	                            </span>				
							</a>
	                        <a href="<?php echo $thumbnailsrc; ?>" class='responsive-gallery' title="<?php the_title(); ?>">
                        		<h3><?php the_title(); ?></h3>
                        	</a>
	                     </div>
                	</div>
                </div>
  			<?php
			}
		}
	}  
    wp_reset_query();  
}
add_action('do_get_post_attachment_related_cs_info_media','get_post_attachment_related_cs_info_media');


add_action('wp_head', 'add_twitter_cards');
function add_twitter_cards() {
    if(is_single()) {
        $tc_url    = get_permalink();
    $tc_title  = get_the_title();
    $tc_description   = get_the_excerpt();
    $tc_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full );
    $tc_image_thumb  = $tc_image[0];
    $tc_author   = str_replace('@', '', get_the_author_meta('twitter'));
?>
    <meta name="twitter:card" value="summary" />
    <meta name="twitter:site" value="@GobiernoVer" />
    <meta name="twitter:title" value="<?php echo $tc_title; ?>" />
    <meta name="twitter:description" value="<?php echo $tc_description; ?>" />
    <meta name="twitter:url" value="<?php echo $tc_url; ?>" />
        <?php if($tc_image) { ?>
      <meta name="twitter:image" value="<?php echo $tc_image_thumb; ?>" />
        <?php } if($tc_author) { ?>
        <meta name="twitter:creator" value="@<?php echo $tc_author; ?>" />
<?php
    }
    }
}



/*Obtiene las notas relacionadas - por contenido del content*/
function get_related_post_by_omar(){
	wp_reset_query(); 
	global $wpdb, $post;
	$orig_post = $post; 
	$post_id = $post->ID; 
	$get_terms= $wpdb->get_var("select wp_veracruz.returnTemrs(post_title) t from gev_posts where id = $post_id;");
	
	//echo $wpdb->last_query;
	
	$get_ids_related = $wpdb->get_results("select * from ( select distinct gp.ID, match(gp.post_content) AGAINST ('$get_terms') ratio, post_title, post_date from gev_posts gp where gp.id <> $post_id and gp.post_status = 'publish' and gp.post_type = 'post' order by ratio DESC limit 4 ) sq where post_title <> (select sgp.post_title from gev_posts sgp where sgp.id = $post_id ) order by post_date desc;");
	$i = 1;
	foreach($get_ids_related as $data_id){
		echo "<div id='content-post-related' class='post-related-cs padding-no'>";
			echo "<ul>"; ?>
                <a href="<?php echo get_permalink($data_id->ID); ?>">
                    <li>
                    	<?php if($i!=4){ ?>
                        	<div class="item-related-cs">
                       	<?php }else{ ?>
                       		<div class="item-related-cs sin-bb-item-related">
                       	<?php } ?>
                            <span><?php echo ucfirst (get_the_time('j F, Y', $data_id->ID)); ?>.</span>
                            <?php echo get_the_title($data_id->ID); ?>
                        </div>

                    </li>
                </a>
				<?php
			echo "</ul>";
		echo "</div>"; 
	$i++; }
	 wp_reset_query(); 
}
add_action('do_get_related_post_by_omar','get_related_post_by_omar');


add_filter( 'single_template', function( $t ) {
    foreach( ( array ) get_the_category() as $cat ) {
        if ( file_exists( TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) {
            return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
        } else if ( $cat->parent ) {
            $cat = get_the_category_by_ID( $cat->parent );
            if ( file_exists( TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) {
                return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
            }
        }
    }
    
    return $t;
});

//custom postmeta (fotonota y numero de comunicado)

function comsocial_add_meta(){
    add_meta_box( 'comsocial_meta_id', 'Opciones (comunicado, fotonota) ', 'comsocial_postmeta', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'comsocial_add_meta' );

function comsocial_postmeta(){
	global $post;
	echo '<input type="hidden" name="comsocial_noncename" id="comsocial_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
	$comunicado = get_post_meta($post->ID, 'comunicado', true);
	?>
    <div class="my_meta_control">
        <p>Tipo de comunicado</p>
        <table>
            <tr>
                <td class="width-23">
                    <label>Fotonota:</label>  
                </td>
                <td>
                    <input type="radio" name="comunicado_radio" value="fotonota" class=" fotonota" <?php echo $comunicado && ($comunicado == 'fotonota' || $comunicado == 'FOTONOTA' ||  $comunicado == 'Fotonota' ) ?  'checked=checked' : ''; ?>>  
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="width-23">
                    <label>Folio:</label>  
                </td>
                <td>
                    <input type="radio" name="comunicado_radio" value="folio" class=" folio" <?php echo $comunicado != '' && $comunicado != 'fotonota' && $comunicado != 'FOTONOTA' && $comunicado != 'Fotonota'  ? 'checked=checked' : ''; ?> >
                	
                </td>
                <td>
                	<input type="text" name="comunicado" value="<?php echo $comunicado ?>" class=" input_comunicado" />
                    
                </td>
            </tr>
            <tr>
            	<td></td>
                <td></td>
                <td><span style="font-style:italic; font-size:12px;">Agregar número de comunicado</span></td>
            </tr>
        </table>
        <input type="hidden" name="comunicado_hidden" value="<?php echo $comunicado ?>" class="hidden_comunicado"/>
        
    </div>
		<?php 
}
	
function comsocial_meta_box_save( $post_id, $post ){
    if(!wp_verify_nonce($_POST['comsocial_noncename'], plugin_basename(__FILE__))){
			return $post->ID;
	}
	if(!current_user_can('edit_post', $post->ID))
		return $post->ID;
	$type=$_POST['post_type'];	
	switch($type){
		case 'post':
			$reporte_meta['comunicado'] = $_POST['comunicado'];
		break;
	}
	foreach ($reporte_meta as $key => $value) {
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else { 
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
} 
add_action( 'save_post', 'comsocial_meta_box_save',1,2 );


function add_admin_scripts( $hook ) {
    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'post' === $post->post_type ) {     
            wp_enqueue_script(  'custom_meta_script', get_stylesheet_directory_uri().'/js/add_meta_comsocial.js' );
			wp_enqueue_style(  'custom_meta_script', get_stylesheet_directory_uri().'/css/add_meta_comsocial.css' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
        }
		if ( 'page' === $post->post_type) {
			wp_enqueue_style('style_box', get_stylesheet_directory_uri().'/backend-template/style-backend.css' );
			wp_enqueue_script('script_box', get_stylesheet_directory_uri().'/backend-template/script-backend.js' );
		}
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

//add custom upload image
function image_add_meta(){
    add_meta_box( 'image_meta_id', 'Imagen veracruz a proporción', 'image_proporcional', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'image_add_meta' );

function image_proporcional(){ 
	global $post;
	echo '<input type="hidden" name="image_noncename" id="image_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
	$image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
?>
    <style type="text/css">
        .fh-profile-upload-options th,
        .fh-profile-upload-options td,
        .fh-profile-upload-options input {
            vertical-align: top;
        }
        .user-preview-image {
            display: block;
            height: auto;
            width: 300px;
        }
    </style>
	<table class="form-table fh-profile-upload-options">
		<tr>
			<th>
				<label for="image_proporcional">Imagen proporcional</label>
			</th>
			<td>
				<img class="user-preview-image" src="<?php echo $image_proporcional; ?>">

				<input type="text" name="image_proporcional" id="image_proporcional" value="<?php echo $image_proporcional; ?>" class="regular-text" />
				<input type='button' class="button-primary" value="Subir imagen" id="uploadimage"/><br />
				<span class="description">Las medidas de la imagen deben ser de <strong>843 x 403px</strong></span>
			</td>
		</tr>
	</table>

	<script type="text/javascript">
		(function( $ ) {
			$( '#uploadimage' ).on( 'click', function() {
				tb_show('Agregar Imagen proporcional', 'media-upload.php?type=image&TB_iframe=1');

				window.send_to_editor = function( html ) 
				{
					imgurl = $( 'img',html ).attr( 'src' );
					$( '#image_proporcional' ).val(imgurl);
					$('.user-preview-image').attr('src',imgurl);
					tb_remove();
				}

				return false;
			});

		})(jQuery);
	</script>

<?php 
}

function image_meta_box_save( $post_id, $post ){
    if(!wp_verify_nonce($_POST['image_noncename'], plugin_basename(__FILE__))){
			return $post->ID;
	}
	if(!current_user_can('edit_post', $post->ID))
		return $post->ID;
	$type=$_POST['post_type'];	
	switch($type){
		case 'post':
			$reporte_meta['image_proporcional'] = $_POST['image_proporcional'];
		break;
	}
	foreach ($reporte_meta as $key => $value) {
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else { 
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
} 
add_action( 'save_post', 'image_meta_box_save',1,2 );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     
	 if($item->title == "Home"){ 
     	$classes[] = "hidden-inicio";
     }
	 if($item->title == "Gobernador"){ 
     	$classes[] = "icon-gobernador";
     }
	 if($item->title == "Gabinete"){
	 	$classes[] = "icon-gabinete";
	 }
	 if($item->title == "Poderes del Estado"){
		 $classes[] = "icon-poderes";
	 }
	 if($item->title == "Normativa Vigente"){
		 $classes[] = "icon-normativa";
	 }
	 if($item->title == "Gaceta Oficial"){
		  $classes[] = "icon-gaceta";
	 }
	 
	 if($item->title == "Registro Civil"){
		  $classes[] = "icon-registro-civil";
	 }
	 if($item->title == "Oficina Virtual de Hacienda"){
		  $classes[] = "icon-ovh";
	 }
	 if($item->title == "Abre tu empresa"){
		  $classes[] = "icon-empresa";
	 }
	 if($item->title == "Educación"){
		  $classes[] = "icon-educacion";
	 }
	 if($item->title == "Eventos Especiales"){
		  $classes[] = "icon-eventos";
	 }
	 
	 if($item->title == "Comunicación Social"){
		  $classes[] = "icon-comunicacion-social";
	 }
	 if($item->title == "Comunicados"){
		  $classes[] = "icon-comunicados";
	 }
	 if($item->title == "Multimedia"){
		  $classes[] = "icon-multimedia";
	 }
	 if($item->title == "Coordinación"){
		  $classes[] = "icon-coordinacion";
	 }
	 if($item->title == "Transparencia"){
		  $classes[] = "icon-transparencia-nav";
	 }
	 return $classes;
}


/*tag more popular*/
function get_tags_more_popular($post_id){
	$tags = wp_get_post_tags($post_id); 
	if ($tags) {  
		$tag_ids = array();  
		$i=0;
		foreach($tags as $individual_tag){ 
			if($individual_tag->count){
				$var_array[$i] = array(
					'data' => get_post_filter_tag( $post_id , $individual_tag->term_id ),
					'count'	=> $individual_tag->count,
					'slug' => $individual_tag->slug
				 );
			}
			$i++;
		}
	}
	array_sort_by_column($var_array, 'count');
	return $var_array;
}

function get_post_filter_tag( $id, $tag_ids ){
	$args = array(  
		'tag__in' => $tag_ids,  
		'post__not_in' => array($id), 
		'tag__not_in' => array( 158, 214, 832 ), 
		'posts_per_page'=> 1,
		'caller_get_posts'=>1,
		'category_name' => 'blog'  
	);
	$query = new WP_Query( $args );
	$number_video = $query->post_count;
	$count = 0;
	if( $query->post_count != 0 ){    
		while ( $query->have_posts()){
			$query->the_post();
			$title[$count] = array('title' => get_the_title(), 'permalink' => get_permalink(), 'date' => ucfirst (get_the_time('F j, Y')), 'ID' =>get_the_ID());
			$count++;
		}
	}
	return $title;	
}

function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
}

/*Page semblanza card*/

function add_meta_semblanza(){
	global $post;
	$parents = get_post_ancestors( $post->ID );
	$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	$slug = basename( get_permalink( $id ) );
	if ( 'gabinete' == $slug ) {
		add_meta_box( 'meta_semblanza', 'Tarjeta secretario', 'meta_box_semblanza', 'page', 'normal', 'high' );
	}
}
add_action( 'add_meta_boxes', 'add_meta_semblanza' );

function meta_box_semblanza(){ 
	global $post;
	echo '<input type="hidden" name="meta_noncename" id="meta_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
	get_template_part( 'backend-template/backend', 'semblanza' );
	
}

function meta_box_save( $post_id, $post ){
	if(!wp_verify_nonce($_POST['meta_noncename'], plugin_basename(__FILE__))){
			return $post->ID;
	}
	if(!current_user_can('edit_post', $post->ID))
		return $post->ID;
	$type=$_POST['post_type'];	
	switch($type){
		case 'page':
			$meta['nombre-dependencia'] = $_POST['nombre-dependencia'];
			$meta['siglas-dependencia'] = $_POST['siglas-dependencia'];
			$meta['link-dependencia'] = $_POST['link-dependencia'];
			$meta['url-twitter'] = $_POST['url_twitter'];
			$meta['url-facebook'] = $_POST['url_facebook'];
			$meta['logo-dependencia'] = $_POST['logo_secretaria'];
		break;
	}
	foreach ($meta as $key => $value) {
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else { 
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
} 
add_action( 'save_post', 'meta_box_save',1,2 );


/*Page gaceta, normativa, etc*/
function add_meta_gobierno(){
	global $post;
	$parents = get_post_ancestors( $post->ID );
	$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	$slug = basename( get_permalink( $id ) );
	if ( 'gobierno-nav' == $slug ) {
		add_meta_box( 'meta_gobierno', 'Gobierno', 'meta_box_gobierno', 'page', 'normal', 'high' );
	}
}
add_action( 'add_meta_boxes', 'add_meta_gobierno' );

function meta_box_gobierno(){ 
	global $post;
	echo '<input type="hidden" name="meta_noncename" id="meta_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
	get_template_part( 'backend-template/backend', 'gobierno' );
}

function meta_box_save_gob( $post_id, $post ){
	if(!wp_verify_nonce($_POST['meta_noncename'], plugin_basename(__FILE__))){
			return $post->ID;
	}
	if(!current_user_can('edit_post', $post->ID))
		return $post->ID;
	$type=$_POST['post_type'];	
	switch($type){
		case 'page':
			$meta['item_title'] = $_POST['item_title'];
			$meta['item_desc'] = $_POST['item_desc'];
			$meta['item_url'] = $_POST['item_url'];
			$meta['data_file'] = $_POST['data_file'];
		break;
	}
	foreach ($meta as $key => $value) {
		//$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else { 
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
} 
add_action( 'save_post', 'meta_box_save_gob',1,2 );

function send_newsletter(){
	parse_str($_POST['value'], $data_array);
	die();
}
add_action('wp_ajax_send_newsletter', 'send_newsletter');
add_action('wp_ajax_nopriv_send_newsletter', 'send_newsletter');
?>

