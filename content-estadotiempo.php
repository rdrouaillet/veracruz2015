
<div class="col-md-12 col-lg-12 sin-padding-sm padding-xs">
    <?php
        wp_reset_query();
        $sticky = get_option( 'sticky_posts' );
        $args = array(
            'category_name' => 'boletin-meteorologico',
            'posts_per_page' => 3
        );
        $my_query = new WP_Query($args);
        $cont_p = 1;
        if ($my_query->have_posts()) {
            while($my_query->have_posts())
            { 
                $my_query->the_post();
                $my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
                $nuestroAlinear = "";
                if($my_metaAling['alinear']!=""){           
                    $nuestroAlinear = $my_metaAling['alinear'];
                }else{
                    $nuestroAlinear = "cr";
                }
                $domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'full'));
                $thumbnailsrc = "";
                if (!empty($domsxe)){
                    $thumbnailsrc = $domsxe->attributes()->src;
                } else {
                    $urlTema = get_bloginfo('template_url');
                    $thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
                }
    ?>
    <?php if($cont_p == 1){ ?>
        <div class="nota-item-g col-sm-4 col-md-4 col-lg-4">
    <?php }elseif($cont_p == 2){ ?>
        <div class="nota-item-g-middle  col-sm-4 col-md-4 col-lg-4 ">
    <?php }elseif($cont_p == 3){ ?>
        <div class="nota-item-g-right col-sm-4  col-md-4 col-lg-4">
    <?php } ?> 
      	
        <div class="item-element">  
			<?php 
                if (!empty($thumbnailsrc)):
                
                $img_data_1200   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=327&h=156";
                $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=327&h=156";
                $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=677&h=323";
                $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=686&h=327";
                $img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc. "&a=" . $nuestroAlinear . "&w=542&h=258";
            ?>
            
            <span class='img img-responsive overlay-responsive'>
                <?php $category = get_cat_slug_by_id($notas->post->ID); ?>
                <a href="<?php the_permalink() ?>" class="over-foto">
                    <div class="overlay-tiempo"></div>
                    <div class="overlay-icon-tiempo"></div>
                    <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change img-back-cat">
                        <span data-src="<?php echo $img_data_min ?>"></span>
                        <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                        <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                        <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                        <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>   
                    </span>
                </a>
            </span>
            <?php endif; ?>
                <a href="<?php the_permalink() ?>" style="text-decoration:none;">
                    <h3 class="text-nota-item-uno"><?php the_title(); ?></h3>
                </a>
        </div>
    </div>
    <?php $cont_p++; } } ?>
    <div class="clearfix"></div>
</div>