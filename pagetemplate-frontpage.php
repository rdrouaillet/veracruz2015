<?php
/*
Template Name: Front page
*/
?>
<?php get_header(); ?>
<script language="javascript" type="text/javascript">
	$(window).load(resize_height);
	$(window).on('resize', resize_height);
	function resize_height() {
		if($('body').width() > 992){
			if($('.post-home').height() > $('#sidebar').height()){
				$('#sidebar').css({'border-left':'1px solid #c5c5c5'});
				$('#sidebar').css( {'height' : $('.post-home').height() + 50 } );
			}else{
				$('#sidebar').css({'border-left':'1px solid #c5c5c5'});
				$('.post-home').css( 'height' , $('#sidebar').height() );
			}
		}else{
			$('.post-home').css({ 'border-right' : 'none'});
			$('#sidebar').css( {'height' : 'auto' } );	
			$('.post-home').css( 'height' , 'auto' );
		}
	}
</script>

<?php
    get_template_part( 'content', 'slider-home' );
?>
<div class="container-fluid">
    <div id="page">
        <section id="principalContent" class="col-sm-11 col-md-12 sin-padding center-sm-block">
            <div class="col-sm-12 col-md-8 col-lg-8 post-home sin-padding reo-red-ver hidden-less-600">
                <div class="pull-right">
                    <?php
                    $categoriaBlog = get_category_by_slug('blog');
                    $categoriaBlog = $categoriaBlog->term_id;
                    $blog_query = new WP_Query('cat=' . $categoriaBlog . '&showposts=7&post_type=post');
                    $i=1;
                    while ($blog_query->have_posts()){
                        $blog_query->the_post();
                        $imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                        $image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
                        $alinear = get_post_meta($post->ID,'_img_alinear',true);
                        if($alinear['alinear']!=""){			
                            $alinear_img = $my_metaAling['alinear'];
                        }else{
                            $alinear_img = "cr";
                        }
                            
                        if (!empty($image_proporcional)) {
                            $thumbnailsrc = $image_proporcional;
                        } else {
                            $thumbnailsrc = $imagen_destacada[0];
                        }
                        
                        if (!empty($thumbnailsrc)){
                            $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=313&h=149";
                            $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=408&h=194";
                            $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=737&h=357";
                            $img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=454&h=205";
                        ?>		
                             
                              <div class="reset-xs col-xs-6 col-sm-7 col-md-6 col-lg-6 centrarDiv img-reo-red-ver"><!---->    
                                <div class="overlay-responsive">
                                    <a href="<?php the_permalink() ?>" class="over-nota">
                                        <div class="overlay-nota over-size-nota"></div>	
                                        <span class='img img-responsive tabletMini border-shadow'>
                                            <div class="post-date date-small hidden-less-600"><?php the_time( 'j M' ); ?></div>
                                            <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                                <span data-src="<?php echo $img_data_min ?>"></span>
                                                <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                                <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                                <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                            </span> 	
                                        </span>
                                    </a>
                                </div>
                                
                             </div>
                             
                            <?php
                        }
                        ?>
                        <div class="reset-xs col-xs-6  col-sm-5 col-md-6 col-lg-6 lista-post-home">
                            <h5 class="time-center hidden-more-600"><?php the_time( 'j F' ); ?></h5>
                            <h3>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="description-p hidden-less-600">
                                <?php  
                                    $textoCortar=get_the_excerpt(); 
                                    echo cortar_caracter($textoCortar,'.'); 
                                ?>
                                <a class="hidden-less-600 moretag" title="<?php echo get_the_title(); ?>" href="<?php echo get_permalink() ?>">
                                    [...]
                                </a>
                            </div>
                            
                        </div>
                        <?php if ($i != 10) { ?>
                            <div class="cls hidden-less-600"></div>
                        <?php }else if($i == 10){ ?>
                            <div class="clsd hidden-less-600"></div>
                        <?php } ?>
                    <?php 
                    $i++; } ;  //Terminar while de post dentro de BLOG
                    wp_reset_query();
                    ?>
                   
                   <div class="cinta-gob-ver-notas col-md-12 col-lg-12">
                       <div class="pull-right">
                            <a class="pull-left bt-ver-mas-red-ver" href="<?php echo site_url("/blog/category/blog") ?>">VER MÁS NOTICIAS</a>
                       </div>
                   </div>
               </div>
            </div>
            <?php get_sidebar(); ?>
            <div class="clearfix"></div>
        </section><!--section-->
    </div> <!--#page-->
</div>
<div class="content-media">
	<div class="title-more-content">
    	<div class="container-fluid">
            <div class="pull-left center-block-xs title-h3-gob"><h3 class="title-gob-time"><a href="/blog/category/multimedia">MULTIMEDIA</a></h3></div>
        </div>
    </div>
	<div class="container-fluid ">
        <div class="col-sm-4 col-md-4 con-pasddis">
            <?php do_action( 'get_galery_dia_red'); ?>
        </div>
        <div class="col-sm-4 col-md-4 con-pasddis">
            <?php do_action( 'get_video_dia_red'); ?>
        </div>
        <div class="col-sm-4 col-md-4 con-pasddis">
            <?php do_action('get_infografia_red'); ?> 
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>