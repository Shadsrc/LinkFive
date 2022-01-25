<?php

    //Vérifie si un utilisateur est connécté avec LinkedIn, dans le cas ou non, il redirige l'utilisateur vers LinkedIn.

    
        require_once 'config.php';

        try{

            $adapter->authenticate();
            $userProfile = $adapter->getUserProfile();
            print_r($userProfile);
            echo '<a href="logout.php">Logout</a>';

        }catch (Exeception $e ){

            echo $e->getMessage();

        }
    