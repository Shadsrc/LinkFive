<?php   
        require __DIR__.'/../vendor/autoload.php';
        require __DIR__.'/../LinkFive_id.php';
       
        use GuzzleHttp\Client;
        use GuzzleHttp\EntityBody;


        //Création des objets Guzzle pour effectuer les requêtes

    function getClientOauth(){

        $client = new Client([
            'base_uri' =>'https://www.linkedin.com/oauth/v2/', //Demande d'authentification
            'timeout' => 2.0,
        ]);
        return $client;
    }

    
    function getClient(){

         $receive = new Client([
            'base_uri' =>'https://api.linkedin.com/v2/', //Demande API Authentifiée
            'timeout' => 2.0,
            'Authorization' => 'Bearer ' . $token,      
            'Accept' => 'application/json',
        ]);
        return $receive;
    }

  

    function getToken($code){

        require __DIR__.'/../LinkFive_id.php';
        //Envoie de la requête avec le code OAuth à LinkedIn

        var_dump($callback);

        $response  =  getClientOauth() -> request ( 'POST' ,  'accessToken' ,  [ 

                'Content-Type'=> 'application/x-www-form-urlencoded',
                'grant_type'=> "authorization_code",
                'code'=> $code,
                'redirect_uri'=> $callback,
                'client_id'=> $Client_id,
                'client_secret'=> $Client_secret
            
        ]);

        //Lecture du Json qui contient le token d'accès et le code d'expiration
        try{
            if ($response -> getStatusCode() == 200)
            {

                $body = (string)$response -> getBody();
                $json = json_decode($body, true);
                $token = $json['access_token'];
                $expire = $json['expires_in'];

            }
        }catch(Guzzle\Http\Exception\BadResponseException $e){
            echo "Erreur : " . (string) $e->getMessage();
        }
       
    }
    
    


// Lecture des informations du compte utilisateur

    function getId(){

        $response  =  getClient() -> request ( 'GET' ,  'me?projection=(id,firstName,lastName,profilePicture(displayImage~:playableStreams))');

        try{
            if ($response -> getStatusCode() == 200)
            {

                $bodyId = (string)$response -> getBody();
                $json = json_decode($bodyId, true);
                $firstN = $json['firstName'];
                $LastN = $json['lastName'];
                $lang = $json['preferredLocale'];
            }
        }catch(Guzzle\Http\Exception\BadResponseException $e){
            echo "Erreur : " . $e->getMessage();
        }
        var_dump($bodyId);
    }

    function getEmail(){

        $response  =  getClient() -> request ( 'GET' ,  'emailAddress?q=members&projection=(elements*(handle~))');

        try {
            if ($response -> getStatusCode() == 200)
            {

                $bodyEmail = (string)$response -> getBody();
                $json = json_decode($bodyEmail, true);
                $email = $json['emailAddress'];

            }

        }catch(Guzzle\Http\Exception\BadResponseException $e){
                echo "Erreur : " . $e->getMessage();
        }
            
        var_dump($bodyEmail);
    }
?>