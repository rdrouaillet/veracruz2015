<script>
jQuery(document).ready(function() {
	jQuery(function () {
		
		jQuery('#validarForm').click(function () {
			$.ajaxSetup({cache:false});
				var cecar = $.isNumeric( $("#s").val() );
				if(($("#s").val().length < 1) || (cecar === false)){
					$("#s").focus();								 
					return false;
					}else{
						return true;
						}
				});
	});

});
</script>
<form role="search" method="get" class="search-form" autocomplete="off" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
      <input type="text" class="form-control"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6" value="" name="s" id="s" placeholder="Encuentra tu comunicado">
	  <?php 
    	//$category_id = get_cat_ID('Dependencias');
	  ?>
    <input type="hidden" value="c" name="t" id="t">
      <span class="input-group-btn">
        <button class="btn btn-default ajuste-padding-t-b" id="validarForm" type="submit" onClick="validar()"><img class="lupita" src="<?php echo get_bloginfo( 'template_url' ).'/images/lupa.png'; ?>" border=0 /></button>
      </span>
    </div>
</form>