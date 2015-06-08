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
<form role="search" method="get" class="search-form" autocomplete="off" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
      <!-- <input type="text" class="form-control" value="c" name="t" id="t" placeholder="¿Qué comunicado estás buscando?">  -->
      <input type="text" class="form-control" value="" name="s" id="s" placeholder="¿Qué estás buscando?">
    <?php 
		$categoriaMultimedia = get_category_by_slug('multimedia');//obtener datos de multimedia - validar slug
		$categoriaMultimedia = $categoriaMultimedia->term_id;//obtener id de multimedia
		if(is_category('multimedia')){
	?>
    <input type="hidden" value="<?php echo $categoriaMultimedia; ?>" name="cat">
    <?php } ?>
      <span class="input-group-btn">
        <button class="btn btn-default " id="validarForm" type="submit" onClick="validar()"><img class="lupita" src="<?php echo get_bloginfo( 'template_url' ).'/images/lupa.png'; ?>" border=0 /></button><!-- <span class="glyphicon glyphicon-search"></span> -->
      </span>
    </div>
</form>