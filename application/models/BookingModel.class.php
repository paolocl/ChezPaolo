<?php
class BookingModel
{
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
	
	
}