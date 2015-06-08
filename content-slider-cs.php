<?php
wp_reset_query(); 
$args = array(
	'posts_per_page'   => 4,
	'meta_key'         => '_add_slider_cs',
	'post_type'        => 'post'
); 
$posts_array = get_posts( $args ); 
?>
<div class="content-slider">
	<div class="sombra-top-item-slider-ver visible-xs"></div>
    <div class="borde-gray-top"></div>
    <div class="container-fluid">
        <div class="cycle-slideshow bg-slide-home hidden-less-600" 
            data-cycle-fx="scrollHorz" 
            data-cycle-slides="> div"
            data-cycle-timeout="5000"
            data-cycle-pager=".cycle-pager-nav"
            data-cycle-prev=".prev"
            data-cycle-next=".next"
            >
            <?php foreach($posts_array as $post){ setup_postdata( $post ); 
                $add_slider = get_post_meta($post->ID, '_add_slider_cs', true);
                if(isset($add_slider) || !empty($add_slider)){ ?>
                    <div class="img-slider-comsocial">
                        <div class="col-sm-8 no-padding bd-gray-left width-custom-left">
                        <a class="over-nota" href="<?php the_permalink(); ?>">
                            <div class="overlay-nota"></div>
                           <?php 
                               $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 
                               echo "<img alt='".get_the_title()."' class='img-responsive img-full' src='".get_bloginfo('template_url')."/timthumb.php?src=".$large_image_url[0]."&a=cc&h=348&w=729'>";
                            ?>
                        </a>
                        </div>
                        <div class="col-sm-4  sepcontent-slider width-custom-right">
                            <div class="description-slider">
                             
                                    <?php
                                        if ( function_exists('cutString')){
                                            echo "<p>";
                                                cutString ( 'var', 130 , get_the_title()); 
                                            echo "</p>";
                                        } 
                                    ?>
                               
                                
                                <!--btn-style1-->
                                <a class="link-readmore hidden-less-991" href="<?php the_permalink(); ?>">Leer más</a>
                            </div>
                        </div>
                        <div class="content-nav">
                            <div class="cycle-pager-nav"></div>	
                        </div>
                        <span class="icon-tab-date date-slider"><?php the_time( 'j M' ); ?></span>
                    </div> 	   
            <?php 	
                }
            }
            ?>
        <?php wp_reset_query(); ?>
        </div>
    </div>
    <div class="col-sm-12 hidden-more-600">
        <?php $cont = 1; foreach($posts_array as $post){ setup_postdata( $post ); 
            $add_slider = get_post_meta($post->ID, '_add_slider_cs', true);
            if(isset($add_slider) || !empty($add_slider)){ ?>
                <div class="img-slider-comsocial">
                    <div class="col-md-8 col-lg-8 no-padding">
                       <a href="<?php the_permalink(); ?>">
                           <?php 
                               $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 
                               echo "<img alt='".get_the_title()."' class='img-responsive img-full' src='".get_bloginfo('template_url')."/timthumb.php?src=".$large_image_url[0]."&a=cc&h=348&w=729'>";
                           ?>
                       </a>
                    </div>
                    <div class="col-md-4 col-lg-4  sepcontent-slider">
                        
                        <div class="description-slider">
                            <p class="<?php echo $cont==4 ? 'sin-borde' : ''; ?>">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </p>
                            <!--btn-style1-->
                            <a class="link-readmore hidden-less-991" href="<?php the_permalink(); ?>">Leer más</a>
                        </div>
                    </div>
                </div> 
                <div class="sombra-top-item-slider-ver visible-xs"></div>	   
        <?php 	
            }
        $cont++; }
        ?>
        <?php wp_reset_query(); ?>
        <div class="cinta-ver-mas-style2">
            <a class="pull-right" href="/blog/category/prensa">
                <span class="text-ver-mas">VER TODAS</span>
                <span class="bg-all-new"></span>
            </a>
        </div>
        <div class="border-dashed width-88 margin-9"></div>
    </div>
</div>
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
