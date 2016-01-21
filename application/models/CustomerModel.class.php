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
		if($Database->queryOne('SELECT COUNT(*) AS result FROM Customer WHERE Email = ?',[$Email])['result'] != 0)
		{
			throw new DomainException('Email déjà existant');
		}
		return true;
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
	public function findWithCredentials($email,$password, $ip)
	{
		//TROP DE CONNEXION FAILLED
		$userSession = new UserSession();
		$userSession->tryConnection($ip);	//EXCEPTION INSIDE
		
		$Database = new Database();
		$user =  $Database->queryOne('SELECT Id, Password FROM Customer WHERE Email = ?',[$email]);
		if(!$user)
		{			
			$userSession->createLoginByIp($ip);
			throw new DomainException('Email inconnu');
		}
		else
		{
			$verificationPassword = $this->verifyPassword($password, $user['Password']);
			if($verificationPassword)
			{
				$this->updateLastLoginTimestamp($user['Id']);
				$userSession->createLoginByIp($ip, $user['Id'], 1);
				return $user['Id'];
			}
			else
			{
				$userSession->createLoginByIp($ip);
				throw new DomainException('Mauvaise Mots de Passe');
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
	
	//UPDATE LASTLOGINTIMESTAMP
	private function updateLastLoginTimestamp($Id)
	{
		$Database = new Database();
		$Database->executeSql('UPDATE Customer SET LastLoginTimestamp = NOW() WHERE Id = ?', [$Id] );
	}
	
	
}