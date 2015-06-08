<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!-- Activate responsiveness in the "child" page -->
<script src="<?php bloginfo('template_url') ?>/js/jquery.min-1.7.1.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.responsiveiframe.js"></script>
<!--
<script>
  var ri = responsiveIframe();
  ri.allowResponsiveEmbedding();
</script>
<script>
      $(function(){
        $('#myIframeID').responsiveIframe({ xdomain: '*'});
      });        
</script>-->
<script>
	$( window ).scroll(function() {
		var ScrollTop = $(window).scrollTop();
		console.log( ScrollTop );
		if( ScrollTop !=0 ){
			$( "#logo-informe" ).animate({
				height: "0px",
				opacity: 0.4,
			}, 1500 );
			$(".logo-after-content").fadeIn( "slow" );
			$(".slogan-content").fadeIn( "slow" );
			//return false;
		}else{
			$( "#logo-informe" ).css({"height" : "188px" , "opacity" : "1.0" });
			$(".logo-after-content").fadeOut( "slow" );
			$(".slogan-content").fadeOut( "slow" );
			//return false;
		}
	});
</script>
<body>
    <div id="wrapper-informe">
        <div class="content-iframe principalContent blog-contenedor otroFOndo-dos tamano-header" style="height: 707px !important;">
               <div class="content-logos">
                    <div class="logo-content container">
                        <div class="content-envivo">
                            <span class="img img-responsive escondigo-img-dos">
                               <img class="img img-responsive" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/enVivo.png"> 
                            </span>
                             <div class="escondigo-img">
                                 <span class="img img-responsive">
                                   <img class="img img-responsive" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/enVivo-dos.png"> 
                                </span>
                             </div>
                            </span>
                         </div>
                    </div>
               </div>
      	<div class="bg-shadow container"></div>
        <!--401px ancho-->
        <p class="titulo-mensaje" style="font-size:23px !important; width:500px !important; margin: 20px auto !important;"><!-- width: 500 !important; -->
               <!--<strong>Entrega del Libramiento de Coatepec</strong> por el Presidente Enrique Peña Nieto 
               <strong>Entrega del Tramo Final del nuevo Corredor México-Tuxpan</strong>
                -->
                
               Estás viendo la <strong>Conferencia de Prensa</strong> del <i>Gobernador Javier Duarte de Ochoa</i>
        		<!--
               <strong> Sesión de la Comisión Interinstitucional </strong> para los XXII Juegos Deportivos Centroamericanos y del Caribe, Veracruz 2014
        		-->
        </p>
        <!--<div class="content-normativaRegistro otraImagen">&nbsp;</div>-->
            
                <div class="area-iframe" style="height:500px !important;">
                    <div class="iframe tamano-iframe-video" style="height:490px !important;">
                    
                       <iframe id="myIframeID" class="item-evento" src="http://www.rtv.org.mx/stream.html" width="100%" height="100%" frameborder="0" scrolling="no" style="padding:0px !important; padding-right:7px !important; padding-bottom:7px !important;"> </iframe>
                    <!--
                    <object type="application/x-shockwave-flash" data="http://conceptoweb-studio.com/radio/video/player59/player.swf" width="100%" height="100%" bgcolor="#000000" id="mediaplayer" name="mediaplayer" tabindex="0"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="seamlesstabbing" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="netstreambasepath=http%3A%2F%2Fconceptoweb-studio.com%2Fradio%2Fvideo%2Frtv%2Fminisitio%2Ftvstream.html&amp;id=mediaplayer&amp;provider=rtmp&amp;streamer=rtmp%3A%2F%2F50.7.98.234%2Frtv&amp;plugins=fbit-1h%2Ctweetit-1h&amp;autostart=true&amp;file=videortv&amp;skin=http%3A%2F%2Fconceptoweb-studio.com%2Fradio%2Freproductores%2Fbekle.zip&amp;fbit.pluginmode=FLASH&amp;tweetit.pluginmode=FLASH&amp;controlbar.position=over"></object>
                    -->
                    </div>
                </div> 
           
            <p class="titulo-streaming">Comparte el <i>streaming</i> por:</p>
             <div class="share" style="background:none !important;">
            	<ul id="menu-redes-sociales-menu-1" class="menu">
                	<li class="iconFacebook sprite-facebook-big menu-item menu-item-type-custom menu-item-object-custom menu-item-27059">
                        <a target="_blank" href="http://www.facebook.com/sharer.php?app_id=245018795648789&sdk=joey&u=http%3A%2F%2Fveracruz.gob.mx%2Fvivir.html%23seguridad">
                            <span>facebook</span>
                        </a>
                	</li>
                	<li class="iconTwitter sprite-twitter-big menu-item menu-item-type-custom menu-item-object-custom menu-item-27060">
                        <a href="http://twitter.com/home?status=<?php echo urlencode("#Siguenos en vivo en la conferencia de prensa del Gobernador de Javier Duarte de Ochoa en http://www.veracruz.gob.mx");?>" title="Comp&aacute;rtelo en Twitter" class="wptwitter" target="_blank">
                            <span>twitter</span>
                        </a>
                	</li>
            	</ul>
        	</div>     
    </div>
    <div class="container esconder-less-992" style="top:-350px; position:relative; z-index:0;">
     <div class="pull-left">
           <span class="img img-responsive">
                  <img class="img img-responsive" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/logoVer.png"> 		</span>
      </div>


 <div class="pull-right">
                    <span class="img img-responsive">
                           <img class="img img-responsive" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/logoVer.png"> 
                        </span>
                </div>
       </div>
       <div class="clear-fix"></div>
    	<p class="footer-envivo" style="font-family: GandhiSerif !important;">W W W . V E R A C R U Z . G O B . M X</p>
        <div class="hidden-more-992">
        <span class="img img-responsive">
                  <img class="img img-responsive" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/logoVer.png"> 		
                  
          </span>
          </div>
        <div class="blog-contenedor" style="height: 12px">
            <center>
                <a href="/pagina_principal/" style="text-decoration:none; z-index:100; top:3px;" class="button-informe">IR AL SITIO</a>
                
            </center>
        </div>
        <div class="clear-fix"></div>
        <div class="content-iframe principalContent blog-contenedor otroFOndo" style="background-repeat: repeat-x;">
            &nbsp;
        </div>
  
</body>