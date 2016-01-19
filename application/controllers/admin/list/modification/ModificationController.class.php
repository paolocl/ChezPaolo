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
			$userSession = new UserSession();
			if($userSession->isAdminAuthenticated() == false)
			{
				$http->redirectTo('/');
			}			
			
			
			
				//var_dump($formFields);
				//var_dump($_FILES);
			if(array_key_exists('Modification',$formFields))
			{
				if($http->hasUploadedFile('Photo'))
				{
					$pathinfo = $http->moveUploadedFile('Photo', '/images/meals');
					var_dump($pathinfo);
					$mealModel = new MealModel();
					$mealModel->modifyPicture($pathinfo, $formFields['Id']);
				};

				$mealModel = new MealModel();
				$result = $mealModel->modifyMeal($formFields['Name'], $formFields['Description'], $formFields['QuantityInStock'], $formFields['BuyPrice'], $formFields['SalePrice'], $formFields['Id']);
				$http->redirectTo('/Admin/List');
			}
			elseif(ctype_digit($formFields['meal_Id']))
			{
				$mealModel = new MealModel();
				$meal = $mealModel->find($formFields['meal_Id']);
				return ['meal' => $meal];
			}
    }
}
