<?php
/*
Template Name: Transpa
*/
?>
<?php get_header(); ?>
    <div id="content-list" class="container blog-contenedor">
        
        <div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="back-img"></div>
        <div class="wpfilebase-file-default" onclick="if('undefined' == typeof event.target.href) document.getElementById('wpfb-file-link-%uid%').click();">
  <div class="icon"><a href="%file_url%" target="_blank" title="Download %file_display_name%"><img align="middle" src="%file_icon_url%" alt="%file_display_name%" /></a></div>
  <div class="filetitle">
    <a href="%file_url%" title="Download %file_display_name%" target="_blank" id="wpfb-file-link-%uid%">%file_display_name%</a>
    <!-- IF %file_post_id% AND %post_id% != %file_post_id% --><a href="%file_post_url%" class="postlink">» %'Post'%</a><!-- ENDIF -->
    <br />
    %file_name%<br />
    <!-- IF %file_version% -->%'Version:'% %file_version%<br /><!-- ENDIF -->
  </div>
  <div class="info">
    %file_size%<br />
    %file_hits% %'Downloads'%<br />
    <a href="#" onclick="return wpfilebase_filedetails(%uid%);">%'Details'%</a>
  </div>
  <div class="details" id="wpfilebase-filedetails%uid%" style="display: none;">
  <!-- IF %file_description% --><p>%file_description%</p><!-- ENDIF -->
  <table border="0">
   <!-- IF %file_languages% --><tr><td><strong>%'Languages'%:</strong></td><td>%file_languages%</td></tr><!-- ENDIF -->
   <!-- IF %file_author% --><tr><td><strong>%'Author'%:</strong></td><td>%file_author%</td></tr><!-- ENDIF -->
   <!-- IF %file_platforms% --><tr><td><strong>%'Platforms'%:</strong></td><td>%file_platforms%</td></tr><!-- ENDIF -->
   <!-- IF %file_requirements% --><tr><td><strong>%'Requirements'%:</strong></td><td>%file_requirements%</td></tr><!-- ENDIF -->
   <!-- IF %file_category% --><tr><td><strong>%'Category:'%</strong></td><td>%file_category%</td></tr><!-- ENDIF -->
   <!-- IF %file_license% --><tr><td><strong>%'License'%:</strong></td><td>%file_license%</td></tr><!-- ENDIF -->
   <tr><td><strong>%'Date'%:</strong></td><td>%file_date%</td></tr>
  </table>
  </div>
 <div style="clear: both;"></div>
</div>
        
    </div>
<div class="border-bottom"></div>
<?php get_footer(); ?>