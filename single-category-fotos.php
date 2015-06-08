<?php
	//if (isset($_COOKIE['sitio']) && $_COOKIE['sitio']== 'veracruz') {
		get_header();
	//}else{
		//get_header('cs');
	//}
?>
<script>
	var jRes = jRespond([
		{
			label: 'less_600',
			enter: 0,
			exit: 599
		}
	]);
	jRes.addFunc({
		breakpoint: 'less_600',
		enter: function() {
			$(window).on('load', function() {
			  $( ".img-gallery").unbind( "click");
			  $(".gallery-item a").removeAttr("href");
              $('.over-foto').removeClass('responsive-gallery');
            });
			
		},
		exit: function() {
			console.log('<<< hasta aqui >>>');
		}
	});
</script>
<script type='text/javascript'>
//<![CDATA[
    //jQuery.noConflict();
    jQuery(document).ready(function($) {
        $("#IrArriba").hide();
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 1000) {
                    $('#IrArriba').fadeIn();
                } else {
                    $('#IrArriba').fadeOut();
                }
            });
            $('#IrArriba a').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    });
//]]> 
</script>
<style type="text/css">
.borde-gray2-top {display: none;}
.photo-gallery .entry-title{ font: normal 1.8em "Gandhi Serif"; margin: 0 auto;  margin-top: 35px;
margin-bottom: 2px; padding-bottom: 20px; float: none; }
.photo-gallery{ background: none; }
#more-galleries{ width: 100%; padding: 0px; margin-bottom: 0px; }
.cinta-ver-mas-style3{ background-color: #fff; font-family: "GandhiSerif" !important; font-size: 19px; 
margin-top: 7px; margin-bottom: 7px; }
#more-galleries .gallery-container{ width: 100%; overflow: hidden; padding: 15px 0 0; }
.photo-gallery .gallery-date{ font: 1.3em "GandhiSerif"; margin-bottom: 20px; text-transform: capitalize; }
</style>
<div class="tituloSingleArea multi">
    <h2>Multimedia</h2>
    <div class="bg-dif-left custom-higth"></div>
    <div class="bg-dif-right custom-higth"></div>
</div>
<section id="principalContent" class="blog-contenedor container gallery">
    <div class="gallery-tabs" id="tabs">
        <ul class="ui-tabs-nav">
            <li class="col-xs-1 col-sm-3 col-md-3 cint_tabs">
                <a>T</a>
                <span class="bg-bottom">
            </li>
            <li class="col-xs-3 col-sm-2 col-md-2"><a href="<?php echo site_url( '/blog/category/multimedia' ); ?>#fotos" class="active">GALERÍAS <span class="bg-bottom"></span></a></li>
            <li class="col-xs-3 col-sm-2 col-md-2"><a href="<?php echo site_url( '/blog/category/multimedia' ); ?>#videos">VIDEOS <span class="bg-bottom"></span></a></li>
            <li class="col-xs-3 col-sm-2 col-md-2"><a href="<?php echo site_url( '/blog/category/multimedia' ); ?>#infografias">INFOGRAFÍAS <span class="bg-bottom"></span></a></li>
            <li class="col-xs-1 col-sm-3 col-md-3 cint_tabs">
                <a>T</a>
                <span class="bg-bottom">
            </li>
        </ul>
    </div>
    <?php
        get_template_part( 'content', 'search' );
    ?>
    <div class="clearfix hidden-more-600"></div>
    <div class="back_main_gallery gallery-container">
        <div class="container-fluid">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding:0px;">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) : the_post(); ?>
                        <article class="photo-gallery" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="content-titu-nota col-xs-12 col-md-12">
                                <h1 class="col-xs-10 col-md-8 entry-title h_back_shadow">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="clear"></div>
                            <p class="gallery-date"><span class="date"><?php the_time('j F, Y'); ?>.</span></p>
                            <div class="content_list_pho col-md-12 col-lg-12">
                                <?php
                                    $i              = 0;
                                    $attachments    = get_posts( array(
                                        'post_type'         => 'attachment',
                                        'post_parent'       => get_the_ID(),
                                        'order'             => 'ASC',
                                        'orderby'           => 'menu_order ID',
                                        'posts_per_page'    => -1
                                    ));
                                    
                                    if ( $attachments ) :
                                        foreach ( $attachments as $attachment ) :
        									if(get_post_thumbnail_id(  get_the_ID() ) != $attachment->ID){
        										$img        = wp_get_attachment_image_src( $attachment->ID, 'full' );
        										$img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=" . $nuestroAlinear ."&w=277&h=131";
        										$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=" . $nuestroAlinear . "&w=277&h=131";
        										$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=" . $nuestroAlinear . "&w=660&h=308";
        										$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=" . $nuestroAlinear . "&w=660&h=308";
        										$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=" . $nuestroAlinear . "&w=627&h=300";
        										$img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=" . $nuestroAlinear . "&w=571&h=274";
        										$img_data_min_2x  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $img[0] . "&a=" . $nuestroAlinear . "&w=584&h=280";
        										
        										?>
        										<div class="gallery-item col-md-4">
        											<a href="<?php echo $img[0]; ?>" class="img-gallery over-foto" data-toggle="lightbox" data-gallery="multimedia" data-title="<?php the_title();?>" data-index="<?php echo $i++; ?>">
        												<div class="overlay-foto redu_overlay_foto"></div>
        												<span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
        													<span data-src="<?php echo $img_data_min ?>"></span>
        													<span data-src="<?php echo $img_data_min_2x ?>" data-media="(min-device-pixel-ratio: 2.0)"></span>
        													<span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
        													<span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
        													<span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
        													<span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>
        												</span>
        											</a>
        										</div>
                                          <?php  } ?>
                                        <?php endforeach; ?>
                                        <div class="clear"></div>
                                    <?php endif; ?>
                            </div>
                            <div class="listadoShareItem">
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-center" addthis:url="<?php the_permalink(); ?>">
                                    <a class="addthis_button_facebook iconFacebookBlog"></a>
                                    <a class="addthis_button_twitter iconTwitterBlog"></a>
                                    <a class="addthis_button_linkedin iconLinkedIn"></a>
                                    <a class="addthis_button_pinterest_share iconPinterestBlog"></a>
                                    <a class="addthis_button_google_plusone_share iconPlusBlog"></a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile;
                } ?>
            </div>
        </div>
    </div>
</section>
<section id="more-galleries" class="container gallery">
    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
        <div class="bloque_multi_rel">
            <div class="cinta-ver-mas-style3 m-cinta-ver-mas">
                <h4>MULTIMEDIA RELACIONADA</h4>
            </div>
        </div>
    </div>
    <div class="gallery-container">
        <div class="bloque_multi_rel">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <?php do_action('do_get_post_attachment_related_cs_media'); ?>
                <?php do_action('do_get_post_video_related_cs_media'); ?>
                <?php do_action('do_get_post_attachment_related_cs_info_media'); ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</section>
<div id='IrArriba'>
    <a href='#Arriba'><span/></a>
</div>
<?php 
   // if (isset($_COOKIE['sitio']) && $_COOKIE['sitio']== 'veracruz') {
       get_footer();
    //} else {
      //  get_footer('cs');  
    //}
?>
