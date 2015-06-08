<?php
/*
Template Name: Principal page
*/
?>
<?php get_header(); ?>
<div class="clear"></div>
<div class="contine-principales">
    <section class="principalContent contenedorTituloPrincipal">
        <div class="tituloPrincipal">
            <span class="col-sm-3 col-md-2 col-lg-2 icon-palacion-title"><?php //the_post_thumbnail(array(250,150)); ?> <img class="img-responsive img" src="<?php bloginfo('template_url');?>/images/Palacio.png"></span>
            <h1 class="col-sm-9 col-md-10 col-lg-10">
                <?php
                    echo $padre=get_the_title($post->post_parent);
                ?>
            </h1>
        </div>
        <div class="clearfix"></div>
        <div class="hr"></div>
        <?php
        $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ));
        $contador = count($mypages);
		foreach( $mypages as $page ):
			$nombreparent = get_the_title($page->post_parent);
			$content = $page->post_excerpt;
			if ( ! $content) // Check for empty page
				continue;
			if(	$nombreparent==$padre): ?>
				<div class="col-sm-6 col-md-6 col-lg-4 item-principalpage" style="margin-top:0%;">
                    <div class="contenedor-loop">
                        <?php 
                        $domsxe = simplexml_load_string(get_the_post_thumbnail($page->ID, 'medium'));
                        $thumbnailsrc = "";
                        if (!empty($domsxe)) {
                            $thumbnailsrc = $domsxe->attributes()->src;
                        } else {
                            $urlTema = get_bloginfo('template_url');
                            $thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
                        }
                        if (!empty($thumbnailsrc)): ?>
                            <div class="contenedor-imagen arriba">
                            	<img src='<?php print $thumbnailsrc; ?>' border='0' />
                            </div>
                        <?php endif; ?>
                        <div class="contenedor-paginas post-page-child">
                         
                            <h3>
                                <?php echo $page->post_title; ?>
                            </h3>
                            <div class="entry">
                            <?php 
                                echo myTruncate($content, 80, ' ', ' '); 
                            ?>
                            </div>
                            <?php 
                            $pageActual=$page->post_title;
                            if($pageActual=="Educación"){ ?>
                                <a href="http://www.sev.gob.mx/" target="_blank" class="btn btn-default read-more">Ver más</a>
                            <?php 
                            }else if($pageActual=="Oficina Virtual de Hacienda"){ ?>
                                <a href="http://ovh.veracruz.gob.mx/ovh/index.jsp" target="_blank" class="btn btn-default read-more">Ver más</a>
                            <?php
                            }else{
                            ?>
                            <a href="<?php echo get_page_link( $page->ID ); ?>" class="btn btn-default read-more">Ver más</a>
                            <?php } ?>
                        </div>
                    </div>
				</div>
				<?php
			endif;
		endforeach;	
        ?>
    </section>	
</div>
<div class="hr"></div>
<?php get_footer(); ?>