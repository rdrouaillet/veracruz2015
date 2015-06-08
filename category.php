<?php 
	$nombreCategoria = single_cat_title("", false);
		/*switch($nombreCategoria){
		case 'STPSP' || 'SSP' || 'SS' || 'SIOP' || 'SEV' || 'SEGOB' || 'SEFIPLAN' || 'SEDESOL' || 'SEDEMA' || 'SEDECOP' || 'SEDARPA' || 'SECTUR' || 'PROGOB' || 'PGJ' || 'PC' || 'DIF' || 'CGE' || 'CGCS':
			include(TEMPLATEPATH . '/category-dependencia.php');
		break;
		default:
			include(TEMPLATEPATH . '/category-default.php');
		break;
	}*/
	if(($nombreCategoria == "STPSP") || ($nombreCategoria == "SSP") || ($nombreCategoria == "SS") || ($nombreCategoria == "SIOP") || ($nombreCategoria == "SEV") || ($nombreCategoria == "SEGOB") || ($nombreCategoria == "SEFIPLAN") || ($nombreCategoria == "SEDESOL") || ($nombreCategoria == "SEDEMA") || ($nombreCategoria == "SEDECOP") || ($nombreCategoria == "SEDARPA") || ($nombreCategoria == "SECTUR") || ($nombreCategoria == "PROGOB") || ($nombreCategoria == "PGJ") || ($nombreCategoria == "PC") || ($nombreCategoria == "DIF") || ($nombreCategoria == "CGE") || ($nombreCategoria == "CGCS") || ($nombreCategoria) == "Gobernador" || ($nombreCategoria) == "boletin meteorologico")
	{
		include(TEMPLATEPATH . '/category-dependencia.php');
	}
	else
	{
		include(TEMPLATEPATH . '/category-default.php');
	}
?>