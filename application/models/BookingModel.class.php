<?php
class BookingModel
{
	public static $dateException = 'Vous avez entrée des caractères dans votre formulaire';
	public static $PasseDateException = 'Date antérieurs à la date d\'aujourd\'hui';
	public static $FieldsException = 'Champs mal rempli';
	
	
	public function register($Customer_Id, $BookingDate, $BookingTime, $NumberOfSeats)
	{
		$query = new Database();
		
		return $query->executeSql('INSERT INTO Booking (Customer_Id, BookingDate, BookingTime, CreationTimestamp, NumberOfSeats) VALUES (?,?,?,?,?) ',[$Customer_Id, $BookingDate, $BookingTime, date("Y-m-d G:i:s") ,$NumberOfSeats]);
	}
	
	public function getAllBooking()
	{
		$query = new Database();
		
		return $query->query('SELECT * FROM Booking ');
	}
	
	public function getOneBooking($Customer_Id)
	{
		$query = new Database();
		
		return $query->queryOne('SELECT * FROM Booking WHERE Customer_Id = ? ',[$Customer_Id]);
	}
	
	public function findWithCredentials($email,$customer)
	{
		$ident = new Database();
	}
	
	public function deletBooking($bookingId)
	{
		$database = new Database();
		
		$database->executeSql('DELETE FROM Booking WHERE Id = ?',[$bookingId]);
	}
	
	public function bookingListById($userId)
	{
		$database = new Database();
					
		return $database->query('SELECT `BookingDate`, `BookingTime`, `NumberOfSeats`, `Id` FROM `Booking` WHERE `Customer_Id` = ? ORDER BY BookingDate DESC', [$userId]);
	}
	
	public function checkBookingById($customerId, $bookingId, $bookingDate)
	{
		$database = new Database();
		
		if($database->queryOne('SELECT COUNT(*) as result FROM Booking WHERE Customer_Id = ? AND Id = ? AND BookingDate = ?', [$customerId, $bookingId, $bookingDate])['result'] == 1)
		{
			return true;
		}
		return false;
	}
	
	
}