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
	
}