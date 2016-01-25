<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 25/01/16
 * Time: 10:29
 */
class OrderModel
{

    public function addMealtoOrder($order_Id, $meal_Id, $quantite)
    {
        $database = new Database();

        $mealModel = new MealModel();

        $unitprice = $mealModel->getPriceById($meal_Id);

        return $database->executeSql('INSERT INTO OrderLine (`Order_Id`, `Meal_Id`, Quantite, Unitprice) VALUES (?,?,?,?)',[$order_Id, $meal_Id, $quantite, $unitprice['SalePrice']]);
    }

    public function createOrder($customer_Id, $taxeRate)
    {
        $database = new Database();

        return $database->executeSql('INSERT INTO `Order` (Customer_Id, TaxeRate, CreationTimestamp) VALUES (?,?,NOW())',[$customer_Id, $taxeRate]);
    }

    public function getTotalAmountByOrderId($order_Id)
    {
        $total = 0;
        $database = new Database();

        $allOrderMeals = $database->query('SELECT  Meal_id, Quantite, UnitPrice FROM `OrderLine`
WHERE Order_Id = ?', [$order_Id]);

        foreach($allOrderMeals as $oneMeal)
        {
            $total += $oneMeal['Quantite']*$oneMeal['UnitPrice'];
        }

        $database->executeSql('UPDATE `Order` SET TotalAmount = ?, TaxeAmount = TotalAmount*`Order`.TaxeRate WHERE Id = ?',[$total ,$order_Id]);

    }


    public function validation($order, $user_Id)
    {
        $order_Id = $this->createOrder($user_Id, '0.20');

        $orderArray = json_decode($order);

        foreach($orderArray as $mealOrder)
        {
            if(intval($mealOrder->quantite) != 0 && is_int($mealOrder->mealId))
            {
                $this->addMealtoOrder($order_Id, $mealOrder->mealId, $mealOrder->quantite);
            }
        }

        $this->getTotalAmountByOrderId($order_Id);

    }




}