<?php

class ModificationController
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
			
			if(array_key_exists('Photo', $formFields))
			{
				//move_uploaded_file();
				//requet a faire dans meal
			}
			
			
				var_dump($formFields);
			if(array_key_exists('Modification',$formFields))
			{
				$mealModel = new MealModel();
				var_dump($formFields);
				die();
				//$mealModel->modifyMeal(....);
			}
			elseif(ctype_digit($formFields['meal_Id']))
			{
				$mealModel = new MealModel();
				$meal = $mealModel->find($formFields['meal_Id']);
				return ['meal' => $meal];
			}
    }
}
