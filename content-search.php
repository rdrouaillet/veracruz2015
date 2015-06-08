<div class="clearfix"></div>
<div id='up' class="content-search searchHeaderArea hidden-xs <?php echo (is_category('multimedia')) ? '': 'pdg-cm-search'; ?>">
	<div class="borde-gray2-top <?php echo (is_category('multimedia')) ? 'hide': ''; ?>"></div>
	<div class="container-fluid">
        <div class="w_search_slider col-md-8 col-lg-8 hidden-xs">
            <?php get_search_form(); ?>
        </div>
        <div class="col-md-4 hidden-xs">
            <div class="social-networks-sld">
                <ul>
                    <li class="sp-fb-png social-stylus-2"><a target="_blank" href="https://es-es.facebook.com/GobiernodeVeracruz"></a></li>
                    <li class="sp-tw-png social-stylus-2"><a target="_blank" href="https://twitter.com/GobiernoVer"></a></li>
                    <li class="sp-yt-png social-stylus-2"><a target="_blank" href="http://www.youtube.com/gobiernoveracruz"></a></li>
                    <li class="sp-pt-png social-stylus-2"><a target="_blank" href="http://www.pinterest.com/estadoveracruz/"></a></li>
                    <li class="sp-pl-png social-stylus-2"><a target="_blank" href="https://plus.google.com/100491062934580833963/posts"></a></li>
                    <li class="sp-if-png social-stylus-2"></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php 
$categories = get_the_category();
$separator = ' ';
$output = '';
if($categories){
    foreach($categories as $category) {
        if( ($category->slug == 'videos') || ($category->slug == 'fotos') || ($category->slug == 'infografias')){
            $flag = 'ok';
        }
    }
}
?>
<script type='text/javascript'>
$(function(){ 
    var flag = '<?php echo $flag; ?>';
    if(flag == 'ok'){
        $('input#s').attr('placeholder','Buscar contenido Multimedia'); 
    }
});
</script>