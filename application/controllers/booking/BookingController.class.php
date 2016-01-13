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
			echo 'haha';
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
			
			$dateTime = date_create($formFields['dateResa'] . ' ' . $formFields['timeResa'] );
			$now = new DateTime("now");
			$resaDate = date_format($dateTime, 'Y-m-d');
			$resaTime = date_format($dateTime, 'H:i:s');
			
			//var_dump($formFields);
			if(!empty($formFields['dateResa']) && !empty($formFields['timeResa']) && !empty($formFields['NumberOfSeats']) && $dateTime > $now && ctype_digit($formFields['NumberOfSeats'])){
				$Booking = new BookingModel();
				$resultat = $Booking->register('1', $resaDate, $resaTime, $formFields['NumberOfSeats']);
				return ['resultat' => $resultat];
			}elseif($dateTime < $now){
				return ['Error' => 'Nous ne pouvons vous réserver une table pour une date antérieur à aujourd\'hui'];
			}else{
				return ['Error' => 'Un champ n\'a pas était remplie correctement'];
			}
			
    }
}
