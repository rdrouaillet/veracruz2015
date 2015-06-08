<?php
/*
Template Name: Poderes del estado
*/
?>
<?php get_header(); ?>
<?php get_template_part( 'content', 'search' ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php
		$item_title = get_post_meta($post->ID, 'item_title', true);
		$item_desc = get_post_meta($post->ID, 'item_desc', true);
		$data_file = get_post_meta($post->ID, 'data_file', true);
	?>
    <div class="tituloSingleArea">
        <h2><?php the_title(); ?></h2>
    </div>
    <div class="container-fluid">
        <div class="content-item">
        	<?php 
            $count_title = count($item_title);
			for($i=0; $i < $count_title; $i++){ ?>
                <div class="item">
                    <div class="icon col-md-4">
                    	<img src="<?php echo $data_file[$i]; ?>" class="img-full">
                    </div>
                    <div class="text-content col-md-8">
                    	<div class="padding-item">
                            <h3><?php echo $item_title[$i]; ?></h3>
                            <p><?php echo $item_desc[$i]; ?></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
			<?php } ?>
        </div>
        <div class="border-solid"></div>
    </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>