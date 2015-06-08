<?php
/*
Template Name: Front page
*/
?>
<?php get_header(); ?>
<script type="text/javascript">
		$(document).ready(function() {
		   document.getElementById('openModals').click();
		});
		</script>
 <style>
	.modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0, 0, 0, 0.8);
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}
	.modalDialog:target {
		opacity:1;
		pointer-events: auto;
	}
	.modalDialog > div {
		width: 620px;
		height:220px;
		position: relative;
		margin: 10% auto;
		/*padding: 5px 20px 13px 20px;*/
		border-radius: 7px;
		background: #fff;
	}
	.closers {
		 
		  color: #FFFFFF;
		  line-height: 25px;
		  /* right: -12px; */
		  text-align: center;
		  /* top: -10px; */
			top: 10px;
  			position: relative;
		  text-decoration: none;
		  font-family: 'GandhiSans' !important;
		font-size:19px !important;
		  
	}
	.closers:hover {
		text-decoration:none !important;
		color: #FFFFFF;
	}
	.btn-regresar-home{
		display:block;
		background: #535352;
		  color: #5b5b5b;
		margin-top: 0px !important;
		margin-bottom: 0px !important;
		position: relative;
		top: -27px;
		text-align:center;
		-webkit-border-bottom-right-radius: 7px;
		-webkit-border-bottom-left-radius: 7px;
		-moz-border-radius-bottomright: 7px;
		-moz-border-radius-bottomleft: 7px;
		border-bottom-right-radius: 7px;
		border-bottom-left-radius: 7px;
		font-family: 'GandhiSerif' !important;
		font-size:16px !important;
		 height: 40px;
		}
	.btn-regresar-home:hover{
		background: #333;
		  color: #5b5b5b;
		cursor:pointer;
		}
	.txt-elecciones{
		padding: 44px;
		padding-bottom: 38px;
  		padding-top: 28px !important;
		text-align:justify;
		font-family: 'GandhiSerif' !important;
		font-size:16px !important;
		color:#3d3d3d;
		}
		@media screen and (max-width: 619px) {
			.modalDialog > div {
				width:90% !important;
				height: 304px;
				}
			}
		@media screen and (max-width: 480px) {
			.txt-elecciones{
				padding: 34px !important;
  				padding-top: 37px !important;
  				font-size: 15px !important;
				}
			
			}
		@media screen and (max-width: 380px) {
			.txt-elecciones{
				padding: 33px !important;
  				padding-top: 33px !important;
				font-size: 15px !important;
				}
			.modalDialog > div {
			 
			  height: 346px !important;
			}
			.btn-regresar-home{
				height: 46px !important;
				}
			}
		@media screen and (max-width: 374px) {
			.txt-elecciones{
				font-size: 14px !important;
				}
			}
	</style>
<div id="openModal" style="display:block" class="modalDialog">
    <div>
    	<p class="txt-elecciones">Este sitio web ha sido modificado temporalmente para cumplir con lo establecido en los Artículos 41 y 134 de la Constitución Política de los Estados Unidos Mexicanos y en los Artículos 209 y 449 de la Ley General de Instituciones y Procedimientos Electorales, con motivo del desarrollo del Proceso Electoral 2014-2015, comprendido desde el inicio de las campañas electorales y hasta el día siguiente de la jornada electoral.</p>    
    	<h1 class="btn-regresar-home" onclick="location.href='#close'"><a href="#close" title="Close" class="closers">Ir al Sitio Principal</a></h1>
    </div>
</div>
<a id="openModals" href="#openModal"></a>
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
                            <a class="pull-left bt-ver-mas-red-ver" href="#">VER MÁS NOTICIAS</a>
                       </div>
                   </div>
               </div>
            </div>
            <?php get_sidebar(); ?>
            <div class="clearfix"></div>
        </section><!--section-->
    </div> <!--#page-->
</div>
<div class="content-media" style="display:none;">
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