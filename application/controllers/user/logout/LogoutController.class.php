<?php
	class LogoutController
	{
		public function httpGetMethod(Http $http, array $queryFields)
		{
			if(isset($_GET['logout']) && $_GET['logout'] == 'out')
			{
				$userSession = new UserSession();
				$userSession->destroy();
				$http->redirectTo('/');
			}
		}
	}