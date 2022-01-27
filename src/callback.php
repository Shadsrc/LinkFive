<?php 

  require __DIR__.'/../vendor/autoload.php';
  require __DIR__.'/../LinkFive_id.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\EntityBody;

    $code_linkedin = $_GET ['code'];

    $client = new Client([
        'base_uri' =>'https://www.linkedin.com/oauth/v2/',
        'timeout' => 2.0,
    ]);

    $receive = new Client([
        'base_uri' =>'https://api.linkedin.com/v2/',
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

    $Token_LinkedIn = json_decode('acess_token');

    if(empty($Token_LinkedIn) == false){
        $response  =  $receive -> request ( 'GET' ,  'me' ,  [

            $headers = ['Authorization' => 'Bearer ' . $Token_LinkedIn]
        ]);
    }

    /*if ($reponse){
        header('Location: http://10.0.10.139/wp-admin');
        exit();

    }