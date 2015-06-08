var xmlhttp;
function initXMLHTTP(){//inicializa los request para AJAX
	if (xmlhttp!=null && xmlhttp.readyState!=0 && xmlhttp.readyState!=4){//reinicializa la variable
		xmlhttp.abort();
	}
	try{ xmlhttp=new XMLHttpRequest(); }
	catch(error){ 
		try{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
		catch(error){ return false; }
	}
}
var cont=0;
function create_gallery(id){
	initXMLHTTP(); 
	var url='http://www.veracruz.gob.mx/create-gallery/';
	var sendPOST='post=yes&post_id='+id+'';
	//alert(sendPOST);
	xmlhttp.open('POST',url, true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length',sendPOST.length);
	xmlhttp.setRequestHeader('Connection','close');
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			//document.getElementById('photos').innerHTML='';
			/*document.getElementById('work').innerHTML='';*/
			document.getElementById('test').innerHTML=xmlhttp.responseText;
			
			console.log(xmlhttp.responseText);
			Shadowbox.setup(document.getElementById('test').getElementsByClassName(id));
		}
		else{
			console.log('not working');
			//document.getElementById('work').innerHTML='Buscando solicitud';
		}
	};
	xmlhttp.send(sendPOST);
}
