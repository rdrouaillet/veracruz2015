<?php get_header(); ?>
<script src="http://malsup.github.io/jquery.cycle2.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/dark.css"/>
<script src="<?php bloginfo('template_url'); ?>/js/newsticker.jquery.js"></script>
<script language="javascript" type="text/javascript">
	$(window).load(resize_height);
	$(window).on('resize', resize_height);
	function resize_height() {
		var sidebar = $('.content-sidebar');
		var column = $('.column-left');	
		console.log(column.height());
		if($('body').width() > 767){
			if(column.height() > sidebar.height()){
				sidebar.css({'border-left':'1px solid #c5c5c5'});
				sidebar.css( {'height' : column.height() + 50 } );
			}else{
				sidebar.css({'border-left':'1px solid #c5c5c5'});
				sidebar.css( 'height' , column.height() );
			}
		}else{
			column.css({ 'border-right' : 'none'});
			sidebar.css( {'height' : 'auto' } );	
			column.css( 'height' , 'auto' );
		}
	}
</script>
<?php
	get_template_part( 'content', 'slider-cs' );
?>
<div class="container-fluid">
    <div class="content-notas container-sm">
        <div class="column-left col-sm-8 no-padding width-custom-left">
            <div class="col-sm-5 no-padding pdg-bt-30">
                <?php
                    get_template_part( 'content', 'ultimas-noticias' );
                ?>
            </div>
            <div class="col-sm-7 hidden-less-600 pdg-bt-30">
                <?php
                    get_template_part( 'content', 'noticias-destacadas' );
                ?>
            </div>
        </div>
        <div class="content-sidebar col-sm-4 width-custom-right">
			<?php
                get_sidebar('cs');
            ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="full-resolution">
	<div class="title-more-content">
    	<div class="container-fluid">
            <div class="pull-left center-block-xs title-h3-gob"><h3 class="title-gob-time"><a href="/blog/category/boletin-meteorologico/">ESTADO DEL TIEMPO</a></h3></div>
        </div>
    </div>
	<div class="container-fluid">
		<?php get_template_part( 'content', 'estadotiempo' ); ?>
    </div>
</div>

<?php get_footer(); ?>