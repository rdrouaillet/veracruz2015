<?php get_header(); ?>
<script type="text/javascript">
	$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto();
	
	$(window).scroll(function(){
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){  
				$( "#pbd-alp-load-posts2 a" ).trigger( "click" );
			}
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){  
				$( "#pbd-alp-load-posts a" ).trigger( "click" );
			}
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){  
				$( "#pbd-alp-load-posts3 a" ).trigger( "click" );
			}
	});
	});
</script>
<div id="content-list" class="container blog-contenedor">
<div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="back-img"></div>
        <?php
			if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>

						<div class="searchHeaderArea col-md-12 col-lg-12">
							<?php //print obtenFechaEspaniol(); ?>
							<?php dynamic_sidebar( 'buscador-widget-area' ); ?>
						</div>
					<?php endif; 
			wp_reset_query();		
			$tags = wp_get_post_tags($_GET['id']);  
			if ($tags) {  
				$tag_ids = array();  
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
				
				$args=array(  
					'tag__in' => $tag_ids,  
					'post__not_in' => array($_GET['id']),  
					'posts_per_page'=>6, // Number of related posts to display.  
					'caller_get_posts'=>1,
					'category_name' =>'blog, videos, infografias, fotos',
					'paged' => $paged 
				);  
			$search = new wp_query( $args );

			?>
            <div class="back-img"></div>
			<?php
			if ( $search->have_posts() ) {
                ?>
			<div id="content-fotos">
                <?php
				$cont=1;
			    while ( $search->have_posts() ) { $search->the_post(); 
					//$category = get_the_category(the_ID()); 
					///echo $category[0]->cat_name;
					//print_r ($category);
			?>
        		
                <div class="divNotaListado col-md-4 col-lg-4 item-foto" style="margin-bottom:3%;">
                	<div class="contenedorNota">
						<?php
                        $domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
                        $thumbnailsrc = "";
                        if (!empty($domsxe)) {
                            $thumbnailsrc = $domsxe->attributes()->src;
                        } else {
                            $urlTema = get_bloginfo('template_url');
                            $thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
                        }
                        if (!empty($thumbnailsrc)): ?>
                            <span class='img img-responsive'>
                                <div class="pretty-img">
                                	
                                    <a  class="over-foto" data-id="<?php echo $notas->post->ID ?>">
                                    	
                                        <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $urlTb; ?><?php print $thumbnailsrc; ?>&w=380&h=200' border=0 />
                                    </a>
                                    <div class="post-date">
                                        <?php the_time( 'j M' ); ?>
                                    </div>
                                </div>
                            </span>
						 <?php endif; ?>
                         <div class="tituloShare">
                             <div class="link-noticia">
                                 <a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>">
                                    <?php 
										$textoCortar=get_the_title();
										echo myTruncate($textoCortar, 65, ' ', '…'); 
										///echo $category[0]->cat_name;
										//print_r ($category);
									?>
                                 </a>
                             </div>
                             <div class="listadoShareItem">
                                 <!-- AddThis Button BEGIN -->
                                 <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left">
                                     <span><a class="addthis_button_facebook iconFacebook"></a></span>
                                     <span><a class="addthis_button_twitter iconTwitter"></a></span>
                                     <span><a class="addthis_button_linkedin iconLinkedIn"></a></span>
                                     <span><a class="addthis_button_pinterest_share iconPinterestBlog"></a></span>
                                     <span><a class="addthis_button_google_plusone_share iconPlusBlog"></a></span>
                                 </div>
                                 <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                                 <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
                                 <!-- AddThis Button END -->
        					 </div>
	                     </div>
                	</div><!-- end .contenedorNota -->
				</div><!-- Fin del div featured clearfix -->
		<?php } ?>
     <?php }?>	
		</div>
		</div>
        <?php if (  $search->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation" style="display:none;">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div> <!-- #nav-below -->
		<?php endif; ?>	
        <!--<center><?php if (function_exists('wp_pagenavi')){ wp_pagenavi(); } ?></center> -->
    </div>       
	  <?php } ?>
<?php get_footer(); ?>