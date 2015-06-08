<div class="content-noticias-destacadas">
    <div class="title-cs-1">
    	<span>NOTICIAS DESTACADAS</span>
    </div>
    <?php
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'posts_per_page' => 3,
			'post__in'  => $sticky,
			'ignore_sticky_posts' => 1,
			'category_name' => 'prensa, radio'
		); 
	?>
    <?php $my_query = new WP_Query($args); ?>
	<?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post(); ?>
    	<?php if($i != 3){ ?>
    		<div class="nota-item">
        <?php }else{ ?>
            <div class="nota-item nota-item-sb">
        <?php } ?>
        	<div class="image">
            	<div class="overlay-responsive">
                    <a href="<?php the_permalink(); ?>" class="over-nota">
                    	<div class="overlay-nota over-size-nota"></div>
                        <?php 
                        if ( has_post_thumbnail() ) { 
                           $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                           $img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&w=425&h=205";
                           $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=345&h=165";
                           $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=638&h=305";
                           $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=499&h=239";
                           $img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $large_image_url[0] . "&a=" . $nuestroAlinear . "&w=454&h=205"; ?>
                           
                           <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change img-back-cat">
                                <div class="post-date date-small hidden-less-600"><?php the_time( 'j M' ); ?></div> 
                                <span data-src="<?php echo $img_data_min ?>"></span>
                                <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
                           </span>  
                        <?php   
                        }
                        ?>
                    </a>
                </div>
            </div>
        	<a href="<?php the_permalink(); ?>">
            	<h3><?php the_title(); ?></h3>
            </a>
        	<?php $num_comunicado = get_post_meta($post->ID,'comunicado', true); ?>
        	<?php if($num_comunicado != ""){ ?>
                <span class="num-comunicado">COMUNICADO: <?php echo $num_comunicado; ?></span>
            <?php } ?>
            <p class="hidden-more-992"> <?php cutString('excerpt','220',''); ?> </p>
        </div>
    <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
    <div class="see-more">
        <a class="pull-right" href="/blog/category/prensa?p=destacado">
        	<span class="link-readmore">VER TODAS</span>
        </a>
    </div>
</div>
