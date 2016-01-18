<?php
class AdminModel
{
	public function findWithCredentials($name,$password)
	{
		$Database = new Database();
		$user =  $Database->queryOne('SELECT AdminId, Password FROM Admin WHERE Name = ?',[$name]);
		if(!$user)
		{
			return 'Error';
		}
		else
		{
			$verificationPassword = $this->verifyPassword($password, $user['Password']);
			if($verificationPassword)
			{
				return $user['AdminId'];
			}
			
			else
			{
				return 'Error';
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