<script type="text/javascript">
jQuery(document).ready(function($) {
    $( "#carousel-slider" ).mouseover(function() {
        $( "div.carousel-caption" ).css( 'display','none' );
    }).mouseout(function() {
        $( "div.carousel-caption" ).css( 'display','block' );
    });
    $( "div.carousel-indicators-wrapper" ).mouseover(function() {
        $( "#carousel-slider div.overlay-nota" ).css( {'display':'block', 'background-color':'rgba(0,0,0,0.2)'} );
    }).mouseout(function() {
        $( "#carousel-slider div.overlay-nota" ).css( 'display','none' );
    });
});
</script>
<?php 
	$args = array(
		'category_name'  => 'slider',
		'posts_per_page' => 4,
		'post_type'		 => 'post',
		'orderby'		 => 'menu_order',
		'order'			 => 'ASC'
	);
?>
<div class="content-slider hidden-less-600">
	<div class="borde-gray-top"></div>
	<div class="container-fluid">
        <div id="carousel-slider" class="carousel slide col-md-12" data-ride="carousel" data-interval="4000">
            <div class="carousel-inner">
                <?php
                 $counterActive = 1; 
                 $query = new WP_Query($args);
                 while ($query->have_posts()) : $query->the_post();
                 $query->in_the_loop = true; ?>
                 <div class="item <?php echo ($counterActive==1) ? 'active' : ''; ?>">
                    <div class="content-img-slider">
                        <a class="over-nota" href="<?php the_permalink(); ?>">
                            <div class="overlay-nota"></div>
                            <?php 
                            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->ID), 'full');  
                            if (!empty($large_image_url)) { ?>
                                <img alt="<?php the_title(); ?>" class="img-full" src="<?php echo $large_image_url[0] ?>">
                            <?php
                            } else {
                               $thumbnailsrc = substr(get_bloginfo('template_url'), strrpos($urlTema, "/wp-") , strlen(get_bloginfo('template_url'))) . "/images/imgDefault.png";
                            ?>
                                <img alt="<?php the_title(); ?>" class="img-full" src="<?php echo $thumbnailsrc ?>">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="carousel-caption">
                        <h4>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >  <?php the_title(); ?> </a>
                        </h4>
                    </div>
                    <!--<span class="icon-tab-date date-slider">29 JUN</span>-->
                 </div>
                <?php $counterActive++;
                 endwhile;
                ?>
            </div>
            <div class="carousel-indicators-wrapper">
                <ol class="carousel-indicators">
                    <?php $cont_item=0;  while($query->post_count > $cont_item){ ?>
                        <?php if($cont_item == 0){ ?>
                            <li data-target="#carousel-slider" data-slide-to="<?php echo $cont_item ?>" class="active"></li>
                        <?php } else{ ?>
                            <li data-target="#carousel-slider" data-slide-to="<?php echo $cont_item ?>"></li>
                        <?php } ?>
                    <?php $cont_item++; }?>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!--only mobile-->
<div class="sombra-top-item-slider-ver back-margin-bottom"></div>
<div class="slider-view-mobile hidden-more-600">
	<?php 
    $query = new WP_Query($args);
    $cont = 1;
	while ($query->have_posts()) : $query->the_post(); ?>
    	<div class="sombra-top-item-slider-ver <?php if($cont==1){ echo "hide"; } ?>"></div>
        
        <div class="item-slider">
            <div class="col-md-8 col-lg-8 no-padding">
            	<?php
				$imagen_destacada = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
				$image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
				
				$alinear = get_post_meta($post->ID,'_img_alinear',true);
				if($alinear['alinear']!=""){			
					$alinear_img = $alinear['alinear'];
				}else{
					$alinear_img = "cc";
				}
				
				if (!empty($image_proporcional)) {
					$thumbnailsrc = $image_proporcional;
				} else {
					$thumbnailsrc = $imagen_destacada[0];
				}
				
                $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=599&h=286";
                $img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=599&h=286";
                ?>
			    <a href="<?php the_permalink(); ?>">
                	<span data-picture data-alt="<?php the_title();?>" class="img-change">
                        <span data-src="<?php echo $img_data_min  ?>"></span>
                        <span data-src="<?php echo $img_data_600  ?>" data-media="(min-width: 600px)"></span>
            		</span>
                </a>
            </div>
            <div class="col-md-4 col-lg-4  sepcontent-slider">
                <h5 class="time-center hidden-more-600"><?php //the_time( 'j F' ); ?></h5>
                <div class="description-slider">
                    <p class="<?php echo $cont==4 ? 'sin-borde' : ''; ?>">
                        <a href="<?php the_permalink(); ?>">
                            <?php  the_title() ?>
                        </a>
                    </p>
                    <a class="btn-style1 hidden-less-991" href="<?php the_permalink(); ?>">Leer más</a>
                </div>
            </div>
        </div>
    <?php $cont++; endwhile; wp_reset_query(); ?>
     <div class="sombra-top-item-slider-ver"></div>
    <div class="cinta-ver-mas-style2 m-top-9">
        <a class="pull-right" href="<?php echo site_url("/blog/category/blog"); ?>">
            <span class="text-ver-mas">VER MÁS NOTICIAS</span>
            <span class="bg-all-new"></span>
        </a>
    </div>
    <div class="clearfix hidden-more-600"></div>
    <div class="border-dashed width-88"></div>
</div>

<div class="clearfix"></div>
<div class="content-search searchHeaderArea">
	<div class="container-fluid">
        <div class="w_search_slider col-md-8 col-lg-8 hidden-less-600">
            <?php get_search_form(); ?>
        </div>
        <div class="col-md-4">
            <div class="social-networks-sld">
                <ul>
                    <li class="sp-fb-png social-stylus-2"><a target="_blank" href="https://es-es.facebook.com/GobiernodeVeracruz"></a></li>
                    <li class="sp-tw-png social-stylus-2"><a target="_blank" href="https://twitter.com/GobiernoVer"></a></li>
                    <li class="sp-yt-png social-stylus-2"><a target="_blank" href="http://www.youtube.com/gobiernoveracruz"></a></li>
                    <li class="sp-pt-png social-stylus-2"><a target="_blank" href="http://www.pinterest.com/estadoveracruz/"></a></li>
                    <li class="sp-pl-png social-stylus-2"><a target="_blank" href="https://plus.google.com/100491062934580833963/posts"></a></li>
                    <li class="sp-if-png social-stylus-2"></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>