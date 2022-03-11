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
            'headers' => ['Authorization' => 'Bearer ' . getTokenForClient()],      
            'Accept' => 'application/json',

        ]);
        
        return $receive;
    }

    function getTokenForClient(){
        if (file_exists(__DIR__.'/body.json')){

            $body = file_get_contents(__DIR__.'/body.json');
            $json = json_decode($body,true);
            $token = $json['access_token'];
            return $token;

        } else {
            echo "ERREUR";
        }
    }
    
  

    function getToken($code){

        require __DIR__.'/../LinkFive_id.php';
        //Envoie de la requête avec le code OAuth à LinkedIn

        try{

            $response  =  getClientOauth() -> request ( 'POST' ,  'accessToken' ,  
                    ['Content-Type'=> 'application/x-www-form-urlencoded',
                        'form_params' =>[

                        'grant_type'=> "authorization_code",
                        'code'=> $code,
                        'redirect_uri'=> $callback,
                        'client_id'=> $Client_id,
                        'client_secret'=> $Client_secret

                        ]
                    ]
                );
            
            //Lecture du Json qui contient le token d'accès et le code d'expiration
        
            if ($response -> getStatusCode() == 200)
            {

                $body = (string)$response -> getBody();

                return $body;

            }

        }catch(Guzzle\Http\Exception\BadResponseException $e){
            echo "Erreur : " . (string) $e->getMessage();
        }
       
    }
    

// Lecture des informations du compte utilisateur
    /* Lecture du fichier json */

    function getId(){
        
        if (file_exists(__DIR__.'/bodyId.json')){
            
            $bodyId = file_get_contents(__DIR__.'/bodyId.json');
            
            return $bodyId;
         

        } else {
            try{
                
                $response  =  getClient() -> request ( 'GET' ,  'me?projection=(id,firstName,lastName,profilePicture(displayImage~digitalmediaAsset:playableStreams))');
                
            
               
                if ($response -> getStatusCode() == 200)
                {
                    
                    $bodyId = (string)$response -> getBody();
                    file_put_contents(__DIR__.'/bodyId.json',$bodyId);
                        
                    return $bodyId;
                }
            
            }catch(Exception $e){
                echo "Erreur : " . $e->getMessage();
            }
        }
    }

    function getEmail(){

        if (file_exists(__DIR__.'bodyEmail.json')){
            
            $bodyEmail = file_get_contents(__DIR__.'/bodyEmail.json');
            return $bodyEmail;

        } else {

            $response  =  getClient() -> request ( 'GET' ,  'emailAddress?q=members&projection=(elements*(handle~))');

            try {

                if ($response -> getStatusCode() == 200)
                {

                    $bodyEmail = (string)$response -> getBody();
                    file_put_contents(__DIR__.'/bodyEmail.json',$bodyEmail);

                    return $bodyEmail;

                }

            }catch(Exception $e){
                echo "Erreur : " . $e->getMessage();
            }
        }
            
      
    }
?>