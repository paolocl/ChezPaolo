<?php

class AdminController
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
			//var_dump($formFields);
			if(ctype_alpha($formFields['Name']) && ctype_alpha($formFields['Password']))
			{
				$adminModel = new AdminModel();
				$login = $adminModel->findWithCredentials($formFields['Name'], $formFields['Password']);
				
				//var_dump($login);
				
				if($login != 'Error')
				{
					$userSession = new UserSession;
					$_SESSION['admin'] = 'on';
					$http->redirectTo('/Admin/List');
				}
				
			}
    }
}
