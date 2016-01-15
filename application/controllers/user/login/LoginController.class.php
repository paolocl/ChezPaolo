<?php
	class LoginController
	{
		public function httpGetMethod(Http $http, array $queryFields)
		{
			
		}
		public function httpPostMethod(Http $http, array $formFields)
		{
			
			if(filter_var($formFields['Login'], FILTER_VALIDATE_EMAIL) != false)
			{
				$CustomerModel = new CustomerModel();
				$user_id = $CustomerModel->findWithCredentials($formFields['Login'],$formFields['Password']);
				//var_dump($user_id);
				if(ctype_digit($user_id))
				{
					$user = $CustomerModel->findCustomer($user_id);
					
					$UserSession = new UserSession();
					$UserSession->create($user);
					$http->redirectTo('/');
				}
				else
				{
					$http->redirectTo('Exception?'.$user_id);
				}
			}
			else
			{
				$http->redirectTo('Exception?Error=4');
			}
			
		}
	}