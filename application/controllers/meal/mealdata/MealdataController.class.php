<?php

/**
 * Created by PhpStorm.
 * User: wap26
 * Date: 21/01/16
 * Time: 11:58
 */
class MealdataController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
         */
        if(array_key_exists('id', $queryFields) && ctype_digit($queryFields['id']))
        {
            $mealModel = new MealModel();
            $http->sendJsonResponse($mealModel->find($queryFields['id']));
        }
        $http->redirectTo('/');

    }
}