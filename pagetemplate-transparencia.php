<?php
/*
Template Name: Transparencia page
*/
?>
<?php get_header(); ?>
<script language="javascript" type="text/javascript">
function doclick(linkea){
    if(linkea == "http://www.veracruz.gob.mx/transparencia-comunicacion-social/"){
        window.open(linkea, "_self");
    }else{
        window.open(linkea);
    }
}
function init_functions(){
    if($( window ).width() > 768){
        //console.log('el width mayor 768');
        var alto_left = $('#left_side_trans').height();
        var alto_right = $('#right_side_trans').height();
        console.log('Alto left ' + alto_left + ' alto right ' + alto_right);
        if(alto_left > alto_right){
            $('#right_side_trans').css('height', alto_left+'px');
            $('#left_side_trans').css('height', alto_left+'px');
            console.log('Ajuste de la derecha al tamaño de la izquierda ');
        }else{
             if(alto_right > alto_left){
                $('#left_side_trans').css('height', alto_right+'px');
                $('#right_side_trans').css('height', alto_right+'px');
                  console.log('Ajuste de la izquierda al tamaño de la derecha');
             }
        }
    }
}
$(document).on( "ready", init_functions );
</script>
<link href="<?php bloginfo('template_url') ?>/css/transparencia.css" rel="stylesheet">
<?php get_template_part( 'content', 'search' ); ?>
<div class="content-card-transparencia">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div id="left_side_trans" class="gray-black hidden-less-768">
        <div class="lefside-trans-dependencias">
            <img src="<?php bloginfo('template_url') ?>/images/escudo_veracruz.png" class=""/>
        </div>
    </div><!--FIN lefside-trans-->
    <div id="right_side_trans" class="gray-white ">
        <div class="rightside-trans-dependencias">
            <div class='content_transparencia'>
                <h2><?php echo get_the_title(); ?> por Dependencias</h2>
                <p>
                    <?php the_content(); ?>
                </p>
             </div>
        </div>
    </div><!--FIN rightside-trans-->
    <?php endwhile; endif; ?>
</div><!--FIN content-card-transparencia-->
<div class="container-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12 listado-categorias-comunicados sin-padding">
         <table class='table-dependencias' align='center'>
            <?php
                $category_id = get_cat_ID('Dependencias');
                $args = array(
                  'show_option_all'    => '',
                  'order' => 'DESC',
                  'hide_empty'         => 0,
                  'hierarchical'       => 1,
                  'parent' => $category_id
                );
                $categories = get_categories( $args );
                foreach ( $categories as $category ):
                    $url_cat=get_tax_meta($category->term_id,'ba_text_field_id');
                    $obtineNombre= $category->name;
                    if($obtineNombre=="CGCS"){
                        $url_cat="http://www.veracruz.gob.mx/transparencia-comunicacion-social/";
                    }
            ?>
                <div class="categorias-hover">
                    <tr class="categorias-hover-tr <?php echo $category->name; ?>" onclick="doclick('<?php echo $url_cat; ?>')">
                        <td class="flecha-verde">&nbsp;</td>
                        <td class="link-hover name-dependencia">
                            <span class="flecha-mobile hidden-more-600"></span>
                            <?php echo $category->name; ?>
                        </td>
                        <td class="hidden-less-600 txt-dependencias"><p class="descrip_depe"><?php echo $category->description; ?><p/></td>
                    </tr>
                </div>
            <?php
                endforeach;              
            ?>
        </table>
    </div><!--FIN listado-categorias-comunicados-->
</div>
<?php get_footer(); ?>