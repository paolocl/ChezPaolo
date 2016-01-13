<?php
class MealModel
{	
	public function find($mealId)
	{
		//var_dump($mealId);

		$query = new Database();

		return $query->queryOne('SELECT * FROM Meal WHERE Id = ?',[$mealId]);			
	}
	
	public function listAll(){
		
		$query = new Database();
		
		return $query->query('SELECT * FROM Meal');
	}
}