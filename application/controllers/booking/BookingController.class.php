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
			
				$userSession = new UserSession();
				if($userSession->isAuthenticated())
				{
					$userId = $userSession->getId();
					
					$database = new Database();
					
					$bookingList = $database->query('SELECT `BookingDate`, `BookingTime`, `NumberOfSeats`, `Id` FROM `Booking` WHERE `Customer_Id` = ? ', [$userId]);
					
					//var_dump($bookingList);
					
					return ['bookingList' => $bookingList, 'now' =>  new DateTime() ];
					
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
				$userSession = new UserSession();
				if($userSession->isAuthenticated())
				{
					$dateTime = date_create($formFields['dateResa'] . ' ' . $formFields['timeResa'] );
					$now = new DateTime("now");
					$resaDate = date_format($dateTime, 'Y-m-d');
					$resaTime = date_format($dateTime, 'H:i:s');

					//var_dump($formFields);
					if(!empty($formFields['dateResa']) && !empty($formFields['timeResa']) && !empty($formFields['NumberOfSeats']) && $dateTime > $now && ctype_digit($formFields['NumberOfSeats'])){

						$userId = $userSession->getId();

						$Booking = new BookingModel();
						$resultat = $Booking->register($userId, $resaDate, $resaTime, $formFields['NumberOfSeats']);
						
						$flashBag = new FlashBag();
						$flashBag->add("Votre réservation numero $resultat du $resaDate à $resaTime pour ".$formFields['NumberOfSeats'] ." est bien pris en compte");
						$http->redirectTo('/');
						
					}elseif($dateTime < $now){
						return ['Error' => 'Nous ne pouvons vous réserver une table pour une date antérieur à aujourd\'hui'];
					}else{
						return ['Error' => 'Un champ n\'a pas était remplie correctement'];
					}					
				}
				else
				{
					$http->redirectTo('/');
				}
    }
}
