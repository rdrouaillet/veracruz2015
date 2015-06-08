		<script type="text/javascript">
			$(document).ready(function(){
				$('#footer-content .menu').each(function(index, element) {
					$(this).children('li').find('.current-menu-item').parent('.sub-menu').siblings('a').parent().addClass('hola');		
					//console.log(selector);
				});
                
            });
		</script>
        <footer>
            <div id="footer-content" class="hidden-less-600 bg-gray-2d2d2d">
                <div class="container-fluid">
                    <div class="content-logo-menu">
                      <div class="content-footer-menu col-md-10 col-md-offset-2">
                           <?php
                                wp_nav_menu(array('menu'=>'Top menu',
                                'container'=>'div',
                                'container-class'=>'principal-footer'));
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="social-networks">
                    	<ul>
                        	<li class="sp-fb-svg social-stylus"><a target="_blank" href="https://es-es.facebook.com/GobiernodeVeracruz"></a></li>
                            <li class="sp-tw-svg social-stylus"><a target="_blank" href="https://twitter.com/GobiernoVer"></a></li>
                            <li class="sp-yt-svg social-stylus"><a target="_blank" href="http://www.youtube.com/gobiernoveracruz"></a></li>
                            <li class="sp-pt-svg social-stylus"><a target="_blank" href="http://www.pinterest.com/estadoveracruz/"></a></li>
                            <li class="sp-pl-svg social-stylus"><a target="_blank" href="https://plus.google.com/100491062934580833963/posts"></a></li>
                            <li class="sp-if-svg social-stylus"></li>
                        </ul>
                    </div>
                </div>
            </div><!-- #footer-content -->
            <div class="clearfix"></div>
            <div class="containet-logos-footer hidden-more-600"></div>
            <div class="title-page-footer">
                <p>WWW.VERACRUZ.GOB.MX</p>
            </div>
            <div class="container-fluid">
                <div class="content-copyright">
                    <p>Palacio de Gobierno. Av. Enríquez s/n. Col. Centro C.P. 91000, Xalapa, Veracruz, México.
                        Tel. (228) 841-7400. <br class="hidden-more-360" />Algunos derechos reservados © 2013 </p>
                </div>
            </div>
        </footer><!-- footer -->
        <?php
            wp_footer();
        ?>
    </body>
</html>