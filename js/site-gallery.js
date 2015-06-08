$( document ).ready( function() {
	// call jRespond and add breakpoints
	var jRes = jRespond([
		{
			label: 'less_600',
			enter: 0,
			exit: 599
		}
	]);
	jRes.addFunc({
		breakpoint: 'less_600',
		enter: function() {
			$(document).on('ready', function() {
			  $( "a.responsive-gallery").unbind( "click" );
			  $( "a.responsive-gallery").attr( "target","_blank");
			  //$(".item a").removeAttr("href");
              //$('.over-nota').removeClass('overlay-nota');
			  $('.overlay-nota').remove();
			  $('.overlay-fotodia').remove();
              $('.overlay-fotonota').remove();
			  $('.overlay-comsocial').remove();
			  $('.overlay-foto').remove();
			  $('.overlay-gallery-nota').remove();
			  $('.overlay-infografia').remove();
			});
			
		},
		exit: function() {
			console.log('<<< hasta aqui >>>');
		}
	});
	
	var jRes = jRespond([
		{
			label: 'less_600',
			enter: 0,
			exit: 599
		}
	]);
	
	jRes.addFunc({
		breakpoint: 'less_600',
		enter: function() {
			$(document).on('ready', function() {
			  $(".infography-link").unbind( "click");
			  //$(".overlay-responsive a").removeAttr("href");
			  $('.over-infografia').removeClass('infography-link');
			  //$('.over-nota').unbind('mouseenter mouseleave');
			});
			
		},
		exit: function() {
			console.log('<<< hasta aqui >>>');
		}
	});
	
});

function less_600_remove(){
	// call jRespond and add breakpoints
	var jRes = jRespond([
		{
			label: 'less_600',
			enter: 0,
			exit: 599
		}
	]);
	jRes.addFunc({
		breakpoint: 'less_600',
		enter: function() {
			
			  $(".overlay-nota").remove();
			  $(".overlay-foto").remove();
			  $(".overlay-infografia").remove();
			  $(".infography-link").unbind( "click");
			  $(".over-infografia").removeClass('infography-link');
			  console.log('done');
			
			
		},
		exit: function() {
			console.log('<<< hasta aqui >>>');
		}
	});
}