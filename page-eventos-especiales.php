<?php
/*
Template Name: Eventos especiales
*/
?>
<?php get_header(); ?>
    <div id="content-list" class="principalContent blog-contenedor fondo-cat-gob">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php $my_meta = get_post_meta($post->ID,'_eventos',true); ?>
        <?php 
		$nombre = get_post_meta($post->ID, 'nombre', true);
		$descripcion = get_post_meta($post->ID, 'descripcion', true);
		?>
        <div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
            <div class="bg-dif-left custom-higth"></div>
        	<div class="bg-dif-right custom-higth"></div>
        </div>
        <div class="back-img"></div>
        <section id="mainCarousel" class="slider-eventos hidden-less-600">
            <div id="divCarrusel" class="slider-class-carrousel">
                <div id="carousel-destacados" class="carousel slide no-padding" data-interval="4000">
                    <div class="carousel-inner content-slider-event">
                        <?php
							
							$counterActive = 1;
							$args=array('post_type'=>'attachment','post_parent'=>get_the_ID(),'order' => 'ASC', 'orderby' => 'menu_order ID', 'posts_per_page'=>4);
							$attachments=get_posts($args);
							if($attachments){
								foreach($attachments as $attachment){
									$img_full=wp_get_attachment_image_src( $attachment->ID, 'full' );
								?>
								<div class="item <?php if ($counterActive==1) { print 'active'; } ?>">
									<?php 
									if (!empty($img_full)):
									?>
										<div style="display:inline-block;" class="">
										<span class='img img-responsive'><img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $img_full[0]; ?>&w=1100&h=400' border=0 alt="<?=$attachment->post_excerpt?>"/></span>
										</div>
									<?php
									endif;
									?>
                                    <?php if(!empty($attachment->post_excerpt)){ ?>
                                        <div style="display:inline-block;" class="eventos-caption">
                                            <?php
                                                print "<h4>". $attachment->post_excerpt . "</h4>";
                                            ?>
                                        </div>
                                    <?php } ?>
								</div>
								<?php
								 $counterActive++;
								} 
							  
							}
						?>
                    </div>
                    <div class="carousel-indicators-wrapper">
                        <ol class="carousel-indicators">
                        <?php $cont_item=0;  while(count($attachments)> $cont_item){ ?>
                            <?php if($cont_item == 0){ ?>
                            <li data-target="#carousel-destacados" data-slide-to="<?php echo $cont_item ?>" class="active"></li>
                        	<?php } else{ ?>
							<li data-target="#carousel-destacados" data-slide-to="<?php echo $cont_item ?>"></li>
							<?php } ?>
						<?php $cont_item++; }?>
						</ol>
                    </div><!-- end .carousel-indicators-wrapper -->
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-destacados" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-destacados" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div><!-- end #carousel-destacados -->
            </div><!-- end #divCarrusel -->
        </section> <!-- end #mainCarrusel -->
        <div class="content-eventos col-lg-12 col-md-12 col-sm-12">
            <?php 
            if($my_meta!=''){ 
                foreach($my_meta['eventos'] as $evento){  ?>               
						<?php if($evento['url_evento']!=""){ ?>  
                        	<a target="_blank" href="<?php echo $evento['url_evento'] ?>">
						<?php } else{ ?>
                        	<a href="#">
                        <?php } ?>
                            <div class="item-evento">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 bg-logo-event">
                                    <?php if($evento['image_src']!=""){ ?>
                                    <span class='img img-responsive'>
                                        <img src="<?php echo esc_url($evento['image_src']) ?>" class="img-responsive img">
                                    </span>    
                                    <?php } ?>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 event-description hidden-less-600">
                                    <div class='title-evento'>
                                    <?php if($evento['name_evento']!=""){ ?>
                                        <?php echo $evento['name_evento']; ?>
                                    <?php } ?>
                                    </div>
                                    <div class="descripcion-evento">
                                        <?php echo $evento['desc_evento']; ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                    	</a>
                        <div class="link-visitar-sitio hidden-more-600">
                        	<a target="_blank" href="<?php echo $evento['url_evento'] ?>"><span class="visit-span">Visitar sitio</span><span class="pull-left btn-visit-site"></span></a>
                        </div>
                    <div class="clearfix"></div>
            <?php }
            }
            ?>
        <?php endwhile; // end of the loop. ?>
        </div>
    </div>
    <div class="border-bottom hidden-less-600"></div>
<?php get_footer(); ?>