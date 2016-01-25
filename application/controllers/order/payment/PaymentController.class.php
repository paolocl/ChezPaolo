<?php

/**
 * Created by PhpStorm.
 * User: wap26
 * Date: 25/01/16
 * Time: 15:02
 */
class PaymentController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
         */
        $userSession = new UserSession();

        if($userSession->isAuthenticated() == false)
        {
            $http->redirectTo('/User/Login');
        }

        if(array_key_exists('order_Id', $queryFields))
        {
            if(ctype_digit($queryFields['order_Id']))
            {
                //var_dump($queryFields['order_Id']);
                $orderModel = new OrderModel();
                $orderInformation = $orderModel->findOrder($queryFields['order_Id']);


                $customerModel = new CustomerModel();
                $customerInformation = $customerModel->findCustomer($orderInformation['Customer_Id']);

                $order = $orderModel->getOrderLineByOrderId($queryFields['order_Id']);

                return ['customerInformation' => $customerInformation, 'order' => $order, 'orderInformation' => $orderInformation];
            }
        };
        $http->redirectTo('/');

    }
    public function httpPostMethod(Http $http, array $formFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP POST
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
         */
        $userSession = new UserSession();

        if($userSession->isAuthenticated() == false)
        {
            $http->redirectTo('/User/Login');
        }

        $http->redirectTo('/Order/Payment/Success');

    }
}