<?php
	class LoginController
	{
		public function httpGetMethod(Http $http, array $queryFields)
		{
			return ['_form' => new LoginForm() ];
		}
		
		
		public function httpPostMethod(Http $http, array $formFields)
		{
			if(filter_var($formFields['Login'], FILTER_VALIDATE_EMAIL) != false)
			{
				try{
					$userSession = new UserSession();
					$CustomerModel = new CustomerModel();
					$user_id = $CustomerModel->findWithCredentials($formFields['Login'],$formFields['Password'],$_SERVER['REMOTE_ADDR']);
					if(ctype_digit($user_id))
					{
						$user = $CustomerModel->findCustomer($user_id);

						$userSession->create($user);
						
						$http->redirectTo('/');
					}
				}
				catch (DomainException $event)
				{
					//var_dump($event);
					$form = new LoginForm();
          $form->bind($formFields);
          $form->setErrorMessage($event->getMessage());

					return [ '_form' => $form ];
					//AVEC CONTROLEUR EXECPTION --- $http->redirectTo('Exception?'.$user_id);
				}
			}
			else
			{
				$http->redirectTo('Exception?Error=4');
			}
			
		}
	}