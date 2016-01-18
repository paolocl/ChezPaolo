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
	
	
	// A FAIRE
	public function modifyMeal()
	{
		$query = new Database();
		
		return $query->executeSql(
			'UPDATE table
			SET Name = ?,
					Description = ?,
					QuantityInStock = ?,
					BuyPrice = ?,
					SalePrice = ?,
					SalePrice = ?,
			WHERE Id = ?', 
			[]
		);
	}
	
	// A FAIRE
	public function addMeal()
	{
		$query = new Database();
		
		return $query->executeSql(
			'INSER INTO table
			(nom_colonne_1, ..) VALUES (?,..)',
			[] 
		);
	}
	
}