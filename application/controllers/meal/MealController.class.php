<?php

class MealController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */			
			//var_dump(intval($queryFields['produit_id']));
			if(array_key_exists('produit_id',$queryFields)){
				if(ctype_digit($queryFields['produit_id'])){
					$meal = new MealModel();
					$listMeal = $meal->find(intval($queryFields['produit_id']));
					if($listMeal){
						return ['listMeal' => $listMeal];
					}else{
						$http->redirectTo('Exception?Error=1');
					}
				}
				else
				{
					$http->redirectTo('Exception?Error=2');
				}	
			}
			else
			{
				$http->redirectTo('Exception?Error=2'); //'On ne hack pas mon site !!!!!!!!!!!!!!!!', 'Image' => 'http://iletaitungeek.com/wp-content/uploads/2015/08/dark-vador-aura-sa-ps4-collector-une.jpg'];
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
