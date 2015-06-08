
<?php
get_header();?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var seen = {};
		$('.unico-post').each(function() {
			var txt = $(this).text();
			if (seen[txt])
				$(this).remove();
			else
				seen[txt] = true;
		});
    });
</script>
<?php
/*
$input_file = "http://www.veracruz.gob.mx/wp-content/uploads/2013/11/Javier_Duarte_firma_convenio_con_infonavit_para_vivienda_a_policias_Veracruz.png";
$output_file = "http://www.veracruz.gob.mx/wp-content/uploads/2013/11/Javier_Duarte_firma_convenio_con_infonavit_para_vivienda_a_policias_Veracruz.jpg";

$input = imagecreatefrompng($input_file);
list($width, $height) = getimagesize($input_file);
$output = imagecreatetruecolor(1100, 400);
$white = imagecolorallocate($output,  255, 255, 255);
imagefilledrectangle($output, 0, 0, $width, $height, $white);
imagecopy($output, $input, 0, 0, 0, 0, $width, $height);
$result =imagejpeg($output, $output_file);

print_r($result);
*/

$array_data_tag = get_tags_more_popular(201705);
echo "<pre>";
	print_r($array_data_tag);
echo "</pre>";

//echo count($array_data_tag);

?>

<div id='content-post-related' class='post-related-cs padding-no'>
	<ul>
    	<?php for($i=0; $i < count($array_data_tag); $i++){ ?>
            <?php foreach($array_data_tag[$i]['data'] as $item){ ?>
            <a href="<?php echo $item['permalink'] ?>" class="post-unique-<?php echo $item['ID']; ?> unico-post">
                <li>
                    <div class="item-related-cs">
                        <span><?php echo $item['date'] ?></span>
                        <?php echo $item['title'] ?>
                    </div>
                </li>
            </a>
            <?php } ?>
       <?php } ?>
	</ul>
</div>

<?php 
	/*
	$tags = get_tags(array('orderby'=>'count', 'order' => 'desc'));
	echo "<pre>";
	print_r($tags);
	echo "</pre>";
	*/
	/*
	$tag_ids = array();  
	foreach($tags_get as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(  
		'tag__in' => $tag_ids,  
		//'post__not_in' => array(27663),  
		'posts_per_page'=>-1, // Number of related posts to display.  
		'caller_get_posts'=>1,
	);  
	$search = new WP_QUERY( $args );
	while ( $search->have_posts() ) { $search->the_post(); 	
		// initialize
		$min = 9999999; $max = 0;
		
		// fetch all WordPress tags
		$tags = get_tags(array('orderby' => $orderby, 'order' => $order, 'number' => $number));	
		
		// get minimum and maximum number tag counts
		foreach ($tags as $tag) {
			$min = min($min, $tag->count);
			$max = max($max, $tag->count);
		}
		// generate tag list
		foreach ($tags as $tag) {
			$slug = $tag->term_id;
			if(in_array($slug,$tag_ids) && $max <= $tag->count){
				echo get_the_title()."=>$slug.<br>";
				//echo $title = $tag->count . ' article' . ($tag->count == 1 ? '' : 's')."<br>";
			}else{
				
			}
		}
	}
	*/

?>