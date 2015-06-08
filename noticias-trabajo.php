<?php 
    /*
        Template name: Carousel Principal de Noticias - STPSP
    */ 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/noticias.css" type="text/css" media="screen, projection" />
	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cycle.all.js" ></script>
        
    <style>
   	/* Comienza setilo para caja de noticias VERACRUZ:GOB:MX */

#noticias-dependencias {
	height:100%;
	float: left;
	position:relative;
	font-family:Arial, Helvetica, sans-serif;
	margin: 0px;
	-webkit-box-shadow: 0px 0px 3px #ABABAB;
	-moz-box-shadow: 0px 0px 3px  #ABABAB;
	box-shadow: 0px 0px 3px  #ABABAB; 
}

#noticias-dependencias .itemPrincipal {
	float:left;
	width:100%;
	height:283px;
	overflow:hidden;
	position:relative;
}

#noticias-dependencias .itemPrincipal img {
	width:100%;
	height: auto;
	overflow:hidden;
}

#noticias-dependencias .texto {
	position:absolute;
	bottom:0px;
	background-color:#000000;
	left:0px;
	z-index:99;
	width:90%;
	height:60px;
	padding:10px 30px;
	font-size:13px;
	color:#ffffff;
	opacity:0.8;
	filter: alpha(opacity=80);
	line-height:18px;
}

#noticias-dependencias .texto a{
	text-transform:none;
	font-weight:bold;
	color:#54b947;
	text-decoration:none;
}

#noticias-dependencias .texto a:hover {
	text-decoration:underline;
}

#noticias-dependencias #navDGITPhoto {
	width:100%;
	height:120px;
	background-color:#fbfbfb;
	background: #fefefe; /* Old browsers */
	background: -moz-linear-gradient(top,  #fefefe 0%, #f1efef 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fefefe), color-stop(100%,#f1efef)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #fefefe 0%,#f1efef 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #fefefe 0%,#f1efef 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #fefefe 0%,#f1efef 100%); /* IE10+ */
	background: linear-gradient(top,  #fefefe 0%,#f1efef 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefefe', endColorstr='#f1efef',GradientType=0 ); /* IE6-9 */

}

#noticias-dependencias #navDGITPhoto #prev1 {
	background-image: url(<?php bloginfo('template_url')?>/images/images_carrusel/arrow_news_iz.png);
	background-repeat:no-repeat;
	width:3.4%;
	height:38px;
	text-indent:-999px;
	cursor:pointer;
	float:left;
	margin-top:42px;
	margin-left:0.5%;
}

#noticias-dependencias #navDGITPhoto #prev1:hover {
	background-image: url(<?php bloginfo('template_url')?>/images/images_carrusel/arrow_news_iz_hover.png);
}

#noticias-dependencias #navDGITPhoto #next1 {
	background-image: url(<?php bloginfo('template_url')?>/images/images_carrusel/arrow_news_de.png);/*url(images/images_carrusel/arrow_news_de.png);*/
	background-repeat:no-repeat;
	width:3.4%;
	height:38px;
	text-indent:-999px;
	cursor:pointer;
	float: right;
	margin-top:42px;
	margin-right:0.5%;
}

#noticias-dependencias #navDGITPhoto #next1:hover {
	background-image: url(<?php bloginfo('template_url')?>/images/images_carrusel/arrow_news_de_hover.png);
}

#noticias-dependencias #elementoNavegacion {
	width:88.6%;
	float:left;
	margin:0px 9px;
	background: none;
}

#noticias-dependencias  .itemNavegacion {
	width:100%;
	margin-top:12px;
	background: none !important;
}

#noticias-dependencias .itemNavegacion .itemDGITPhoto {
	width:29%;
	float:left;
	height:84px;
	cursor:pointer;
	border-right: 1px #e9e7e7 solid;
	padding: 2% 2%;
	font-size:13px;
	color:#333333;
	position:relative;
	margin-bottom:10px;
	line-height:18px;
	color:#666666;
	
}

#noticias-dependencias .itemNavegacion .itemDGITPhoto .date {
	font-size:11px;
	float:left;
	clear: both;
	color:#797979;
	width:100%;
}

#noticias-dependencias .itemNavegacion .itemDGITPhoto .titulo {
	float:left;
	clear:left;
	width:100%;
}

#noticias-dependencias .itemNavegacion .itemDGITPhoto:nth-child(3n+1) {
	border-left: 1px #e9e7e7 solid;
}

#noticias-dependencias .itemNavegacion .active,#noticias-dependencias .itemNavegacion .itemDGITPhoto:hover {
	background: #bcbcbc; /* Old browsers */
	background: -moz-linear-gradient(top,  #bcbcbc 0%, #d6d6d6 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bcbcbc), color-stop(100%,#d6d6d6)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #bcbcbc 0%,#d6d6d6 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #bcbcbc 0%,#d6d6d6 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #bcbcbc 0%,#d6d6d6 100%); /* IE10+ */
	background: linear-gradient(top,  #bcbcbc 0%,#d6d6d6 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bcbcbc', endColorstr='#d6d6d6',GradientType=0 ); /* IE6-9 */
	border-bottom: 4px solid #006b38;
	color:#222222;
}

#noticias-dependencias .itemNavegacion  .itemDGITPhoto .arrow {
	background-image: url(<?php bloginfo('template_url')?>/images/images_carrusel/arrow_up_2.png);
	background-repeat:no-repeat;
}

