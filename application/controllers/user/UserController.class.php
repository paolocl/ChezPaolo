<?php

class UserController
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
				$Customer = new CustomerModel();
			
				$verifEmail = $Customer->sameMail($formFields['Email']);
				//var_dump(strlen($_POST['Phone']));
				//var_dump(strlen($_POST['ZipCode']));
			
			if($verifEmail['result'] === '0' && ctype_digit($formFields['Year']) && ctype_digit($formFields['Month']) && ctype_digit($formFields['Day']) && ctype_digit($formFields['Phone']) && strlen($formFields['Phone']) === 10 && ctype_digit($formFields['ZipCode']) && strlen($formFields['ZipCode']) === 5 && isset($formFields['password']) && isset($formFields['Email']) && filter_var($formFields['Email'], FILTER_VALIDATE_EMAIL) != false){
				
				$password = password_hash($formFields['password'], PASSWORD_DEFAULT);
				//var_dump($password);
		
				$Birthdate = $formFields['Year'] . '-' . $formFields['Month'] . '-' . $formFields['Day'];
				//var_dump($Birthdate);
				$Customer_id = $Customer->registerCustomer($formFields['FirstName'],$formFields['LastName'],$Birthdate,$formFields['Phone'],$formFields['Address'],$formFields['Address2'],$formFields['City'],$formFields['ZipCode'],$formFields['Email'],$formFields['password']);
				//var_dump($Customer_id);
				
				
				$user = $Customer->findCustomer($Customer_id);
				
				$UserSession = new UserSession();
				$UserSession->create($user);
				
				$http->redirectTo('');
				
			}
			elseif($verifEmail != '0')
			{
				$http->redirectTo('Exception?Error=3');
			};
			
    }
}
