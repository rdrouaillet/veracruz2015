<?php
/*
Template Name: Semblanza page
*/
?>
<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jcarousel.responsive.js"></script>
<link href="<?php bloginfo('template_url') ?>/css/jcarousel.responsive.css" rel="stylesheet">

<?php get_template_part( 'content', 'search' ); ?>
<?php if (have_posts()){ 
		while (have_posts()) { the_post(); 
			$imagen = get_post_meta($post->ID, 'imagen', true);
			$nombre = get_post_meta($post->ID, 'nombre', true);
			$secretaria = get_post_meta($post->ID, 'nombre-dependencia', true);
			$facebook = get_post_meta($post->ID, 'url-facebook', true);
			$twitter = get_post_meta($post->ID, 'url-twitter', true);
			$siglas = get_post_meta($post->ID, 'siglas-dependencia', true);
			$urlDep = get_post_meta($post->ID, 'link-dependencia', true);
			$logo = get_post_meta($post->ID, 'logo-dependencia', true);
	?>
    <div class="content-card-people">
        <div class="container-fluid">
            <div class="<?php echo (!is_page('gobernador')) ? 'content-secretario' : ' ' ; ?>">
                <div class="<?php echo (!is_page('gobernador')) ? 'col-xs-5 col-md-4' : 'col-md-6' ; ?> sin-padding">
                    <img src="<?php bloginfo('template_url') ?>/timthumb.php?src=<?php echo $imagen ?><?php echo (!is_page('gobernador')) ? '&w=261&h=313&a=t' : '&w=478&h=259' ; ?>" class="img-full bd-lr"/>
                </div>
                <div class="<?php echo (!is_page('gobernador')) ? 'col-xs-7 col-md-8 padding-left-25' : 'col-md-6 padding-left-25' ; ?>">
                    <h2><?php echo (!is_page('gobernador')) ? get_the_title() : "$nombre" ; ?></h2>
                    <h3><?php echo  $secretaria; ?></h3>
                    <div class="social-semblanza" style="display:none">
                        <ul>
                            <li class="hidden-less-600">Síguele en: </li>
                            <li>
                                <span class="facebook icons cursor-pointer"></span>
                                <span><a class="color-btn-redes" href="<?php echo $facebook; ?>" target="_blank">Facebook</a></span>
                            </li>
                            <li>
                                <span class="twitter icons cursor-pointer"></span>
                                <span><a class="color-btn-redes" href="https://twitter.com/<?php echo $twitter; ?>" target="_blank">Twitter</a></span>
                            </li>
                        </ul>
                    </div>
                    <br />
                    <a href="<?php echo $imagen; ?>" download="<?php echo $nombre." Foto Oficial"; ?>" class="descargar hidden-less-600">Descargar foto oficial</a>
                </div>
                <div class="clearfix"></div>
        	</div>
        </div>
    	<?php 
		if(!is_page('gobernador')){ ?>
			<?php $link_before =siblings('before'); ?>
            <?php $link_after =siblings('after'); ?>
            <div class="nav-abs-left">
                <a class="link_semblanza_prev <?php echo ($link_after['title_after'] == '' ) ? 'hide' : ''; ?>" href="<?php echo $link_after['after']; ?>">
                    <?php echo $link_after['text_aft'].$link_after['title_after']; ?>
                </a>
            </div>
            <div class="nav-abs-right">
                <a class="link_semblanza_next <?php echo ($link_before['title_before'] == '' ) ? 'hide' : ''; ?>" href="<?php echo $link_before['before']; ?>">
                    <?php echo $link_before['title_before'].$link_before['text_bef']; ?>
                </a>
            </div>
			<?php 
		} ?>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="content-semblanza">
            	<div class="img-shadow margin-btm-15"></div>
                <?php the_content(); ?>
                <div class="img-shadow margin-top-35"></div>
                <div class="clearfix"></div>
                <?php 
                    if(isset($urlDep) && !empty($urlDep)){ ?>
                        <a href="<?php echo $urlDep; ?>" class="btn-green center-block" target="_blank">VISITAR SECRETARÍA</a>
                        <?php 
                    } 
                ?>
            </div>
        </div>
    </div>
<?php 
		}
	}?>
  
<?php    
	wp_reset_query();
	if(!is_page('gobernador')){
		$args = array(
			'post_type' => 'page', 
			'post_parent' => $post->post_parent, 
			'order' => 'ASC', 
			'posts_per_page' => -1,
		);
		$the_query = new WP_Query($args); 
		?>
		<div class="content-carrousel-secretarias hidden-xs">
            <div class="title-more-content">
                <div class="container-fluid">
                	<div class="pull-left"><span class="title-gob-time">SECRETARÍAS DE GOBIERNO</span></div>
                </div>
            </div>	
			<div class="container-fluid">
				<div class="jcarousel-wrapper">
					<div class="jcarousel">
						<ul>
							<?php 
							if ( $the_query->have_posts() ) {
								while ( $the_query->have_posts() )  { $the_query->the_post(); 
									if ( has_post_thumbnail() ) { 
									   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'full'); 
									}
								?>
								<li class="col-xs-4">
									<div class="imagen pull-left">
										<img class='img-responsive' src="<?php bloginfo('template_url') ?>/timthumb.php?src=<?php echo $large_image_url[0] ?>&a=t&w=136&h=149" alt=''>
									</div>
									<div class="logo pull-left">
										<img src="<?php echo $logo; ?>">
									</div>
									<div class="clearfix"></div>
									<div class="title-secretario">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div>
								</li>
								<?php
								}
							}
							?>
						</ul>
					</div>
					<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
					<a href="#" class="jcarousel-control-next">&rsaquo;</a>
				</div>
			</div>
		</div>
    <?php } ?>
	<div class="clearfix"></div>
<?php get_footer(); ?>