<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title>
        <?php
            wp_title( '|', true, 'right' ); bloginfo('name'); bloginfo('description');
        ?>
    </title>
    <meta charset="UTF-8">
    <meta content="<?php bloginfo( 'html_type' ) ?>; charset=<?php bloginfo( 'charset' ) ?>" http-equiv="Content-Type" />
    <meta name="description" content="Portal Oficial del Gobierno del Estado de Veracruz">
    <meta name="keywords" content="veraruz, gobierno, javier duarte, adelante, desarrollo, progreso">
    <meta name="author" content="Departamento de Servicios Electrónicos Multicanal - Gobierno Electrónico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    
    <!-- Apple -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    <!-- FB / 560x560 -->
    <meta property="og:title" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="" />
    <meta property="fb:admins" content="100000759628852" />
    
    <!-- Twitter / 560x300 -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    
	<?php wp_head(); ?>	
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
 	<link href="<?php bloginfo('template_url') ?>/css/ekko-lightbox.min.css" rel="stylesheet">
    
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/site-gallery.js"></script>
<script src="<?php bloginfo('template_url')?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url')?>/picturefill-master/picturefill.js"></script>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
<script type="text/javascript">
	function show_url_social(url){
		$('#social').attr('addthis:url', url);	
	}
</script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jRespond.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ekko-lightbox.min.js"></script>

<script type="text/javascript">
	var jRes = jRespond([
		{
			label: 'less_767',
			enter: 0,
			exit: 767
		}
	]);
	jRes.addFunc({
		breakpoint: 'less_767',
		enter: function() {
			$(document).ready(function(){
				$(document).on('click touchstart', '.button_link', function(event){
					event.preventDefault();
					var tamdiv = $('#overlayiphone').height();
					if(tamdiv==0){
						$('#overlayiphone').css("height", $(document).height());
						}
					if(tamdiv>0){
							$('#overlayiphone').css("height","0px");
							}
				});
				$(document).on('mouseover','.navbar-nav  > li ', function() {
					if($(this).find(".sub-menu").length){
						if (!$(this).hasClass("active-sub")){
							$(".active-sub").removeClass("active-sub");
							$(this).addClass("active-sub");
						}
					}
				}).mouseout(function() {
					$(".active-sub").removeClass("active-sub");
				});
				
				$(document).on('click','.menu-item-has-children', function(event){
					event.preventDefault();
					$(".navbar-ver").addClass('sub-menu-responsive');
					var origin = $("li.active-sub > a").html();
					var content_submenu = $("li.active-sub .sub-menu").html();
					var content_submenu = "<div class='link_submenu'><a class='prev_link'></a>"+origin+"</div>" + content_submenu;
					$( ".navbar-ver" ).html(content_submenu);
					//$('.navbar-ver > a').appendTo('.link_submenu');
				});
				
				$(document).on('click', '.link_submenu', function(event){
					event.stopPropagation();
					event.preventDefault();
					console.log('hello');
					get_ajax_wpmenu();
				});
			});
			
			$(document).on('touchstart click', '.button_link', function(event){
				event.preventDefault();
				$('#navmenu').toggle("slow");
			});
			
			$(document).on('click', '#navmenu .content_logo', function(){
				$('#navmenu').toggle('slow');
			});
		},
		exit: function() {
			console.log('<<< hasta aqui >>>');
		}
	});
</script>

<script type="text/javascript">
	function get_ajax_wpmenu(){
		$.ajax({
				type        : "POST",
				url         : "<?php echo get_bloginfo('url') ?>/wp-admin/admin-ajax.php",
				data        : {
					action    : 'get_ajax_wpmenu',
					menu_name : 'veracruz'
				},
				success     : function( data, textStatus, XMLHttpRequest ) {
					$('#navmenu').html(data);
				},
				error: function(data){
					console.log(data.statusText);
				}
		});
	}
	$(document).ready(function() {
		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		});     
    });
</script>
<link href="<?php bloginfo('template_url') ?>/css/style-rediseno-ver.css" rel="stylesheet">
<link href="<?php bloginfo('template_url') ?>/css/style.css" rel="stylesheet">
</head>
<?php 
	if(!is_child_theme()){
		if(is_page('sala-de-prensa') || is_page('radio') || is_page('fotonotas') || is_category() || is_single()){
			require get_stylesheet_directory().'/lib/tmhOAuth.php';
			require get_stylesheet_directory().'/lib/tmhUtilities.php'; 
		}
	}
?>
<body <?php body_class(); ?>>
    <div class="cover"></div>
    <div class="overlayiphone" id="overlayiphone"></div>
    <header id="header" role="banner">
        <h1 class="hidden-xs" style="padding:0; margin:0;">
            <div class="logo">
                <a href="<?php print home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" style="margin:15px 0; display:block;">
                    <img src="<?php bloginfo('template_url') ?>/images/rediseno-ver/logo-veracruz.png" border="0"  alt="Gobierno del Estado de Veracruz" />
                </a>
            </div>
        </h1>
        <div class="bg-menu-linea">
            <div class="container-fluid">
                <a class="button_link">
                   	<img class="visible-xs" width="33px" height="27px" alt="<?php bloginfo( 'name' ); ?>" src="<?php bloginfo('template_url') ?>/images/boton_menu-ress.png"/>
                </a>
                <div class="visible-xs">
                    <a class="logo-xs" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                   		<img alt="<?php bloginfo( 'name' ); ?>" src="<?php bloginfo('template_url') ?>/images/rediseno-ver/logo-veracruz.png"/>
                    </a>
                </div>
                <div id="mainMenu" class="navbar navbar-inverse col-md-12 col-lg-12" role="navigation">
                    <nav id="navmenu" class="collapse navbar-collapse navbar-ex1-collapse">
                        
                        <div class="buscador_menu visible-xs">
                            <?php get_search_form(); ?>
                        </div>
                        <?php
                            wp_nav_menu(array('menu'=>'Top menu',
                                            'container'=>'',
                                            'items_wrap' => '<ul class="nav navbar-nav navbar-ver bck-logo-menu">%3$s</ul>',
                                            ));
                        ?>
                        <?php
							get_template_part( 'content', 'navbar-menuiphone' );
						?>
                    </nav>
                </div>
            </div>
        </div>
    </header>