// JavaScript Document
var Custom_meta = {
	//main function
	init : function(){
		Custom_meta.addMoreField();
	},
	addMedia: function(click_media){
		var button = jQuery("#"+click_media);
		var send_attachment = wp.media.editor.send.attachment;
		wp.media.editor.send.attachment = function(props, attachment){
			button.html("<img src='"+attachment.url+"' width='100%'>");
			jQuery("input[name*='"+click_media+"']").val(attachment.url);
			
			if(attachment.url != ''){
				jQuery( '.remove-p-'+click_media).css('display', 'block');
			}else{
				jQuery( '.remove-p-'+click_media).css('display', 'none');
			}
			
			wp.media.editor.send.attachment = send_attachment;
		}
		wp.media.editor.open(button);
		return false;
		return this;
	},
	removeMedia: function(click_media){
		var button = jQuery("#"+click_media);
		jQuery(document).on('click', '#remove-'+click_media , function(event) {
			event.preventDefault();
			jQuery( "input[name*='"+click_media+"']" ).val('');
			button.html("Asignar imagen destacada");
			jQuery( '.remove-p-'+click_media).css('display', 'none');
		});
		return this;
	},
	addMoreField: function(){
		var addmoreitem = jQuery(document);
		var deleteitem =  jQuery(document);
		var uploadButton =  jQuery(document);
		
		uploadButton.on('click','.btn-upload', function(){
			var button = jQuery(this);
			var index = jQuery(this).data('index');

			var send_attachment = wp.media.editor.send.attachment;
			wp.media.editor.send.attachment = function(props, attachment){
				jQuery( '#data_file_'+ index ).val(attachment.url);
				wp.media.editor.send.attachment = send_attachment;
			}
			wp.media.editor.open(button);
			return false;	
		});
		
		addmoreitem.on('click', '.btn-add-more', function(){
			var num_sliders = jQuery("#content-form .item-form-gobierno").length;
			jQuery("#add-more").remove();
			var form_slider =   "<div class='item-form-gobierno'>";
					form_slider +=	"<div class='col-10'>";
					form_slider +=		"<div class='form-group'>";
					form_slider +=			"<label for='title' class='col-2 control-label'>Titúlo</label>";
					form_slider +=			"<div class='col-8'>";
					form_slider +=				"<input type='text' name='item_title[]' id='item_title_"+num_sliders+"' class='regular-text' />";
					form_slider +=			"</div>";
					form_slider +=			"<div class='clearfix'></div>";
					form_slider +=		"</div>";
					form_slider +=		"<div class='form-group'>";
					form_slider +=			"<label for='content' class='col-2 control-label'>Descripción</label>";
					form_slider +=			"<div class='col-8'>";
					form_slider +=				"<textarea name='item_desc[]' id='item_desc_"+num_sliders+"' class='regular-text' />";
					form_slider +=				"</textarea>";
					form_slider +=			"</div>";
					form_slider +=			"<div class='clearfix'></div>";
					form_slider +=		"</div>";
					form_slider +=		"<div class='form-group'>";
					form_slider +=			"<label for='content' class='col-2 control-label'>Imagen</label>";
					form_slider +=			"<div class='col-8'>";
					form_slider +=				"<div class='col-8 sin-padding'>";
					form_slider +=					"<input type='text' class='form-upload input-sm' id='data_file_"+num_sliders+"' name='data_file[]' placeholder='Archivo de Lineamiento (PDF, DOC o JPG)'>";
					form_slider +=				"</div>"
					form_slider +=				"<div class='col-2 sin-padding'>";
					form_slider +=					"<input type='button' class='button-primary form-btn-upload btn-upload btn-style' value='Subir' id='uploadimage"+num_sliders+"' data-index='"+num_sliders+"'/>";
					form_slider +=				"</div>";
					form_slider +=			"</div>";
					form_slider +=		"</div>";
					form_slider +=		"<div class='clearfix'></div>";
					form_slider +=	"</div>";
					form_slider +=	"<div class='clearfix'></div>";
				form_slider +=  "</div>";
				form_slider += "<input type='button' id='add-more' class='btn-add-more' value='Agregar más'>";
				jQuery("#content-form").append(form_slider);
		});
		deleteitem.on('click', '.delete-item' ,function() { 
			jQuery(this).parent().remove();
		});
		return this;
	}
} 
jQuery( document ).ready( Custom_meta.init );
