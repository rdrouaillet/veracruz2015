<?php
 require  '/usr/share/nginx/www/versan/wp-content/themes/veracruz2014-v2/lib/tmhOAuth.php';
 require  '/usr/share/nginx/www/versan/wp-content/themes/veracruz2014-v2/lib/tmhUtilities.php';
 
 require_once( '/usr/share/nginx/www/versan/wp-load.php' );
 
function get_tweetActaliza($account) {
	$guardoCuenta = $account;
	// get tokens
	global $wpdb;
	$tmhOAuth = new tmhOAuth(
		array(
			'consumer_key' => 'IkzT52PXpo8H5Reslogtw',
			'consumer_secret' => 'LHycM7rUpDbTDN2ERvc6bgPzYjPt1KEq0lKtrYdvYo',
			'user_token' => '1270543368-8z1t7dZVrnTTzMpVrapyfAkUy2SkAX6fJevz1pp',
			'user_secret' => 'htPTKN51WVjM0slI0luO2JYeZtNme1oyFgunWXtLmRJJQ',
			'curl_ssl_verifypeer' => false
		)
	);
	$data_twitter = array(
		'screen_name' => $account,
		'count' => '15'
	);
	$code = $tmhOAuth->request( 'GET', $tmhOAuth->url('1.1/statuses/user_timeline'), $data_twitter );
	$response = $tmhOAuth->response['response'];
	
	
	//echo "HOLO".$mylink;
	
	print_r($response);
	
	$tweets = json_decode( $response, true );
	foreach( $tweets as $tweetaa ) {
				$cadenaTweetas=$tweetaa['text'];
					if($cadenaTweetas!=""){
					// DELETE TWEETS
					$wpdb->delete( 'gev_twitter', array( 'screen_name' => $account ), array( '%s' ) );
					}
	}
	
			foreach( $tweets as $tweet ) {
				$cadenaTweet=$tweet['text'];
				
					if($cadenaTweet!=""){
					// DELETE TWEETS
					//$wpdb->delete( 'gev_twitter', array( 'screen_name' => $account ), array( '%s' ) );
					//DELETE TWEETS
					// INICIA INSERT
					//$mylink = $wpdb->get_var("SELECT MAX(id) FROM gev_twitter");
						$wpdb->insert( 
							'gev_twitter', 
							array(
							//'id' => $mylink, 
							'screen_name' => $account, 
							'text' =>  $tweet['text']
						), 
						array( 
							'%s', 
							'%s' 
						) 
					);// FIN INSERT
					
				}//FIN IF VALIDA CADENA VACIA PARA EL ERROR RATE
			}
}
echo get_tweetActaliza('gobiernover');
echo get_tweetActaliza('SaladePrensaVer');
?>

