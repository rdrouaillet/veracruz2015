<?php 
  //require get_stylesheet_directory().'/lib/tmhOAuth.php';
  //require get_stylesheet_directory().'/lib/tmhUtilities.php'; 
?>
<script type="text/javascript">
    (function($){
      $(document).ready(function() {                                      
      $('#tweet-marquee').newsticker( {
              'style'         : 'scroll',
              'tickerTitle'   : '@SaladePrensaVer:',
              'sortBy'        : 'timestamp',
              'reverseOrder'  : true,
              'scrollSpeed'   : 20,        
              'autoStart'     : true,
              'slideSpeed'    : 1000,
              'slideEasing'   : 'swing',
              'showControls'  : true
        });
        $('a.marquee-icon-comsocial').on("mouseenter",function() { 
            $('.newsticker_title h4').css('color','#686867');
        });
        $('a.marquee-icon-comsocial').on("mouseleave",function() { 
            $('.newsticker_title h4').css('color','#686867');
        });
            if ($('.content-marquee').length) {
                  $('.searchHeaderArea').css('border-top:','none');
            }
        })
    })(jQuery);    
</script>
<script type="text/javascript">
	<!--
	function popup(url){
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=no';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {newwin.focus()}
		 return false;
	}
	// -->
</script>
<div class="content-marquee hidden-less-600">
   <a class="marquee-icon-comsocial" href="javascript: void(0)" 
   onclick="popup('https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fwww.veracruz.gob.mx%2Fsala-de-prensa-2%2F&screen_name=SaladePrensaVer&tw_p=followbutton&variant=2.0')" title="Seguir a @SaladePrensaVer en Twitter"></a>
    <ul id="tweet-marquee">
        <?php if(function_exists('get_tweet')) { get_tweet('SaladePrensaVer'); } ?>
    </ul>
</div>