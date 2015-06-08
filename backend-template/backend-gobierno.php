<?php 
	$item_title = get_post_meta($post->ID, 'item_title', true);
	$item_desc  = get_post_meta($post->ID, 'item_desc', true);
	$item_url   = get_post_meta($post->ID, 'item_url', true);
	$data_file = get_post_meta($post->ID, 'data_file', true);
?>
<div id="content-form">

<?php 
	$count_title = count($item_title);
	for($i=0; $i < $count_title; $i++){
?>  
    <div class="item-form-gobierno">
        <div class="col-10">
            <div class="form-group">
                <label for="title" class="col-2 control-label">Titúlo</label>
                <div class="col-8">
                    <input type="text" name="item_title[]" id="item_title_<?php echo $i; ?>" value="<?php echo esc_html($item_title[$i]); ?>">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label for="content" class="col-2 control-label">Url</label>
                <div class="col-8">
                    <input type="text" name="item_url[]" id="item_url_<?php echo $i; ?>" class="regular-text" value="<?php echo esc_url($item_url[$i]); ?>"/> 
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label for="content" class="col-2 control-label">Descripción</label>
                <div class="col-8">
                    <textarea name="item_desc[]" id="item_desc_<?php echo $i; ?>" class="regular-text" />
                        <?php echo $item_desc[$i]; ?>
                    </textarea>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
            	<label for="content" class="col-2 control-label">Imagen</label>
                <div class="col-8">
                    <div class="col-8 sin-padding">
                    	<input type="text" class="form-upload input-sm" id="data_file_<?php echo $i; ?>" name="data_file[]" placeholder="Archivo de Lineamiento (PDF, DOC o JPG)" value="<?php echo esc_url($data_file[$i]); ?>">
                    </div>
                    <div class="col-2 sin-padding">
                    	<input type='button' class="button-primary form-btn-upload btn-upload btn-style" value="Subir" id="uploadimage<?php echo $i; ?>" data-index="<?php echo $i; ?>"/>
            		</div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
<?php } ?>
<input type="button" id="add-more" class="btn-add-more" value="Agregar más">
</div>
