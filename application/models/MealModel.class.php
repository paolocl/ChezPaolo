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
	
	public function modifyMeal($Name, $Description, $QuantityInStock, $BuyPrice, $SalePrice, $MealId)
	{
		$query = new Database();
		return $query->executeSql(
			'UPDATE Meal
			SET Name = ?,
					Description = ?,
					QuantityInStock = ?,
					BuyPrice = ?,
					SalePrice = ?
			WHERE Id = ?', 
			[$Name, $Description, $QuantityInStock, $BuyPrice, $SalePrice, $MealId]
		);
	}
	
	public function modifyPicture($Photo, $Id)
	{
		$query = new Database();
		return $query->executeSql(
			'UPDATE Meal
			SET Photo = ?
			WHERE Id = ?', 
			[$Photo, $Id]
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