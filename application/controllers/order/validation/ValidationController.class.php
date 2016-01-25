<?php

class ValidationController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
         */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP POST
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
         */
        $userSession = new UserSession();

        if($userSession->isAuthenticated() == false)
        {
            $http->redirectTo('/User/Login');
        }
        // TODO: VERIF DES DONNéES

        $orderModel = new OrderModel();

        $orderModel->validation($formFields['order'], $userSession->getId());

        $formFields['order'];




    }
}
