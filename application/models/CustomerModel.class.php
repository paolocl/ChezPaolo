<?php 
class CustomerModel
{
	
	// REGISTER CUSTOMER
	public function registerCustomer($FirstName,$LastName,$Birthdate,$Phone,$Address,$Address2,$City,$ZipCode,$Email,$password)
	{
		
		
		//HASH PHP5.5
		//$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		//HASH MANO <PHP5.5
		$passwordHash = $this->hasPassword($password);
		
		$Database = new Database();
		return $Database->executeSql('
		INSERT INTO Customer 
			(FirstName,
			LastName,
			Birthdate,
			Phone,
			Address,
			Address2,
			City,
			ZipCode,
			Email,
			password,
			CreationTimestamp,
			LastLoginTimestamp) 
		VALUES 
			(?,?,?,?,?,?,?,?,?,?,NOW(),NOW())',
				[$FirstName,
				$LastName,
				$Birthdate,
				$Phone,
				$Address,
				$Address2,
				$City,
				$ZipCode,
				$Email,
				$passwordHash]);
	}
	
	
	////VERFI EMAIL
	public function sameMail($Email)
	{
		$Database = new Database();
		return $Database->queryOne('SELECT COUNT(*) AS result FROM Customer WHERE Email = ?',[$Email]);
	}
	
	
	//FIND CUSTOMER
	public function findCustomer($Customer_id)
	{
		$Database = new Database();
		return $Database->queryOne(
			'SELECT 
			Id,
			FirstName,
			LastName,
			Email
		FROM Customer 
		WHERE Id = ? ', [$Customer_id]);
	}
	
	
	// HASH PASSWORD
	private function hasPassword($password)
	{
		$salt = '$2y$11$pepepdu77estunouf$'.substr(bin2hex(openssl_random_pseudo_bytes(32)),0,22);
		return crypt($password,$salt);
	}
	
	// LOGIN
	public function findWithCredentials($email,$password)
	{
		$Database = new Database();
		$user =  $Database->queryOne('SELECT Id, Password FROM Customer WHERE Email = ?',[$email]);
		if(!$user)
		{
			return 'Error=4';
		}
		else
		{
			$verificationPassword = $this->verifyPassword($password, $user['Password']);
			if($verificationPassword)
			{
				return $user['Id'];
			}
			
			else
			{
				return 'Error=5';
			}
		}
	}
	
	
	// VERIF PASSWORD
	private function verifyPassword($clearPassword, $hashPassword)
	{
		//PHP 5.5.0
		//return password_verify($clearPassword,$hashPassword);
		//PHP <5.5.0
		return crypt($clearPassword,$hashPassword) == $hashPassword;
	}
	
	
}