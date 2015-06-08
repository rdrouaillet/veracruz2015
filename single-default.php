<?php get_header(); ?>
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
				console.log("es mas grande colum: sidebar = "+sidebar.height()+ " y left = " + column.height());
				
			}else{
				sidebar.css({'border-left':'1px solid #c5c5c5'});
				column.css( 'height' , sidebar.outerHeight() );
				console.log("es mas grande sidebar: sidebar = "+sidebar.height()+ " y left = " + column.height());
			}
		}else{
			column.css({ 'border-right' : 'none'});
			sidebar.css( {'height' : 'auto' } );	
			column.css( 'height' , 'auto' );
		}
	}
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528bc01961578d5f" async="async"></script>


<?php get_template_part( 'content', 'search' ); ?>
<?php get_template_part( 'content', 'feed-twitter' ); ?>
<div id="page" class="container-fluid margin-bottom-7">
    <section id="principalContent">
    	<div class="sombra-top-item-slider-ver back-margin-bottom otro-margen-single"></div>
        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12 post-single reo-red-ver">
            <?php 
            if ( have_posts() ) 
            while ( have_posts() ) { 
                the_post();
                $imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                $image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
                 
                $alinear = get_post_meta($post->ID,'_img_alinear',true);
                if($alinear['alinear']!=""){			
                    $alinear_img = $my_metaAling['alinear'];
                }else{
                    $alinear_img = "cc";
                }
             ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="entry-title hidden-less-600"><?php the_title(); ?></h1>
                    <?php 
                    
                    if (!empty($image_proporcional)) {
                        $thumbnailsrc = $image_proporcional;
                    } else {
                        $thumbnailsrc = $imagen_destacada[0];
                    }
                    
                    if (!empty($thumbnailsrc)){ 
                        //$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img ."&w=656&h=314";
                        $img_data_1200  = $thumbnailsrc;
                        //$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=656&h=314";
                        $img_data_992   = $thumbnailsrc;
                        $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=750&h=359";
                        $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=700&h=335";
                        $img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=599&h=287"; ?>    
                        <span class='img img-responsive border-shadow'>
                            <div class="post-date date-big hidden-less-600 "><?php the_time( 'j M' ); ?></div>
                            <span data-picture data-alt="<?php the_title();?>" class="img-responsive img-full">
                                <span data-src="<?php echo $img_data_min ?>"></span>
                                <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                            </span>
                        </span>
                        <img style="display:none;" class="img-responsive img-full" src='<?php echo $img_data_992; ?>' border=0 />
                            
                    <?php } //fin - if ?>	
                    <div class="hr"></div>
                    <div class="entry-content col-md-3 col-sm-12 col-xs-12 col-lg-2 redes-single hidden-less-600">
						<div class="addthis_sharing_toolbox"></div>		
                    </div><!-- .entry-content -->
                    <div class="shared-mobile blog-contenedor hidden-more-600">
                        <!-- Horizontal toolbox -->
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
                
                <?php } //fin - while ?>
                <div class="hr"></div>
                <div class="sombra-top-item-slider-ver"></div>			                    
                <div class="navposts">
                    <div class="pull-left col-md-4 col-lg-4 col-sm-5 col-xs-6 contenedor-nav-single hide">        	
                        <?php previous_post_link('%link','<span class="hidden-xs text-a-n">
                        <p>< NOTA ANTERIOR</p>%title</span><span class="visible-xs">Nota anterior</span>',TRUE); ?>
                    </div> 
                    <div class="pull-right col-md-7 col-lg-7 col-sm-8 col-xs-9 contenedor-nav-single">
                        <?php next_post_link('%link','<span class="text-ar-n ajuste-resposns">
                        <p>NOTA SIGUIENTE ></p>%title</span>',TRUE); ?>
                    </div>
                </div>
            </article><!-- #post-## -->
        </div><!-- end .post-home -->
        <div class="cinta-ver-mas-style2 m-top-9 hidden-more-600">
            <a class="pull-right" href="<?php echo site_url("/blog/category/blog"); ?>">
                <span class="text-ver-mas">VER MÁS NOTICIAS</span>
                <span class="bg-all-new"></span>
            </a>
           
        </div>
        <div class="border-dotted hidden-more-600 styling-bd"></div>
        <?php get_sidebar('single'); ?>
    </section><!--#content-single -->
</div>
<div class="content-media">
	<div class="title-more-content">
        <div class="container-fluid">
            <div class="pull-left"><h3 class="title-gob-time">MULTIMEDIA RELACIONADA</h3></div>
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
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>