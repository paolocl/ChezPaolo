<?php

class BookingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
			$date = new DateTime ();
			$form = new BookingForm();
			$oldBookingList = [];
			$futurBookingList = [];
			
				$userSession = new UserSession();
				if($userSession->isAuthenticated())
				{
					$userId = $userSession->getId();
					
					$bookingModel = new BookingModel();
					$bookingList = $bookingModel->bookingListById($userId);
					
					
					$futurBookingList = array_filter($bookingList, function($value){ return new DateTime() <= new DateTime($value['BookingDate']); });
					$oldBookingList = array_filter($bookingList, function($value){ return new DateTime() > new DateTime($value['BookingDate']); });
					
					return ['futurBookingList' => $futurBookingList, 'oldBookingList' => $oldBookingList, '_form' => $form ];
					
				}
				else
				{
					$http->redirectTo('/');
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
			
			/*$date = new DateModel();
			var_dump($date->testDate($formFields['dateResa'])); //0 FAUX - 1 VRAI REJEX */
			try{
				$userSession = new UserSession();
				if($userSession->isAuthenticated())
				{
					$dateTime = date_create($formFields['dateResa'] . ' ' . $formFields['timeResa'] );
					if($dateTime == false)
					{
						throw new InvalidArgumentException(BookingModel::$dateException);
					};
					$now = new DateTime("now");
					$resaDate = date_format($dateTime, 'Y-m-d');
					$resaTime = date_format($dateTime, 'H:i:s');

					//var_dump($formFields);
					if(!empty($formFields['dateResa']) && !empty($formFields['timeResa']) && !empty($formFields['NumberOfSeats']) && $dateTime > $now && ctype_digit($formFields['NumberOfSeats'])){

						$userId = $userSession->getId();

						$booking = new BookingModel();
						$resultat = $booking->register($userId, $resaDate, $resaTime, $formFields['NumberOfSeats']);
						
						$flashBag = new FlashBag();
						$flashBag->add("Votre réservation numero $resultat du $resaDate à $resaTime pour ".$formFields['NumberOfSeats'] ." est bien pris en compte");
						$http->redirectTo('/');
						
					}elseif($dateTime < $now){
												throw new InvalidArgumentException(BookingModel::$PasseDateException);

					}else{
												throw new InvalidArgumentException(BookingModel::$FieldsException);

					}					
				}
				else
				{
					$http->redirectTo('/');
				}
			}
			catch (InvalidArgumentException $event)
			{
				//var_dump($event);
				$form = new BookingForm();
        $form->bind($formFields);
        $form->setErrorMessage($event->getMessage());
				
				return [ '_form' => $form ];
			}
    }
}
