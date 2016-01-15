<?php

class HomeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
			$meals = new MealModel();
			$listMeals = $meals->listAll();
			
			$userSession = new UserSession();
			
			return ['listMeals' => $listMeals, 'userSession' => $userSession];
    }
}
