/**
 * Created by wap26 on 21/01/16.
 */
'use strict';

var Cart = function($ajouterPanier)
{
    this.$ajouterPanier = $ajouterPanier;
    this.$quantity = $ajouterPanier.find('.quantity');
};

Cart.prototype.addOneQuantity = function()
{
    var cart = [];
    var checkElementIncart = false;
    var $quantity = this.$quantity.val().trim();
    var $mealId = this.$quantity.data('id');
    var $mealName = this.$quantity.data('name');
    var order = {
        'mealId' : $mealId,
        'mealName' : $mealName,
        'quantity' : $quantity
    };
    var checkcart = this.checkcartElement();

    if(checkcart != null)
    {
        cart = loadDataFromDomStorage('cart');
        $.map(cart, function(value)
        {
            if(value.mealId == $mealId)
            {
                value.quantity = parseInt($quantity) + parseInt(value.quantity);
                checkElementIncart = true;
            }
        });
        if(checkElementIncart == false){cart.push(order)}
    }
    else
    {
        cart.push(order);
    }

    saveDataToDomStorage('cart', cart);
};

Cart.prototype.checkcartElement = function()
{
    var cart = loadDataFromDomStorage('cart');
    if(cart === null)
    {
        return jQuery.parseJSON(cart);
    }
    return false;
};
//
