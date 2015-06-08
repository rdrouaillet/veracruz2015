<div class="content-ultimas-noticias">
    <div class="title-cs-1"><span>Últimas noticias</span></div>
    <?php
		$args = array(
			'posts_per_page' => 6,
			'category_name' => 'prensa, radio'
		); 
	?>
    <?php $my_query = new WP_Query($args); ?>
	<?php $i=1;
		while ($my_query->have_posts()): $my_query->the_post(); 
        $num_comunicado = get_post_meta($post->ID, 'comunicado', true);
        ?>
        <?php if($i != 6){ ?>
    	   <div class="nota-item">
        <?php }else{ ?>
            <div class="nota-item nota-item-sb">
        <?php } ?>
            <a class="<?php echo ($i == 1) ? 'first-nota-item' :''; ?>" href="<?php the_permalink(); ?>">
            	<h3><?php the_title(); ?></h3>
            	<strong><span class="fecha"><?php the_time('j F, Y'); ?></span>.  </strong>
				<?php if($num_comunicado != ""){ ?>
                    <span class="num-comunicado"><?php echo ($i == 1) ? 'COM.:' : 'COMUNICADO:'; ?> <?php echo $num_comunicado ?></span>
                <?php } ?>
            </a>
            <p class="hidden-md hidden-lg hidden-less-600"><?php cutString('excerpt',150); ?></p>
        </div>
    <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
    <div class="see-more">
        <a class="pull-right" href="/blog/category/prensa">
        	<span class="link-readmore">VER TODAS</span>
        </a>
    </div>
    <div class="clearfix hidden-less-600"></div>
</div>
