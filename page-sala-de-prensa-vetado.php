<?php get_header(); ?>
<script type="text/javascript">
		$(document).ready(function() {
		   document.getElementById('openModals').click();
		});
		</script>
 <style>
	.modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0, 0, 0, 0.8);
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}
	.modalDialog:target {
		opacity:1;
		pointer-events: auto;
	}
	.modalDialog > div {
		width: 620px;
		height:220px;
		position: relative;
		margin: 10% auto;
		/*padding: 5px 20px 13px 20px;*/
		border-radius: 7px;
		background: #fff;
	}
	.closers {
		 
		  color: #FFFFFF;
		  line-height: 25px;
		  /* right: -12px; */
		  text-align: center;
		  /* top: -10px; */
			top: 10px;
  			position: relative;
		  text-decoration: none;
		  font-family: 'GandhiSans' !important;
		font-size:19px !important;
		  
	}
	.closers:hover {
		text-decoration:none !important;
		color: #FFFFFF;
	}
	.btn-regresar-home{
		display:block;
		background: #535352;
		  color: #5b5b5b;
		margin-top: 0px !important;
		margin-bottom: 0px !important;
		position: relative;
		top: -27px;
		text-align:center;
		-webkit-border-bottom-right-radius: 7px;
		-webkit-border-bottom-left-radius: 7px;
		-moz-border-radius-bottomright: 7px;
		-moz-border-radius-bottomleft: 7px;
		border-bottom-right-radius: 7px;
		border-bottom-left-radius: 7px;
		font-family: 'GandhiSerif' !important;
		font-size:16px !important;
		 height: 40px;
		}
	.btn-regresar-home:hover{
		background: #333;
		  color: #5b5b5b;
		cursor:pointer;
		}
	.txt-elecciones{
		padding: 44px;
		padding-bottom: 38px;
  		padding-top: 28px !important;
		text-align:justify;
		font-family: 'GandhiSerif' !important;
		font-size:16px !important;
		color:#3d3d3d;
		}
		@media screen and (max-width: 619px) {
			.modalDialog > div {
				width:90% !important;
				height: 304px;
				}
			}
		@media screen and (max-width: 480px) {
			.txt-elecciones{
				padding: 34px !important;
  				padding-top: 37px !important;
  				font-size: 15px !important;
				}
			
			}
		@media screen and (max-width: 380px) {
			.txt-elecciones{
				padding: 33px !important;
  				padding-top: 33px !important;
				font-size: 15px !important;
				}
			.modalDialog > div {
			 
			  height: 346px !important;
			}
			.btn-regresar-home{
				height: 46px !important;
				}
			}
		@media screen and (max-width: 374px) {
			.txt-elecciones{
				font-size: 14px !important;
				}
			}
	</style>
<div id="openModal" style="display:block" class="modalDialog">
    <div>
    	<p class="txt-elecciones">Este sitio web ha sido modificado temporalmente para cumplir con lo establecido en los Artículos 41 y 134 de la Constitución Política de los Estados Unidos Mexicanos y en los Artículos 209 y 449 de la Ley General de Instituciones y Procedimientos Electorales, con motivo del desarrollo del Proceso Electoral 2014-2015, comprendido desde el inicio de las campañas electorales y hasta el día siguiente de la jornada electoral.</p>    
    	<h1 class="btn-regresar-home" onclick="location.href='#close'"><a href="#close" title="Close" class="closers">Ir al Sitio Principal</a></h1>
    </div>
</div>
<a id="openModals" href="#openModal"></a>
<script src="http://malsup.github.io/jquery.cycle2.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/dark.css"/>
<script src="<?php bloginfo('template_url'); ?>/js/newsticker.jquery.js"></script>
<script language="javascript" type="text/javascript">
	$(window).load(resize_height);
	$(window).on('resize', resize_height);
	function resize_height() {
		var sidebar = $('.content-sidebar');
		var column = $('.column-left');	
		console.log(column.height());
		if($('body').width() > 767){
			if(column.height() > sidebar.height()){
				sidebar.css({'border-left':'1px solid #c5c5c5'});
				sidebar.css( {'height' : column.height() + 50 } );
			}else{
				sidebar.css({'border-left':'1px solid #c5c5c5'});
				sidebar.css( 'height' , column.height() );
			}
		}else{
			column.css({ 'border-right' : 'none'});
			sidebar.css( {'height' : 'auto' } );	
			column.css( 'height' , 'auto' );
		}
	}
</script>
<?php
	get_template_part( 'content', 'slider-cs' );
?>
<div class="container-fluid">
    <div class="content-notas container-sm">
        <div class="column-left col-sm-8 no-padding width-custom-left">
            <div class="col-sm-5 no-padding pdg-bt-30">
                <?php
                    get_template_part( 'content', 'ultimas-noticias' );
                ?>
            </div>
            <div class="col-sm-7 hidden-less-600 pdg-bt-30">
                <?php
                    get_template_part( 'content', 'noticias-destacadas' );
                ?>
            </div>
        </div>
        <div class="content-sidebar col-sm-4 width-custom-right">
			<?php
                get_sidebar('cs');
            ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="full-resolution">
	<div class="title-more-content">
    	<div class="container-fluid">
            <div class="pull-left center-block-xs title-h3-gob"><h3 class="title-gob-time"><a href="/blog/category/boletin-meteorologico/">ESTADO DEL TIEMPO</a></h3></div>
        </div>
    </div>
	<div class="container-fluid">
		<?php get_template_part( 'content', 'estadotiempo' ); ?>
    </div>
</div>

<?php get_footer(); ?>