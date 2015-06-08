<?php
	$dependencia = get_post_meta($post->ID, 'nombre-dependencia', true);
	$siglas_dependencia= get_post_meta($post->ID, 'siglas-dependencia', true);
	$link_dependencia = get_post_meta($post->ID, 'link-dependencia', true);
	$url_twitter= get_post_meta($post->ID, 'url-twitter', true);
	$url_facebook = get_post_meta($post->ID, 'url-facebook', true);
	$logo_dependencia = get_post_meta($post->ID, 'logo-dependencia', true);
?>
<div class="item-form">
	<div class="col-7">
        <div class="form-group">
            <label for="nombre-dependencia" class="col-3 control-label">Nombre dependencia</label>
            <div class="col-7">
                <input type="text" name="nombre-dependencia" id="nombre-dependencia" value="<?php echo $dependencia; ?>" class="regular-text" /><br>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="siglas-dependencia" class="col-3 control-label">Siglas</label>
            <div class="col-7">
                <input type="text" name="siglas-dependencia" id="siglas-dependencia" value="<?php echo $siglas_dependencia; ?>" class="regular-text" /><br>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="link-dependencia" class="col-3 control-label">Link dependencia</label>
            <div class="col-7">
                <input type="text" name="link-dependencia" id="link-dependencia" value="<?php echo $link_dependencia; ?>" class="regular-text" /><br>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="url-twitter" class="col-3 control-label">Url Twitter</label>
            <div class="col-7">
                <input type="text" name="url_twitter" id="url_twitter" value="<?php echo $url_twitter; ?>" class="regular-text" /><br>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="url-facebook" class="col-3 control-label">Url Facebook</label>
            <div class="col-7">
                <input type="text" name="url_facebook" id="url_facebook" value="<?php echo $url_facebook; ?>" class="regular-text" /><br>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-3">
		<?php if(isset($logo_dependencia) && !empty($logo_dependencia)){ ?>
            <a title="Asignar logo secretaria" id="logo_secretaria" onclick="Custom_meta.addMedia('logo_secretaria')">
                <img src='<?php echo $logo_dependencia; ?>' width='100%'>
            </a>
        <?php }else{ ?>
            <a title="Asignar logo secretaria" id="logo_secretaria" onclick="Custom_meta.addMedia('logo_secretaria')">Asignar logo secretaria</a>
        <?php } ?>
        <p class="remove-p-logo_secretaria" <?php echo (isset($logo_dependencia) && !empty($logo_dependencia)) ? " " : "style=display:none;"; ?>>
            <a href="#" id="remove-logo_secretaria" onclick="Custom_meta.removeMedia('logo_secretaria')">Quitar logo</a>
        </p>
        <input type="hidden" name="logo_secretaria" value="<?php echo $logo_dependencia; ?>">
    </div>
    <div class="clearfix"></div>
</div>