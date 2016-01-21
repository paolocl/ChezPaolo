<?php
class UserSession
{
	public function __construct()
	{
		if(session_status() === PHP_SESSION_NONE)
		{
			session_start();
		}
	}
	
	public function create(array $array = array())
	{
		$_SESSION['user'] = $array;
	}
	
	public function destroy()
	{
		session_destroy();
		$_SESSION = [];
	}
	
	public function isAuthenticated()
	{
		if(array_key_exists('user',$_SESSION))
		{
			if(empty($_SESSION['user']) == false)
			{
				return true;
			}
		}
		return false;
	}
	
	public function isAdminAuthenticated()
	{
		if(array_key_exists('admin',$_SESSION))
		{
			if(empty($_SESSION['admin']) == false)
			{
				return true;
			}
		}
		return false;
	}
	
	
	public function getId()
	{
		return $_SESSION['user']['Id'];
	}
	
	public function getFirstName()
	{
		return $_SESSION['user']['FirstName'];
	}
	
	public function getLastName()
	{
		return $_SESSION['user']['LastName'];
	}
	
	public function getFullName()
	{
		return $_SESSION['user']['FirstName'] .' '. $_SESSION['user']['LastName'];
	}
	
	public function getEmail()
	{
		return $_SESSION['user']['Email'];
	}
	
	public function tryConnection($ip)
	{
				
		$NumberOfTryConnection = $this->getNumberOfTryConnectionByIp($ip);
		//un update a chaque fois puis faire un count pour connaitre le nombre aujourd'hui
		if($NumberOfTryConnection['total'] > 5)
		{
			throw new DomainException('Vous vous été connecté trop de fois sans jamais réussir à vous loger');
		}
	}
	
	private function getNumberOfTryConnectionByIp($ip)
	{
		$database = new Database();
		
		return $database->queryOne('
		SELECT COUNT(LoginIp) AS total 
		FROM Login 
		WHERE (LoginTime BETWEEN DATE_SUB(NOW(),INTERVAL 5 MINUTE AND NOW())) 
		AND LoginIp = ?',[$ip]);
	}
	
	public function createLoginByIp($ip, $customerId = null, $status = 0)
	{
		$database = new Database();
		
		return $database->executeSql('
			INSERT INTO Login (LoginIp, LoginTime, Customer_Id, status) 
			VALUES (?,NOW(),?,?)',
			[$ip, $customerId, $status]);
	}
	
}