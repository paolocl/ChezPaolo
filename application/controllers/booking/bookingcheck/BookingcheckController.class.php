<?php

class BookingcheckController{
	
 	public function httpPostMethod(Http $http, array $formFields)
  {
		$dateTime = date_create($formFields['resaDate']);
		$resaDate = date_format($dateTime, 'Y-m-d');
		//var_dump($_POST, $resaDate);
		$booking = new Database();
		$userSession = new UserSession();
		$userId = $userSession->getId();
		//var_dump($userId);
		if(ctype_digit($userId)){

			$bookingList = $booking->queryOne('SELECT COUNT(Id) AS count FROM Booking WHERE Customer_Id = ? AND BookingDate = ?', [$userId, $resaDate]);
			/*var_dump(json_encode($bookingList['count']));*/
			$http->sendJsonResponse($bookingList);
		}
 	}
}