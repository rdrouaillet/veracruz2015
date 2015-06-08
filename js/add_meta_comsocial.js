jQuery(document).ready(function(e) {
	
	if(jQuery('.folio').is(':checked')){
		jQuery(".input_comunicado").show();
	}else{
		jQuery(".hidden_comunicado").val('');
	}
	
	jQuery("input:radio").change(function(){
		var val_radio = jQuery(this).val();
		jQuery(".input_comunicado").hide();
		if(val_radio == 'fotonota'){
			jQuery(".input_comunicado").val('fotonota');
		}else{
			var num_comunicado = jQuery(".hidden_comunicado").val();
			jQuery(".input_comunicado").val(num_comunicado);
			jQuery(".input_comunicado").show();
		}
	});  
});
