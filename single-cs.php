<?php 
	get_header();
 ?>
<script type="text/javascript">
	$(window).load(resize_height);
	$(window).on('resize', resize_height);
	function resize_height() {
		var sidebar = $('#sidebar');
		var column = $('.post-single');	
		if($('body').width() > 992){
			if(column.outerHeight() > sidebar.height()){
				column.css({'border-right':'1px solid #c5c5c5'});
				sidebar.css( {'height' : column.outerHeight() } );
				
			}else{
				sidebar.css({'border-left':'1px solid #c5c5c5'});
				column.css( 'height' , sidebar.outerHeight() );
			}
		}else{
			column.css({ 'border-right' : 'none'});
			sidebar.css( {'height' : 'auto' } );	
			column.css( 'height' , 'auto' );
		}
	}
	$(document).ready( function() {
		$(document).on('click','.descargar-img',function(){
			$('.icon-descarga-img').trigger("click");
		});
	});
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528bc01961578d5f" async="async"></script>
<?php get_template_part( 'content', 'search' ); ?>
<?php get_template_part( 'content', 'feed-twitter' ); ?>
<div id="page" class="container-fluid margin-bottom-7">
    <section id="principalContent">
        <div class="shadow-iphone-header"></div>
        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12 post-single reo-red-ver">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
                        $my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
                        $nuestroAlinear = "";
                        if($my_metaAling['alinear']!=""){			
                            $nuestroAlinear = $my_metaAling['alinear'];
                        }else{
                            $nuestroAlinear = "cr";
                        }
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="entry-title hidden-less-600"><?php the_title(); ?></h1>
                    <?php 				
                    $domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'full'));
                    $thumbnailsrc = "";
                    if (!empty($domsxe)) {
                        $thumbnailsrc = $domsxe->attributes()->src;
                    } else {
                        $urlTema = get_bloginfo('template_url');
                        $thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
                    }					   
                    if (!empty($thumbnailsrc)): ?>
                        <div style="position:relative;">    
                            <a class="over-nota" href="<?php the_permalink(); ?>">
                                <div class="overlay-nota"></div>
                                <span class='img img-responsive border-shadow'>
                                    <div class="post-date date-big hidden-less-600 "><?php the_time( 'j M' ); ?></div>
                                    <img class="img-responsive img-full" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=700&h=336&a=<?php echo $nuestroAlinear; ?>' border=0 />
                                </span>
                            </a>
                        </div>
                     <?php endif; ?>	
                     <div class="hr"></div>			
                     <div class="entry-content col-md-3 col-sm-12 col-xs-12 col-lg-2 redes-single hidden-less-600">
                         <div class="addthis_sharing_toolbox"></div>
                     </div><!-- .entry-content -->
                     <div class="shared-mobile blog-contenedor hidden-more-600">
                        <div class="addthis_toolbox addthis_default_style addthis_20x20_style">
                          <a class="button-facebook-xs addthis_counter_facebook"></a>
                          <a class="button-twitter-xs addthis_counter_twitter"></a>
                          <a class="button-google-xs addthis_counter_google_plusone_share"></a>
                        </div>
                     </div>
                     <div class="col-md-9 col-lg-10 nota-contenido">
                        <h1 class="title-responsive hidden-more-600"><?php the_title(); ?></h1>
                        <span class="hidden-more-600 bold-time"><?php the_time( 'j  F.' ); ?></span><?php the_content(); ?>
                     </div><!-- .entry-content -->				
                
                <div class="hr"></div>	
                <div class="clearfix"></div>		                    
                <div class="get-imagenes-related">
                    <?php $array_gallery = get_ngg_gallery($post->ID); ?>
                    
                    <?php  if(!empty($array_gallery)){ ?>
                        <div class="title-images">
                            <span>IMÁGENES</span>
                        </div>
                        <?php 
                        $count=0;
                        $i=1;
                        foreach($array_gallery as $get_foto){
                            if($i==1){
                                $class="sin-padding-left";
                            }else if($i%2 == 0){
                                $class="sin-padding-middle";
                            }else{
                                $class="sin-padding-rigth";
                            } 
    
                            $nombreIMG=$get_foto->post_title;
                            $img_data_lightbox = $get_foto['file'];
                            $imagenR=get_bloginfo('url')."/".$img_data_lightbox; ?>
                            <div class='col-sm-4 col-md-4 style-img-nota <?php echo $class; ?>'>
                                <div class='item-img img-single-cs'>
                                    <div class='img'>
                                        <a href='<?php echo get_bloginfo('url')."/".$img_data_lightbox; ?>' class='img-gallery over-foto' data-index='<?php echo $count; ?>'>
                                            <div class='overlay-foto'></div>
                                            <img src='<?php echo get_bloginfo('template_url').'/timthumb.php?src='.get_bloginfo('url').$img_data_lightbox.'&a=tc&w=204&h=98' ?>'>
                                        </a>
                                    </div>
                                    <a href='<?php echo $imagenR; ?>' download='<?php echo $nombreIMG; ?>' class='icon-descarga-img'>DESCARGAR</a>	
                                </div>
                            </div>
                        <?php        
                            $count++; $i++; if($i > 3){$i=1;}
                        }
                        ?>  
                    <?php } ?>             
                </div>
                <?php endwhile; ?>
                <div class="clearfix"></div>
            </article><!-- #post-## -->
        </div><!-- end .post-home -->
        <?php get_sidebar('single-cs'); ?>
    </section><!--#content-single -->
</div>
<div class="content-media">
	<div class="title-more-content">
        <div class="container-fluid">
            <div class="pull-left"><h3 class="title-gob-time titu-media-cs">MULTIMEDIA RELACIONADA</h3></div>
        </div>
    </div>	
	<div class="container-fluid">
        <div class="col-md-4">
            <?php do_action( 'get_galery_dia_red'); ?>
        </div>
        <div class="col-md-4">
            <?php do_action( 'get_video_dia_red'); ?>
        </div>
        <div class="col-md-4">
            <?php do_action('get_infografia_red'); ?> 
        </div>
    </div>
</div>
<?php 
	get_footer();
?>