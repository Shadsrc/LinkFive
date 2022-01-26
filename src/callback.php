<?php 

  require __DIR__.'/../vendor/autoload.php';
  require __DIR__.'/../LinkFive_id.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\EntityBody;

    $client = new Client([
        'base_uri' =>'https://www.linkedin.com/oauth/v2/',
        'timeout' => 2.0,
    ]);

    //transmition du code OAuth à LinkedIn

    $response  =  $client -> request ( 'POST' ,  'accessToken' ,  [ 
        'form_params' => [
            'grant_type'=> "authorization_code",
            'code'=> $_GET ['code'],
            'redirect_uri'=> $callback,
            'client_id'=> $Client_id,
            'client_secret'=> $Client_secret
        ]
    ]);

    $code = $response->getStatusCode(); 
    $reason = $response->getReasonPhrase(); 
    $body = $response->getBody(); 
 
    file_put_contents('OAuth.log',$code.' ',$reason.' ',$body.PHP_EOL, FILE_APPEND);