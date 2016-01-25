<?php
/**
 * Created by PhpStorm.
 * User: wap26
 * Date: 22/01/16
 * Time: 14:42
 */
class BasketController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    }
    public function httpPostMethod(Http $http, array $formFields)
    {

        if(array_key_exists('basketItems', $formFields) == false){$formFields['basketItems'] = [];};
        //var_dump($formFields['basketItems']);
        return ['basketItems' => $formFields['basketItems'], '_raw_template' => true ];
    }

    //_raw_template => true === ne charge pas le layaoutView
}