<?php

class BookingcheckController{
	
 	public function httpPostMethod(Http $http, array $formFields)
  {
		$dateTime = date_create($_POST['resaDate']);
		$resaDate = date_format($dateTime, 'Y-m-d');

		$booking = new Database();

		$bookingList = $booking->queryOne('SELECT COUNT(Id) AS count FROM Booking WHERE Customer_Id = ? AND BookingDate = ?', [$_POST['Customer_Id'], $resaDate]);
		/*var_dump(json_encode($bookingList['count']));*/
		echo json_encode($bookingList);

 	}
}