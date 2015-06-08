<?php
/*
Template Name: Transparencia ComSocial 
*/
?>
<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jcarousel.responsive.js"></script>
<link href="<?php bloginfo('template_url') ?>/css/transparencia.css" rel="stylesheet">
<link href="<?php bloginfo('template_url') ?>/css/jcarousel.responsive.css" rel="stylesheet">

<script type="text/javascript">
$(window).load(resize_height);
$(window).on('resize', resize_height);
function resize_height(){
	var sideL = $('#sideLeft').height();
	var sideR = $('#sideRight').height();
	if($('body').width() > 992){
		if(sideL > sideR){
            $('#sideRight').css('height', sideL+'px');
            $('#sideLeft').css('height', sideL+'px');
            
            //console.log('Ajuste de la derecha al tamaño de la izquierda ');
        }else{
             if(sideR > sideL){
                $('#sideLeft').css('height', sideR+'px');
                $('#sideRight').css('height', sideR+'px');
                  //console.log('Ajuste de la izquierda al tamaño de la derecha');
        	}
     	}

	}
}



	$(document).ready(function(){
		$('a.scrollink').click(function(e){
			e.preventDefault();
			$('html, body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 1000);
		});

		$(window).scroll(function(){
	        if( $(this).scrollTop() > 300){
	            $('a.scrollink').fadeIn();
	        }else{
	        	$('a.scrollink').fadeOut();
	        }
	    });


		$( ".treeview > li" ).each(function( index ) {
			var content_a = $(this).text();
			$("span a", this ).html(quitar_chart(content_a));
			if(index == 43){
				return false;
			}
		});
		
		$( ".treeview > li ul li" ).on( "click", function() {
			$( "span a" , this ).trigger( "click" );
		});
	});
	function quitar_chart(string){
		var res = string.slice(5);
		return res;
	}
</script>
<?php get_template_part( 'content', 'search' ); ?>
<div class="content-card-transparencia">
	<div id="sideLeft" class="gray-black  hidden-less-768">
		<div class="lefside-trans">
			<img src="<?php bloginfo('template_url') ?>/images/doc_transparencia.png" class="img-responsive"/>
		</div>
	</div><!--FIN lefside-trans-->
	<div id="sideRight" class="gray-white ">
		<div class="rightside-trans">
			<div class='content_transparencia'>
				<h2><?php the_title(); ?></h2>
                <p>
                		"Con fundamento en la Ley 581 para la Tutela de los Datos Personales en el Estado de Veracruz, 
                		se informa que todos los datos personales que constan en los archivos y registros de esta Coordinación General de Comunicación Social, 
                		se encuentran protegidos y únicamente podrán divulgarse cuando se actualice alguna de las hipótesis señaladas en el artículo 34 de la 
                		ley en cita."
                </p>
             </div>
		</div>
	</div><!--FIN rightside-trans-->	
</div>

<!--<div class="conteiner-fluid">
	<div class="col-md-3 gray-bgnd">

	</div>
	<div class="col-md-9 white-bgnd">

	</div>
</div>-->

<?php if (have_posts()):
		while (have_posts()): the_post(); ?>
<div class="container-fluid">
	<div class="col-sm-12 col-md-12 col-lg-12">
    	<div class="content-semblanza">
    		<h4 class="titulo_transparencia">
    			Información pública señalada en el artículo 8 de la ley 848 de transparencia y acceso a la información pública para el estado de veracruz
    		</h4>
    		<?php $fecha = get_post_meta(get_the_ID(), 'fecha-actualizacion'); ?>
    		<div class='date_caledar'><span class="calendar"></span><p> Actualizada al: <span class="bold_font"><?php echo $fecha[0] ?></span></p></div>
    		<div class="content_transp">
        		<?php the_content(); ?>
        	</div><!--FIN content_transp-->
        	<div class="clearfix"></div>
		</div><!--FIN content-semblanza-->
	</div>
</div><!--FIN container-fluid-->	
<?php 
		endwhile;
	endif;
?>
<a class="scrollink hidden-xs" href="#up">
	<span class="btn_img_scroll"></span>
</a>
<?php 
	get_footer();
?>