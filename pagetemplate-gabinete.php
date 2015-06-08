<?php
/*
Template Name: Gabinete page
*/
?>
<?php get_header(); ?>
<script type="application/javascript">
$( document ).ready(function() {
	$('.item-gabinete').hover(function(e) {
		e.preventDefault();
		$(this).children().find('img').addClass('z_index-2');
		//$(this).children().find('h3').addClass('z_index-2-top');
		$(this).find('.gabinete-over').show();
	}, function(e) {
		e.preventDefault();
		//$(this).children().find('h3').removeClass('z_index-2-top');
		$(this).find('.gabinete-over').hide();
		$(this).children().find('img').removeClass('z_index-2');
	})
});
</script>
<?php get_template_part( 'content', 'search' ); ?>
<div class="tituloSingleArea visible-xs">
    <h2><?php the_title(); ?></h2>
</div>
<div class="container-fluid">
    <div class="entrytext subirTop">
        <div class="gabineteDesc">
            <div class="back-img hidden-less-600"></div>
            <p>
                El Gabinete está conformado por los Titulares de cada una de las Dependencias del Gobierno del Estado de Veracruz. En ejercicio de su función, el Gobernador del Estado es el encargado del nombramiento de los titulares de las dependencias de Gobierno.
            </p>
            <div class="back-img hidden-less-600"></div>
        </div>
    </div>
    <?php
        $args = array(
            'post_type' => 'page', 
            'post_parent' => $post->ID, 
            'order' => 'ASC', 
            'posts_per_page' => -1,
        );
        $the_query = new WP_Query($args);
        if ( $the_query->have_posts() ) {
            $cont=1;
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); 
                $siglas_dependencia=get_post_meta($the_query->post->ID, 'siglas-dependencia', true);
                $logo_dependencia=get_post_meta($the_query->post->ID, 'logo-dependencia', true);
                $link_dependencia=get_post_meta($the_query->post->ID, 'link-dependencia', true);
                ?>
                <div class="divNotaGabinete col-sm-6 col-md-3 col-lg-3 item-nota">
                    <?php if($cont%4!=0){ ?>
                        <div class="item-gabinete">
                    <?php }else{ ?>
                        <div class="item-gabinete mirror">	
                    <?php } ?>
                        <div class="gabinete-card">
                            <?php 
                            if ( has_post_thumbnail() ) { 
                               $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'full'); 
                               echo "<img class='img-gabinete img-responsive' src='".get_bloginfo('template_url')."/timthumb.php?src=".$large_image_url[0]."&a=t&w=204&h=223' alt=''>";
                            }?>
                            <?php 
                            $nom_gabinete = get_the_title();
                            ?>
                            <div class="content-info-semblanza">
                                <h3 <?php if($nom_gabinete=='Erik Porres Blesa' || $nom_gabinete=='Alberto Silva Ramos' || $nom_gabinete=='Astrid Elías Mansur' || $nom_gabinete=='Juan Antonio Nemi Dib') echo "class='two-line'"; ?>><?php the_title(); ?></h3>
                                <?php if(isset($siglas_dependencia) && !empty($siglas_dependencia)){ ?>
                                    <div class="siglas-depencia">
                                        <span><?php echo $siglas_dependencia; ?></span>
                                    </div>
                                <?php } ?>
                                <a href="<?php the_permalink(); ?>">
                                	<span class="hidden-more-600 link-semblanza-xs">Semblanza</span>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="gabinete-over">
                            <div class="data-card">
                                <?php if(isset($logo_dependencia) && !empty($logo_dependencia)){ ?>
                                    <div class="title-secretaria">
                                        <center><?php echo "<img src='$logo_dependencia'>"; ?></center>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>
                           	<div class="content-title-card">
                            	<?php if($nom_gabinete=='Antonio Gómez Pelegrín' || $nom_gabinete=='Yolanda Gutiérrez Carlín'){
									?>
                                <h2><?php the_title(); ?>  <a href="#">| Semblanza</a></h2>
									<?php }else{ ?>
                            	<h2><?php the_title(); ?>  <a href="<?php the_permalink(); ?>">| Semblanza</a></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="bg-link-semblanza hidden-less-600">
                        <a href="<?php the_permalink(); ?>" class="read-more margin-0">SEMBLANZA</a>
                    </div>
                    <?php if($cont%4==0){ ?>
                        </div><div class="clear">
                    <?php } ?>
                </div>
        <?php 
            $cont++; }
        }
    ?>
    <?php wp_reset_postdata();?>	
</div>
<div class="border-bottom"></div>
<?php get_footer(); ?>