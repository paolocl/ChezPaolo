<?php

class SupbookingController
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
			/*var_dump($formFields['bookingDate']);
			var_dump($date);
			var_dump($date > $formFields['bookingDate']);
			
			die();*/
			
			$date = new DateTime ();
			$userSession = new UserSession();
			$bookingModel = new BookingModel();
			$customerId = intval($userSession->getId());
			
			if($userSession->isAuthenticated())
			{
				$customerId = intval($userSession->getId());
				
				$checkBookingById = $bookingModel->checkBookingById($customerId,intval($formFields['bookingId']),$formFields['bookingDate']);
				
			
			if(ctype_digit($formFields['bookingId']) && $date < new DateTime($formFields['bookingDate']) && $checkBookingById)
			{
					
				$bookingModel->DeletBooking($formFields['bookingId']);
				
				$flashBag = new FlashBag();
				$flashBag->add('Réservation '.$formFields["bookingId"].' bien supprimée');
				
				$http->redirectTo('/');
			};
			
			$flashBag = new FlashBag();
			$flashBag->add('Problème lors de la suppression de la réservation (Vous ne pouvez supprimer des réservations posterieur à aujourd\'hui)');
			
			$http->redirectTo('/Booking');

			}
    }
}
