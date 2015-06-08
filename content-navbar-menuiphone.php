<div class="separador-menu-redes visible-xs"></div>
<div class="content-search searchHeaderArea new-backs visible-xs">
    <div class="container-fluid">
        <div class="w_search_slider col-md-8 col-lg-8 hidden-less-600">
            <script>
				jQuery(document).ready(function() {
					jQuery(function () {
						
						jQuery('#validarForm').click(function () {
							$.ajaxSetup({cache:false});
								if($("#s").val().length < 1){
									$("#s").focus();								 
									return false;
									}else{
										return true;
										}
								});
					});
				
				});
				</script>
                <form role="search" method="get" class="search-form" autocomplete="off" action="http://gevvershare.veracruz.gob.mx/">
                    <div class="input-group">
                      <input type="text" class="form-control" value="" name="s" id="s" placeholder="¿Que estás buscando?">
                          <span class="input-group-btn">
                        <button class="btn btn-default " id="validarForm" type="submit" onclick="validar()"><span class="glyphicon glyphicon-search"></span></button>
                      </span>
                    </div>
                </form>        
        </div>
        <div class="col-md-4">
            <div class="social-networks-sld">
                <ul>
                    <li class="sp-fb-png social-stylus-2"></li>
                    <li class="sp-tw-png social-stylus-2"></li>
                    <li class="sp-yt-png social-stylus-2"></li>
                    <li class="sp-pt-png social-stylus-2"></li>
                    <li class="sp-pl-png social-stylus-2"></li>
                    <li class="sp-if-png social-stylus-2"></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="title-page-footer visible-xs">
    <p>WWW.VERACRUZ.GOB.MX</p>
</div>