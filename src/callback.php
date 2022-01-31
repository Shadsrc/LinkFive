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
    var_dump( $response );


    echo $receive -> getStatusCode();

    if ($receive -> getStatusCode() == 200)
    {
        $body = $receive -> getBody();
        $json = json_decode($body, true);
        $token = $json['access_token'];
    } else {die("Ne marche pas");}

    var_dump($receive);
    file_put_contents ('token.txt',$receive, $token, FILE_APPEND);
    


    header('Location: '.$url.$_SERVER['SERVER_NAME'].'/wp-admin/admin.php?page=PluginLinkedIn%2Fincludes%2Fwplf-first-page.php');
    exit();
