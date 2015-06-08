<?php //get_header(); ?>
<?php 
	global $post;
	wp_reset_query();
	$categories = get_the_category($post->ID);
	
	
	foreach($categories as $category) { 
		if($category->slug=='prensa'){
			$cat_actully=$category->slug;
		}else if($category->slug=='gobernador'){
			$cat_actully=$category->slug;
		}else if($category->slug=='boletin-meteorologico'){
			$cat_actully=$category->slug;
		}else if($category->slug=='radio'){
			$cat_actully=$category->slug;
		}else if($category->slug=='destacados'){
			$cat_actully=$category->slug;
		}else if($category->slug!='blog' && $category->slug!='slider'){
			$cat_actully="Dependencias";
			}
	} 

	switch($cat_actully){
		case 'prensa' || 'gobernador' || 'boletin-meteorologico' || 'radio' || 'destacados' || 'Dependencias' :
			include(TEMPLATEPATH . '/single-cs.php');
		break;
		default:
			include(TEMPLATEPATH . '/single-default.php');
		break;
	}
    ?>
<?php //get_footer(); ?>