#noticias-dependencias .itemNavegacion .itemDGITPhoto:hover .arrow, #noticias-dependencias .itemNavegacion  .active  .arrow {
	position:absolute;
	z-index:9999;
	width:26px;
	height:14px;
	position:absolute;
	left:50%;
	margin-left:-13px;
	top: -13px;
}
  
  #elementoPrincipal{
		height:283px !important;  
  }
   </style>
<?php
function NoticiasDependencias(/*$atts*/)
{
	$NoticiasDependencias_ret .= "<div id='noticias-dependencias' style='width: 560px !important;'>
		<div id='elementoPrincipal'>" ;
	$news = get_posts(array( 'post_type' => 'post', 'numberposts' => 6, 'category_name' => 'STPSP'));
	foreach($news as $new): 
		setup_postdata($new);
		$contenido = get_the_content($new->ID);
		$args = array('numberposts' => 1,
			'order'=> 'ASC',
			'post_mime_type' => 'image',
			'post_parent' => $new->ID,
			'post_status' => null,
			'post_type' => 'attachment'
		);	
		$attachments = get_children( $args );
		if ($attachments) {
			foreach($attachments as $attachment) {
				$imgAtts = wp_get_attachment_image_src( $attachment->ID, 'large', false );
				$NoticiasDependencias_ret .= '<div class="itemPrincipal"><img src="'.$imgAtts[0]/*wp_get_attachment_url( $attachment->ID )*/.'" ><div class="texto">' . strip_tags(substr($contenido, 0, 250)) . '... <a target="_blank" href="'.get_permalink($new->ID).'">LEER M&Aacute;S &raquo;</a></div></div>';
			}
		}
		else{
			$NoticiasDependencias_ret .= '<div class="itemPrincipal"><img src="/wp-content/plugins/DGITSefiplanPhotoCarousel/images/img_DGITPhoto.jpg" ><div class="texto">' . strip_tags(substr($contenido, 0, 250)) . '... <a target="_blank" href="'.get_permalink($new->ID).'">LEER M&Aacute;S &raquo;</a></div></div>';
		}
    endforeach;
	$NoticiasDependencias_ret .= "</div><div id='navDGITPhoto'><div id='prev1'>Anterior</div> <div id='elementoNavegacion'>";
	
	
	$news = get_posts(array( 'post_type' => 'post', 'numberposts' => 6, 'category_name' => 'STPSP'));
	$countSlide = 0;
	$mainSlideCount = 0;
	$primero = 'active';
	foreach($news as $new): 
		setup_postdata($new);
		$contenido = get_the_content($new->ID);
		if ($countSlide == 0)
		{
			$NoticiasDependencias_ret .= "<div class='itemNavegacion'><div id='".$new->ID."' class='itemDGITPhoto ".$primero."' onClick=cambiaSlide(".$mainSlideCount.",'".$new->ID."')><span class='arrow'></span><span class='date'>".mysql2date('j F, Y', $new->post_date)."</span><span class='titulo'>".substr(get_the_title($new->ID),0,70)."...</span></div>";
						$primero = "";
		}
		else if ($countSlide == 2)
			{
				$NoticiasDependencias_ret .= "<div id='".$new->ID."' class='itemDGITPhoto' onClick=cambiaSlide(".$mainSlideCount.",'".$new->ID."')><span class='arrow'></span><span class='date'>".mysql2date('j F, Y', $new->post_date)."</span><span class='titulo'>".substr(get_the_title($new->ID),0,70)."...</span></div></div>";
						$countSlide = 0;
						$mainSlideCount++;
						continue;
			}
			else
			{
				$NoticiasDependencias_ret .= "<div id='".$new->ID."' class='itemDGITPhoto' onClick=cambiaSlide(".$mainSlideCount.",'".$new->ID."')><span class='arrow'></span><span class='date'>".mysql2date('j F, Y', $new->post_date)."</span><span class='titulo'>".substr(get_the_title($new->ID),0,70)."...</span></div>";
			}
			$countSlide++;
			$mainSlideCount++;
	endforeach;
	$NoticiasDependencias_ret .= "</div><div id='next1'>Siguiente</div></div></div>";
	$NoticiasDependencias_ret .= "<script type='text/javascript'> $(document).ready(init);
function init() {
	// dynamically add a div to hold the slideshow's pager
	//$('.elementos').after('<div id='prevCarousel'>Anterior</div><div class=pager></div><div id='nextCarousel'>Siguiente</div>');
	
	// now to use the cycle plugin
	$('#elementoPrincipal').cycle({
		timeout: 0
		//pager: '.pager',
		//pagerAnchorBuilder: imagePager,
		//next: '#nextCarousel',
		//prev: '#prevCarousel'
	});	
	
	$('#elementoNavegacion').cycle({
		fx:     'scrollHorz', 
    	prev:   '#prev1', 
    	next:   '#next1', 
    	timeout: 0 	
    });	
	
	function imagePager(index, slide) {
		var slide = jQuery(slide);
		var img = slide.children().get(0);
		var divElem = slide.children().get(1);
		//alert (divElem.innerHTML);
		//div = $('div.innerHTML');
		//div.children().css('border-bottom', '3px double red');
		return '<a href=#><div id=itemNav>'+divElem.innerHTML+'</div></a>'; 
	}
	 
} 
	function cambiaSlide(num, idDivActivo) { 
		$('.itemDGITPhoto').removeClass('active');
		$('#'+idDivActivo).addClass('active');
    	$('#elementoPrincipal').cycle(num); 
    	return false; 
	}
</script>";
	
    return $NoticiasDependencias_ret;
}
?>
</head>

<body>
	
    <?php 
		print NoticiasDependencias();
	?>  
		                          
</body>
</html>
