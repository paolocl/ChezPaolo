<?php

/**
 * Created by PhpStorm.
 * User: wap26
 * Date: 25/01/16
 * Time: 16:46
 */
class SuccessController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
         */
        $userSession = new UserSession();

        if($userSession->isAuthenticated() == false)
        {
            $http->redirectTo('/User/Login');
        }
    }
    public function httpPostMethod(Http $http, array $formFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP POST
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
         */
    }
}