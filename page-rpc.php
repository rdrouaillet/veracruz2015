<?php 
function generaJSON(){
	$category = "Blog";
	$args     = array(
                'category_name'   => $category,
				 'posts_per_page' => 2
				);
				
	$catquery = new WP_Query( $args );
	$contador=0;
	
	if ( $catquery->have_posts() ) :
	
	while ( $catquery->have_posts() ) : $catquery->the_post();
		 $json[$contador] = array(
				'Titulo' 	=>  get_the_title(),
				'Link' 		=> 	get_permalink(),
				'Contenido' => 	get_the_content()
			);
		 $contador=$contador+1;
	endwhile;
	endif;
	echo json_encode($json);
}
generaJSON();
?>