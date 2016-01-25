<?php

class ValidationController
{

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

        $orderModel = new OrderModel();

        $order_Id = $orderModel->validation($formFields['order'], $userSession->getId());

        //$order = $orderModel->getOrderById($order_Id);
        //return ['order', $order];

        $http->redirectTo('/Order/Payment?order_Id='.$order_Id);

        // TODO : PAGE DE VALIDATION DU PANIER ET BOUTON PAYMENT

    }
}
