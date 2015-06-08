<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
    <div style="border:1px solid #CCC; padding:10px; margin-top:10px;">  
    <?php $mb->the_field('alinear'); ?>
    <table border="0" style="border:none;">
        <tr>
           <td width="30%" height="50">Marcar para agregar al slider</td>
           <td width="70%">
			   <?php $mb->the_field('check_slider'); ?>
               <input type="checkbox" name="<?php $mb->the_name(); ?>" value="yes"<?php $mb->the_checkbox_state('yes'); ?>/> <br/>
           </td>
        </tr>
    </table>
    </div>
</div>
